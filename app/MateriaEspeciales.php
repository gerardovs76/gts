<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaEspeciales extends Model
{
     protected $table = 'materias_especiales';
	 protected $primaryKey = 'id';
	 protected $fillable = [
		'materia',
		'curso',
		'especialidad',
		'paralelo'
	];
}
