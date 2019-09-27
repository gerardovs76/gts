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
        public function matriculado()
        {
            return $this->belongsTo('App\Matriculacion', 'curso', 'curso');
        }
}
