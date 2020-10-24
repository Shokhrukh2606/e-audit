<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AAC_Controller extends Controller
{
    function __construct()
    {
        $this->middleware('multi_auth:agent,auditor,customer');
    }
    private function view($file, $data = [])
    {
        return view('AAC_Common.' . $file, $data);
    }
    public function add_funds(Request $req)
    {
        switch ($req->method()) {
            case 'GET':

                return $this->view('add_funds');
                break;
            case 'POST':
                $payment = new Payment([
                    'amount' => $req->input('amount'),
                    'payment_sys' => $req->input('payment_sys'),
                    'user_id' => Auth::user()->id
                ]);
                $payment->save();
                return redirect(route('checkfunds'));
                return $this->view('add_funds');
                break;
            default:
                print("not allowed method");
                break;
        }
    }
    public function checkfunds()
    {
        $data['payment_logs'] = Auth::user()->funds;
        return $this->view('add_funds');
    }
}
