<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'created_date', 'last_modified_date', 'last_modified_by',
    ];
}
