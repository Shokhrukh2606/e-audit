<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Use_Case;
use App\Models\Template;
use App\Models\Order;

class Cust_comp_info extends Model
{
    use HasFactory;
    protected $table="cust_comp_info";
    public $timestamps=false;

    public function use_cases(){
    	//return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
    	return $this->belongsToMany(Use_Case::class, 'cust_info_use_case_map', 'cust_info_id', 'use_case_id');
    }
    public function template(){
    	return $this->belongsTo(Template::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function conclusion(){
        return $this->belongsTo(Conclusion::class);
    }
}
