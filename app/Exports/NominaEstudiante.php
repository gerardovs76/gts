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

class NominaEstudiante implements FromView, ShouldAutoSize, WithEvents
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
         return view('notas.excel.reporte-nominaEstudiante',[
            'matriculados' =>  Matriculacion::where('curso', $this->curso)->where('paralelo', $this->paralelo)
            ->get()
         ]);
    }

     /*public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/ministerio.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        return $drawing;
    }*/
    public function registerEvents(): array
{
    return [
        AfterSheet::class    => function(AfterSheet $event) {
            $event->sheet->styleCells(
                'A1:B1:',
                [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
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
                'A11:B11',
                [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
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
            $event->sheet->getStyle('A1:B1')->getFill()
          ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
          ->getStartColor()->setRGB('FFFF000');

          $event->sheet->getStyle('A11:B11')->getFill()
          ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
          ->getStartColor()->setRGB('FFFF000');

          $event->sheet->getStyle('A2:A9')->getFill()
          ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
          ->getStartColor()->setRGB('ffffbf');

          $event->sheet->getStyle('B2:B9')->getFill()
          ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
          ->getStartColor()->setRGB('58C878');


          $event->sheet->styleCells(
            'A2:B64',
            [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'EB2B02'],
                    ],
                ],
            ]
            );

             },

        // AfterSheet::class => function(AfterSheet $event){
        //     $event->sheet->styleCells(
        //         'A11:B11',
        //         [
        //             'borders' =>[
        //                 'outline' => [
        //                     'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        //                     'color' => ['argb' => '000000'],

        //                 ],
        //             ],
        //             'font' => array(
        //                 'name' => 'Arial',
        //                 'size' => 12,
        //                 'bold' => true,
        //                 'color' => ['argb' => '000000'],
        //                 'backgroud' => ['argb' => 'EB2B02'],

        //             )
        //         ]
        //     );
        // },
    ];
}

}
