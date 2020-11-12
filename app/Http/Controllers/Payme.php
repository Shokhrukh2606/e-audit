<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Classes\BasePaymentErrors;
use App\Classes\PaymeChecks;

class Payme extends Controller
{
    private $payme_secret_key="1HzIg1cDboO";
    /**
    * @name checkPerformTransaction
    * @param request object-like
    * @return array-like
    */
    public function dispatcher(Request $req){
        switch ($req->method) {
            case 'CheckPerformTransaction':
                return $this->checkPerformTransaction($req);
                break;
            
            default:
                return [
                    'error'=>[
                        'code'=>-32601,
                        'message'=>'Method not found'
                    ]
                ];
                break;
        }
    }
    public function checkPerformTransaction(Request $req){
        $check=new PaymeChecks();
        $error=$check->validateCheckParams($req->params);
        if($error['error']['code']==0){
            return [
                "result" =>[
                    "allow" => true
                ]
            ];
        } 
        return [
            'result'=>$error
        ];   
    }
    
    public function create(Request $req){
        // error checking
        $params=$req->params;
        // $transaction=Transaction::where(['id'=>$params->id, ''])
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
