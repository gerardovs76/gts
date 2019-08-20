<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Matriculacion;

class FacturacionTotalExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($fecha_inicio, $fecha_hasta)
    {
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_hasta = $fecha_hasta;

    }
     public function view(): View 
    {
         return view('cobros.excel.reporteTotal',[
            'matriculados' =>  Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->whereBetween('facturacion.fecha_creacion', array($this->fecha_inicio, $this->fecha_hasta))->select('matriculados.cedula', 'facturacion.codigo', 'facturacion.fecha_inicio', 'facturacion.num_referencia', 'facturacion.referencias', 'facturacion.nombres', 'facturacion.valor')->get(),
            'fecha' => Carbon::now()
            

         ]);
    }
}
