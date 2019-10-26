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
use Illuminate\Support\Facades\Mail;
use App\Inscripcion;
use Illuminate\Support\Facades\Input;

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
        $profesorId = Auth::user()->id;
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('dece') || Auth::user()->isRole('admin')){
            return view('tareas.index', compact('profesor', 'profesorId'));
        }elseif(Auth::user()->isRole('profesor')){
            return view('tareas.index', compact('profesor', 'profesorId'));
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
        $tareas = new Tareas;
        $tareas->profesor = $request->profesor;
        $tareas->nombre_profesor = $request->profesorName;
        $tareas->curso = $request->curso;
        $tareas->especialidad = $request->especialidad;
        $tareas->paralelo = $request->paralelo;
        $tareas->fecha_entrega = $request->fecha_entrega;
        $tareas->tipo_tarea = $request->tipo_tarea;
        $tareas->titulo = $request->titulo;
        $tareas->descripcion = $request->descripcion;
        if(isset($request->archivo)){
        $archivo = $request->archivo;
        $archivo2 = $archivo->getClientOriginalName();
        $nombre2 = str_replace(' ', '', $archivo2);
        $tareas->archivo = $nombre2;
        }else{
        $tareas->archivo = 'no-existe';
        }
        $tareas->save();
        if(!empty($request->file('archivo')))
        {
        $file = $request->file('archivo');
       $nombre = $file->getClientOriginalName();
       $nombre2 = str_replace(' ', '', $nombre);
       \Storage::disk('local')->put($nombre2,  \File::get($file));
       }

       if(isset($tareas)){
        Mail::send('tareas-email', ['curso' => $request->curso, 'paralelo' => $request->paralelo, 'profesor' => $request->profesor, 'fecha_entrega' => $request->fecha_entrega, 'tipo_tarea' => $request->tipo_tarea, 'titulo' => $request->titulo, 'descripcion' => $request->descripcion, 'mensaje' => 'Notificaci¨®n de tarea pendiente'], function ($message) {

            $emails = Inscripcion::join('matriculados', 'inscripciones.cedula', '=', 'matriculados.cedula')->where('matriculados.curso', Input::get('curso'))->where('matriculados.paralelo', Input::get('paralelo'))->select('inscripciones.email')->get();
                    foreach($emails as $email){
            $message->to($email->email)->subject('Novedades plataforma educativa GTS.');
            $message->from('gtstechnologyforyou@gmail.com', 'GTS');

        }
        });
       return redirect()->route('tareas.index')->with('info', 'Se ha agregado la tarea/comunicado correctamente');

        }

        else{
            return redirect()->route('tareas.index')->with('info', 'Se ha agregado la tarea/comunicado correctamente');
        }



    }

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
        $tareas = Tareas::find($id);
        $tareas->delete();
        return back()->with('info', 'Se ha eliminado la tarea exitosamente');
    }
    public function verTareas()
    {
        return view('tareas.vertareas');
    }

    public function verTareasMatriculados(Request $request)
    {
        if(Auth::user()->isRole('alumno')){
        $user  = Auth::user()->cedula;
        $curso = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')->where('matriculados.cedula', $user)->select('matriculados.curso')->first();
        $paralelo = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')->where('matriculados.cedula', $user)->select('matriculados.paralelo')->first();
        $matriculados = DB::table('tareas')
        ->where('curso', $curso->curso)
        ->where('paralelo', $paralelo->paralelo)
        ->select('id', 'curso', 'paralelo','profesor', 'fecha_entrega', 'tipo_tarea', 'titulo', 'descripcion', 'archivo', 'nombre_profesor')
        ->get();

        return response()->json($matriculados);
        }
        elseif(Auth::user()->isRole('profesor'))
        {
        $user = Auth::user()->id;

        $matriculados = DB::table('tareas')
        ->where('profesor', $user)
        ->select('id','curso', 'paralelo','profesor', 'fecha_entrega', 'tipo_tarea', 'titulo', 'descripcion', 'archivo', 'nombre_profesor')
        ->get();
        return response()->json($matriculados);

        }
        elseif(Auth::user()->isRole('super-admin'))
        {
            $matriculados = DB::table('tareas')
            ->select('id','profesor','curso', 'paralelo','fecha_entrega', 'tipo_tarea', 'titulo', 'descripcion', 'archivo', 'nombre_profesor')
            ->get();

            return response()->json($matriculados);
        }
    }


public function downloadFile($file){
      return response()->download(public_path("archivos/{$file}"));
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
