<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturacionArchivos extends Model
{
    protected $table = 'facturacion_archivos';
    protected $fillable = [
        'id',
        'archivos'
    ];
}
