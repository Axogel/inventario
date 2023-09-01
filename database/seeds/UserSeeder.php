<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_compadmin = Role::where('name', 'compadmin')->first();
        $role_superadmin = Role::where('name', 'superadmin')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->role_id = 1;
        $user->email = 'admin@example.com';
        $user->store_code = 'admin@example.com';
        $user->region_id = '1';
        $user->last_name = 'admin';
        $user->username = 'admin';
        $user->company_admin = 'company_admin';
        $user->profile_photo = '1608069288perfil-empresario-dibujos-animados_18591-58479.jpg';
        $user->password = bcrypt('1234');
        $user->role()->associate($role_superadmin);
        $user->save();  
    }
}
