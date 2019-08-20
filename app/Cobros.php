<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobros extends Model
{

	protected $fillable = [
		'curso',
		'especialidad',
		'paralelo',
		'fecha_inicio',
		'fecha_fin',
		'matricula',
		'pension',
		'seguro',
		'lunch',
		'varios',
		'detalle_varios',
		'total',
		'tipo_estudiante'
	];

    

public function matriculados()
{
    return $this->hasMany('App\Matriculacion', 'curso');
}


}
