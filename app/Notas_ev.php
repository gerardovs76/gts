<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_ev extends Model
{
    protected $table = 'notas_ev';
    protected $fillable = [
        'id_antiguo',
        'matriculados_id',
        'materias_id',
        'nota_ev',
        'numero_tarea_Ev',
        'parcial',
        'quimestre',
        'autoridad_id',
        'descripcion'
    ];

}
