<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
	protected $table = 'medico';
    protected $fillable = [
			'cedula',
			'fecha',
			'nombres_apellidos',
			'curso',
			'paralelo',
			'sexo',
			'grupo_sanguineo',
			'peso',
			'talla',
			'direccion_completa',
			'plan_vacunacion',
			'enfermedades_padece',
			'reaccion_alergica_alimentos',
			'reaccion_alergica_medicamentos',
			'reaccion_alergica_insectos',
			'reaccion_alergica_otros',
			'bajo_tratamiento',
			'p_padecio',
			'nombres_completos_1',
			'nombres_completos_2',
			'nombres_completos_3',
			'telef_fijo_1',
			'telef_fijo_2',
			'telef_fijo_3',
			'movil_1',
			'movil_2',
			'movil_3',
			'apellidos_nombres_madre',
			'apellidos_nombres_padre',
			'direccion_madre',
			'direccion_padre',
			'telefono_madre',
			'telefono_padre',
			'celular_madre',
			'celular_padre'
    ];
}
