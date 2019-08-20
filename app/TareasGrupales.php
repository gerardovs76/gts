<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareasGrupales extends Model
{
    protected $table = 'tareas_grupales';
    protected $fillable = [
        'tarea_grupal',
        'parcial',
    	'descripcion',
        'matriculados_id',
        'materias_id',
        'numero_tarea'
    ];

    
    public function parcial1(){

    	return $this->belongsTo('App\Parcial1');


    }
}
