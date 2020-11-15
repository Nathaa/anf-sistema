<?php

use App\Empresa;
use App\User;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Empresa::create([
            'nombre' => 'Caess',
            'codigo' => '000A',
            'descripcion' => 'Empresa A',
            'rubro' => 'industrial',
            'user_id' => '1'


           ]);

           Empresa::create([
            'nombre' => 'American Park',
            'codigo' => '000B',
            'descripcion' => 'TEXTILERA',
            'rubro' => 'mercantil',
            'user_id' => '3'


           ]);
/*
           Empresa::create([
            'nombre' => 'Tropigaz',
            'codigo' => '000C',
            'descripcion' => 'ni idea',
            'rubro' => 'comercial',
            'user_id' => '3'

            ]);
    */
    }
}
