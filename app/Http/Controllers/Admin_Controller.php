<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Conclusion;
use App\Models\Cust_comp_info;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Template;
use App\Models\User_group;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Admin_Controller extends Controller
{
    private $states = [
        'draft' => [1],
        'sent' => [2, 3, 4, 5, 6],
        'finished' => [7]
    ];
    private $reverted_states = [
        '1' => 'draft',
        '2' => 'sent_to_admin',
        '3' => 'in_auditor',
        '4' => 'docs_confirmed',
        '5' => 'error_found_in_document',
        '6' => 'resent_to_auditor',
        '7' => 'finished'
    ];
    function __construct()
    {
        $this->middleware('multi_auth:admin');
    }
    private function view($file, $data = [])
    {
        $data['title'] = 'e-audit admin';
        $data['body'] = 'Admin.' . $file;
        return view('admin_index', $data);
    }
    public function list_orders()
    {
        $data['states'] = $this->reverted_states;
        $data['orders'] = Order::where('status', '!=', '1')->paginate(20);
        return $this->view('list_orders', $data);
    }
    public function change_status(Request $req)
    {
        $data['conclusion'] = Conclusion::where('id', $req->id)->first();
        if ($data['conclusion']) {
            switch ($req->status) {
                case 'finished':
                    $data['conclusion']->status = 3;
                    $data['conclusion']->save();
                    return redirect()->back();
                    break;
                case 'rejected':
                    $data['conclusion']->status = 4;
                    $data['conclusion']->save();
                    return redirect()->back();
                    break;
                default:
                    abort(404);
            }
        }
        abort(404);
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
        $order->status = '3';
        $order->save();
        return redirect()->route('admin.list_orders');
    }
    public function conclusions(Request $req)
    {
        $filtered = ['template_id', 'auditor_id', 'agent_id', 'customer_id', 'audit_comp_name', 'audit_comp_inn'];
        $query = DB::table('conclusions')
            ->join('cust_comp_info', 'cust_comp_info.conclusion_id', '=', 'conclusions.id')->join('templates', 'templates.id', '=', 'cust_comp_info.template_id');
        if ($req->input('filter')) {
            foreach ($req->input('filter') as $key => $value) {
                if (in_array($key, $filtered) && ($value != '')) {
                    $query->where($key, $value);
                }
            }
        }
        $data['conclusions'] = $query->paginate(20);
        $data['auditors'] = User::where(['group_id' => 2])->get();
        $data['agents'] = User::where(['group_id' => 3])->get();
        $data['customers'] = User::where(['group_id' => 4])->get();
        $data['templates'] = Template::all();
        $data['states']=Conclusion::STATES;
        return $this->view('list_conclusions', $data);
    }
    public function user_conclusions(Request $req)
    {
        $filtered = ['template_id', 'cust_comp_inn', 'status'];
        $query = DB::table('conclusions')
            ->join('cust_comp_info', 'cust_comp_info.conclusion_id', '=', 'conclusions.id')->join('templates', 'templates.id', '=', 'cust_comp_info.template_id');
        switch ($req->type) {
            case 'agent':
                $query->where(['agent_id' => $req->id]);
                break;
            case 'auditor':
                $query->where(['auditor_id' => $req->id]);
                break;
            case 'customer':
                $query->where(['customer_id' => $req->id]);
                break;
            default:
                return redirect()->back()->with('message', 'Bu foydalanuvhida hech qanday xulosa yozilmagan!');
        }
        if ($req->input('filter')) {
            foreach ($req->input('filter') as $key => $value) {
                if (in_array($key, $filtered) && ($value != '')) {
                    $query->where($key, $value);
                }
            }
        }
        $data['states']=Conclusion::STATES;
        $data['conclusions'] = $query->paginate(20);
        $data['templates'] = Template::all();
        return $this->view('user_conclusions', $data);
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
            ->allowedFilters(['inn', 'group_id', 'phone', 'name', 'full_name', 'status', 'region', 'district']);
        // if ($came = $request->input("filter.name")) {
        //     $query->where('full_name', 'like', "%${came}");
        // }
        $data['users'] = $query->paginate(20);
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
                $data['groups'] = User_group::all();
                if ($data['user'])
                    return $this->view('view_user', $data);
                return abort(404);
                break;
            case 'POST':
                $fields = $req->input("user");
                $user = User::where(['id' => $req->id])->first();
                if ($fields['status'] != $user->status && $user->status == 'inactive') {
                    sms($user->phone, 'Сизни аккаунтингиз фаоллаштирилди!');
                }
                if ($fields['password'] != '') {
                    $fields['password'] = Hash::make($fields['password']);
                } else {
                    unset($fields['password']);
                }
                foreach ($fields as $name => $value) {
                    $user->$name = $value;
                }
                $user->save();
                // $user->save();
                return redirect()->route('admin.list_users')->with("success", "Successfully updated");
                break;
            default:
                # code...
                break;
        }
    }
    public function conclusion(Request $req)
    {
        $data['conclusion'] = Conclusion::where('id', $req->id)->first();
        if ($data['conclusion']) {
            $template = $data['conclusion']->cust_info->template->standart_num;
            $lang = $data['conclusion']->cust_info->lang;
            $data['qrcode'] = base64_encode(QrCode::size(100)->generate(route('open_conclusion', ['id' => $data['conclusion']->qr_hash])));
            $pdf = PDF::loadView("templates.$template.$lang", $data);
            return $pdf->stream('invoice.pdf');
        }
        abort(404);
    }
    public function view_conclusion(Request $req)
    {
        $data['conclusion']=Conclusion::where(['id'=>$req->id])->first();
        if($data['conclusion'])
            return $this->view('view_conclusion', $data);
        return abort(404);
    }
    public function transactions_log(){
        $data['transactions']=Invoice::where(['status'=>'confirmed'])->paginate(20);
        if($data['transactions'])
            return $this->view('transactions_log',$data);
        return abort(404);
    }
}
