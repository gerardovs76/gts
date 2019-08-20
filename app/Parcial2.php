<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcial2 extends Model
{
    protected $table = 'p_2';
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
