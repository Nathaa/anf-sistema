<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratio extends Model
{
    //

    protected $fillable = [
        'nombre','monto','fecha_ini', 'fecha_fin','empresa',
        
            ];
}
