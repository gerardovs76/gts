<?php

namespace App\Exports;

use App\Matriculacion;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class ReporteCas implements FromView, ShouldAutoSize, WithDrawings
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

         return view('matricular.excel.reporteCas',[
            'matriculados' =>  Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', $this->curso)->where('matriculados.paralelo', $this->paralelo)->select('matriculados.nombres', 'inscripciones.convencional', 'inscripciones.movil', 'matriculados.apellidos', 'matriculados.cedula','matriculados.curso', 'matriculados.paralelo', 'inscripciones.representante', 'inscripciones.nombres_representante', 'inscripciones.email', 'inscripciones.cedrepresentante')->groupBy('matriculados.id')->get()

         ]);
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('images/lp.PNG'));
        $drawing->setWidth(90);
        $drawing->setCoordinates('A1');
        return $drawing;
    }


}


