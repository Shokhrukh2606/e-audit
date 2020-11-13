<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Conclusion;
use App\Models\Payment;
use App\Models\User_group;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;

class Admin_Controller extends Controller
{
    function __construct()
    {
        $this->middleware('multi_auth:admin');
    }
    private function view($file, $data = [])
    {
        $data['title']='«HIMOYA-AUDIT» МЧЖ';
        $data['body']='Admin.'.$file;
        return view('admin_index', $data);
    }
    public function list_orders()
    {
        $data['orders'] = Order::where('status', '!=', 'initiated')->get();
        return $this->view('list_orders', $data);
    }
    public function order(Request $req)
    {
        $data['auditors'] = User::where('group_id', 2)->get();
        $data['order'] = Order::where('id', $req->id)->first();
        if ($data['order'])
            return $this->view('view_order', $data);
        return abort(404);
    }
    public function assign_order(Request $req)
    {
        $order = Order::where('id', $req->id)->first();
        if (!$order)
            abort(404);
        $order->auditor_id = $req->input('auditor_id');
        $order->status = 'checking';
        $order->save();
        return redirect()->route('admin.list_orders');
    }
    public function conclusions(Request $req)
    {
        $data['conclusions'] = Conclusion::all();
        return $this->view('list_conclusions', $data);
    }
    public function add_funds(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['users'] = User::where('group_id', '!=', '1')->get();
                return $this->view('add_funds', $data);
                break;
            case 'POST':
                $fields = $req->all();
                unset($fields['_token']);
                $payment = new Payment;
                foreach ($fields as $name => $value) {
                    $payment->$name = $value;
                }
                $payment->save();
                $user = User::where('id', $req->input('user_id'))->first();
                $user->add_funds($req->input('amount'));
                $user->save();
                return redirect()->back()->with("success", "Successfully added");
                break;
            default:
                # code...
                break;
        }
    }
    public function list_users(Request $request)
    {

        $query = QueryBuilder::for(User::class)
            ->allowedFilters(['inn', 'group_id', 'phone', 'name', 'full_name']);
        // if ($came = $request->input("filter.name")) {
        //     $query->where('full_name', 'like', "%${came}");
        // }
        $data['users'] = $query->get();
        $data['groups'] = User_group::all();
        return $this->view('list_users', $data);
    }
    public function create_user(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['groups'] = User_group::whereIn('id', [1, 2])->get();
                return $this->view('create_user', $data);
                break;
            case 'POST':
                $fields = $req->input("user");
                unset($fields['_token']);
                $user = new User;
                foreach ($fields as $name => $value) {
                    $user->$name = $value;
                }
                $user->password = Hash::make($req->input('user.password'));
                $user->save();
                return redirect()->route('admin.list_users')->with("success", "Successfully added");
                break;
            default:
                # code...
                break;
        }
    }
    public function view_user(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['user'] = User::where(['id' => $req->id])->first();
                $data['groups'] = User_group::whereIn('id', [1, 2])->get();
                if ($data['user'])
                    return $this->view('view_user', $data);
                return abort(404);
                break;
            case 'POST':
                $fields = $req->input("user");
                $user = User::where(['id'=>$req->id])->first();
                unset($fields['password']);
                // foreach ($fields as $name => $value) {
                //     $user->$name = $value;
                // }
                $user->update($fields);
                // $user->save();
                return redirect()->route('admin.list_users')->with("success", "Successfully updated");
                break;
            default:
                # code...
                break;
        }
    }
}
