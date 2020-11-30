<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit_info extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'active'
    ];
    protected $table='audit_comp_info';
    public $timestamps=false;
}
