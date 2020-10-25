<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    protected $table="conclusions";
    public function user(){
        $this->belongsTo('App\Models\User');
    }
}
