<?php

namespace App\Imports;

use App\Materias;
use Maatwebsite\Excel\Concerns\ToModel;

class MateriasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Materias([
        'curso' => $row[0],
        'materia' => $row[1],
		'especialidad' => $row[2],
		'paralelo' => $row[3],
		'tipo_materia' => $row[4]
        ]);
    }
}
