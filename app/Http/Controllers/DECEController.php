<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DECE;

class DECEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
       return view('dece.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dece.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dece = new DECE; 
        $dece->cedula = $request->cedula;
        $dece->nombres = $request->nombres;
        $dece->apellidos = $request->apellidos;
        $dece->fecha_nacimiento = $request->fecha_nacimiento;
        $dece->año_eb_bgu = $request->año_eb_bgu;
        $dece->nombre_representante = $request->nombre_representante;
        $dece->cedula_representante = $request->cedula_representante;
        $dece->numero_telefono = $request->numero_telefono;
        $dece->numero_movil= $request->numero_movil;
        $dece->presenta_nee = $request->presenta_nee;
        $dece->nombre_profesional = $request->nombre_profesional;
        $dece->remitido_por = $request->remitido_por;
        $dece->fecha_seguimiento = $request->fecha_seguimiento;
        $dece->descripcion_problema = $request->descripcion_problema;
        $dece->fecha = $request->fecha;
        $dece->accion_realizada = $request->accion_realizada;
        $dece->sugerencias_observaciones = $request->sugerencias_observaciones;
        $dece->responsable = $request->responsable;
        $dece->save();


        return redirect()->route('dece.create')->with('info', 'Se ha agregado correctamente');    
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
        //
    }
    public function reporteDECE(){
        return view('dece.reporte');
    }

    public function buscarAlumnoDECE($cedula)
    {

        $alumno = DB::table('matriculados')
        ->join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')
        ->where('matriculados.cedula', $cedula)
        ->select('inscripciones.cedula as cedula', 'inscripciones.nombres as nombres', 'inscripciones.apellidos as apellidos', 'inscripciones.fecha_nacimiento as fecha_nacimiento', 'inscripciones.direccion_representante as direccion', 'matriculados.curso', 'inscripciones.nombres_representante as nombres_representante', 'inscripciones.cedrepresentante as cedula_representante', 'inscripciones.movil as numero_telefono', 'inscripciones.convencional as numero_movil')
        ->distinct()
        ->get();

        return response()->json($alumno);
    }

    public function verReporte($cedula)
    {
        $dece = DB::table('dece')->where('cedula', $cedula)
        ->select('cedula', 'nombres', 'apellidos', 'fecha', 'accion_realizada', 'sugerencias_observaciones', 'responsable')
        ->get();

        return response()->json($dece);
    }
   
}
