<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Matriculacion;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class ReporteTotalCobrosAlumnos implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($curso, $paralelo)
    {
        $this->curso = $curso;
        $this->paralelo = $paralelo;
    }
    public function view(): View
    {
         return view('matricular.excel.reporte-total-cobros',[
           'sep' => Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'LIKE', '%'.'SEP'.'%')->where('matriculados.curso', $this->curso)->where('matriculados.paralelo', $this->paralelo)->select('matriculados.cedula', 'facturacion.codigo', 'facturacion.fecha_inicio', 'facturacion.num_referencia', 'facturacion.referencias', 'facturacion.nombres', 'facturacion.valor', 'matriculados.curso', 'matriculados.paralelo')->orderBy('matriculados.apellidos')->distinct()->get(),
           'totalNomina' => Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'LIKE', '%'.'SEP'.'%')->where('matriculados.curso', $this->curso)->where('matriculados.paralelo', $this->paralelo)->select(DB::raw("SUM(facturacion.valor) as valor_final"))->distinct()->get(),
           'conteo' => '1'

         ]);
    }
}
