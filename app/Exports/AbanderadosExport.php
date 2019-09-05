<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use PHPExcel_Worksheet_PageSetup;
use DB;
use App\Matriculacion;

class AbanderadosExport implements  FromView, WithDrawings, WithEvents
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
         return view('notas.excel.reporte-abanderados',[
            'abanderados' => Matriculacion::join('abanderados', 'matriculados.id', '=', 'abanderados.matriculados_id')->where('matriculados.curso', $this->curso)->where('matriculados.paralelo', $this->paralelo)->select('matriculados.cedula', 'matriculados.nombres', 'matriculados.apellidos', 'abanderados.basica_2', 'abanderados.basica_3', 'abanderados.basica_4', 'abanderados.basica_5', 'abanderados.basica_6', 'abanderados.basica_7', 'abanderados.basica_8', 'abanderados.basica_9', 'abanderados.basica_10', 'abanderados.bachillerato_1', 'abanderados.bachillerato_2', 'abanderados.promedio_final')->get()
         ]);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/logo-ministerio.png'));
        $drawing->setHeight(50);
        $drawing->setWidth(80);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
    public function registerEvents(): array
{
    return [
        AfterSheet::class    => function(AfterSheet $event) {

            $event->sheet->styleCells(
                'A1:O64:',
                [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => '000000'],
                    )
                ]
            );
            $event->sheet->styleCells(
                'A6:D6:',
                    [
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => '000000'],
                    )
                ]
            );
             $event->sheet->styleCells(
                'A11:O64:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => '000000'],
                    )
                ]
            );
            $event->sheet->styleCells(
                'C1',
                [
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  12,
                        'bold'      =>  true,
                        'color' => ['argb' => '000000'],
                    )
                ]
            );
            $event->sheet->setCellValue('A5', 'AÑO LECTIVO:');
            $event->sheet->setCellValue('D5', 'PERIODO:');
            $event->sheet->setCellValue('H5', 'REGIMEN:');
            $event->sheet->setCellValue('D7', 'CODIGO AIME:');
            $event->sheet->setCellValue('H7', 'ZONA:');
            $event->sheet->setCellValue('L7', 'DISTRITO:');
            $event->sheet->setCellValue('D9', 'ESPECIALIDAD:');
            $event->sheet->setCellValue('H9', 'PARALELO:');
            $event->sheet->setCellValue('L9', 'FECHA:');
            $event->sheet->setCellValue('A7', 'INSTITUCIÓN EDUCATIVA:');
            $event->sheet->setCellValue('A9', 'TIPO DE BACHILLERATO:');

            $event->sheet->setCellValue('C3', '                                                                                      FICHA DE REGISTRO DE CALIFICACIONES PARA ABANDERADOS');
            $event->sheet->setCellValue('C1', 'SUBSECRETARIA DE APOYO, SEGUIMIENTO Y REGULACIÓN DE LA EDUCACIÓN');
            $event->sheet->setCellValue('D2', 'Dirección Nacional de Regulación de la Educación');
            $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $event->sheet->getColumnDimension('A')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('B')->setWidth(15)->setAutoSize(false);
             $event->sheet->getColumnDimension('C')->setWidth(30)->setAutoSize(false);
             $event->sheet->getColumnDimension('D')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('E')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('F')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('H')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('I')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('J')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('G')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('K')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('L')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('M')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('N')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('O')->setWidth(10)->setAutoSize(false);

             $event->sheet->styleCells(
                'B65:B66',
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]
            );
              $event->sheet->styleCells(
                'D65:D66',
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]
            );
              $event->sheet->styleCells(
                'B9',
                [
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]
            );

             },
    ];
}

}
