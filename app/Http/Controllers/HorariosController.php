<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
       return view('horarios.ver-horarios');
   }

   public function horariosEstudianteStore(Request $request)
   {
       $curso = $request->curso;
       $paralelo = $request->paralelo;
    $file = $request->file('archivo');
    $extension = $file->getClientOriginalExtension();
    $fillename = $curso.'-e-'.$paralelo.'.'.$extension;
    \Storage::disk('local')->put($fillename,  \File::get($file));

    return redirect()->route('horarios.asignar-horarios-estudiantes')->with('info', 'Se ha cargado el horario correctamente');
   }
   public function horariosProfesorStore(Request $request)
   {
       $curso = $request->curso;
       $paralelo = $request->paralelo;
    $file = $request->file('archivo');
    $extension = $file->getClientOriginalExtension();
    $fillename = $curso.'-p-'.$paralelo.'.'.$extension;
    \Storage::disk('local')->put($fillename,  \File::get($file));

    return redirect()->route('horarios.asignar-horarios-profesores')->with('info', 'Se ha cargado el horario correctamente');
   }
}
