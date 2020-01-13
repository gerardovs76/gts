<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_conducta extends Model
{
    protected $table = 'notas_conducta';
    protected $fillable = [
        'matriculado_id',
        'faltas_i',
        'faltas_j',
        'conductas',
        'quimestre',
        'parcial'
    ];

    public function matriculado(){
        return $this->hasOne('App\Matriculacion', 'id');
    }

}
