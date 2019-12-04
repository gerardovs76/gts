<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_tg extends Model
{
    protected $table = 'notas_tg';
    protected $fillable = [
        'id_antiguo',
        'matriculado_id',
        'materias_id',
        'nota_tg',
        'numero_tarea_tg',
        'parcial',
        'quimestre',
        'autoridad_id',
        'descripcion'
    ];

    public function matriculado(){
        return $this->belongsTo('App\Matriculacion', 'id');
    }

}
