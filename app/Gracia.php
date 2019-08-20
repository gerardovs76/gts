<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gracia extends Model
{
    protected $table = 'gracias';
    protected $fillable = [
    	'matriculados_id',
    	'materias_id',
    	'nota_gracia',
    	'promedio_remedial',
    	'parcial',
    	'quimestre'
    ];

}
