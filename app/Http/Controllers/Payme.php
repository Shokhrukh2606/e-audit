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
    private $click_secret_key = "1HzIg1cDboO";

    public function create(Request $req)
    {
        // error checking

        $params = $req->params;
        $created_date = date('Y-m-d H:i:s', $params['time']);
        $transaction = Transaction::where(['system_transaction_id' => $params['id'], 'payment_system'=>'payme'])->first();
        if ($transaction) {
            if ($transaction->state == PaymentsStatus::WAITING) {
                $dif = time() -(12);
                if (date('Y-m-d H:i:s', $dif)>$created_date) {
                    return response()->json([
                        "jsonrpc"=>"2.0",
                        'create_time' => $transaction->created_at,
                        'transaction' => $transaction->id,
                        'state'       => $transaction->state,
                        'receivers'   => null
                    ]);
                } else {
                    return response()->json([
                        "jsonrpc"=>"2.0",
                        'result' => '',
                        'error' => [
                            'message' => [
                                'uz' => 'Transaction time out',
                                'ru' => 'Transaction time out',
                                'en' => 'Transaction time out'
                            ],
                            'code' => -31008,
                            'data' => ''
                        ]
                    ]);
                }
            } else {
                // Невозможно выполнить операцию.
                return response()->json([
                    "jsonrpc"=>"2.0",
                    'result' => '',
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
                    "jsonrpc"=>"2.0",
                    'result' => '',
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
        }
    }
}
