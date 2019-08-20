<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcial3 extends Model
{
    protected $table = 'p_3';
    protected $fillable = [
       'tareas_academicas',
       'tareas_grupales',
       'trabajos_individuales',
       'leccion',
       'evaluacion',
       'promedio',
       'comportamiento'
    ];
}
