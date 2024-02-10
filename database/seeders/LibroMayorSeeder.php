<?php

namespace Database\Seeders;

use App\Models\LibroMayor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class LibroMayorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fecha = Carbon::now()->format('Y-m-d');;

        $libros = [
            [
                'cuenta' => 'Ingresos',
                'ultimo_saldo' => $fecha,
                'saldo_inicial' => 0,
                'icon' => 'fa fa-line-chart',
                'tipo' => 'ingreso',
                'saldo' => 0,

            ],
            [
                'cuenta' => 'Cuentas por cobrar',
                'ultimo_saldo' => $fecha,
                'saldo_inicial' => 0,
                'icon' => 'fa fa-line-chart',
                'tipo'=> 'ingreso',
                'saldo' => 0,

            ],
            
        ];
        LibroMayor::insert($libros);   
     }
}
