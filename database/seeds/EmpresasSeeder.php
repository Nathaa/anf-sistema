<?php

use App\Empresa;
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
            'nombre' => 'caess',
            'codigo' => '000A',
            'descripcion' => 'empresa de luz',
            'rubro' => 'industrial',


           ]);

           Empresa::create([
            'nombre' => 'American Park',
            'codigo' => '000B',
            'descripcion' => 'TEXTILERA',
            'rubro' => 'mercantil',


           ]);

           Empresa::create([
            'nombre' => 'Tropigaz',
            'codigo' => '000C',
            'descripcion' => 'ni idea',
            'rubro' => 'comercial',

            ]);
    }
}
