<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voidx extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sid', 'dob', 'store_code', 'store_name', 'check_void', 'item', 'reason', 'manager', 'time', 'server', 'amount', 'manager_id', 'server_id',
    ];
}
