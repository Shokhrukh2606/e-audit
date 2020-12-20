<?php

namespace App\Http\Controllers;

use App\Models\Audit_info;
use App\Models\Ciucm;
use App\Models\Conclusion;
use App\Models\Cust_comp_info;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Template;
use App\Models\Blank;
use App\Models\Use_Case;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Agent_Controller extends Controller
{
    private $conclusion_validation_rules = [
        'conclusion.A1' => 'numeric',
        'conclusion.A2' => 'numeric',
        'conclusion.P2' => 'numeric',
        'conclusion.DO' => 'numeric',
        'conclusion.P1' => 'numeric',
        'conclusion.DEK2' => 'numeric',
        'conclusion.PUDN' => 'numeric',
        'conclusion.P' => 'numeric'
    ];
    function __construct()
    {
        $this->middleware('multi_auth:agent');
    }
    private function view($file, $data = [])
    {
        $data['title'] = 'e-audit';
        $data['body'] = 'Agent.' . $file;
        return view('agent_index', $data);
    }
    public function list_conclusions(Request $req)
    {
        if($status_order=$req->input('status')){
            $data['conclusions'] = Auth::user()->agent_conclusions()->where(['status'=>$status_order])->orderBy('id', 'DESC')->paginate(20);
        }else{
            $data['conclusions'] = Auth::user()->agent_conclusions()->where(['status'=>'1'])->orderBy('id', 'DESC')->paginate(20);
        }
        $data['blanks'] = Blank::available(auth()->user()->id);
        return $this->view('list_conclusions', $data);
    }
    public function select_temp()
    {
        $data['templates'] = Template::all();
        $data['use_cases'] = Use_Case::all();
        return $this->view('select_template', $data);
    }
    public function create_conclusion(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['template_id'] = $_GET['template_id'] ?? false;
                $data['use_cases'] = $_GET['use_cases'] ?? false;
                if ($data["template_id"] && $data["use_cases"])
                    return $this->view('create_conclusion', $data);
                return $this->select_temp();
                break;
            case 'POST':
                $req->validate(
                    $this->conclusion_validation_rules
                );
                $all = $req->all();
                $conclusion_fields = $req->input('conclusion');
                $cust_info_fields = $req->input('cust_info');
                $custom_fields_files = $req->file('custom');
                $cust_info_fields_files = $req->file('cust_info');

                $custom_fields = $req->input('custom');

                // customer_info-use_case mappings
                $ciucm_fields = $req->input('ciucm');
                $conclusion = new Conclusion();
                $conclusion->agent_id = auth()->user()->id;

                foreach ($conclusion_fields ?? [] as $key => $value) {
                    $conclusion->$key = $value;
                }
               
                if($conclusion->is_coefficent=='no_coef'){
                    $conclusion->status='2';
                }else{
                    $conclusion->status='3';
                }
                //get snapshot of default audit company info
                $default_company = Audit_info::where('active', 1)->first();

                unset($default_company->id);
                unset($default_company->active);

                foreach ($default_company->getAttributes() as $key => $value) {
                    $conclusion->$key = $value;
                }


                $conclusion->save();


                $CCI = new Cust_comp_info();
                $CCI->conclusion_id = $conclusion->id;
                foreach ($cust_info_fields ?? [] as $key => $value) {
                    $CCI->$key = $value;
                }

                foreach ($cust_info_fields_files ?? [] as $key => $value) {

                    $CCI->$key = $value
                        ->storeAs("cust_info/$CCI->id", time() . 'cci' . $key . $value->getClientOriginalName());
                }

                foreach ($custom_fields_files ?? [] as $key => $value) {
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $custom_fields[$key] = $value
                        ->storeAs("cust_info/$conclusion->id", time() . $value->getClientOriginalName());
                }

                $CCI->custom_fields = json_encode($custom_fields);
                $CCI->save();

                $contract=new Contract();
                $contract->conclusion_id=$conclusion->id;
                $contract->user_id=auth()->user()->id;
                $contract->save();

                foreach ($ciucm_fields as $key => $value) {
                    $cuicm = new Ciucm();
                    $cuicm->cust_info_id = $CCI->id;
                    $cuicm->use_case_id = $value;
                    $cuicm->save();
                }
                return redirect()->route('agent.list_conclusions');
                break;
            default:
                # code...
                break;
        }
    }
    public function change_status(Request $req)
    {
        $data['conclusion'] = Conclusion::where('id', $req->id)->first();
        if ($data['conclusion']) {
            switch ($req->status) {
                case 'send':
                    $data['conclusion']->status = 2;
                    $data['conclusion']->save();
                    sms($data['conclusion']->agent->phone, '', 'agent_new_conclusion_send', [
                        '{full_name}' => $data['conclusion']->agent->full_name,
                        '{conclusion_id}' => $data['conclusion']->id
                    ]);
                    return redirect()->back();
                    break;
                default:
                    abort(404);
            }
        }
        abort(404);
    }
    public function create_invoice(Request $req)
    {
        $conclusion = Conclusion::where('id', $req->conclusion_id)->first();
        if ($conclusion ?? false) {
            if ($conclusion->invoice)
                return redirect()->route('agent.pay', $conclusion->id);
            $service = $conclusion->cust_info->template->service;
            $invoice = new Invoice();
            $invoice->conclusion_id = $conclusion->id;
            $invoice->price = $conclusion->cust_info->template->findServicePrice();
            $invoice->user_id = auth()->user()->id;
            $invoice->service_id = $service->id;
            $invoice->save();
            return redirect()->route('agent.pay', $conclusion->id);
        } else {
            abort(404);
        }
    }
    public function pay(Request $req)
    {
        $data['invoice'] = Invoice::where('conclusion_id', $req->invoice_id)->first();
        if ($data['invoice'])
            return $this->view('pay_for_order', $data);
        return abort(404);
    }
    public function download_invoice(Request $req)
    {
        $data['invoice'] = Invoice::where('conclusion_id', $req->conclusion_id)->first();

        if ($data['invoice'])
            $pdf = PDF::loadView("Agent.pay_for_order_download", $data);
            
            return $pdf->download('invoice.pdf');
        return abort(404);
    }

    public function view_conclusion_protected()
    {
       $data['conclusion'] = Conclusion::where('id', $req->id)->first();
        $data['protected'] = false;
        if ($data['conclusion']->invoice&&$data['conclusion']->invoice->status == 'confirmed') {
            $data['protected'] = true;
        }
        if ($data['conclusion']) {
            $template = $data['conclusion']->cust_info->template->standart_num;
            $lang = $data['conclusion']->cust_info->lang;
            $data['qrcode'] = base64_encode(QrCode::size(100)->generate(route('open_conclusion', ['id' => $data['conclusion']->qr_hash])));

            if($data['conclusion']->is_coefficent=='no_coef'){
                $pdf = PDF::loadView("templates.$template.$lang", $data);
            }else{
                $pdf = PDF::loadView("templates.$template.$lang"."_percent", $data);
            }
            return $pdf->stream('invoice.pdf');
        }
        abort(404);
    }
    public function view_conclusion_open(Request $req)
    {

        $data['conclusion'] = Conclusion::where('id', $req->id)->first();
        
        $data['protected'] = true;
        if ($data['conclusion']->invoice&&($data['conclusion']->invoice->status == 'confirmed'||$data['conclusion']->invoice->closed_with=='bill')) {
            if($req->blank_id??false){
                $data['blank']=Blank::where('id',$req->blank_id)->first();
                $data['protected'] = false;
            }
        }
        if ($data['conclusion']) {
            $template = $data['conclusion']->cust_info->template->standart_num;
            $lang = $data['conclusion']->cust_info->lang;
            $data['qrcode'] = base64_encode(QrCode::size(70)->generate(route('open_conclusion', ['id' => $data['conclusion']->qr_hash])));
            
            if($data['conclusion']->is_coefficent=='no_coef'){
                $pdf = PDF::loadView("templates.$template.$lang", $data);
            }else{
                $pdf = PDF::loadView("templates.$template.$lang"."_percent", $data);
            }
            return $pdf->stream('invoice.pdf');
        }

        abort(404);
    }
    public function view_conclusion(Request $req)
    {
        $data['conclusion'] = Conclusion::where(['id' => $req->id, 'agent_id' => auth()->user()->id])->first();
        if ($data['conclusion'])
            return $this->view('view_conclusion', $data);
        return abort(404);
    }
    public function edit_conclusion(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['conclusion'] = Conclusion::where(['id' => $req->id])->first();
                if ($data['conclusion'])
                    return $this->view('edit_conclusion', $data);
                return abort(404);
                break;
            case 'POST':

                $all = $req->all();
                $conclusion_fields = $req->input('conclusion');
                $cust_info_fields = $req->input('cust_info');
                $custom_fields_files = $req->file('custom');
                $custom_fields = $req->input('custom');
                $cust_info_fields_files = $req->file('cust_info');


                $conclusion = Conclusion::where(['id' => $req->id])->first();
                if (!$conclusion)
                    abort(404);
                $CCI = $conclusion->cust_info;

                


                foreach ($conclusion_fields ?? [] as $key => $value) {
                    $conclusion->$key = $value;
                }
               
                $conclusion->save();


                foreach ($cust_info_fields ?? [] as $key => $value) {
                    $CCI->$key = $value;
                }


                $original_custom = json_decode($CCI->custom_fields, true);

                foreach ($custom_fields_files ?? [] as $key => $value) {
                    Storage::delete($original_custom[$key] ?? null);
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $original_custom[$key] = $value
                        ->storeAs("cust_info/$conclusion->id", time() . $value->getClientOriginalName());
                }

                foreach ($custom_fields ?? [] as $key => $value) {
                    $original_custom[$key] = $value;
                }

                $CCI->custom_fields = json_encode($original_custom);

                foreach ($cust_info_fields_files ?? [] as $key => $value) {
                    Storage::delete($CCI[$key] ?? null);
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $$CCI->$key = $value
                        ->storeAs("cust_info/$CCI->id", time() . 'cci' . $key . $value->getClientOriginalName());

                }
                
                $CCI->save();
                return redirect(
                    route('agent.list_conclusions')."?status=4"
                );
                break;
            default:
                # code...
                break;
        }
    }
    public function cashback_log()
    {
        return $this->view('cashback_log');
    }
    public function transactions_log()
    {
        $data['transactions'] = Invoice::where(['user_id' => auth()->user()->id, 'status' => 'confirmed'])->orderBy('id', 'DESC')->paginate(20);
        if ($data['transactions'])
            return $this->view('transactions_log', $data);
        return abort(404);
    }
    public function payment_log()
    {
        return $this->view('payment_log');
    }
    public function assign_blank(Request $req)
    {
        date_default_timezone_set("Asia/Tashkent");
        $blank = Blank::where('id', $req->input('blank_id'))->first();
        $blank->conclusion_id = $req->input('conclusion_id');
        $blank->assigned_date = date('Y-m-d H:i:s');
        $blank->save();
        return redirect()->route('agent.list_conclusions');
    }
    public function break_all(Request $req)
    {
        $conclusion = Conclusion::where('id', $req->input('break_conclusion_id'))->first();
        foreach ($conclusion->blanks as $key => $blank) {
            $reason = $req->file('reason')->store('breaking');
            $blank->brak_upload = $reason;
            $blank->is_brak = true;
            $blank->save();
        }
        return redirect()->route('agent.list_conclusions');
    }
    public function resend(Request $req){
        $conclusion=Conclusion::where('id', $req->id)->first();
        $conclusion->status=2;
        $conclusion->save();
        return redirect()->back();
    }
    public function pay_with_bill(Request $req){
        $invoice=Invoice::where('id', $req->input('invoice_id'))->first();
        $invoice->closed_with='bill';
        $invoice->save();
        return redirect(route('agent.list_conclusions')."?status=3");
    }
    public function pay_with_deposit(Request $req){
        $invoice=Invoice::where('id', $req->input('invoice_id'))->first();
        
        $agent=auth()->user();
        $agent->remove_funds($invoice->price);

        $transaction=new Transaction();
        $transaction->user_id=auth()->user()->id;
        $transaction->payment_system='funds';
        $transaction->amount=$invoice->price;
        $transaction->invoice_id=$invoice->id;
        $transaction->system_transaction_id=$invoice->id;
        $transaction->save();

        $invoice->status='confirmed';
        $invoice->save();
        return redirect(route('agent.list_conclusions')."?status=3");
    }
    public function bills(){
        $data['bills']=Invoice::where([
            'user_id'=>auth()->user()->id,
            'closed_with'=>'bill'
        ])->get();
        return $this->view('bills', $data);
    }
    public function contracts(){
        $data['contracts']=Contract::where('user_id', auth()->user()->id)->get();
        return $this->view('contracts', $data);
    }
    public function contracts_view(Request $req){
        $data['contract']=Contract::where(['id'=>$req->id])->first();
        if (!$data['contract'])
            return  abort(404);
        if($data['contract']->conclusion->cust_info->contract_type=='yur'){
            return $this->view('juridic_contracts_view', $data);
        }
        if($data['contract']->conclusion->cust_info->contract_type=='fiz'){
            return $this->view('contracts_view', $data);
        }
    }
}
