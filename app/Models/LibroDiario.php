<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroDiario extends Model
{
    use HasFactory;

    protected $table = 'libro_diarios';

    protected $fillable = ['fecha', 'concepto', 'debe', 'haber', 'debeIdMayor', 'haberIdMayor'];

    protected $casts = [
        'debe' => 'array',
        'haber' => 'array',
        'debeIdMayor' => 'array',
        'haberIdMayor' => 'array',
    ];
    
    public function LibroMayor(){
        return $this->hasMany(LibroMayor::class);
    }
    public function HaberLibroMayor(){
        return $this->hasMany(LibroMayor::class);
    }
}
