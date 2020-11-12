<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Classes\BasePaymentErrors;
use App\Classes\PaymentsStatus;
use App\Classes\PaymePaymentPaymentErrors;

class Payme extends Controller
{
    private $click_secret_key="1HzIg1cDboO";

	public function create(Request $req){
        // error checking
        $params=$req->params;
        $created_date=date('Y-m-d H:i:s',$params->time);
        $transaction=Transaction::where(['id'=>$params->id, 'system_create_time'=>$created_date])->first();
        if($transaction){
            if($transaction->status==PaymentsStatus::WAITING){
                $dif=time() - $transaction->system_create_time;
                if($dif < 43200000 ){

                }else{

                }
            }else{
                // Невозможно выполнить операцию.
                return [
                    'result'=>[-31008];

            }
        }else{

        }

	}
	public function perform(Request $req){
		// error checking
        $error_check= new BasePaymentErrors();
        $result=$error_check->request_check($req, $this->click_secret_key);
        
        // if there is no error
        if($result['error']==0){
            $transaction=Transaction::where('id', $req->merchant_prepare_id)->first();
            if($req->error<0){
                if($transaction->state=='confirmed'){
                    return [
                        'error' => -4,
                        'error_note' => 'Already paid'
                    ];
                }
                $transaction->state='rejected';
                $transaction->save();
                return [
                    'error' => -9,
                    'error_note' => 'Transaction cancelled'
                ];
            }
            $transaction->state='confirmed';
            $transaction->save();
            $invoice=Invoice::where('id',$req->merchant_trans_id)->first();
            $invoice->status='confirmed';
            $invoice->closed_with='transaction';
            $invoice->save();
            $result+=[
                'click_trans_id'=>$req->click_trans_id,
                'merchant_trans_id'=>$invoice->id,
                'merchant_confirm_id'=>$invoice->transaction->id
            ];
            return $result;
        }else{
            return $result;
        }	
	}
}
