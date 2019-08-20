<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;
use App\Matriculacion;

class ReportesClientes implements FromView, WithColumnFormatting, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function __construct($fecha, $tipo_estudiante, $fecha_hasta)
    {
        $this->fecha = $fecha;
        $this->fecha_hasta = $fecha_hasta;
        $this->tipo_estudiante = $tipo_estudiante;  

    }
    public function view(): View 
    {
    	
        return view('reporte-excel-matriculados',[
            'matriculados' =>  Matriculacion::join('cobros', 'matriculados.curso', '=', 'cobros.curso')->whereBetween('matriculados.fecha_creacion', [$this->fecha, $this->fecha_hasta])->where('cobros.tipo_estudiante', $this->tipo_estudiante)->where('matriculados.tipo_estudiante', $this->tipo_estudiante)->select('matriculados.codigo as codigo', 'cobros.total as total', 'matriculados.cedula as cedula', 'matriculados.nombres as nombres', 'matriculados.apellidos as apellidos', 'matriculados.curso as curso', 'matriculados.paralelo as paralelo', 'cobros.pension as pension')->groupBy('matriculados.id')->get()

         ]);
       

    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_NUMBER,
        ];
    }

  /*  public function headings(): array
    {
        return [
            'CO= COBROS SIEMPRE',
            'CODIGO CON EL CUAL EL CLIENTE SE ACERCARÁ A PAGAR',
            'MONEDA',
            'VALOR',
            'SERVICIO',
            '',
            '',
            'REFERENCIA',
            '',
            'RUC EMPRESA',
            'NOMBRE',
            'CODIGO BANCO',
        ];
    }*/
}
