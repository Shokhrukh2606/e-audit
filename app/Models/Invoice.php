<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Invoice extends Model
{
    use HasFactory;
    protected $table="invoices";
    public $timestamps=false;

    public function exist($id, $amount, $service_id){
    	if(self::where(['id'=>$id, 'amount'=>$amount, 'service_id'=>$service_id]))
    		return true;
    	return false;
    }
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction', 'invoice_id');
    }
    public function conclusion()
    {
        return $this->belongsTo('App\Models\Conclusion');
    }
}
