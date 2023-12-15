<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Inventario;
use Carbon\Carbon;

class VerificarProductosVencidos extends Command
{
    protected $signature = 'verificar:productos_vencidos';
    protected $description = 'Verificar productos vencidos y realizar acciones.';

    public function handle()
    {
        // Lógica para verificar productos vencidos
        $productosVencidos = Inventario::where('disponibilidad', 0)
            ->where('alquiler', '<=', Carbon::now()->subDays(3))
            ->get();

        dd($productosVencidos);
        $this->info('Verificación de productos vencidos completada.');
    }
}
