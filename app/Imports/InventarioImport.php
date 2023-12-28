<?php

namespace App\Imports;

use App\Models\Inventario;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class InventarioImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['disponibilidad'] === 0 ){
            $alquilado = $row['alquiler'];
        }
        else{
            $alquilado = null;
        }
        return new Inventario([
            'nombre' => $row['nombre'],
            'marca' => $row['marca'],
            'precio' => $row['precio'],
            'talla' => $row['talla'],
            'tipo' => $row['tipo'],
            'color' => $row['color'],
            'disponibilidad' => $row['disponibilidad'],
            'alquiler' => $alquilado,
        ]);
    }
    public function chunkSize(): int
    {
        return 1000;
    }
    public function batchSize(): int
    {
        return 1000;
    }
}
