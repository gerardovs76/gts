<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntiguosInscritos extends Model
{
	protected $table = 'antiguo_inscritos';
    protected $fillable = [
    	'codigo',
    	'apellidos',
    	'nombres',
    	'curso',
    	'paralelo',
    	'nombres_representante',
    	'cedula_representante',
    	'email_representante'
    ];
}
