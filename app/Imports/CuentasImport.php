<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\Importable;
use App\Cuenta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


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
            'codigo' => $row[0],
            'codigo_padre' => $row[1],
            'nombre' => $row[2],
            'descripcion' => $row[3],
            'empresas_id' => $row[4],
            'tipocuentas_id' => $row[5],

        ]);
    }
}
