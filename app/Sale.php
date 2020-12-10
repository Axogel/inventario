<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'sid', 'dob', 'store_code', 'store_name', 'name', 'id_sale', 'net_sale', 'comp', 'promo', 'void', 'taxe', 'grs_sale'
    ];
}
