<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecciones extends Model
{
    protected $table = 'lecciones';
    protected $fillable = [
        'leccion',
        'parcial',
    	'descripcion',
        'matriculados_id',
        'materias_id',
        'numero_tarea'
    ];



    public function parcial1(){

    	return $this->belongsTo('App\Parcial1');

    }
}
