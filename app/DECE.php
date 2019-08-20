<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DECE extends Model
{
    protected $table = 'dece';
    protected $fillable = [
    	'cedula',
		'nombres',
		'apellidos',
		'fecha_nacimiento',
		'año_eg_bgu',
		'nombre_representante',
		'cedula_representante',
		'numero_telefono',
		'numero_movil',
		'presenta_tee',
		'nombres_profesional',
		'remitido_pro',
		'fecha_seguimiento',
		'descripcion_problema',
		'fecha',
		'accion_realizada',
		'sugerencias_observaciones',
		'responsable'
    ];
}
