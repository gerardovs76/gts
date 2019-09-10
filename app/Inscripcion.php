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
           'edad',
           'curso',
           'direccion_alumno',
           'sexo',
           'representante',
           'tipo_persona',
           'sector',
           'email',
           'profesion',
           'ocupacion',
           'cedrepresentante',
           'nombres_representante',
           'direccion_representante',
           'fn_representante',
           'movil',
           'convencional',
           'edad_representante',
           'cedula_padre',
           'apellidos_padre',
           'nombres_padre',
           'direccion_padre',
           'telefono_padre',
           'celular_padre',
           'correo_padre',
           'profesion_padre',
           'ocupacion_padre',
           'cedula_madre',
           'apellidos_madre',
           'nombres_madre',
           'direccion_madre',
           'telefono_madre',
           'celular_madre',
           'correo_madre',
           'profesion_madre',
           'ocupacion_madre',
           'codigo_nuevo',
           'tipo_estudiante',
           'fecha',
           'hora',
           'paralelo'
    ];

    public function matriculados(){
        return $this->belongsTo('App\Matriculacion');


    }


}

