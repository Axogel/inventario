<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = [
        'ID', 'nombre', 'marca', 'precio', 'talla', 'tipo', 'color', 'disponibilidad', 'alquiler',
    ];
    use HasFactory;

    public function ordenInventario() {
        $this->belongsToMany(ordenEntrega::class, 'orden_entregas_productos', 'product_id ', 'orden_id ' );
    }

}
