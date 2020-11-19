<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        //can create Sites. Regions, Users and upload data
        $role = new Role();
        $role->name = 'superadmin';
        $role->description = 'Super Admin';
        $role->save();

        //can create users
        $role = new Role();
        $role->name = 'compadmin';
        $role->description = 'Company Admin';
        $role->save();

        //read only access to dashboard and reports only
        $role = new Role();
        $role->name = 'user';
        $role->description = 'Site User';
        $role->save();
    }
}
