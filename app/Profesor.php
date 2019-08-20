<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
		protected $table = 'profesors';
		 protected $primaryKey = 'id';
	   	protected $fillable = [
			'cedula',
			'nombres_apellidos',
			'direccion',
			'fecha_nacimiento',
			'correo',
			'movil',
			'convencional',
			'perfil_docente',
			'ultimo_trabajo',
			'tipo_contrato',
			'cargo'	
	];

	public function cursos(){

		return $this->belongsToMany('App\Cursos');
	}

	public function materias(){

		return $this->belongsToMany('App\Materias', 'materias_profesor');
	}
    
}
