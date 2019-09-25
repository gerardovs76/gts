<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $table = 'facturacion';
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'codigo',
        'nombres',
        'valor',
        'num_referencia',
        'fecha_creacion',
        'referencias'
    ];

    public function matriculado()
    {
        return $this->hasOne('App\Matriculacion', 'codigo');
    }
}
