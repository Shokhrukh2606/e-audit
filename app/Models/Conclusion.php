<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cust_comp_info;
use App\Models\Invoice;
use App\Models\Blank;


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
  public function blanks(){
    return $this->hasMany(Blank::class);
  }
  public function valid_blanks(){
    $blanks=$this->blanks;
    $valids=array();
    foreach ($blanks as $key => $blank) {
      if(!$blank->is_brak){
        array_push($valids, $blank);
      }
    }
    return $valids;
  }
  public function is_printable(){
    date_default_timezone_set("Asia/Tashkent");
    if(count($this->blanks)>0){
      return strtotime('now')-strtotime($this->blanks[0]->assigned_date)<3600*24*config('global.printable_days');
    }
    return true;
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
  /**
   * @return array
   */
  public function kps(){
    if($this->P2==$this->DO)
        return [
          'error'=>-1,
          'value'=>'Zero devision'
        ];
    return [
          'error'=>0,
          'value'=>$this->A2/($this->P2-$this->DO)
        ];
  }
  /**
  * @return array
  */
  public function koses(){
    if($this->P1+$this->DEK2==$this->A1 || $this->A2==0)
        return [
          'error'=>-1,
          'value'=>'Zero Division'
        ];
    return [
          'error'=>0,
          'value'=>(($this->P1+$this->Dek2)-$this->A1)/$this->A2
        ];
  }
  /**
  * @return array
  */
  public function kpp(){
    if($this->P==0)
        return [
          'error'=>-1,
          'value'=>'Zero Division'
        ];
    return [
          'error'=>0,
          'value'=>$this->PUDN/$this->P
        ];
  }

}
