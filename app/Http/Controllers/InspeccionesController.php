<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inspecciones;
use App\Materias;
use DB;
use App\Matriculacion;
use App\Cursos;
use Illuminate\Support\Carbon;
use App\Cargos;
use Barryvdh\DomPDF\Facade as PDF;

class InspeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index(Request $request)
    {
        return view('inspecciones.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('inspeccion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha = $request->fecha;
        $h1 = $request->h1;
        $h2 = $request->h2;
        $h3 = $request->h3;
        $h4 = $request->h4;
        $h5 = $request->h5;
        $h6 = $request->h6;
        $h7 = $request->h7;
        $h8 = $request->h8;
        $matriculados_id = $request->matriculados_id;
        $parcial = $request->parcial;
        $quimestre = $request->quimestre;

        foreach ($request->matriculados_id as $key => $value) {
            $inspeccion = new Inspecciones;
            $inspeccion->fecha = $fecha;
            $inspeccion->h1 = $h1[$key];
            $inspeccion->h2 = $h2[$key];
            $inspeccion->h3 = $h3[$key];
            $inspeccion->h4 = $h4[$key];
            $inspeccion->h5 = $h5[$key];
            $inspeccion->h6 = $h6[$key];
            $inspeccion->h7 = $h7[$key];
            $inspeccion->h8 = $h8[$key];
            $inspeccion->matriculados_id = $matriculados_id[$key];
            $inspeccion->parcial = $parcial;
            $inspeccion->quimestre = $quimestre;
            $inspeccion->save();
        }
       return redirect()->route('inspeccion.index')->with('info', 'Se agrego la inspeccion correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inspeccions  $Inspeccions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inspeccions  $Inspeccions
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $Request, $id)
    {
        $inspeccion = Inspecciones::find($id);
        return view('inspecciones.edit', compact('inspeccion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inspeccions  $Inspeccions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fecha = $request->fecha;
        $h1 = $request->h1;
        $h2 = $request->h2;
        $h3 = $request->h3;
        $h4 = $request->h4;
        $h5 = $request->h5;
        $h6 = $request->h6;
        $h7 = $request->h7;
        $h8 = $request->h8;
        $justificacionh1 = $request->justificacionh1;
        $justificacionh2 = $request->justificacionh2;
        $justificacionh3 = $request->justificacionh3;
        $justificacionh4 = $request->justificacionh4;
        $justificacionh5 = $request->justificacionh5;
        $justificacionh6 = $request->justificacionh6;
        $justificacionh7 = $request->justificacionh7;
        $justificacionh8 = $request->justificacionh8;
        $matriculados_id = $request->matriculados_id;
        $parcial = $request->parcial;
        $quimestre = $request->quimestre;

        $inspeccion = Inspecciones::find($id);
            $inspeccion->h1 = $h1;
            $inspeccion->h2 = $h2;
            $inspeccion->h3 = $h3;
            $inspeccion->h4 = $h4;
            $inspeccion->h5 = $h5;
            $inspeccion->h6 = $h6;
            $inspeccion->h7 = $h7;
            $inspeccion->h8 = $h8;
            $inspeccion->justificacionh1 = $justificacionh1;
            $inspeccion->justificacionh2 = $justificacionh2;
            $inspeccion->justificacionh3 = $justificacionh3;
            $inspeccion->justificacionh4 = $justificacionh4;
            $inspeccion->justificacionh5 = $justificacionh5;
            $inspeccion->justificacionh6 = $justificacionh6;
            $inspeccion->justificacionh7 = $justificacionh7;
            $inspeccion->justificacionh8 = $justificacionh8;
            $inspeccion->save();
            return redirect()->route('inspeccion.index-inspeccion')->with('info', 'Se ha modificado correctamente el registro');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inspeccions  $Inspeccions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function buscarInspeccionAlumno(Request $request,$id){

       $id = $request->id;
       $curso = DB::table('matriculados')
       ->join('cursos', 'matriculados.curso', '=', 'cursos.curso')
       ->where('cursos.id', $id)
       ->select('matriculados.especialidad as especialidad', 'matriculados.paralelo as paralelo')
       ->distinct()
       ->get();

       return response()->json($curso);

    }
    public function mostrarDatosInspeccion($curso, $paralelo){


        $matriculado = DB::table('matriculados')
        ->where('matriculados.curso', 'LIKE', '%'.$curso.'%')
        ->where('matriculados.paralelo', 'LIKE', '%'.$paralelo.'%')
        ->select(DB::raw('CONCAT(matriculados.apellidos," ", matriculados.nombres) as nombres'), 'matriculados.id as id')
        ->distinct()
        ->get();
        return response()->json($matriculado);
    }
    public function indexConducta()
    {
        return view('inspecciones.conducta');
    }
    public function conducta(Request $request)
    {
         Carbon::setLocale('es');
    $data = Carbon::now();
        $matriculado = Matriculacion::where('cedula', $request->cedula)->get();
    $cargos = Cargos::all();
        $pdf = PDF::loadView('pdf.conducta', compact('matriculado', 'cargos', 'data'));

        return $pdf->download('conducta.pdf');
    }

    public function reporteIndividual()
    {
        return view('inspecciones.reporte-individual');
    }
    public function verReportes(Request $request)
    {
        $curso = $request->curso;
        $matriculados = DB::table('matriculados')->where('curso', $curso)->select('*')->distinct()->get();
       $pdf = PDF::loadView('pdf.reporte-individual', compact('matriculados', 'cargos', 'data'))->setPaper('a4', 'landscape');

        return $pdf->download('repo.pdf');
    }

    public function indexInspeccion()
    {

        return view('inspecciones.indexInspeccion');

    }
    public function buscarInspecciones($curso, $paralelo, $parcial, $quimestre)
    {
        $inspecciones = DB::table('inspecciones')
        ->join('matriculados', 'inspecciones.matriculados_id', '=', 'matriculados.id')
        ->where('matriculados.curso', $curso)
        ->where('matriculados.paralelo', $paralelo)
        ->where('inspecciones.parcial', $parcial)
        ->where('inspecciones.quimestre', $quimestre)
        ->select('matriculados.nombres', 'matriculados.apellidos', 'matriculados.curso', 'matriculados.paralelo', 'inspecciones.id', 'inspecciones.fecha','inspecciones.h1', 'inspecciones.h2' , 'inspecciones.h3' , 'inspecciones.h4', 'inspecciones.h5' , 'inspecciones.h6' , 'inspecciones.h7' , 'inspecciones.h8')
        ->get();
        return response()->json($inspecciones);
    }
    public function promedios()
    {
        return view('inspecciones.promedios');
    }

}
