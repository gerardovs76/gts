<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrabajosAcademicos;
use DB;
Use App\Matriculacion;
use App\Cursos;

class TrabajosAcademicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       return view('trabajosAcademicos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('trabajosAcademicos.create');
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
        $trabajos_academicos = $request->trabajo_academico;
        $descripcion = $request->descripcion;

        foreach ($request->trabajo_academico as $key => $value) {
            $ta = new TrabajosAcademicos;
            $ta->parcial = $parcial[$key];
            $ta->materias_id = $materias_id[$key];
            $ta->matriculados_id = $matriculados_id[$key];
            $ta->trabajo_academico = $trabajos_academicos[$key];
            $ta->descripcion = $descripcion;
            $ta->numero_tarea = "1";
            $ta->save();
        }
        return redirect()->route('parcial1.index')->with('info', 'La nota se ha agregado correctamente');

    }      
    public function edit($id)
    {
        $trabajos_academicos = TrabajosAcademicos::find($id);
        return view('trabajosAcademicos.edit', compact('trabajos_academicos'));
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
        $trabajos_academicos = TrabajosAcademicos::find($id);
        $trabajos_academicos->trabajo_academico = $request->trabajo_academico;
        $trabajos_academicos->descripcion = $request->descripcion;
        $trabajos_academicos->save();
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
    $trabajos_academicos = TrabajosAcademicos::find($id);
    $trabajos_academicos->delete();
    return back()->with('info', 'Se ha eliminado el trabajo academico correspondiente');
    }
    
}
