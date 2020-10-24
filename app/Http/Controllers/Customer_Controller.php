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
    private $customer_id;
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
                // customer_info-use_case mappings
                $ciucm_fields=$req->input('ciucm');
                $order=new Order();
                $order->customer_id=auth()->user()->id;
                foreach ($order_fields??[] as $key => $value) {
                    $order->$key=$value;
                }
                $order->save();
                $CCI=new Cust_comp_info();
                $CCI->order_id=$order->id;
                foreach ($cust_info_fields??[] as $key => $value) {
                    $CCI->$key=$value;
                }
               
                foreach ($custom_fields_files??[] as $key => $value) {
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                   $custom_fields[$key]=$value
                   ->storeAs("orders/$order->id", time().$value->getClientOriginalName());
                }

                $CCI->custom_fields=json_encode($custom_fields);
                $CCI->save();
                foreach ($ciucm_fields as $key => $value) {
                    $cuicm=new Ciucm();
                    $cuicm->cust_info_id=$CCI->id;
                    $cuicm->use_case_id=$value;
                    $cuicm->save();
                }
                return redirect()->route('customer.orders');
    			break;
    		default:
    			# code...
    			break;
    	}
    }
    public function orders(){
        $data['orders']=Order::where('customer_id', auth()->user()->id)->get();
        return $this->view("list_orders", $data);
    }
    public function order_view(Request $req){
        $data['order']=Order::where(['id'=>$req->id, 'customer_id'=>auth()->user()->id])->first();
        if($data['order'])
            return $this->view('view_order', $data);
        return abort(404);
    }
}

