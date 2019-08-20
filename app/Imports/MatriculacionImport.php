<?php

namespace App\Imports;

use App\Matriculacion;
use Maatwebsite\Excel\Concerns\ToModel;

class MatriculacionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
     
        return new Matriculacion([
            'cedula' => $row[0],
            'nombres' => $row[1],
            'apellidos' => $row[2],
            'curso' => $row[3],
            'paralelo' => $row[4] ? $row[4] : 'C',
            'especialidad' => 'ASIGNAR',
            'tipo_estudiante' => $row[5],
            'razon_social' => $row[6],
            'cedula_r' => $row[7],
            'direccion_factura' => $row[8],
            'telefono_factura' => $row[9],
            'codigo' => $row[10],
            'fecha_creacion' => $row[11],
           
        ]);
    }
}
