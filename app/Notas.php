<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table = 'notas';
    protected $fillable = [
    	'nota_ta',
        'nota_ti',
        'nota_tg',
        'nota_le',
        'nota_ev',
        'matriculados_id',
        'materias_id',
        'descripcion',
        'parcial',
        'numero_tarea',
        'quimestre'
    ];

}
