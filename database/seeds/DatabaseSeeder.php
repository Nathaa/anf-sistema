<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  $this->call(UserSeeder::class);
        $this->call(TipocuentasSeeder::class);
    //    $this->call(EmpresasSeeder::class);
       // $this->call(PermissionsTableSeeder::class);

       // $this->call(RoleTableSeeder::class);
       // $this->call(PivotTableSeeder::class);

    }
}
