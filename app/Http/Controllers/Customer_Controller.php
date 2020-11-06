<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Use_Case;
use App\Models\Order;
use App\Models\Cust_comp_info;
use App\Models\Ciucm;
use App\Models\Conclusion;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use PDF;


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
    public function edit_order(Request $req){
        switch ($req->method()) {
            case 'GET':
                $data['order']=Order::where(['id'=>$req->id, 'customer_id'=>auth()->user()->id])->first();
                if($data['order'])
                    return $this->view('edit_order', $data);
                return abort(404);
                break;
            case 'POST':
                $all=$req->all();
                $order_fields=$req->input('order');
                $cust_info_fields=$req->input('cust_info');
                $custom_fields_files=$req->file('custom');
                $custom_fields=$req->input('custom');

                // customer_info-use_case mappings
                
                $order=Order::where(['id'=>$req->id, 'customer_id'=>auth()->user()->id])->first();
                
                if(!$order)
                    abort(404);

                foreach ($order_fields??[] as $key => $value) {
                    $order->$key=$value;
                }

                $order->save();

                $CCI=$order->cust_info;
                foreach ($cust_info_fields??[] as $key => $value) {
                    $CCI->$key=$value;
                }
                $original_custom=json_decode($CCI->custom_fields, true);
                foreach ($custom_fields_files??[] as $key => $value) {
                    Storage::delete($original_custom[$key]??null);
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                   $original_custom[$key]=$value
                   ->storeAs("orders/$order->id", time().$value->getClientOriginalName());
                }
                foreach ($custom_fields??[] as $key => $value) {
                   $original_custom[$key]=$value;
                }

                $CCI->custom_fields=json_encode($original_custom);
               
                $CCI->save();
                return redirect()->route('customer.orders');
                break;
            default:
                # code...
                break;
        }
    }
    public function send(Request $req){
        $order=Order::where(['id'=>$req->id, 'customer_id'=>auth()->user()->id])->first();
        if($order){
            $order->status="open";
            $order->save();
            return redirect()->route('customer.order_view', $order->id);
        }
        return abort(404);
    }
    public function cancel_order(Request $req){
        $order=Order::where(['id'=>$req->id, 'customer_id'=>auth()->user()->id])->first();
        if($order){
            $order->fulldelete();
            return redirect()->route('customer.orders');
        }
        return abort(404);
    }
    public function conclusion(Request $req){
        $data['conclusion']=Conclusion::where('id', $req->id)->first();
        if($data['conclusion']){
            $template=$data['conclusion']->cust_info->template->standart_num;
            $lang=$data['conclusion']->cust_info->lang;
            $pdf = PDF::loadView("templates.$template.$lang", $data);
            return $pdf->stream('invoice.pdf');
        }
        abort(404);
    }
    public function create_invoice(Request $req){
        $conclusion=Conclusion::where('id', $req->conclusion_id)->first();
        if($conclusion??false){
            if($conclusion->invoice)
                return redirect()->route('customer.orders');
            $service=$conclusion->cust_info->template->service;
            $invoice=new Invoice();
            $invoice->conclusion_id=$conclusion->id;
            $invoice->user_id=auth()->user()->id;
            $invoice->service_id=$service->id;
            $invoice->save();
            return redirect()->route('pay', $invoice->id);
        }else{
           abort(404);
        }
    }
    public function pay(Request $req){
        $data['invoice']=Invoice::where('id', $req->invoice_id)->first();
        if($data['invoice'])
            return $this->view('pay_for_order',$data);
        return abort(404);
    }
}

