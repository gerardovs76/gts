<?php

namespace App\Exports;

use App\Inscripcion;
use Maatwebsite\Excel\Concerns\FromCollection;

class InscritosAntiguos implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($fecha, $fecha_hasta)
    {
    	$this->fecha = $fecha;
    	$this->fecha_hasta = $fecha_hasta;
    }

    public function collection()
    {
        return Inscripcion::select('cedula','nombres', 'apellidos', 'curso','paralelo','tipo_estudiante', 'nombres_representante', 'cedrepresentante', 'direccion_representante', 'movil', 'codigo_nuevo', 'fecha_creacion')->whereBetween('fecha_creacion', array($this->fecha, $this->fecha_hasta))->where('tipo_estudiante', 'ANTIGUO')->get();
    }
}
