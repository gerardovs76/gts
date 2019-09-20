<?php

namespace App\Imports;

use App\Inscripcion;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

class InscripcionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = Carbon::now();
        return new Inscripcion([
           'cedula' => $row[0],
           'nombres' => $row[1],
           'apellidos' => $row[2],
           'fecha_nacimiento' => $row[3],
           'edad' => $row[4],
           'curso' => $row[5],
           'direccion_alumno' => $row[6],
           'sexo' => $row[7],
           'representante' => $row[8],
           'tipo_persona' => $row[9],
           'sector' => $row[10],
           'email' => $row[11],
           'profesion' => $row[12],
           'ocupacion' => $row[13],
           'cedrepresentante' => $row[14],
           'nombres_representante' => $row[15],
           'direccion_representante' => $row[16],
           'fn_representante' => $row[17],
           'movil' => $row[18],
           'convencional' => $row[19],
           'edad_representante' => $row[20],
           'cedula_padre' => $row[21],
           'apellidos_padre' => $row[22],
           'nombres_padre' => $row[23],
           'direccion_padre' => $row[24],
           'telefono_padre' => $row[25],
           'celular_padre' => $row[26],
           'correo_padre' => $row[27],
           'profesion_padre' => $row[28],
           'ocupacion_padre' => $row[29],
           'cedula_madre' => $row[30],
           'apellidos_madre' => $row[31],
           'nombres_madre' => $row[32],
           'direccion_madre' => $row[33],
           'telefono_madre' => $row[34],
           'celular_madre' => $row[35],
           'correo_madre' => $row[36],
           'profesion_madre' => $row[37],
           'ocupacion_madre' => $row[38],
           'codigo_nuevo' => $row[39],
           'tipo_estudiante' => $row[40],
           'fecha' => $row[41],
           'hora' => $row[42],
           'fecha_creacion' => $date->format('Y-m-d'),
           'paralelo' => $row[43]
        ]);
    }
}
