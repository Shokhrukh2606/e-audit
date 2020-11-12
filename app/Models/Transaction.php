<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table='transactions';
    public $timestamps=false;

    public static function init_click( $req){
    	$transaction=self::where([
            'invoice_id'=> $req->invoice_id,
            'system_transaction_id'=>$req->click_trans_id,
            'payment_system'=>'click'
        ])->first();
        if($transaction){
            return $transaction;
        }
        $transaction=new self;
        $transaction->payment_system='click';
        $transaction->system_transaction_id=$req->click_trans_id;
        $transaction->invoice_id=$req->merchant_trans_id;
        $transaction->system_create_time=$req->sign_time;
        $transaction->save();
        return $transaction;
    }
    public static function init_click_check( $req){
        $transaction=self::where([
            'invoice_id'=> $req->merchant_trans_id,
            'system_transaction_id'=>$req->click_trans_id,
            'payment_system'=>'click'
        ])->first();
        if($transaction){
            return $transaction;
        }
        return false;
    }
    public static function init_payme_check( $req){
        $transaction=self::where([
            'invoice_id'=> $req->account->test,
            'system_transaction_id'=>$req->id,
            'payment_system'=>'payme'
        ])->first();
        if($transaction){
            return [
                'error'=> -31050,
                'message'=>'Transaction not found'
            ];;  
        }
        return [
            'error'=> -31050,
            'message'=>'Transaction not found'
        ];
    }
}
