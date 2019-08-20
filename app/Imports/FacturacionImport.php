<?php

namespace App\Imports;

use App\Facturacion;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

class FacturacionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   

      $refe = preg_replace('/\s\s+/', ' ', $row[33]);
      $refe2 = str_replace(' MAT PEN SERV', '', $refe);
      $fecha = str_replace(' ', '/', $row[2]);
      $fecha2 = str_replace(' ', '/', $row[3]);
     
        return new Facturacion([
            'fecha_inicio' => $fecha,
            'fecha_fin' => $fecha2,
            'codigo' => $row[4],
            'nombres' => $row[7],
            'valor' => $row[8],
            'referencias' => $refe2,
            'num_referencia' => $row[41],
            'fecha_creacion' =>  Carbon::now()->format('Y-m-d')
        ]);
    }
}
