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
        $c1 = $request->c1;
        $c2 = $request->c2;
        $c3 = $request->c3;
        $c4 = $request->c4;
        $c5 = $request->c5;
        $c6 = $request->c6;
        $c7 = $request->c7;
        $c8 = $request->c8;
        $observacion = $request->observacion;
        $matriculados_id = $request->matriculados_id;

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
            $inspeccion->c1 = $c1[$key];
            $inspeccion->c2 = $c2[$key];
            $inspeccion->c3 = $c3[$key];
            $inspeccion->c4 = $c4[$key];
            $inspeccion->c5 = $c5[$key];
            $inspeccion->c6 = $c6[$key];
            $inspeccion->c7 = $c7[$key];   
            $inspeccion->c8 = $c8[$key];
            $inspeccion->observacion = $observacion[$key];
            $inspeccion->matriculados_id = $matriculados_id[$key];
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
    public function edit(request $Request, $id)
    {   
        $curso = Cursos::find($id);
        $fecha = $request->fecha;
        $h1 = $request->h1;
        $h2 = $request->h2;
        $h3 = $request->h3;
        $h4 = $request->h4;
        $h5 = $request->h5;
        $h6 = $request->h6;
        $h7 = $request->h7;
        $h8 = $request->h8;
        $c1 = $request->c1;
        $c2 = $request->c2;
        $c3 = $request->c3;
        $c4 = $request->c4;
        $c5 = $request->c5;
        $c6 = $request->c6;
        $c7 = $request->c7;
        $c8 = $request->c8;
        $observacion = $request->observacion;
        $matriculados_id = $request->matriculados_id;

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
            $inspeccion->c1 = $c1[$key];
            $inspeccion->c2 = $c2[$key];
            $inspeccion->c3 = $c3[$key];
            $inspeccion->c4 = $c4[$key];
            $inspeccion->c5 = $c5[$key];
            $inspeccion->c6 = $c6[$key];
            $inspeccion->c7 = $c7[$key];   
            $inspeccion->c8 = $c8[$key];
            $inspeccion->observacion = $observacion[$key];
            $inspeccion->matriculados_id = $matriculados_id[$key];
            $inspeccion->save();  
        }
       return redirect()->route('home')->with('info', 'Se edito la inspeccion correctamente');
    
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
    public function mostrarDatosInspeccion(Request $request, $curso, $paralelo){
        $curso = $request->curso;
        $paralelo = $request->paralelo;
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
        $paralelo = $request->paralelo;
        $matriculados = DB::table('matriculados')->where('curso', $curso)->where('paralelo', $paralelo)->select('*')->distinct()->get();
       $pdf = PDF::loadView('pdf.reporte-individual', compact('matriculados', 'cargos', 'data'))->setPaper('a4', 'landscape');

        return $pdf->download('repo.pdf');
    }
   
}
