<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Matriculacion;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FacturacionPensionExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($tipo_factura, $fecha_inicio, $fecha_fin)
    {
        $this->tipo_factura = $tipo_factura;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;

    }
     public function view(): View 
    {
         return view('cobros.excel.reportePension',[
            'matriculados' =>  Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'NOT LIKE', '%SEP%')->whereBetween('facturacion.fecha_creacion', [$this->fecha_inicio, $this->fecha_fin])->select('matriculados.cedula_r', 'facturacion.codigo', 'facturacion.fecha_inicio', 'facturacion.num_referencia', 'facturacion.referencias', 'facturacion.nombres', 'facturacion.valor')->get(),
            'fecha' => Carbon::now()
            

         ]);
    }
}
