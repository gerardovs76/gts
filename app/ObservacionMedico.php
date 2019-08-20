<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObservacionMedico extends Model
{
    protected $table = 'medico_observacion';
    protected $fillable = [
    	'matriculados_id',
    	'fecha',
    	'diagnostico',
    	'medicamentos',
    	'observacion'

    ];
}
