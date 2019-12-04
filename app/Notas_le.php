<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_le extends Model
{
    protected $table = 'notas_le';
    protected $fillable = [
        'id_antiguo',
        'matriculado_id',
        'materias_id',
        'nota_le',
        'numero_tarea_le',
        'parcial',
        'quimestre',
        'autoridad_id',
        'descripcion'
    ];

    public function matriculado(){
        return $this->belongsTo('App\Matriculacion', 'id');
    }

}
