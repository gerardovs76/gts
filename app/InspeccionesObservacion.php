<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspeccionesObservacion extends Model
{
    protected $table = 'inspecciones_observacion';
    protected $fillable = [
        'nombres',
        'curso',
        'paralelo',
        'especialidad',
        'parcial',
        'quimestre',
        'fecha',
        'estudiante',
        'observacion'
    ];
}
