<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrabajosAcademicos extends Model
{
	protected $table = 'trabajos_academicos';
    protected $fillable = [
        'trabajo_academico',
        'parcial',
    	'descripcion',
        'matriculados_id',
        'materias_id',
        'numero_tarea'
    ];


    public function parcial1(){

    	return $this->belongsTo('App\Parcial1');


    }
    public function matriculados(){

        return $this->belongsToMany('App\Matriculacion', 'matriculados_tacademicos', 'matriculados_id', 'tacademicos_id');

    }
}
