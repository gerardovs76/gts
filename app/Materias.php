<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
	protected $table = 'materias';
	 protected $primaryKey = 'id';
	protected $fillable = [
		'materia',
		'curso',
		'especialidad',
		'paralelo',
		'tipo_materia'
	];



	public function cursos(){

		return $this->belongsToMany('App\Matriculacion', 'cursos_materias', 'matriculados_id', 'materias_id');

	}


	public function profesor(){

		return $this->belongsToMany('App\Profesor', 'materias_profesor');
	}
}
