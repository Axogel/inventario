<?php

namespace App\Exports;

use App\Models\Inventario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class disponibleExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inventario::where('disponibilidad', 1)
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
