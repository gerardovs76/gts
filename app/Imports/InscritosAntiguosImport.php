<?php

namespace App\Imports;

use App\AntiguosInscritos;
use Maatwebsite\Excel\Concerns\ToModel;

class InscritosAntiguosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AntiguosInscritos([
            'codigo' => $row[0],
            'apellidos' => $row[1],
            'nombres' => $row[2],
            'curso' => $row[3],
            'paralelo' => $row[4],
            'nombres_representante' => $row[5],
            'cedula_representante' => $row[6],
            'email_representante' => $row[7],
        ]);
    }
}
