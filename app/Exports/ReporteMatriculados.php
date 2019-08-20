<?php

namespace App\Exports;

use App\Matriculacion;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ReporteMatriculados implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function __construct($fecha, $fecha_hasta)
    {
        $this->fecha = $fecha;
        $this->fecha_hasta = $fecha_hasta;

    }
     public function view(): View 
    {
         return view('matricular.excel.reportesMatriculados',[
            'matriculados' =>  Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->whereBetween('matriculados.fecha_creacion', [$this->fecha, $this->fecha_hasta])->select('matriculados.cedula', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.curso', 'matriculados.especialidad', 'matriculados.paralelo', 'matriculados.cedula_r', 'matriculados.razon_social', 'matriculados.direccion_factura', 'matriculados.telefono_factura', 'matriculados.tipo_estudiante', 'matriculados.codigo', 'matriculados.fecha_creacion', 'inscripciones.email')->groupBy('matriculados.cedula_r')->get()

         ]);
    }
}
