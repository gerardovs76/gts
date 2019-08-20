<?php

namespace App\Imports;

use App\Inscripcion;
use Maatwebsite\Excel\Concerns\ToModel;

class InscripcionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inscripcion([
            'cedula' => $row[0],
            'nombres' => $row[1],
            'apellidos' => $row[2],
            'fecha_nacimiento' => $row[3],
            'edad' => $row[4],
            'curso' => $row[5],
            'colegio_proveniente' => $row[6],
            'direccion_alumno' => $row[7],
            'sexo' => $row[8],
            'representante' => $row[9],
            'tipo_persona' => $row[10],
            'sector' => $row[11],
            'email' => $row[12],
            'profesion' => $row[13],
            'ocupacion' => $row[14],
            'cedrepresentante' => $row[15],
            'nombres_representante' => $row[16],
            'direccion_representante' => $row[17],
            'fn_representante' => $row[18],
            'movil' => $row[19],
            'convencional' => $row[20],
            'edad_representante' => $row[21],
            'observacion' => $row[22],
            'cedula_padre' => $row[23],
            'apellidos_padre' => $row[24],
            'nombres_padre' => $row[25],
            'direccion_padre' => $row[26],
            'telefono_padre' => $row[27],
            'celular_padre' => $row[28],
            'correo_padre' => $row[29],
            'profesion_padre' => $row[30],
            'ocupacion_padre' => $row[31],
            'cedula_madre' => $row[32],
            'apellidos_madre' => $row[33],
            'nombres_madre' => $row[34],
            'direccion_madre' => $row[35],
            'telefono_madre' => $row[36],
            'celular_madre' => $row[37],
            'correo_madre' => $row[38],
            'profesion_madre' => $row[39],
            'ocupacion_madre' => $row[40],
            'codigo' => $row[41],
            
        ]); 
    }
}
