<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriculacion extends Model
{

    protected $table = 'matriculados';
     protected $primaryKey = 'id';
    protected $fillable = [
        'inscripcion_id',
    	'cedula',
    	'nombres',
    	'apellidos',
    	'curso',
    	'especialidad',
    	'paralelo',
        'cedula_r',
        'razon_social',
        'direccion_factura',
        'telefono_factura',
        'codigo',
        'tipo_estudiante',
        'fecha_creacion'
    ];




public function inspecciones()
{
    return $this->hasMany('App\Inspecciones', 'matriculados_id');
}
}
