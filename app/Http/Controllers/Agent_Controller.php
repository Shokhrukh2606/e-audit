<?php

namespace App\Http\Controllers;

use App\Models\Ciucm;
use App\Models\Conclusion;
use App\Models\Cust_comp_info;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Template;
use App\Models\Use_Case;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Agent_Controller extends Controller
{
    function __construct()
    {
        $this->middleware('multi_auth:agent');
    }
    private function view($file, $data = [])
    {
        $data['title']='«HIMOYA-AUDIT» МЧЖ';
        $data['body']='Agent.'.$file;
        return view('agent_index', $data);
    }
    public function list_conclusions()
    {
        $data['conclusions'] = Auth::user()->agent_conclusions;
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
                $all = $req->all();
                $conclusion_fields = $req->input('conclusion');
                $cust_info_fields = $req->input('cust_info');
                $custom_fields_files = $req->file('custom');
                $custom_fields = $req->input('custom');
                // customer_info-use_case mappings
                $ciucm_fields = $req->input('ciucm');
                $conclusion = new Conclusion();
                $conclusion->agent_id = auth()->user()->id;
                foreach ($conclusion_fields ?? [] as $key => $value) {
                    $conclusion->$key = $value;
                }
                $conclusion->save();
                $CCI = new Cust_comp_info();
                $CCI->conclusion_id = $conclusion->id;
                foreach ($cust_info_fields ?? [] as $key => $value) {
                    $CCI->$key = $value;
                }

                foreach ($custom_fields_files ?? [] as $key => $value) {
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $custom_fields[$key] = $value
                        ->storeAs("cust_info/$conclusion->id", time() . $value->getClientOriginalName());
                }

                $CCI->custom_fields = json_encode($custom_fields);
                $CCI->save();
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
    public function create_invoice(Request $req){
        $conclusion=Conclusion::where('id', $req->conclusion_id)->first();
        if($conclusion??false){
            if($conclusion->invoice)
                return redirect()->route('agent.pay', $conclusion->id);
            $service=$conclusion->cust_info->template->service;
            $invoice=new Invoice();
            $invoice->conclusion_id=$conclusion->id;
            $invoice->price=$conclusion->cust_info->template->service->id;
            $invoice->user_id=auth()->user()->id;
            $invoice->service_id=$service->id;
            $invoice->save();
            return redirect()->route('agent.pay', $invoice->id);
        }else{
           abort(404);
        }
    }
    public function pay(Request $req){
        $data['invoice']=Invoice::where('conclusion_id', $req->invoice_id)->first();
        if($data['invoice'])
            return $this->view('pay_for_order',$data);
        return abort(404);
    }
    public function view_conclusion_protected()
    {
        return $this->view('view_conclusion_protected');
    }
    public function view_conclusion_open(Request $req)
    {
        $data['conclusion'] = Conclusion::where('id', $req->id)->first();
        if ($data['conclusion']) {
            $template = $data['conclusion']->cust_info->template->standart_num;
            $lang = $data['conclusion']->cust_info->lang;
            $data['qrcode']=base64_encode(QrCode::size(100)->generate(route('open_conclusion', ['id' => $data['conclusion']->qr_hash])));
            $pdf = PDF::loadView("templates.$template.$lang", $data);
            return $pdf->stream('invoice.pdf');
        }
        abort(404);
    }
    public function cashback_log()
    {
        return $this->view('cashback_log');
    }
    public function transactions_log()
    {
        return $this->view('transactions_log');
    }
    public function payment_log()
    {
        return $this->view('payment_log');
    }
}
