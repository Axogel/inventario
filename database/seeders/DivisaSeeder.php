<?php

namespace Database\Seeders;

use App\Models\Divisa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisa = [
            [
                'name' => 'USD',
                'tasa' => 35.90
            ],
            [
                'name' => 'COP',
                'tasa' => 0.01
            ],
            [
                'name' => 'Bs',
                'tasa'=> 1
            ]
        ];
        Divisa::insert($divisa);   
     }
}
