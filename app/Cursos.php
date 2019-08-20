<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
    	'curso'
    ];


    public function matriculados(){

    	return $this->belongsToMany('App\Matriculacion', 'cursos_matriculados', 'cursos_id', 'matriculados_id');

    }
}
