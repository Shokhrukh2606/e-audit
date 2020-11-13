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
            case 'CreateTransaction':
                return $this->checkCreateTransaction($req);
                break;
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
    public function checkCreateTransaction(Request $req){
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
}
