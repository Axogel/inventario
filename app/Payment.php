<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sid', 'dob', 'store_code', 'store_name', 'tender', 'check_payments', 'card', 'exp', 'qty', 'amount', 'total', 'empployee_name', 'empployee_id'
    ];
}
