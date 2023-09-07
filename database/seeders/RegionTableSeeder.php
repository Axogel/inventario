<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $region = [
        [
            'name' => 'United States',
            'last_modified_by'=> '1',
            'created_at' => now(),
            'updated_at' => now()
        ],
    ];
    Region::insert($region);
    }
}
