<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cust_comp_info;

class Conclusion extends Model
{
    protected $table="conclusions";
<<<<<<< HEAD
    public function user(){
        $this->belongsTo('App\Models\User');
=======
    use HasFactory;
    public $timestamps=false;
    
    public function cust_info(){
    	return $this->hasOne(Cust_comp_info::class);
>>>>>>> 913015b4c9bed61df10c45c397e1c9b5a1f3c3bf
    }
}
