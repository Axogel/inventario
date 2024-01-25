<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroMayor extends Model
{
    use HasFactory;

    protected $table = 'libro_mayors';

    protected $fillable = ['ultimo_saldo', 'saldo_inicial', 'saldo', 'cuenta', 'icon'];

    public function LibroDiario(){
        return $this->hasMany(LibroDiario::class);
    }
}
