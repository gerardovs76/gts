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
    public function __construct($tipo_factura)
    {
        $this->tipo_factura = $tipo_factura;

    }
     public function view(): View
    {
         return view('cobros.excel.reporteTotal',[
            'matriculados' =>  Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'like', '%'.' '.$this->tipo_factura.'%')->select('matriculados.cedula_r', 'facturacion.codigo', 'facturacion.fecha_inicio', 'facturacion.num_referencia', 'facturacion.referencias', 'facturacion.nombres', 'facturacion.valor')->groupBy('matriculados.id')->get(),
            'fecha' => Carbon::now()


         ]);
    }
}
