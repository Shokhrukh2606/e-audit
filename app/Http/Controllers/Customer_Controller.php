<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Use_Case;
use App\Models\Order;
use App\Models\Cust_comp_info;
use App\Models\Ciucm;



class Customer_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:customer');
    }
    private function view($file, $data=[]){
    	return view('Customer.'.$file, $data);
    } 
   	public function select_temp(){
   		$data['templates']=Template::all();
   		$data['use_cases']=Use_Case::all();
   		return $this->view('select_template', $data);
   	}
    public function create_order(Request $req){
    	switch ($req->method()) {
    		case 'GET':
    			$data['template_id']=$_GET['template_id']??false;
    			$data['use_cases']=$_GET['use_cases']??false;
    			if($data["template_id"]&&$data["use_cases"])
    				return $this->view('create_order', $data);
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
    			# code...
    			break;
    	}
    }
}

