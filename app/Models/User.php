<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Invoice;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url'
    ];
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->full_name="{$model->surname} {$model->name} {$model->patronymic}";
        });

        self::updating(function($model){
            $model->full_name="{$model->surname} {$model->name} {$model->patronymic}";
        });

    }
    public function group()
    {
        return $this->belongsTo('App\Models\User_group');
    }
    public function agent_conclusions()
    {
        return $this->hasMany('App\Models\Conclusion', 'agent_id');
    }
    public function blanks()
    {
        return $this->hasMany('App\Models\Blank', 'user_id');
    }
    public function add_funds($amount)
    {
        $this->funds += $amount;
        $this->save();
    }
    public function remove_funds($amount)
    {
        $this->funds -= $amount;
        $this->save();
    }
    public function hasRole($role)
    {
        return in_array($this->group->name, $role, TRUE);
    }
    public function getFullnameAttribute()
    {
        return "{$this->surname} {$this->name} {$this->patronymic}";
    }
    public static function specificFullname($user_id)
    {
        $found = self::where(['id' => $user_id])->first();
        if ($found) {
            return "$found->surname $found->name $found->patronymic";
        } else {
            return '-';
        }
    }
    public function invoices(){
        return $this->hasMany('App\Models\Invoice', 'user_id');
    }
    public function bills(){
        return count(Invoice::where([
            'user_id'=>auth()->user()->id,
            'closed_with'=>'bill',
            'status'=>'waiting'
            ]
        )->get()
    );
    }
}
