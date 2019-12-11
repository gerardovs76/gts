<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_tg extends Model
{
    protected $table = 'notas_tg';
    protected $fillable = [
        'nota_tg1',
        'nota_tg2',
        'nota_tg3',
        'nota_tg4',
        'nota_tg5',
        'matriculado_id',
        'parcial',
        'autoridad_id',
        'quimestre',
        'descripcion_t1',
        'descripcion_t2',
        'descripcion_t3',
        'descripcion_t4',
        'descripcion_t5',
        'numero_tarea_tg1',
        'numero_tarea_tg2',
        'numero_tarea_tg3',
        'numero_tarea_tg4',
        'numero_tarea_tg5',
    ];

    public function matriculado(){
        return $this->belongsTo('App\Matriculacion', 'id');
    }

}
