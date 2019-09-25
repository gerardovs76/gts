<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supletorios extends Model
{
    protected $table = 'supletorios';
    protected $fillable = [
    	'promedio_notas',
    	'nota_supletorio',
    	'matriculados_id',
    	'quimestre',
    	'parcial',
    	'materias_id'
	];
	
	public function matriculado()
	{
		return $this->hasOne('App\Matriculacion', 'id');
	}
}
