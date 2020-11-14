<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

        	'name'	=> 'Administrador',
        	'email'	=>	'administrador@mail.com',
        	'password'	=> bcrypt('admin'),
            'empresa'   => '1',

        ]);

        User::create([

        	'name'	=> 'Analista',
        	'email'	=>	'analista@mail.com',
        	'password'	=> bcrypt('analista'),
            'empresa'   =>  '1',

        ]);

        User::create([

            'name'  => 'Administrador2',
            'email' =>  'administrador2@mail.com',
            'password'  => bcrypt('admin'),
            'empresa'   => '3',

        ]);

        User::create([

            'name'  => 'Analista2',
            'email' =>  'analista2@mail.com',
            'password'  => bcrypt('analista'),
            'empresa'   =>  '3',

        ]);


    }
}
