<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [[
            'name' =>  'superadmin',
            'description' => 'Super Admin',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' =>  'compadmin',
            'description' => 'Company Admin',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' =>  'user',
            'description' => 'Site User',
            'created_at' => now(),
            'updated_at' => now()
        ],
    ];
    Role::insert($roles);
    }
}
