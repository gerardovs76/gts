<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_le extends Model
{
    protected $table = 'notas_le';
    protected $fillable = [
        'nota_le1',
        'nota_le2',
        'nota_le3',
        'nota_le4',
        'nota_le5',
        'matriculado_id',
        'parcial',
        'autoridad_id',
        'quimestre',
        'descripcion_t1',
        'descripcion_t2',
        'descripcion_t3',
        'descripcion_t4',
        'descripcion_t5',
        'numero_tarea_le1',
        'numero_tarea_le2',
        'numero_tarea_le3',
        'numero_tarea_le4',
        'numero_tarea_le5',
    ];

    public function matriculado(){
        return $this->belongsTo('App\Matriculacion', 'id');
    }

}
