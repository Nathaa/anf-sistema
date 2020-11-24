<?php

namespace App\Imports;

use App\Cuenta;
use Maatwebsite\Excel\Concerns\ToModel;

class CuentasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cuenta([
            //
            'codigo' => $row['codigo'],
            'codigo_padre' => $row['codigo_padre'],
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'empresas_id' => $row['empresas_id'],
            'tipocuentas_id' => $row['tipocuentas_id'],

        ]);
    }
}
