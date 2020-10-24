<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table="payments";
    public $timestamps=false;
    protected $fillable = [
        'amount',
        'payment_sys',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
