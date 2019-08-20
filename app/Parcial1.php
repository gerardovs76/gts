<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcial1 extends Model
{
   	protected $table = 'p_1';
    protected $fillable = [
      'matriculados_id',
       'evaluacion',
       'comportamiento'
    ];
    public function trabajo_academico(){

      return $this->hasMany('App\TrabajosAcademicos');
    }


    public function tarea_individual(){

      return $this->hasMany('App\TareaIndividual');
    }
    public function tarea_grupal(){

      return $this->hasMany('App\TareasGrupales');
    }
    public function leccion(){

      return $this->hasMany('App\Lecciones');

    }

}
