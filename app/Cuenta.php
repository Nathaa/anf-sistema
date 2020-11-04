<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //
    protected $fillable = [
        'codigo','codigo_padre','nombre', 'descripcion','empresas_id', 'tipocuentas_id',

    ];

   

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }
    public function tipocuentas()
    {
        return $this->hasMany(Tipocuentas::class);
    }
}
