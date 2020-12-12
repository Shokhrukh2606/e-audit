<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = "contracts";
    public $timestamps=false;

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function conclusion(){
    	return $this->belongsTo('App\Models\Conclusion');
    }
}
