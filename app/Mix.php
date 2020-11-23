<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mix extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sid', 'dob', 'store_code', 'store_name', 'item_id', 'name', 'qty_sold', 'item_price', 'total_price', 'tax', 'cost_price', 'profit'
    ];
}
