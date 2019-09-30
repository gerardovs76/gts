<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table = 'notas';
    protected $fillable = [
    	'nota_ta',
        'nota_ti',
        'nota_tg',
        'nota_le',
        'nota_ev',
        'numero_conducta',
        'matriculados_id',
        'materias_id',
        'descripcion',
        'parcial',
        'numero_tarea',
        'quimestre',
        'conducta',
        'autoridad_id',
        'examen'
    ];

    public function matriculado(){
        return $this->hasOne('App\Matriculacion', 'id');
    }

}
