<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspecciones extends Model
{
    protected $fillable = [
    	'fecha',
    	'h1',
    	'h2',
    	'h3',
    	'h4',
    	'h5',
    	'h6',
    	'h7',
        'h8',
        'h9',
    	'suspencion',
    	'observacion',
        'matriculados_id',
        'parcial',
        'quimestre'
    ];

    public function matriculado()
    {
        return $this->hasOne('App\Matriculacion', 'id');
    }
}
