<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cust_comp_info;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class Order extends Model
{
    protected $table="orders";
    use HasFactory;
    public $timestamps=false;

    public function cust_info(){
    	return $this->hasOne(Cust_comp_info::class);
    }
   	public function fulldelete(){
   		Storage::deleteDirectory("orders/".$this->id);
   		$this->delete();
   	}
    public function customer(){
      return $this->belongsTo(User::class,"customer_id");
    }
}
