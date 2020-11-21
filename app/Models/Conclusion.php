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
    'state'
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
    return $this->hasOne(Invoice::class, "conclusion_id");
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
}
