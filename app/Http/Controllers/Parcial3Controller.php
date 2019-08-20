<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parcial3;
use DB;
class Parcial3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {   $notasAlumno = DB::table('matriculados')->select('nombres', 'apellidos')->where('curso', 'INICIAL 1')->get();
        $parciales = Parcial3::orderBy('id', 'DESC')->paginate();
        return view('parcial3.index', compact('parciales', 'notasAlumno', 'trabajos_academicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parcial3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parciales = new Parcial3;

        $parciales->tareas_academicas  = $request->tareas_academicas;
        $parciales->tareas_individuales = $request->tareas_individuales;
        $parciales->trabajos_grupales  = $request->trabajos_grupales;
        $parciales->leccion  = $request->leccion;
        $parciales->evaluacion = $request->evaluacion;
        $parciales->promedio  = $request->promedio;
        $parciales->comportamiento  = $request->comportamiento;
        $parciales->save();

        return redirect()->route('parcial3.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parciales = Parcial3::find($id);
        return view('parcial3.show', compact('parciales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parciales = Parcial3::find($id);
        return view('parcial3.edit', compact('parciales'));
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
        $parciales = Parcial3::find($id);
        $parciales->tareas_academicas  = $request->tareas_academicas;
        $parciales->tareas_individuales = $request->tareas_individuales;
        $parciales->trabajos_grupales  = $request->trabajos_grupales;
        $parciales->leccion  = $request->leccion;
        $parciales->evaluacion = $request->evaluacion;
        $parciales->promedio  = $request->promedio;
        $parciales->comportamiento  = $request->comportamiento;
        $parciales->save();

        return redirect()->route('parcial3.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parciales = Parcial3::find($id);
        $parciales->delete();
        return back()->with('info', 'El parcial ha sido eliminado exitosamente');
    }
}
