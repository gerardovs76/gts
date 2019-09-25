<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recuperacion extends Model
{
    protected $table = 'recuperacion';
    protected $fillable = [
        'matriculados_id',
      'nota_recuperacion',
      'promedio_notas',
      'quimestre',
      'parcial',
      'materias_id'
    ];

    public function matriculado()
    {
      return $this->hasOne('App\Matriculacion', 'id');
    }
}
