<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\BasePaymentErrors;
use App\Models\Invoice;
use App\Models\Transaction;

class Click extends Controller
{
	public function prepare(Request $req){
		
		$payment =Transaction::init($req->merchant_trans_id);
        // getting merchant_confirm_id and merchant_prepare_id
        $merchant_prepare_id = 0;

        if($payment){
            $merchant_prepare_id = $payment->id;
        }
        return $payment;
        // check the request data to errors
        // $result = $this->request_check($request);

	}
	public function complete(Request $req){
		return 0;	
	}
}
