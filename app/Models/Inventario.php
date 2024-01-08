<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{    protected $primaryKey = 'codigo';

    protected $fillable = [
        'codigo', 'nombre', 'marca', 'precio', 'talla','almacen', 'tipo', 'color', 'disponibilidad', 'alquiler',
    ];
    use HasFactory;

    public function ordenInventario() {
        $this->belongsToMany(ordenEntrega::class, 'orden_entregas_productos', 'product_id ', 'orden_id ' );
    }

}
