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
           'sep' => Matriculacion::with('facturaciones')->where('curso', $this->curso)->where('paralelo', $this->paralelo)->orderBy('nombres')->get(),
           'totalNomina' => Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', $this->curso)->where('matriculados.paralelo', $this->paralelo)->select(DB::raw("SUM(facturacion.valor) as valor_final"))->distinct()->get(),
           'conteo' => '1'

         ]);
    }
}
