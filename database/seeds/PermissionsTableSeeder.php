<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Permission::create ([

        	'name'			=>	'Navegar cuentas',
        	'slug'			=>	'cuentas.index',
        	'description'	=>	'Puede navegar entre la lista de cuentas',


        ]);

        Permission::create ([

        	'name'			=>	'Navegar en Tipos de cuentas',
        	'slug'			=>	'tipocuentas.index',
        	'description'	=>	'Puede navegar entre la lista de tipos de cuentas',


        ]);

        Permission::create ([

        	'name'			=>	'Navegar empresas',
        	'slug'			=>	'empresas.index',
        	'description'	=>	'Puede navegar entre la lista de empresas',


        ]);


        Permission::create ([

        	'name'			=>	'Navegar Informes',
        	'slug'			=>	'empresas.index2',
        	'description'	=>	'Puede navegar entre la lista de informes',


        ]);

        Permission::create([

            'name'          =>  'Crear',
            'slug'          =>  'create',
            'description'   =>  'Permite crear empresas o cuentas',


        ]);

        Permission::create ([

            'name'          =>  'Eliminar',
            'slug'          =>  'destroy',          
            'description'   =>  'Permite eliminar empresas o cuentas'       

        ]);

        Permission::create ([

            'name'          =>  'Editar',
            'slug'          =>  'edit',
            'description'   =>  'Permite editar empresas o cuentas'

        ]);


        
        

    }
}
