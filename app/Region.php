<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{   
    public function users()
	{
	    return $this->hasMany('App\User');
	}

    public $timestamps = false;
    protected $fillable = [
        'namer', 'created_at', 'updated_at  ', 'last_modified_by',
    ];
}
