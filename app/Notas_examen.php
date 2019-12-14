<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_examen extends Model
{
    protected $table = 'notas_exq';
    protected $fillable = [
        'id_antiguo',
        'matriculado_id',
        'materias_id',
        'nota_exq',
        'numero_tarea_exq',
        'parcial',
        'quimestre',
        'autoridad_id',
    ];

    public function matriculado(){
        return $this->hasOne('App\Matriculacion', 'id');
    }

}
