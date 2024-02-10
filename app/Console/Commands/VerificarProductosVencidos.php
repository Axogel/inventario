<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Inventario;
use App\Models\Notificacion;
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

            if (!$productosVencidos->isEmpty()) {  
                Notificacion::truncate();


                foreach ($productosVencidos as $item) {

                    $exist = Notificacion::where('id_nota', $item->codigo )->exists();

                    if (!$exist && $exist->tipo == "Alquiler") {
                        $notificacion = new Notificacion;
                        $notificacion->id_nota = $item->codigo ;
                        $notificacion->tipo ="Alquiler";
                        $notificacion->descripcion = $item->producto . " marca ". $item->marca . " de color ". $item->color;
                        $notificacion->save();
                    }

                }
            }
        $this->info('Verificación de productos vencidos completada.');
    }
}
