<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Classes\BasePaymentErrors;
use App\Classes\PaymeChecks;

class Payme extends Controller
{
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
        return $error;      
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
            } else {
                // Невозможно выполнить операцию.
                return response()->json([
                    'error' => [
                        'code' => -31008,
                        'message' => [
                            'uz' => 'Transaction status is rejected',
                            'ru' => 'Transaction status is rejected',
                            'en' => 'Transaction status is rejected'
                        ],
                        'data' => ''
                    ]
                ]);
            }
        } else {
            $exist_invoice = Invoice::where([
                'id' => $params['account']['Test'],
                'status' => 'waiting',
                'price' => $params['amount']
            ])->first();
            if ($exist_invoice) {
                $new_transaction = new Transaction;
                $new_transaction->system_transaction_id = $params['id'];
                $new_transaction->system_create_time = date('Y-m-d H:i:s', $params['time']);
                $new_transaction->state = PaymentsStatus::WAITING;
                $new_transaction->payment_system = 'payme';
                $new_transaction->invoice_id = $params['account']['Test'];
                $new_transaction->error_code=0;
                $new_transaction->save();
            } else {
                return response()->json([
                    'error' => [
                        'message' => [
                            'uz' => 'Transaction is not processable cause amount is not correct or id does not exist!',
                            'ru' => 'Transaction is not processable cause amount is not correct or id does not exist!',
                            'en' => 'Transaction is not processable cause amount is not correct or id does not exist!'
                        ],
                        'code' => -31008,
                        'data' => ''
                    ]
                ]);
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
