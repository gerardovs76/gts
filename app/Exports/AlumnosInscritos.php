<?php

namespace App\Exports;

use App\Inscripcion;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class AlumnosInscritos implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscripcion::select('cedula', 'nombres', 'apellidos', 'fecha_nacimiento', 'tipo_estudiante', 'edad', 'direccion_alumno', 'sexo', 'representante', 'tipo_persona', 'sector', 'email', 'profesion', 'ocupacion', 'cedrepresentante', 'nombres_representante', 'direccion_representante', 'fn_representante', 'movil', 'convencional', 'edad_representante', 'cedula_padre', 'apellidos_padre', 'nombres_padre', 'direccion_padre', 'telefono_padre', 'celular_padre', 'correo_padre', 'profesion_padre', 'ocupacion_padre', 'cedula_madre', 'apellidos_madre', 'nombres_madre', 'direccion_madre', 'telefono_madre', 'celular_madre', 'correo_madre', 'profesion_madre', 'ocupacion_madre')->get();
    }
}
