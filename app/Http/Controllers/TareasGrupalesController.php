<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use App\Matriculacion;
use App\Cursos;
use App\TareasGrupales;

class TareasGrupalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
   public function index()
    {
       $tareas_grupales = Matriculacion::orderBy('tarea_grupal', 'DESC');
       return view('tareasGrupales.index', compact('tareas_grupales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $matriculados = Matriculacion::with('tareas_grupales')->orderBy('id', 'ASC')->pluck('nombres');
        return view('tareasGrupales.create', compact('matriculados'));
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
        $tareas_grupales = $request->tarea_grupal;
        $descripcion = $request->descripcion;

        foreach ($request->tarea_grupal as $key => $value) {
            $tg = new TareasGrupales;
            $tg->materias_id = $materias_id[$key];
            $tg->parcial = $parcial[$key];
            $tg->matriculados_id = $matriculados_id[$key];
            $tg->tarea_grupal = $tareas_grupales[$key];
            $tg->descripcion = $descripcion;
            $tg->numero_tarea = "1";
            $tg->save();
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
    {   $tareas_grupales = TareasGrupales::find($id);
        return view('TareasGrupales.show', compact('tareas_grupales'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tareas_grupales = TareasGrupales::find($id);
        return view('tareasGrupales.edit', compact('tareas_grupales'));
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
        $tareas_grupales = TareasGrupales::find($id);
        $tareas_grupales->tarea_grupal = $request->tarea_grupal;
        $tareas_grupales->descripcion = $request->descripcion;
        $tareas_grupales->save();
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
    $tareas_grupales = TareasGrupales::find($id);
    $tareas_grupales->delete();
    return back()->with('info', 'Se ha eliminado el trabajo academico correspondiente');
    }


}
