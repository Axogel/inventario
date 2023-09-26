<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function setDobAttribute($value)
    {
        // Transforma la fecha de nacimiento al formato 'YYYYMMDD' antes de guardarla en la base de datos.
        $this->attributes['dob'] = date('Ymd', strtotime($value));
    }
}
