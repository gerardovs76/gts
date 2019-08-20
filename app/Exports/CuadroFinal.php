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

class CuadroFinal implements FromView, ShouldAutoSize, WithEvents, WithDrawings
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
         return view('notas.excel.reporte-cuadroFinal',[
            'matriculados' =>  Matriculacion::where('curso', $this->curso)->where('paralelo', $this->paralelo)
            ->get()
         ]);
    }

     public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/ministerio.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
    public function registerEvents(): array
{
    return [
        AfterSheet::class    => function(AfterSheet $event) {
            $event->sheet->styleCells(
                'A1:E64:',
                [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12,
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

                    ],
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );

             $event->sheet->styleCells(
                'A9:E9:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );

             $event->sheet->styleCells(
                'A10:E64:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );

             $event->sheet->setCellValue('B65', 'Dra Doris Lara');
             $event->sheet->setCellValue('B66', 'RECTOR');
             $event->sheet->setCellValue('D65', 'Monserrath Ramirez');
             $event->sheet->setCellValue('D66', 'SECRETARIA');



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

             },
    ];
}

}
