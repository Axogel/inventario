<?php

namespace App\Exports;

use App\Models\Inventario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InventarioExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // dd(Inventario::select('color')->get() );
        return Inventario::select(
             'codigo', 'Producto', 'Marca', 'Precio', 'Talla', 'Tipo', 'Color', 'almacen', 'disponibilidad'
             )->get();
    }
    public function headings(): array
    {
        return [
            'Codigo', 'Producto', 'Marca', 'Precio', 'Talla', 'Tipo', 'Color', 'almacen', 'disponibilidad'
        ];
    }
    public function map($row): array
    {
        $row['disponibilidad'] = ($row['disponibilidad'] == 1) ? 'disponible' : (($row['disponibilidad'] == 2) ? 'vendido' : 'alquilado');

        return [
            $row['codigo'],
            $row['Producto'],
            $row['Marca'],
            $row['Precio'],
            $row['Talla'],
            $row['Tipo'],
            $row['Color'],
            $row['almacen'],
            $row['disponibilidad'],
        ];
    }
}
