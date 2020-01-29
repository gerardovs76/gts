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
use DB;
use App\Matriculacion;
use App\Materias;

class PrimerQuimestre implements  FromView, WithEvents, WithDrawings, ShouldAutoSize
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
         return view('notas.excel.reporte-primerQuimestre',[
            'materias' => Materias::where('curso', $this->curso)
            ->select('materia', 'id')
            ->where('paralelo', $this->paralelo)
            ->get()
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
                'A1:M64:',
                [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );

            $event->sheet->styleCells(
                'A6:D6:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
                        'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );

             $event->sheet->styleCells(
                'A9:M9:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );

             $event->sheet->styleCells(
                'A10:M64:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );
             $event->sheet->setCellValue('B67', 'Dra Doris Lara');
             $event->sheet->setCellValue('B68', 'RECTOR');
             $event->sheet->setCellValue('D67', 'Monserrath Ramirez');
             $event->sheet->setCellValue('D68', 'SECRETARIA');
             $event->sheet->getStyle("A9")->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('C9')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('D9')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('E9')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('F9')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('G9')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('H9')->getAlignment()->setTextRotation(90);
             $event->sheet->getColumnDimension('B')->setWidth(35)->setAutoSize(false);
             $event->sheet->getColumnDimension('C')->setWidth(5)->setAutoSize(false);
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
