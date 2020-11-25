<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'license_key', 'store_name', 'store_address', 'region_id', 'cfc_id', 'nbo_id', 'created_at', 'updated_at', 'last_modified_by',
    ];
}
