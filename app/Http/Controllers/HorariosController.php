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
       if(Auth::user()->roles('super-admin'))
       {

      return view('horarios.ver-horarios');
       }
       elseif(Auth::user()->roles('profesor'))
       {
        $profesor = DB::table('materias_profesores')
        ->join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
        ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
        ->where('profesors.cedula', $users)
        ->select('materias.curso as curso', 'materias.especialidad as especialidad', 'materias.paralelo as paralelo')
        ->distinct()
        ->get();
        return view('horarios.ver-horarios', 'profesor');
       }
       elseif(Auth::user()->roles('alumno'))
       {
           $matriculados = Matriculacion::where('cedula', $users)->pluck('curso', 'paralelo');
          return view('horarios.ver-horarios', 'matriculados');
       }
   }

   public function horariosEstudianteStore(Request $request)
   {
       $curso = $request->curso;
       $paralelo = $request->paralelo;
    $file = $request->file('archivo');
    $extension = $file->getClientOriginalExtension();
    $fillename = $curso.'-e-'.$paralelo.'.'.'png';
    \Storage::disk('local')->put($fillename,  \File::get($file));

    return redirect()->route('horarios.asignar-horarios-estudiantes')->with('info', 'Se ha cargado el horario correctamente');
   }
   public function horariosProfesorStore(Request $request)
   {
       $curso = $request->curso;
       $paralelo = $request->paralelo;
    $file = $request->file('archivo');
    $extension = $file->getClientOriginalExtension();
    $fillename = $curso.'-p-'.$paralelo.'.'.'png';
    \Storage::disk('local')->put($fillename,  \File::get($file));

    return redirect()->route('horarios.asignar-horarios-profesores')->with('info', 'Se ha cargado el horario correctamente');
   }
}
