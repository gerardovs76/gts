<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
	protected $fillable = [
    	'cedula',
    	'nombres',
    	'apellidos',
    	'fecha_nacimiento',
        'fn_representante',
    	'edad',
        'curso',
        'edad_representante',
        'curso',
    	'direccion_alumno',
    	'sexo',
    	'cedrepresentante',
    	'nombre_apellidos',
    	'parentesco',
    	'direccion_representante',
    	'movil',
    	'convencional',
        'representante',
        'tipo_persona',
        'sector',
        'email',
        'profesion',
        'ocupacion',
        'nombres_representante',
        'apellidos_representante',
        'direccion_representante',
        'cedula_padre',
        'apellidos_padre',
        'nombres_padre',
        'direccion_padre',
        'telefono_padre',
        'correo_padre',
        'profesion_padre',
        'ocupacion_padre',
        'cedula_madre',
        'apellidos_madre',
        'nombres_madre',
        'direccion_madre',
        'telefono_madre',
        'correo_madre',
        'profesion_madre',
        'ocupacion_madre',
        'codigo_nuevo',
        'tipo_estudiante'
    ];

    public function matriculados(){
        return $this->belongsTo('App\Matriculacion');


    }


}

