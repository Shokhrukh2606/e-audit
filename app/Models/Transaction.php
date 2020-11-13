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
    public function transaction_state(){
        switch ($this->state) {
            case 'waiting':
                return 1;
                break;
            case 'confirmed':
                return 2;
                break;
            case 'cancelled':
                return -1;
                break;
            case 'cancelled_after_confirmed':
                return -2;
                break;
        }
    }
    public function cancel($reason){
        switch ($this->transaction_state()) {
            case '1':
                $this->reason=$reason;
                $this->state='cancelled';
                $this->cancel_time=date('Y-m-d H:i:s');
                $this->save();
                break;
            case '2':
                $this->reason=$reason;
                $this->state='cancelled_after_confirmed';
                $this->cancel_time=date('Y-m-d H:i:s');
                $this->save();
                break;
            
            default:
                break;
        }
    }
}
