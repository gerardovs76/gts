<?php

namespace App\Exports;

use App\Inscripcion;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class InscripcionesUsuariosE implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscripcion::select(DB::raw("CONCAT(apellidos,' ',nombres) as nombres"), 'cedula', 'email')->get();
    }
}
