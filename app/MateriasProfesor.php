<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriasProfesor extends Model
{
    protected  $table = 'materias_profesores';
    protected $fillable = [
        'id',
    	'profesores_id',
    	'materias_id'
    ];
}
