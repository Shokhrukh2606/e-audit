<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
class Template extends Model
{
    protected $table="templates";
    use HasFactory;

    public function service(){
      return $this->hasOne(Service::class);
    }
}
