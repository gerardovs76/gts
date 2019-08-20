<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Incripcion;
use Illuminate\Support\Carbon;
use App\Matriculacion;
use App\TrabajosAcademicos;
use App\Profesor;

class AutocompleteController extends Controller
{ 
	
    public function a(){
    /*$a = Matriculacion::find(3);
    $a->tacademicos()->attach(1);
    return response()->json($a);*/

    $matriculados = DB::table('matriculados')->join('trabajos_academicos', 'matriculados.id', '=', 'trabajos_academicos.id')->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"), 'trabajos_academicos.trabajo_academico as nota', 'trabajos_academicos.descripcion as descripcion')->where('matriculados.id', '3')->where('trabajos_academicos.id', '1')->get();
    return response()->json($matriculados);
    }    
   public function b(){
  $b = DB::table('matriculados')->join('trabajos_academicos', 'matriculados.id', '=', 'trabajos_academicos.id')->select('*')->get();
  dd($b);
}
   public function c(){
   $matriculados = DB::table('matriculados')->join('cursos', 'matriculados.curso', '=', 'cursos.curso')->select('matriculados.nombres', 'matriculados.apellidos')->where('cursos.curso', 'INICIAL 2')->get();
   return response()->json($matriculados);
   }
   public function d(){
   $reportes = DB::table('inscripciones')
        ->join('matriculados', 'inscripciones.id', '=', 'matriculados.inscripcion_id')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"), 'matriculados.razon_social as razon social', 'matriculados.cedula_ruc as ruc', 'matriculados.direccion_factura as direccion', 'matriculados.telefono_factura as telefono', 'inscripciones.movil as celular', 'inscripciones.email as correo', 'inscripciones.tipo_persona');
   }
   public function e(Request $request, $idalumno, $nparcial, $idmateria){
        $idalumno = $request->idalumno;
        $idmateria = $request->idmateria;
        $nparcial = $request->nparcial;

          $ta = DB::table('trabajos_academicos')
          ->join('materias', 'trabajos_academicos.materias_id', '=', 'materias.id')
          ->select('trabajos_academicos.trabajo_academico as ta')
          ->where('trabajos_academicos.parcial', 'LIKE', '%'.$nparcial.'%')
          ->where('materias.id', 'LIKE', '%'.$idmateria.'%')
          ->distinct();

          $matriculados = DB::table('matriculados')
          ->select('nombres')
          ->where('id', 'LIKE', '%'.$idalumno.'%')
          ->union($ta)
          ->get();


          return response()->json($matriculados);      
      
   	}
}
