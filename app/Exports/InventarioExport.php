<?php

namespace App\Exports;

use App\Models\Inventario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class InventarioExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // dd(Inventario::select('color')->get() );
        return Inventario::select( 'ID',
        'Nombre',
        'Marca',
        'Precio',
        'Talla',
        'Tipo',
        'Color',
        'Disponibilidad')->get();
    }
    public function headings(): array
    {
        // Retorna los nombres de las columnas como encabezados
        return [
            'ID',
            'Nombre',
            'Marca',
            'Precio',
            'Talla',
            'Tipo',
            'Color',
            'Disponibilidad',
        ];
    }
}
