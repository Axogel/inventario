<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenEntrega extends Model
{
    use HasFactory;

    public function ordenInventario() {
        return $this->belongsToMany(Inventario::class, 'orden_entregas_productos', 'orden_id', 'product_id');
    }
}
