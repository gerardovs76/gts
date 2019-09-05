<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abanderados extends Model
{
    protected $table = 'abanderados';
    protected $fillable = [
        'matriculados_id',
        'basica_2',
        'basica_3',
        'basica_4',
        'basica_5',
        'basica_6',
        'basica_7',
        'basica_8',
        'basica_9',
        'basica_10',
        'bachillerato_1',
        'bachillerato_2',
        'promedio_final'
    ];
}
