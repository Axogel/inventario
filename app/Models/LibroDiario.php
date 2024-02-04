<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fecha;
use App\Models\LibroMayor;

class LibroDiario extends Model
{
    use HasFactory;

    protected $table = 'libro_diarios';

    protected $fillable = ['fecha', 'fecha_id', 'concepto', 'debe', 'haber', 'debeIdMayor', 'haberIdMayor'];

    protected $casts = [
        'debe' => 'array',
        'haber' => 'array',
        'debeIdMayor' => 'array',
        'haberIdMayor' => 'array',
    ];
    
    public function debe()
    {
        $debeIdMayor = json_decode($this->attributes['debeIdMayor'])[0] ?? null;
    
        return $this->belongsTo(LibroMayor::class, 'debeIdMayor')->withDefault([
            'id' => null,
        ])->where('id', '=', $debeIdMayor);
    }

   
  
    public function libro() 
    {
        return $this->belongsTo(Fecha::class);
    }
}
