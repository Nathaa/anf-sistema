<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    //

    protected $fillable = [
        'nombre','monto','fecho_inicio','fecha_final',

    ];

}
