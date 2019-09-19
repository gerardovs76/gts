<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tareas;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TareasNotificacion;
use Illuminate\Support\Facades\Notification;
use DB;
use App\User;
use App\Http\Requests\TareasRequest;
use App\MateriasProfesor;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $profesor = Auth::user()->name;
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin')){
            return view('tareas.index', compact('profesor'));
        }elseif(Auth::user()->isRole('profesor')){
            $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->distinct()
            ->pluck('materias.curso');
            $profesorParalelo = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->pluck('materias.paralelo');
            return view('tareas.index', compact('profesorCurso', 'profesorParalelo', 'profesor'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareasRequest $request)
    {
        $archivo = $request->archivo;
        $tareas = new Tareas;
        $tareas->profesor = $request->profesor;
        $tareas->curso = $request->curso;
        $tareas->especialidad = $request->especialidad;
        $tareas->paralelo = $request->paralelo;
        $tareas->fecha_entrega = $request->fecha_entrega;
        $tareas->tipo_tarea = $request->tipo_tarea;
        $tareas->titulo = $request->titulo;
        $tareas->descripcion = $request->descripcion;
        $tareas->archivo = $archivo->getClientOriginalName();
        $tareas->save();



        $file = $request->file('archivo');
       $nombre = $file->getClientOriginalName();

       \Storage::disk('local')->put($nombre,  \File::get($file));
        if(isset($tareas)){
        Mail::send('tareas-email', ['curso' => $request->curso, 'paralelo' => $request->paralelo, 'profesor' => $request->profesor, 'fecha_entrega' => $request->fecha_entrega, 'tipo_tarea' => $request->tipo_tarea, 'titulo' => $request->titulo, 'descripcion' => $request->descripcion, 'mensaje' => 'Notificaci��n de tarea pendiente'], function ($message) {

            $emails = Inscripcion::join('matriculados', 'inscripciones.cedula', '=', 'matriculados.cedula')->where('matriculados.curso', Input::get('curso'))->where('matriculados.paralelo', Input::get('paralelo'))->select('inscripciones.email')->get();
                    foreach($emails as $email){
            $message->to($email->email)->subject('Notificacion de tarea!');
            $message->from('info@pauldirac.edu.ec', 'Paul Dirac');

        }
        });
    }
        return redirect()->route('tareas.index')->with('info', 'Se ha agregado la tarea correctamente');
    }

    /**

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function verTareas()
    {
        return view('tareas.vertareas');
    }

    public function verTareasMatriculados(Request $request)
    {
        $user  = Auth::user()->cedula;
        $curso = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')->where('matriculados.cedula', $user)->select('matriculados.curso')->first();
        $paralelo = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')->where('matriculados.cedula', $user)->select('matriculados.paralelo')->first();
        $matriculados = DB::table('tareas')
        ->where('curso', $curso->curso)
        ->where('paralelo', $paralelo->paralelo)
        ->select('profesor', 'fecha_entrega', 'tipo_tarea', 'titulo', 'descripcion', 'archivo')
        ->get();


        return response()->json($matriculados);
    }


public function downloadFile($file){
      $pathtoFile = public_path().'\archivos/'.$file;
      return response()->download($pathtoFile);
    }

    public function countPush()
    {
        $user  = Auth::user()->cedula;
        $curso = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')->where('matriculados.cedula', $user)->select('matriculados.curso')->first();
        $paralelo = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')->where('matriculados.cedula', $user)->select('matriculados.paralelo')->first();
        if(!empty($curso->curso) && !empty($paralelo->paralelo)){
        $tareas = DB::table('tareas')
        ->where('curso', $curso->curso)
        ->where('paralelo', $paralelo->paralelo)
        ->select('*')
        ->get();

    $long = count($tareas);

    return response()->json($long);
            }else{
                return response()->json(0);
            }
}


}
