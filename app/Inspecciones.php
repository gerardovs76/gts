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
    	'c1',
    	'c2',
    	'c3',
    	'c4',
    	'c5',
    	'c6',
    	'c7',
    	'c8',
    	'suspencion',
    	'observacion',
    	'matriculados_id',
    ];
}
