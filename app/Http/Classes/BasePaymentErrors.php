<?php


namespace App\Classes;

use App\Models\Invoice;
use App\Models\Transaction;

class BasePaymentErrors {
    /**
     * @name request_check
     * @param request array-like
     * @return array-like
     */
    public function request_check($request, $secret_key){
        // check to error in request from click
        if($this->is_not_possible_data($request)){
            // return response array-like
            return [
                'error' => -8,
                'error_note' => 'Error in request from click'
            ];
        }

        // prepare sign string as md5 digest
        $sign_string = md5(
            $request->click_trans_id .
            $request->service_id .
            $secret_key .
            $request->merchant_trans_id .
            ($request->action == 1 ? $request->merchant_prepare_id : '') .
            $request->amount .
            $request->action .
            $request->sign_time
        );
        // check sign string to possible
        if($sign_string != $request->sign_string){
            // return response array-like
            return [
                'error' => -1,
                'error_note' => 'SIGN CHECK FAILED!'
            ];
        }

        // check to action not found error
        if (!((int)$request->action == 0 || (int)$request->action == 1)) {
            // return response array-like
            return [
                'error' => -3,
                'error_note' => 'Action not found'
            ];
        }

        // get payment data by merchant_trans_id
        $payment = Invoice::where('id', $request->merchant_trans_id)->first();

        if(!$payment){
            // return response array-like
            return [
                'error' => -5,
                'error_note' => 'Invoice does not exist'
            ];
        }

        // get payment data by merchant_prepare_id
        if( $request->action == 1 ) {
            $transaction = Transaction::where('id', $request->merchant_prepare_id)->first();
            if(!$transaction){
                // return response array-like
                return [
                    'error' => -6,
                    'error_note' => 'Transaction does not exist '
                ];
            }
             // check status to transaction cancelled
            if($transaction->state == PaymentsStatus::REJECTED){
            // return response array-like
                return [
                    'error' => -9,
                    'error_note' => 'Transaction cancelled'
                ];
            }
            if($transaction->state=='confirmed'){
                return [
                    'error' => -4,
                    'error_note' => 'Already paid'
                ];
            }
            

        }
        if($request->action==0){
            $transaction = Transaction::init_click_check($request);
            if($transaction){
                if($transaction->state==PaymentsStatus::REJECTED){
                    return [
                        'error' => -9,
                        'error_note' => 'Transaction cancelled'
                    ];
                }
            }
        }
         // check to already paid
        if($payment->status == PaymentsStatus::CONFIRMED){
            // return response array-like
            return [
                'error' => -4,
                'error_note' => 'Already paid'
            ];
        }


        // check to correct amount
        if(abs((float)$payment->price - (float)$request->amount) > 0.01){
            // return response array-like
            return [
                'error' => -2,
                'error_note' => 'Incorrect parameter amount'
            ];
        }


        // return response array-like as success
        return [
            'error' => 0,
            'error_note' => 'Success'
        ];

    }
    /**
     * @name is_not_possible_data, this method used in request_check
     * @param request array-like
     * @return boolean
     */
    private function is_not_possible_data($request){
        if(!(
            isset($request->click_trans_id) &&
            isset($request->service_id) &&
            isset($request->merchant_trans_id) &&
            isset($request->amount) &&
            isset($request->action) &&
            isset($request->error) &&
            isset($request->error_note) &&
            isset($request->sign_time) &&
            isset($request->sign_string) &&
            isset($request->click_paydoc_id)
        ) || $request->action == 1 && ! isset($request->merchant_prepare_id)) {
            return true;
        }
        return false;
    }
}


?>
