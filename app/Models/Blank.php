<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blank extends Model
{
    use HasFactory;
    protected $table="blanks";

    public static function start(){
    	$new=new self();
    	$new->save();
    }
    public static function assign($id, $user_id){
    	$blank=self::where('id', $id)->first();
    	$blank->user_id=$user_id;
    	$blank->save();
    }
}
