<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TareasIndividuales;
use DB;
use App\Cursos;
use App\Matriculacion;

class TareasIndividualesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
       $tareas_individuales = Matriculacion::orderBy('tarea_individual', 'DESC');
       return view('tareasIndividuales.index', compact('tareas_individuales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $matriculados = Matriculacion::with('tareas_individuales')->orderBy('id', 'ASC')->pluck('nombres');
        return view('tareasIndividuales.create', compact('matriculados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materias_id = $request->materias_id;
        $parcial = $request->parcial;
        $matriculados_id = $request->matriculados_id;
        $tarea_individual = $request->tarea_individual;
        $descripcion = $request->descripcion;

        foreach ($request->materias_id as $key => $value) {
            $ti = new TareasIndividuales;
            $ti->materias_id = $materias_id[$key];
            $ti->parcial = $parcial[$key];
            $ti->matriculados_id = $matriculados_id[$key];
            $ti->tarea_individual = $tarea_individual[$key];
            $ti->descripcion = $descripcion;
            $ti->numero_tarea = "1";
            $ti->save();
        }
        return redirect()->route('parcial1.index')->with('info', 'La nota se ha agregado correctamente');

    }      
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function show($id)
    {   $tareas_individuales = TareasIndividuales::find($id);
        return view('TareasIndividuales.show', compact('tareas_individuales'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tareas_individuales = TareasIndividuales::find($id);
        return view('tareasIndividuales.edit', compact('tareas_individuales'));
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
        $tareas_individuales = TareasIndividuales::find($id);
        $tareas_individuales->tarea_individual = $request->tarea_individual;
        $tareas_individuales->descripcion = $request->descripcion;
        $tareas_individuales->save();
        return redirect()->route('parcial1.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $tareas_individuales = TareasIndividuales::find($id);
    $tareas_individuales->delete();
    return back()->with('info', 'Se ha eliminado el trabajo academico correspondiente');
    }

    public function asignarNota(){

    $matriculado = DB::table('matriculados')
        ->join('cursos', 'matriculados.curso', '=', 'cursos.curso')
        ->select(DB::raw("CONCAT(matriculados.apellidos, '' , matriculados.nombres) as nombres"), 'matriculados.id')
        ->where('cursos.curso', 'INICIAL 1')
        ->get();
    if(!empty($matriculado)){

        $tarea_individual = new TareasIndividuales;
        $tarea_individual->tarea_individual = $request->tarea_individual;
        $tarea_individual->descripcion = $request->descripcion;
        $tarea_individual->save();

        return view('parcial1')->with('matriculado', $matriculado)->with('tarea_individual', $tarea_individual);
    }
    }
    public function verNotas(){
    /*$ta = DB::table('matriculados')->select(DB::raw("CONCAT(apellidos, ' ', nombres) as nombres"), 'cedula', 'curso')->where('curso', 'INICIAL 1')->get();*/
    }

    public function descripcionNota(){

        $matriculados = DB::table('matriculados')->join('cursos', 'matriculados.curso', '=', 'cursos.curso')->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"), 'matriculados.id as id')->where('cursos.curso', 'INICIAL 1')->get();
        return response()->json($matriculados);

    }

}
