<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remediales extends Model
{
    protected $table = 'remediales';
    protected $fillable = [
    	'matriculados_id',
    	'materias_id',
    	'nota_remedial',
    	'promedio_supletorio',
    	'parcial',
    	'quimestre',
	];
	
	public function matriculado()
	{
		return $this->hasOne('App\Matriculacion', 'id');
	}
}
