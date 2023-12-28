<?php

namespace App\Exports;

use App\Models\Inventario;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlquiladoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inventario::where('disponibilidad', 0)
        ->select('ID', 'Nombre', 'Marca', 'Precio', 'Talla', 'Tipo', 'Color')
        ->get();   
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
        ];
    }
}
