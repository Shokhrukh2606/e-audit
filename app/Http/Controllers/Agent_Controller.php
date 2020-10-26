<?php

namespace App\Http\Controllers;

use App\Models\Ciucm;
use App\Models\Cust_comp_info;
use App\Models\Order;
use App\Models\Template;
use App\Models\Use_Case;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Agent_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:agent');
    }
    private function view($file, $data = [])
    {
        return view('Agent.'.$file, $data);
    }
    public function list_conclusions(){
        $data['conclusions']=Auth::user()->agent_conclusions()->paginate(15);   
    	return $this->view('list_conclusions', $data);
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
    			$all=$req->all();
                $order_fields=$req->input('order');
                $cust_info_fields=$req->input('cust_info');
                $custom_fields_files=$req->file('custom');
                $custom_fields=$req->input('custom');
                $ciucm_fields=$req->input('ciucm');
                $order=new Order();
                $order->customer_id=auth()->user()->id;
                foreach ($order_fields as $key => $value) {
                    $order->$key=$value;
                }
                $order->save(); 
                $CCI=new Cust_comp_info();
                $CCI->order_id=$order->id;
                foreach ($cust_info_fields as $key => $value) {
                    $CCI->$key=$value;
                }
                foreach ($custom_fields_files??[] as $key => $value) {
                   $custom_fields[$key]=$value->store("orders/$order->id");
                }
                $CCI->custom_fields=json_encode([$custom_fields, $custom_fields_files]);
                $CCI->save();
                foreach ($ciucm_fields as $key => $value) {
                    $cuicm=new Ciucm();
                    $cuicm->cust_info_id=$CCI->id;
                    $cuicm->use_case_id=$value;
                    $cuicm->save();
                }
                print_r("success");
                break;
            default:
                print("not allowed method");
                break;
        }

    }
    public function pay_for_conclusion()
    {
        return $this->view('pay_for_conclusion');
    }
    public function view_conclusion_protected()
    {
        return $this->view('view_conclusion_protected');
    }
    public function view_conclusion_open()
    {
        return $this->view('view_conclusion_protected');
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
