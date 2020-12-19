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
use App\Models\Blank;
use App\Models\Service;
use App\Models\Audit_info;
use App\Models\Certificate;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\QueryBuilder;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\View;

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
        '7' => 'finished',
        '8'=>'rejected'
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
        $data['orders'] = Order::where('status', '!=', '1')->orderBy('id', 'DESC')->paginate(20);
        return $this->view('list_orders', $data);
    }
    public function change_status(Request $req)
    {
        $data['conclusion'] = Conclusion::where('id', $req->id)->first();
        if ($data['conclusion']) {
            switch ($req->status) {
                case 'finished':
                    // sms($data['conclusion']->agent->phone, '','agent_conclusion_success',[
                    //     '{full_name}'=>$data['conclusion']->agent->full_name,
                    //     '{conclusion_id}'=>$data['conclusion']->id
                    // ]);
                    if($data['conclusion']->cust_info->order){
                        $data['conclusion']->send_to_customer();
                    }
                    $data['conclusion']->status = 3;
                    $data['conclusion']->save();
                    return redirect()->back();
                    break;
                case 'rejected':
                    // sms($data['conclusion']->agent->phone, '','agent_conclusion_rejected',[
                    //     '{full_name}'=>$data['conclusion']->agent->full_name,
                    //     '{conclusion_id}'=>$data['conclusion']->id
                    // ]);
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
        $data['auditors'] = User::where('group_id', 2)->orderBy('id', 'DESC')->get();
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
        $auditor=User::where(['id'=>$req->input('auditor_id')])->first();
        sms($auditor->full_name, '','auditor_order_assigned',[
            '{full_name}'=>$auditor->full_name,
            '{order_id}'=>$order->id
        ]);
        return redirect()->route('admin.list_orders');
    }
    public function conclusions(Request $req)
    {
        $filtered = ['template_id', 'auditor_id', 'agent_id', 'customer_id', 'audit_comp_name', 'audit_comp_inn'];
        $query = DB::table('conclusions')
            ->join('cust_comp_info', 'cust_comp_info.conclusion_id', '=', 'conclusions.id')->join('templates', 'templates.id', '=', 'cust_comp_info.template_id')->orderBy('conclusion_id', 'DESC');
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
        $data['states'] = Conclusion::STATES;
        return $this->view('list_conclusions', $data);
    }
    public function user_conclusions(Request $req)
    {
        $filtered = ['template_id', 'cust_comp_inn', 'status'];
        $query = DB::table('conclusions')
            ->join('cust_comp_info', 'cust_comp_info.conclusion_id', '=', 'conclusions.id')->join('templates', 'templates.id', '=', 'cust_comp_info.template_id')->orderBy('conclusion_id', 'DESC');
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
        $data['states'] = Conclusion::STATES;
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
                $transaction=new Transaction;
                $transaction->user_id=$req->input('user_id');
                $transaction->payment_system='funds';
                $transaction->system_transaction_id='~';
                $transaction->state='confirmed';
                $transaction->amount=$req->input('amount');
                $transaction->save();
                $user = User::where('id', $req->input('user_id'))->first();
                $user->add_funds($req->input('amount'));
                $user->save();
                sms($user->full_name, '','user_payment',[
                    '{full_name}'=>$user->full_name,
                    '{sum}'=>$req->input('amount')
                ]);   
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
        $data['users'] = $query->orderBy('id', 'DESC')->paginate(20);
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
                    sms($user->phone, '','user_status_activated',[
                        '{full_name}'=>$user->full_name
                    ]);
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
        $data['conclusion'] = Conclusion::where(['id' => $req->id])->first();
        if ($data['conclusion'])
            return $this->view('view_conclusion', $data);
        return abort(404);
    }
    public function create_blanks(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                return $this->view('create_blanks');
                break;
            case 'POST':
                for ($i = 0; $i < $req->input('quantity'); $i++)
                    Blank::start();
                $data['message'] = 'You have successfully created ' . $i . " blanks";
                $data['link'] = route('admin.create_blanks');
                return $this->view('message', $data);
                break;
            default:
                abort(401);
                break;
        }
    }
    public function assign_blanks(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['users'] = User::whereIn('group_id', ['2', '3'])->get();
                $data['blanks'] = Blank::where('user_id', null)->get();
                return $this->view('assign_blanks', $data);
                break;
            case 'POST':
                if ($req->has('blank')) {
                    foreach ($req->input('blank') as $index => $id) {
                        Blank::assign($id, $req->input('user_id'));
                    }
                }
                $user = User::where(['id'=>$req->input('user_id')])->first();
                sms($user->phone, '','user_blanks_assigned',[
                    '{full_name}'=>$user->full_name,
                    '{count}'=>count($req->input('blank'))
                ]);
                $data['message'] = 'You have assigned blanks';
                $data['link'] = route('admin.assign_blanks');
                return $this->view('message', $data);
                break;
            default:
                abort(401);
                break;
        }
    }
    /**
     * [create_a_c_i description]
     * @param  Request $req [description]
     * @return View view
     */
    public function create_a_c_i(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                return $this->view('aci.create');
                break;
            case 'POST':
                $fields = $req->all();
                unset($fields['_token']);
                $audit_info = new Audit_info();
                foreach ($fields as $name => $value) {
                    $audit_info->$name = $value;
                }
                $audit_info->save();
                return redirect()->route('admin.list_a_c_i');
                break;
            default:
                # code...
                break;
        }
    }
    public function list_a_c_i()
    {
        $data['audit_infos'] = Audit_info::all();
        return $this->view('aci.list', $data);
    }
    public function delete_a_c_i(Request $req)
    {
        Audit_info::where('id', $req->id)->first()->delete();
        return redirect()->route('admin.list_a_c_i');
    }
    public function default_a_c_i(Request $req)
    {
        Audit_info::where('id', '!=', '-1')->update(['active' => false]);
        $aci = Audit_info::where('id', $req->id)->first();
        $aci->active = true;
        $aci->save();
        return redirect()->route('admin.list_a_c_i');
    }
    public function edit_a_c_i(Request $req)
    {
        $fields = $req->all();
        unset($fields['_token']);
        $audit_info = Audit_info::where('id', $req->id)->first();
        foreach ($fields as $name => $value) {
            $audit_info->$name = $value;
        }
        $audit_info->save();
        return redirect()->route('admin.list_a_c_i');
    }
    public function list_services(Request $req)
    {
        $data['services'] = Service::orderBy('id', 'DESC')->get();
        return $this->view('list_services', $data);
    }
    public function edit_service(Request $req)
    {
        $service = Service::where('id', $req->id)->first();
        $service->price = $req->input('price');
        $service->save();
        return redirect()->route('admin.list_services');
    }
    public function list_settings(Request $request)
    {
        $query = QueryBuilder::for(Setting::class)
            ->allowedFilters(['alias']);
        $data['settings'] = $query->orderBy('id', 'DESC')->paginate(20);
        // $data['settings'] = Setting::orderBy('id', 'DESC')->paginate(30);
        return $this->view('list_settings', $data);
    }

    /**
     * view_setting
     *
     * @param  mixed $request
     * @return void
     */
    public function view_setting(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['setting'] = Setting::where(['id' => $req->id])->first();
                if ($data['setting'])
                    return View::make('Admin.view_setting')->with($data)->render();
                return abort(404);
                break;
            case 'POST':
                $fields = $req->input('setting');
                unset($fields['_token']);
                $audit_info = Setting::where(['id'=>$req->id])->first();
                foreach ($fields as $name => $value) {
                    $audit_info->$name = $value;
                }
                $audit_info->save();
                return redirect()->route('admin.list_settings');
                break;
            default:
                # code...
                break;
        }
    }
    public function create_setting(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                return View::make('Admin.create_setting')->render();
                break;
            case 'POST':
                $fields = $req->input('setting');
                unset($fields['_token']);
                $audit_info = new Setting;
                foreach ($fields as $name => $value) {
                    $audit_info->$name = $value;
                }
                $audit_info->save();
                return redirect()->route('admin.list_settings');
                break;
            default:
                # code...
                break;
        }
    }
    public function transactions_log(Request $req)
    {
        switch ($req->input('type')) {
            case 'to_order':
                $data['transactions'] = Invoice::where(['user_id' =>$req->id, 'status' => 'confirmed'])->orderBy('id', 'DESC')->paginate(20);
                if ($data['transactions'])
                    return $this->view('transactions_log', $data);
                return abort(404);
            case 'to_funds':
                $data['transactions'] = Transaction::where(['user_id' => $req->id, 'state' => 'confirmed', 'payment_system'=>'funds'])->orderBy('id', 'DESC')->paginate(20);
                if ($data['transactions'])
                    return $this->view('transactions_log', $data);
                return abort(404);
            default:
                $data['transactions'] = Transaction::where(['user_id' => $req->id, 'state' => 'confirmed', 'payment_system'=>'funds'])->orderBy('id', 'DESC')->paginate(20);
                if ($data['transactions'])
                    return $this->view('transactions_log', $data);
                return abort(404);
        }
    }
    public function list_blanks(Request $req)
    {
        
        $query = QueryBuilder::for(User::class)
            ->allowedFilters(['id']);
        $data['users'] = $query->where(['group_id' =>[2,3]])->orderBy('id', 'DESC')->paginate(20);
        return $this->view('list_blanks', $data);
    }
    public function rejected_blanks(Request $request)
    {
        $data['blanks']=Blank::where(['is_brak'=>1])->paginate(20);
        return $this->view('rejected_blanks', $data);
    }
    public function contracts(Request $req){
        $data['contracts']=Contract::paginate(20);
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
    public function invoices(Request $req){
        $data['invoices']=Invoice::where('status', 'waiting')->get();
        return $this->view('invoices', $data);
    }
    public function invoice_edit(Request $req){
        $invoice=Invoice::where('id', $req->id)->first();
        $invoice->price=$req->input('price');
        $invoice->save();
        
        return redirect()->route('admin.invoices');
    }
    public function certificates_list(Request $request)
    {
        $data['certificates']=Certificate::all();
        return $this->view('certificates_list', $data);
    }
    public function certificates_create(Request $req){
        switch ($req->method()) {
            case 'GET':
            return $this->view('certificates_create');
                break;
            case 'POST':
                $fields = $req->input('certificate');
                unset($fields['_token']);
                $certificate = new Certificate;
                foreach ($fields as $name => $value) {
                    $certificate->$name = $value;
                }
                $certificate->save();
                $certificate = Certificate::where(['id'=>$certificate->id])->first();
                if($req->file('certificate_file'))
                    $certificate->file_path=$req->file('certificate_file')->storeAs("certificates/$certificate->id", time() . $req->file('certificate_file')->getClientOriginalName());
                $certificate->save();
                return redirect()->route('admin.certificates_list');
                break;
            default:
                # code...
                break;
        }
    }
    public function certificates_view(Request $req){
        switch ($req->method()) {
            case 'GET':
                if($data['certificate']=Certificate::where(['id'=>$req->id])->first()){
                    return $this->view('certificates_view', $data);
                }
                break;
            case 'POST':
                $fields = $req->input('certificate');
                unset($fields['_token']);
                $certificate = Certificate::where(['id'=>$req->id])->first();
                $certificate->file_path=$req->file('certificate_file')->storeAs("certificates/$certificate->id", time() . $req->file('certificate_file')->getClientOriginalName());
                unset($fields['file']);
                foreach ($fields as $name => $value) {
                    if($name!='file_path')
                        $certificate->$name = $value;
                }
                $certificate->save();
                return redirect()->route('admin.certificates_list');
                break;
            default:
                # code...
                break;
        }
    }
}
