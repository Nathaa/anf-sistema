<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([

        	'name'			=>	'Admin',
        	'slug'			=>	'admin',
        	'description'	=>	'Rol de acceso total',
        	'special'		=>	'all-access'

        ]);

    }
}
