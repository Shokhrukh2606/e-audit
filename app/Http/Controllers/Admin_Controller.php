<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Conclusion;
use App\Models\Payment;

class Admin_Controller extends Controller
{
    function __construct()
    {
    	$this->middleware('multi_auth:admin');
    }
    private function view($file, $data = [])
    {
        return view('Admin.'.$file, $data);
    }
    public function list_orders(){
    	$data['orders']=Order::where('status','!=','initiated')->get();
    	return $this->view('list_orders', $data);
    }
    public function order(Request $req){
        $data['auditors']=User::where('group_id', 2)->get();
        $data['order']=Order::where('id',$req->id)->first();
        if($data['order'])
            return $this->view('view_order', $data);
        return abort(404);
    }
    public function assign_order(Request $req){
        $order=Order::where('id',$req->id)->first();
        if(!$order)
            abort(404);
        $order->auditor_id=$req->input('auditor_id');
        $order->status='checking';
        $order->save();
        return redirect()->route('admin.list_orders');
    }
    public function conclusions(Request $req){
        $data['conclusions']=Conclusion::all();
        return $this->view('list_conclusions', $data);
    }
    public function add_funds(Request $req){
        switch ($req->method()) {
            case 'GET':
                $data['users']=User::where('group_id','!=','1')->get();
                return $this->view('add_funds', $data);
                break;
            case 'POST':
                $fields=$req->all();
                unset($fields['_token']);
                $payment=new Payment;
                foreach ($fields as $name => $value) {
                    $payment->$name=$value;
                }
                $payment->save();
                $user=User::where('id', $req->input('user_id'))->first();
                $user->add_funds($req->input('amount'));
                $user->save();
                return 0;
                break;
            default:
                # code...
                break;
        }
    }
}
