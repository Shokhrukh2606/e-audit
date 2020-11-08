<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table='transactions';
    public $timestamps=false;

    public static function init($invoice_id){
    	if($transaction=self::where('invoice_id', $invoice_id)->first())
    		return $transaction;
    	$transaction=new self;
    	$transaction->invoice_id=$invoice_id;
    	$transaction->save();
    	return $transaction;
    }
}
