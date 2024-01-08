<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroMayor extends Model
{
    use HasFactory;
    public function LibroDiario(){
        return $this->hasMany(LibroDiario::class);
    }
}
