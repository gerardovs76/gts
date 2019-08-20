<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareasIndividuales extends Model
{
    protected $table = 'tareas_individuales';
    protected $fillable = [
        'tarea_individual',
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
