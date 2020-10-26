<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cust_comp_info;

class Conclusion extends Model
{
    protected $table="conclusions";
    use HasFactory;
    public function user(){
        $this->belongsTo('App\Models\User');
    }
    public $timestamps=false;
    
    public function cust_info(){
    	return $this->hasOne(Cust_comp_info::class);
    }
}
