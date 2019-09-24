<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Matriculacion;
use App\MateriasProfesor;
use DB;

class HorariosController extends Controller
{
   public function horariosEstudiantes()
   {
       return view('horarios.asignar-estudiantes');
   }
   public function horariosProfesores()
   {
       return view('horarios.asignar-profesores');
   }
   public function verHorarios()
   {
    $users = Auth::user()->cedula;
       if(Auth::user()->isRole('super-admin'))
       {
      return view('horarios.ver-horarios');
       }
       elseif(Auth::user()->isRole('profesor'))
       {
        $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
        ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
        ->where('profesors.cedula', $users)
        ->distinct()
        ->pluck('materias.curso');

        $profesorParalelo = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
        ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
        ->where('profesors.cedula', $users)
        ->pluck('materias.paralelo');


        return view('horarios.ver-horarios', compact('profesorCurso', 'profesorParalelo'));
       }
       elseif(Auth::user()->isRole('alumno'))
       {
           $matriculadosCurso = Matriculacion::where('cedula', $users)->pluck('curso');
           $matriculadosParalelo = Matriculacion::where('cedula', $users)->pluck('paralelo');
          return view('horarios.ver-horarios', compact('matriculadosCurso', 'matriculadosParalelo'));
       }
   }

   public function horariosEstudianteStore(Request $request)
   {
       $curso = $request->curso;
       $paralelo = $request->paralelo;
    $file = $request->file('archivo');
    //$extension = $file->getClientOriginalExtension();
    $fillename = $curso.'-e-'.$paralelo.'.'.'png';
    \Storage::disk('local')->put($fillename,  \File::get($file));

    return redirect()->route('horarios.asignar-horarios-estudiantes')->with('info', 'Se ha cargado el horario correctamente');
   }
   public function horariosProfesorStore(Request $request)
   {
       $curso = $request->curso;
       $paralelo = $request->paralelo;
    $file = $request->file('archivo');
    //$extension = $file->getClientOriginalExtension();
    $fillename = $curso.'-p-'.$paralelo.'.'.'png';
    \Storage::disk('local')->put($fillename,  \File::get($file));

    return redirect()->route('horarios.asignar-horarios-profesores')->with('info', 'Se ha cargado el horario correctamente');
   }
}
