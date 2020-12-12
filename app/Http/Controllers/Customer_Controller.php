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
use App\Models\Transaction;
use App\Models\Contract;
use Illuminate\Support\Facades\Storage;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Customer_Controller extends Controller
{
    private $customer_id;
    private $states = [
        'draft' => [1],
        'sent' => [2, 3, 4, 5, 6],
        'finished' => [7],
        'rejected' => [8]
    ];
    private $reverted_states = [
        '1' => 'draft',
        '2' => 'sent',
        '3' => 'in_auditor',
        '4' => 'docs_confirmed',
        '5' => 'error_found_in_document',
        '6' => 'resent_to_auditor',
        '7' => 'finished',
        '8' => 'rejected'
    ];
    function __construct()
    {
        $this->middleware('multi_auth:customer');
    }
    private function view($file, $data = [])
    {
        $data['title'] = 'e-audit client';
        $data['body'] = 'Customer.' . $file;
        return view('customer_index', $data);
    }
    public function select_temp()
    {
        $data['templates'] = Template::all();
        $data['use_cases'] = Use_Case::all();
        return $this->view('select_template', $data);
    }
    public function create_order(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['template_id'] = $_GET['template_id'] ?? false;
                $data['use_cases'] = $_GET['use_cases'] ?? false;
                if ($data["template_id"] && $data["use_cases"])
                    return $this->view('create_order', $data);
                return $this->select_temp();
                break;
            case 'POST':
                file_validation_rules($req->cust_info['template_id']);
                $req->validate(
                    file_validation_rules($req->cust_info['template_id'])
                );
                $all = $req->all();
                
                $order_fields = $req->input('order');
                $cust_info_fields = $req->input('cust_info');
                $cust_info_fields_files = $req->file('cust_info');

                $custom_fields_files = $req->file('custom');
                $custom_fields = $req->input('custom');
                // customer_info-use_case mappings
                $ciucm_fields = $req->input('ciucm');
                $order = new Order();

                if ($all['send_to_admin'] == "true") {
                    $order->status = 2;
                }
                unset($all['send_to_admin']);

                $order->customer_id = auth()->user()->id;
                foreach ($order_fields ?? [] as $key => $value) {
                    $order->$key = $value;
                }
                $order->save();
                $CCI = new Cust_comp_info;
                $CCI->order_id = $order->id;

                foreach ($cust_info_fields ?? [] as $key => $value) {
                    $CCI->$key = $value;
                }

                foreach ($cust_info_fields_files ?? [] as $key => $value) {

                    $CCI->$key = $value
                        ->storeAs("orders/$order->id", time() . 'cci' . $key . $value->getClientOriginalName());
                }

                foreach ($custom_fields_files ?? [] as $key => $value) {
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $custom_fields[$key] = $value
                        ->storeAs("orders/$order->id", time() . $key . $value->getClientOriginalName());
                }

                $CCI->custom_fields = json_encode($custom_fields);
                $CCI->save();
                foreach ($ciucm_fields as $key => $value) {
                    $cuicm = new Ciucm();
                    $cuicm->cust_info_id = $CCI->id;
                    $cuicm->use_case_id = $value;
                    $cuicm->save();
                }
                return redirect()->route(
                    'customer.orders',
                    $this->reverted_states[$order->status] ?? "draft"
                );
                break;
            default:
                # code...
                break;
        }
    }
    public function orders(Request $req)
    {
        if (!array_key_exists($req->status, $this->states)) {
            abort(404);
        }
        $states = $this->states[$req->status];

        $data['states'] = $this->reverted_states;

        $data['orders'] = Order::where(
            'customer_id',
            auth()->user()->id
        )->whereIn(
            'status',
            $states
        )->orderBy('id', 'DESC')->paginate(20);

        return $this->view("list_orders.$req->status", $data);
    }
    public function order_view(Request $req)
    {
        $data['order'] = Order::where(['id' => $req->id, 'customer_id' => auth()->user()->id])->first();

        $data['states'] = $this->reverted_states;

        if ($data['order'])
            return $this->view('view_order', $data);
        return abort(404);
    }
    public function edit_order(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['order'] = Order::where(['id' => $req->id, 'customer_id' => auth()->user()->id])->first();
                if ($data['order'])
                    return $this->view('edit_order', $data);
                return abort(404);
                break;
            case 'POST':

                $all = $req->all();
                $order_fields = $req->input('order');
                $cust_info_fields = $req->input('cust_info');
                $cust_info_fields_files = $req->file('cust_info');
                
                $custom_fields_files = $req->file('custom');
                $custom_fields = $req->input('custom');
                // customer_info-use_case mappings

                $order = Order::where(['id' => $req->id, 'customer_id' => auth()->user()->id])->first();

                $CCI = $order->cust_info;

                $req->validate(
                    file_fields_for_validation_edit($CCI->template_id)
                );

                if (!$order)
                    abort(404);

                foreach ($order_fields ?? [] as $key => $value) {
                    $order->$key = $value;
                }

                $order->save();


                foreach ($cust_info_fields ?? [] as $key => $value) {
                    $CCI->$key = $value;
                }
                $original_custom = json_decode($CCI->custom_fields, true);

                foreach ($custom_fields_files ?? [] as $key => $value) {
                    Storage::delete($original_custom[$key] ?? null);
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $original_custom[$key] = $value
                        ->storeAs("orders/$order->id", time() . $value->getClientOriginalName());
                }
                $original_custom = json_decode($CCI->custom_fields, true);
                foreach ($custom_fields ?? [] as $key => $value) {
                    Storage::delete($original_custom[$key] ?? null);
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $original_custom[$key] = $value;
                }

                $CCI->custom_fields = json_encode($original_custom);

                foreach ($cust_info_fields_files ?? [] as $key => $value) {
                    Storage::delete($CCI[$key] ?? null);
                    /*store as added to keep the original name and extension because failed to detect correct extension for .docx */
                    $CCI->$key = $value
                        ->storeAs("orders/$order->id", time() . 'cci' . $key . $value->getClientOriginalName());

                }

                $CCI->save();
                return redirect()
                    ->route('customer.order_view', $order->id);
                break;
            default:
                # code...
                break;
        }
    }
    public function send(Request $req)
    {
        $order = Order::where(['id' => $req->id, 'customer_id' => auth()->user()->id])->first();
        if ($order) {
            $order->status = "2";
            $order->save();
            $data['message'] = "Ваш заказ успешно отправлен";
            $data['link'] = route('customer.orders', "sent");
            return $this->view('message', $data);
        }
        return abort(404);
    }
    public function resend(Request $req)
    {
        $order = Order::where(['id' => $req->id, 'customer_id' => auth()->user()->id])->first();
        if ($order) {
            $order->status = "6";
            $order->save();
            $data['message'] = "Ваш заказ успешно отправлен";
            $data['link'] = route('customer.orders', "sent");
            return $this->view('message', $data);
        }
        return abort(404);
    }
    public function cancel_order(Request $req)
    {
        $order = Order::where(['id' => $req->id, 'customer_id' => auth()->user()->id])->first();
        if ($order) {
            $status = $this->reverted_states[$order->status];
            $order->fulldelete();
            return redirect()->route('customer.orders', $status);
        }

        return abort(404);
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
    public function create_invoice(Request $req)
    {
        $conclusion = Conclusion::where('id', $req->conclusion_id)->first();
        if ($conclusion ?? false) {
            if ($conclusion->invoice)
                return redirect()->route('customer.pay', $conclusion->id);
            $service = $conclusion->cust_info->template->service;
            $invoice = new Invoice();
            $invoice->conclusion_id = $conclusion->id;
            $invoice->price = $conclusion->cust_info->template->service->price;
            $invoice->user_id = auth()->user()->id;
            $invoice->service_id = $service->id;
            $invoice->save();
            return redirect()->route('customer.pay', $conclusion->id);
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
    public function transactions_log(Request $req)
    {
        switch ($req->input('type')) {
            case 'to_order':
                $data['transactions'] = Invoice::where(['user_id' => auth()->user()->id, 'status' => 'confirmed'])->orderBy('id', 'DESC')->paginate(20);
                if ($data['transactions'])
                    return $this->view('transactions_log', $data);
                return abort(404);
            case 'to_funds':
                $data['transactions'] = Transaction::where(['user_id' => auth()->user()->id, 'state' => 'confirmed'])->orderBy('id', 'DESC')->paginate(20);
                if ($data['transactions'])
                    return $this->view('transactions_log', $data);
                return abort(404);
            default:
                $data['transactions'] = Transaction::where(['user_id' => auth()->user()->id, 'state' => 'confirmed'])->orderBy('id', 'DESC')->paginate(20);
                if ($data['transactions'])
                    return $this->view('transactions_log', $data);
                return abort(404);
        }
    }
    public function reject_conc(Request $req)
    {
        $order = Order::where('id', $req->input('id'))->first();
        if (!$order)
            return abort(404);
        $order->status = 8;
        $order->message = $req->input('reason');
        $order->save();

        $conclusion=$order->cust_info->conclusion;
        $conclusion->status=4;
        $conclusion->save();

        return redirect()->route('customer.orders', 'finished');
    }
    public function contracts(){
        $data['contracts']=Contract::where('user_id', auth()->user()->id)->get();
        return $this->view('contracts', $data);
    }
    public function accept(Request $req){
        $conclusion=Conclusion::where('id', $req->conclusion_id)->first();
        $conclusion->status=5;
        $conclusion->save();
        return redirect()->back();
    }
}
