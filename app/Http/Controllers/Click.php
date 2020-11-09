<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Classes\BasePaymentErrors;


class Click extends Controller
{
    private $click_secret_key="1HzIg1cDboO";

	public function prepare(Request $req){
        // error checking
        $error_check= new BasePaymentErrors();
        $result=$error_check->request_check($req, $this->click_secret_key);
        // if there is no error
        if($result['error']==0){
            $merchant_prepare_id=Transaction::init($req->merchant_trans_id)->id;
            $result+=[
                'click_trans_id'=>$req->click_trans_id,
                'merchant_trans_id'=>$req->merchant_trans_id,
                'merchant_prepare_id'=>$merchant_prepare_id
            ];
            return $result;
        }else{
            $result+=[
                'click_trans_id'=>$req->click_trans_id,
                'merchant_trans_id'=>$req->merchant_trans_id,
                'merchant_prepare_id'=>null
            ];
            return $result;
        }
	}
	public function complete(Request $req){
		// error checking
        $error_check= new BasePaymentErrors();
        $result=$error_check->request_check($req, $this->click_secret_key);
        // if there is no error
        if($result['error']==0){
            $invoice=Invoice::where('id',$req->merchant_trans_id)->first();
            $invoice->status='confirmed';
            $invoice->save();
            $result+=[
                'click_trans_id'=>$req->click_trans_id,
                'merchant_trans_id'=>$invoice->id,
                'merchant_confirm_id'=>$invoice->transaction->id
            ];
            return $result;
        }else{
            $result+=[
                'click_trans_id'=>$req->click_trans_id,
                'merchant_trans_id'=>$req->merchant_trans_id,
                'merchant_confirm_id'=>null
            ];
            return $result;
        }	
	}
}
