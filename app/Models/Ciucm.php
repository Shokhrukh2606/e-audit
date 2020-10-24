<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciucm extends Model
{
    use HasFactory;
    protected $table="cust_info_use_case_map";
    public $timestamps=false;
}
