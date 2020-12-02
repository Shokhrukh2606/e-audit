<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Classes\BasePaymentErrors;
use App\Classes\PaymeChecks;
use App\Classes\PaymeUserChecks;

class Payme extends Controller
{
    /**
     * @name checkPerformTransaction
     * @param request object-like
     * @return array-like
     */
    private $login = 'Paycom';
    private $password = 'ahSiuA&y#mS7qf5%rOppR6FparQ1V#J@uOXj';

    public function dispatcher(Request $req)
    {
        // if (!$req->ip() == "195.158.31.134" && !$req->ip() == "195.158.31.10") {
        //     return [
        //         'error' => [
        //             'message' => "Unauthorized",
        //             'code' => -32504
        //         ]
        //     ];
        // }

        // if ($req->header('Authorization') != "Basic " . base64_encode($this->login . ":" . $this->password)) {
        //     return [
        //         'error' => [
        //             'message' => "Unauthorized",
        //             'code' => -32504
        //         ]
        //     ];
        // }
        switch ($req->method) {
            case 'CheckPerformTransaction':
                return $this->checkPerformTransaction($req);
                break;
            case 'CheckTransaction':
                return $this->checkTransaction($req);
                break;
            case 'CancelTransaction':
                return $this->cancelTransaction($req);
                break;
            case 'CreateTransaction':
                return $this->createTransaction($req);
                break;
            case 'PerformTransaction':
                return $this->performTransaction($req);
                break;
            default:
                return [
                    'error' => [
                        'code' => -32601,
                        'message' => 'Method not found'
                    ]
                ];
                break;
        }
    }

    /**
     * @name checkPerformTransaction
     * @param request object-like
     * @return array-like
     */
    public function checkPerformTransaction(Request $req)
    {
        if ($this->checkUserFunding($req->params)) {
            $check = new PaymeUserChecks();
        } else {
            $check = new PaymeChecks();
        }

        $error = $check->validateCheckParams($req->params);
        if ($error['error']['code'] == 0) {
            return [
                "result" => [
                    "allow" => true
                ]
            ];
        }
        $error['id'] = $req->id;
        $error['jsonrpc'] = '2.0';
        $error['result'] = null;
        return $error;
    }
    /**
     * @name checkTransaction
     * @param request object-like
     * @return array-like
     */
    public function checkTransaction(Request $req)
    {
        if ($this->checkUserFunding($req->params)) {
            $check = new PaymeUserChecks();
        } else {
            $check = new PaymeChecks();
        }

        $transaction_check = $check->transaction_check($req->params);
        if ($transaction_check['error']['code'] == 0) {
            $transaction = $transaction_check['transaction'];
            $formatted_transaction = [
                'create_time' => strtotime($transaction->created_at) * 1000,
                'perform_time' => $transaction->perform_time ?
                    strtotime($transaction->perform_time) * 1000
                    : 0,
                'cancel_time' => $transaction->cancel_time ?
                    strtotime($transaction->cancel_time) * 1000
                    : 0,
                'transaction' => "$transaction->id",
                'state' => $transaction->transaction_state(),
                'reason' => $transaction->reason ? intval($transaction->reason) : null
            ];
            return [
                'result' => $formatted_transaction
            ];
        }
        $transaction_check['id'] = $req->id;
        $transaction_check['jsonrpc'] = '2.0';
        $transaction_check['result'] = null;
        return $transaction_check;
    }
    /*
    *@name cancelTransaction
    **@param Request object
    *@return array
    */
    public function cancelTransaction(Request $req)
    {
        if ($this->checkUserFunding($req->params)) {
            $check = new PaymeUserChecks();
        } else {
            $check = new PaymeChecks();
        }
        $param_check = $check->cancel_param_check($req->params);
        if ($param_check['error']['code'] == 0) {
            $transaction = $param_check['transaction'];
            $formatted_transaction = [
                'transaction' => "$transaction->id",
                'cancel_time' => strtotime($transaction->cancel_time) * 1000,
                'state' => $transaction->transaction_state()
            ];
            $response['jsonrpc'] = '2.0';
            $response['id'] = $req->id;
            $response['result'] = $formatted_transaction;
            return $response;
        }
        return $param_check;
    }

    public function createTransaction(Request $req)
    {
        if ($this->checkUserFunding($req->params)) {
            $check = new PaymeUserChecks();
        } else {
            $check = new PaymeChecks();
        }
        $answer = $check->validateCreateParams($req->params);
        if ($answer['error']['code'] == 0) {
            return ['result' => $answer['result']];
        }
        return ['error' => $answer['error']];
    }
    public function performTransaction(Request $req)
    {
        if ($this->checkUserFunding($req->params)) {
            $check = new PaymeUserChecks();
        } else {
            $check = new PaymeChecks();
        }
        $answer = $check->validatePerform($req->params);
        if ($answer['error']['code'] == 0) {
            return ['result' => $answer['result']];
        }
        return ['error' => $answer['error']];
    }
    public function checkUserFunding($req)
    {
		$req = (object) $req;
        if (isset($req->account['id'])) {
            if ($req->account['id'][0] == 'U') {
                return true;
            }
        }
        if (isset($req->id)) {
            if ($transaction = Transaction::where(['system_transaction_id' => $req->id, 'payment_system' => 'payme'])->orWhereNotNull('user_id')->first()) {
                return true;
            }
        }
        return false;
    }
}
