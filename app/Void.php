<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Void extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sid', 'dob', 'store_code', 'store_name', 'check_promo', 'check_name', 'employee', 'manager', 'promo_type', 'qty', 'amount', 'emp_id', 'man_id',
    ];
}
