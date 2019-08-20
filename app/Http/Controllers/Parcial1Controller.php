<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parcial1;
use DB;


class Parcial1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   public function index()
    {   
        return view('parcial1.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parcial1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evaluacion = $request->evaluacion;
        $comportamiento = $request->comportamiento;
        $matriculados_id = $request->matriculados_id;
        foreach ($request->evaluacion as $key => $value) {
            $p1 = new Parcial1;
            $p1->evaluacion = $evaluacion[$key];
            $p1->comportamiento = $comportamiento[$key];
            $p1->matriculados_id = $matriculados_id[$key];
            $p1->save();
        }
        return redirect()->route('parcial1.index');

    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parciales = Parcial1::find($id);
        return view('parcial1.show', compact('parciales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parciales = Parcial1::find($id);
        return view('parcial1.edit', compact('parciales'));
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
        $parciales = Parcial1::find($id);
        $parciales->tareas_academicas  = $request->tareas_academicas;
        $parciales->tareas_individuales = $request->tareas_individuales;
        $parciales->trabajos_grupales  = $request->trabajos_grupales;
        $parciales->leccion  = $request->leccion;
        $parciales->evaluacion = $request->evaluacion;
        $parciales->promedio  = $request->promedio;
        $parciales->comportamiento  = $request->comportamiento;
        $parciales->save();

        return redirect()->route('parcial1.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parciales  $parciales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parciales = Parcial1::find($id);
        $parciales->delete();
        return back()->with('info', 'El parcial ha sido eliminado exitosamente');
    }
   
}
