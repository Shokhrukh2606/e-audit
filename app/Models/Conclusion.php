<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cust_comp_info;

class Conclusion extends Model
{
    protected $table="conclusions";
    use HasFactory;
    public $timestamps=false;
    
    public function cust_info(){
    	return $this->hasOne(Cust_comp_info::class);
    }
    public function customer(){
      return $this->belongsTo(User::class,"customer_id");
    }
    public function auditor(){
      return $this->belongsTo(User::class,"auditor_id");
    }
    public function agent(){
      return $this->belongsTo(User::class,"agent_id");
    }
    public function send_to_customer(){
        $order=$this->cust_info->order;
        $order->status="sent";
        $order->save();
    }
}
