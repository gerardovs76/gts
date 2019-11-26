<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_ev extends Model
{
    protected $table = 'notas_ev';
    protected $fillable = [
        'nota_ev1',
        'nota_ev2',
        'nota_ev3',
        'nota_ev4',
        'nota_ev5',
        'matriculado_id',
        'parcial',
        'autoridad_id',
        'quimestre',
        'descripcion_t1',
        'descripcion_t2',
        'descripcion_t3',
        'descripcion_t4',
        'descripcion_t5',
        'numero_tarea_ev1',
        'numero_tarea_ev2',
        'numero_tarea_ev3',
        'numero_tarea_ev4',
        'numero_tarea_ev5',
    ];

    public function matriculado(){
        return $this->hasOne('App\Matriculacion', 'id');
    }

}
