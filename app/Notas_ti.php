<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_ti extends Model
{
    protected $table = 'notas_ti';
    protected $fillable = [
        'id_antiguo',
        'matriculados_id',
        'materias_id',
        'nota_ti',
        'numero_tarea_ti',
        'parcial',
        'quimestre',
        'autoridad_id',
        'descripcion'
    ];
}
