<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_conducta extends Model
{
    protected $table = 'notas_conducta';
    protected $fillable = [
        'id_antiguo',
        'matriculado_id',
        'materias_id',
        'nota_conducta',
        'numero_tarea_conducta',
        'parcial',
        'quimestre',
        'autoridad_id',
        'descripcion'
    ];

    public function matriculado(){
        return $this->hasOne('App\Matriculacion', 'id');
    }

}
