<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroDiario extends Model
{
    use HasFactory;
    public function LibroMayor(){
        return $this->hasMany(LibroMayor::class);
    }
    public function HaberLibroMayor(){
        return $this->hasMany(LibroMayor::class);
    }
}
