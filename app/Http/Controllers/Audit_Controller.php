<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Use_Case;
use App\Models\Conclusion;
use App\Models\Cust_comp_info;
use App\Models\Ciucm;
use App\Models\Blank;
use App\Models\Order;
use App\Models\Audit_info;
use App\Models\Contract;
use Illuminate\Support\Facades\Storage;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class Audit_Controller extends Controller
{
    private $conclusion_validation_rules=[
        'conclusion.A1'=>'required | numeric',
        'conclusion.A2'=>'required | numeric',
        'conclusion.P2'=>'required | numeric',
        'conclusion.DO'=>'required | numeric',
        'conclusion.P1'=>'required | numeric',
        'conclusion.DEK2'=>'required | numeric',
        'conclusion.PUDN'=>'required | numeric',
        'conclusion.P'=>'required | numeric'
    ];
    function __construct()
    {
    	$this->middleware('multi_auth:auditor');
    }

    private function view($file, $data=[]){
        $data['title']='e-audit auditor';
        $data['body']='Auditor.'.$file;
        return view('auditor_index', $data);
    } 
    public function select_temp(){
        $data['templates']=Template::all();
        $data['use_cases']=Use_Case::all();
        return $this->view('select_template', $data);
    }
    public function create_conclusion(Request $req){
        switch ($req->method()) {
            case 'GET':
            $data['template_id']=$_GET['template_id']??false;
            $data['use_cases']=$_GET['use_cases']??false;
            if($data["template_id"]&&$data["use_cases"])
                return $this->view('create_conclusion', $data);
            return $this->select_temp();
            break;
            case 'POST':
            $req->validate(
                $this->conclusion_validation_rules
            );
            $all=$req->all();
            $conclusion_fields=$req->input('conclusion');
            $cust_info_fields=$req->input('cust_info');
            $custom_fields_files=$req->file('custom');
            $cust_info_fields_files = $req->file('cust_info');

            $custom_fields=$req->input('custom');

                    // customer_info-use_case mappings
            $ciucm_fields=$req->input('ciucm');
            $conclusion=new Conclusion();
            $conclusion->auditor_id=auth()->user()->id;

            foreach ($conclusion_fields??[] as $key => $value) {
                $conclusion->$key=$value;
            }

                //get snapshot of default audit company info
            $default_company=Audit_info::where('active', 1)->first();

            unset($default_company->id);
            unset($default_company->active);

            foreach ($default_company->getAttributes() as $key => $value) {
                $conclusion->$key=$value;
            }


            $conclusion->save();    


            $CCI=new Cust_comp_info();
            $CCI->conclusion_id=$conclusion->id;
            foreach ($cust_info_fields??[] as $key => $value) {
                $CCI->$key=$value;
            }

            foreach ($cust_info_fields_files ?? [] as $key => $value) {

                $CCI->$key = $value
                ->storeAs("cust_info/$CCI->id", time() . 'cci' . $key . $value->getClientOriginalName());
            }

            foreach ($custom_fields_files??[] as $key => $value) {
                /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                $custom_fields[$key]=$value
                ->storeAs("cust_info/$conclusion->id", time().$value->getClientOriginalName());
            }

            $CCI->custom_fields=json_encode($custom_fields);
            $CCI->save();
            foreach ($ciucm_fields as $key => $value) {
                $cuicm=new Ciucm();
                $cuicm->cust_info_id=$CCI->id;
                $cuicm->use_case_id=$value;
                $cuicm->save();
            }
            return redirect()->route('auditor.conclusions');
            break;
            default:
    			# code...
            break;
        }
    }
    public function conclusions(){
        $data['blanks']=Blank::available(auth()->user()->id);

        $data['on_order']=true;
        if($_GET['order']??false)
            $data['on_order']=true;
        $data['conclusions']=Conclusion::where('auditor_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(20);
        return $this->view("list_conclusions", $data);
    }
    public function orders(){
        $data['orders']=Order::where('auditor_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(20);
        return $this->view("list_orders", $data);
    }
    public function pdf(Request $req){

        $data['word']="word";
        $pdf = PDF::loadView('templates.80.ru', $data);
        return $pdf->stream('conclusion.pdf');
    }
    public function view_order(Request $req){
        $data['order']=Order::where(['id'=>$req->id, 'auditor_id'=>auth()->user()->id])->first();
        if($data['order'])
            return $this->view('view_order', $data);
        return abort(404);
    }
    public function create_conc_on_order(Request $req){
        switch ($req->method()) {
            case 'GET':
            if(count(Blank::available(auth()->user()->id))==0){
                $data['message']='You do not have any blanks left!';
                $data['link']=route('auditor.conclusions');
                return $this->view('message', $data);
            }
            $data['blanks']=Blank::available(auth()->user()->id);
            $data['order']=Order::where(['id'=>$req->id, 'auditor_id'=>auth()->user()->id])->first();
            if($data['order'])
                return $this->view('create_conc_on_order', $data);
            return abort(404);
            break;
            case 'POST':
            $req->validate(
                $this->conclusion_validation_rules
            );
            $all=$req->all();
            $conclusion_fields=$req->input('conclusion');
            $conclusion=new Conclusion();
            $conclusion->auditor_id=auth()->user()->id;
            foreach ($conclusion_fields??[] as $key => $value) {
                $conclusion->$key=$value;
            }
            
                //get snapshot of default audit company info
            $default_company=Audit_info::where('active', 1)->first();

            unset($default_company->id);
            unset($default_company->active);

            foreach ($default_company->getAttributes() as $key => $value) {
                $conclusion->$key=$value;
            }
            $conclusion->save();


            $blank=Blank::where('id', $req->input('blank_id'))->first();
            $blank->conclusion_id=$conclusion->id;
            $blank->save();

            $CCI=Cust_comp_info::where('id', $req->id)->first();
            $CCI->conclusion_id=$conclusion->id;
            $CCI->save();

            $contract=new Contract();
            $contract->conclusion_id=$conclusion->id;
            $contract->user_id=$conclusion->cust_info->order->customer_id;
            $contract->save();
            
            return redirect(route('auditor.conclusions')."?order=true");
            break;
            default:
                # code...
            break;
        }
    }
    public function conclusion(Request $req){
        $data['protected']=true;
        if($req->blank_id){
            $blank=Blank::where('id', $req->blank_id)->first();
            if($blank->conclusion_id==$req->id){
                $data['protected']=false;
                $data['blank']=$blank;
            }
        }
        $data['conclusion']=Conclusion::where('id', $req->id)->first();
        if($data['conclusion']){
            $data['img']="img";
            $template=$data['conclusion']->cust_info->template->standart_num;
            $lang=$data['conclusion']->cust_info->lang;
            $data['qrcode']=base64_encode(QrCode::size(100)->generate(route('open_conclusion', ['id' => $data['conclusion']->qr_hash])));
            $pdf = PDF::loadView("templates.$template.$lang", $data);
            return $pdf->stream('conclusion.pdf');
        }
        abort(404);
    }
    public function send(Request $req){
        $conclusion=Conclusion::where('id', $req->id)->first();
        if($conclusion){
            $conclusion->send_to_customer();
            sms($conclusion->cust_info->order->customer->phone, '','auditor_conclusion_customer_send',[
                '{full_name}'=>$conclusion->cust_info->order->customer->full_name,
                '{order_id}'=>$conclusion->cust_info->order->id
            ]);
            return redirect()->route('auditor.conclusions');
        }
        abort(404);
    }
    public function send_with_errors(Request $req){
        $order=Order::where('id',$req->id)->first();
        if(!$order||!in_array($order->status,[3,6] , true))
            return abort(404);
        $order->status="5";
        $order->message=$req->input("message");
        $order->save();
        sms($order->customer->phone,'','auditor_conclusion_customer_send_errors',[
            '{full_name}'=>$order->customer->full_name,
            '{order_id}'=>$order->customer->id,
            '{message}'=>$req->input("message")
        ]);
        $data['message']="Вы успешно отправили заказ клиенту для редактирования.";
        $data['link']=route('auditor.orders');
        return $this->view('message',$data);
    }
    public function confirm(Request $req){
        $order=Order::where('id',$req->id)->first();
        if(!$order||!in_array($order->status,[3,6] , true))
            return abort(404);
        $order->status="4";
        $order->save();
        sms($order->customer->phone,'','auditor_conclusion_customer_send_confirmed',[
            '{full_name}'=>$order->customer->full_name,
            '{order_id}'=>$order->id
        ]);
        $data['message']="Вы успешно подтвердили действительность документов и реквизитов заказа.";
        $data['link']=route('auditor.orders');
        return $this->view('message',$data);
    }

    public function assign_blank(Request $req){
        date_default_timezone_set("Asia/Tashkent");
        $blank=Blank::where('id', $req->input('blank_id'))->first();
        $blank->conclusion_id=$req->input('conclusion_id');
        $blank->assigned_date=date('Y-m-d H:i:s');
        $blank->save();
        return redirect()->route('auditor.conclusions');
    }
    public function breaking(Request $req){
        switch ($req->method()) {
            case 'GET':
            $data['blanks']=Blank::where([
                'user_id'=>auth()->user()->id,
                'is_brak'=>false
            ])->where('conclusion_id','!=','null')->get();
            return $this->view('blanks', $data);
            break;
            case 'POST':
            $blank=Blank::where('id', $req->input('blank_id'))->first();
            $reason=$req->file('reason')->store('breaking');
            $blank->brak_upload=$reason;
            $blank->is_brak=true;
            $blank->save();
            return redirect()->route('auditor.breaking');
            break;
            default:
            abort(401);
            break;
        }
        
    }
    public function break_all(Request $req){
        $conclusion=Conclusion::where('id', $req->input('break_conclusion_id'))->first();
        foreach ($conclusion->blanks as $key => $blank) {
         $reason=$req->file('reason')->store('breaking');
         $blank->brak_upload=$reason;
         $blank->is_brak=true;
         $blank->save();
     }
     return redirect()->route('auditor.conclusions');
 }
 public function edit_conclusion(Request $req){
    switch ($req->method()) {
        case 'GET':
            $data['conclusion']=Conclusion::where('id', $req->id)->first();
            return $this->view('edit_conclusion', $data);
        break;
        case 'POST':
            print('post');
        break;
        default:
           return abort(401);
        break;
    }
    
}
}
