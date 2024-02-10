<?php

namespace App\Console\Commands;

use App\Models\Cliente;
use App\Models\Notificacion;
use Illuminate\Console\Command;

class HappyB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:happy-b';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fechaActual = date("Y-m-d");
        echo $fechaActual;
        $clientes = Cliente::whereRaw("DATE_FORMAT(fecha_nacimiento, '%m-%d') = DATE_FORMAT('$fechaActual', '%m-%d')")
                    ->get();
        foreach ($clientes as $cliente) {
            $notificacion = new Notificacion;
            $notificacion->id_nota = $cliente->id ;
            $notificacion->tipo ="Cumpleaños";
            $notificacion->descripcion =    "¡Feliz cumpleaños, " . $cliente->name . "! Hoy este cliente esta de cumpleaños, su numero de telefono es: ".$cliente->telefono ;
            $notificacion->save();
        }

        //
    }
}
