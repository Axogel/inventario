<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**0tes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'store_code', 'region_id', 'last_name', 'username', 'company_admin', 'las_modified_by', 'last_log_in_date', 'profile_photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    

    public function isAdmin(){
        if($this->role->name == 'superadmin' || $this->role->name == 'compadmin')
            return true;
        else
            return false;
    }
    public function isSuper(){
        if($this->role->name == 'superadmin')
            return true;
        else
            return false;
    }
}
