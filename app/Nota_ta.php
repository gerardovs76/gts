<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_ta extends Model
{
    protected $table = 'notas_ta';
    protected $fillable = [
        'nota_ta1',
        'nota_ta2',
        'nota_ta3',
        'nota_ta4',
        'nota_ta5',
        'matriculado_id',
        'parcial',
        'autoridad_id',
        'quimestre',
        'descripcion_t1',
        'descripcion_t2',
        'descripcion_t3',
        'descripcion_t4',
        'descripcion_t5',
        'numero_tarea_ta1',
        'numero_tarea_ta2',
        'numero_tarea_ta3',
        'numero_tarea_ta4',
        'numero_tarea_ta5',
    ];

    public function matriculado(){
        return $this->belongsTo('App\Matriculacion', 'id');
    }
}
