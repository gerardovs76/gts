<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_ti extends Model
{
    protected $table = 'notas_ti';
    protected $fillable = [
       'nota_ti1',
       'nota_ti2',
       'nota_ti3',
       'nota_ti4',
       'nota_ti5',
       'matriculado_id',
       'parcial',
       'autoridad_id',
       'quimestre',
       'descripcion_t1',
       'descripcion_t2',
       'descripcion_t3',
       'descripcion_t4',
       'descripcion_t5',
       'numero_tarea_ti1',
       'numero_tarea_ti2',
       'numero_tarea_ti3',
       'numero_tarea_ti4',
       'numero_tarea_ti5',
    ];

    public function matriculado(){
        return $this->hasOne('App\Matriculacion', 'id');
    }
}
