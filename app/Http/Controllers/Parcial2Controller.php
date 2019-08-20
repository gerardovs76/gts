<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parcial2;
use DB;

class Parcial2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   public function index()
    {   $notasAlumno = DB::table('matriculados')->select('nombres', 'apellidos')->where('curso', 'INICIAL 1')->get();
        $parciales = Parcial2::orderBy('id', 'DESC')->paginate();
        return view('parcial2.index', compact('parciales', 'notasAlumno', 'trabajos_academicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parcial2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parciales = new Parcial2;

        $parciales->tareas_academicas  = $request->tareas_academicas;
        $parciales->tareas_individuales = $request->tareas_individuales;
        $parciales->trabajos_grupales  = $request->trabajos_grupales;
        $parciales->leccion  = $request->leccion;
        $parciales->evaluacion = $request->evaluacion;
        $parciales->promedio  = $request->promedio;
        $parciales->comportamiento  = $request->comportamiento;
        $parciales->save();

        return redirect()->route('parcial2.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parciales = Parcial2::find($id);
        return view('parcial2.show', compact('parciales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parciales = Parcial2::find($id);
        return view('parcial2.edit', compact('parciales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parciales = Parcial2::find($id);
        $parciales->tareas_academicas  = $request->tareas_academicas;
        $parciales->tareas_individuales = $request->tareas_individuales;
        $parciales->trabajos_grupales  = $request->trabajos_grupales;
        $parciales->leccion  = $request->leccion;
        $parciales->evaluacion = $request->evaluacion;
        $parciales->promedio  = $request->promedio;
        $parciales->comportamiento  = $request->comportamiento;
        $parciales->save();

        return redirect()->route('parcial2.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parciales = Parcial2::find($id);
        $parciales->delete();
        return back()->with('info', 'El parcial ha sido eliminado exitosamente');
    }
}
