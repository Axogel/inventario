<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comp extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sid', 'dob', 'store_code', 'store_name', 'check_comps', 'name', 'employee', 'manager', 'comp_type', 'qty', 'amount', 'emp_id', 'man_id'
    ];
}
