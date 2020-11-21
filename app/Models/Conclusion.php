<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cust_comp_info;
use App\Models\Invoice;

class Conclusion extends Model
{
  protected $table = "conclusions";
  public const STATES = [
    '1' => 'initiated',
    '2' => 'sent',
    '3' => 'finished',
    '4' => 'rejected'
  ];
  use HasFactory;
  protected $appends = [
    'state',
    'scoefficient',
    'fcoefficient'
  ];
  public function user()
  {
    $this->belongsTo('App\Models\User');
  }
  public $timestamps = false;

  public function cust_info()
  {
    return $this->hasOne(Cust_comp_info::class);
  }
  public function customer()
  {
    return $this->belongsTo(User::class, "customer_id");
  }
  public function auditor()
  {
    return $this->belongsTo(User::class, "auditor_id");
  }
  public function agent()
  {
    return $this->belongsTo(User::class, "agent_id");
  }
  public function send_to_customer()
  {
    $order = $this->cust_info->order;
    $order->status = "7";
    $order->save();
  }
  public function invoice()
  {
    return $this->hasOne(Invoice::class, "this_id");
  }
  public function getStateAttribute()
  {
    return self::STATES[$this->status];
  }
  public static function boot()
  {
    parent::boot();

    self::creating(function ($model) {
      $model->qr_hash = md5(uniqid($model->id, true));
    });

    self::updating(function ($model) {
      $model->qr_hash = md5(uniqid($model->id, true));
    });
  }
  public function getFcoefficientAttribute(){
    $c=$this->current_actives/($this->current_obligation-$this->long_term_liabilities);
    return round($c, 2);
  }
  public function getScoefficientAttribute()
  {
    $c=(($this->sources_of_own_funds+$this->long_term_loans)-$this->long_term_actives) / $this->current_actives;
    return round($c, 2);
  }
}
