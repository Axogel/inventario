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
    //    $var = Inventario::all();
    //     dd($var);

        if($row['disponibilidad'] === 0 ){
            $alquilado = $row['alquiler'];
        }
        else{
            $alquilado = null;
        }
        if($row['disponibilidad'] == "disponible"){
            $disponibilidad = 1;
        }elseif($row['disponibilidad'] == "alquilado"){
            $disponibilidad = 0;

        }else {
            $disponibilidad = $row['disponibilidad'];
        }
        return new Inventario([
            'marca' => $row['marca'],
            'precio' => $row['precio'],
            'tipo' => $row['tipo'],

            'talla' => $row['talla'],
            'color' => $row['color'],
            'almacen' => $row['almacen'],
            'disponibilidad' => $disponibilidad,
            'alquiler' => $alquilado,
            'producto' => $row['producto'],

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
