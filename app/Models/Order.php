<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cust_comp_info;

class Order extends Model
{
    protected $table="orders";
    use HasFactory;
    public $timestamps=false;

    public function cust_info(){
    	return $this->hasOne(Cust_comp_info::class);
    }
   
}
