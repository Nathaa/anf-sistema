<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //
    protected $fillable = [
        'codigo','codigo_padre','nombre', 'descripcion',

    ];

    public function balances()
    {
        return $this->hasMany(Balance::class);
    }
    public function resultados()
    {
        return $this->hasMany(Resultado::class);
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }
    public function tipocuentas()
    {
        return $this->hasMany(Tipocuentas::class);
    }
}
