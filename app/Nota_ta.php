<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_ta extends Model
{
    protected $table = 'notas_ta';
    protected $fillable = [
        'id_antiguo',
        'matriculados_id',
        'materias_id',
        'nota_ta',
        'numero_tarea_ta',
        'parcial',
        'quimestre',
        'autoridad_id',
        'descripcion'
    ];
}
