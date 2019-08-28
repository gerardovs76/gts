<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matriculacion;
use App\Inscripcion;
use App\Cursos;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use App\Http\Requests\MatriculacionRequest;
use App\Imports\MatriculacionImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteMatriculados;
use App\Exports\ReporteCas;
use App\Cargos;
use App\Http\Requests\ImportMatriculados;
use Illuminate\Support\Facades\Input;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $matricular = Matriculacion::where('tipo_estudiante', '!=', 'BLOQUEADO')->get();
        return view('matricular.index', compact('matricular'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matricular.create', compact('cursos'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculacionRequest $request)
    {


        $date = Carbon::now();

        $matricular = new Matriculacion;
        $matricular->inscripcion_id = $request->inscripcion_id;
        $matricular->cedula = $request->cedula;
        $matricular->nombres = $request->nombres;
        $matricular->apellidos = $request->apellidos;
        $matricular->curso = $request->curso;
        $matricular->especialidad = $request->especialidad;
        $matricular->paralelo = $request->paralelo;
        $matricular->cedula_r = $request->cedula_r;
        $matricular->razon_social = $request->razon_social;
        $matricular->direccion_factura = $request->direccion_factura;
        $matricular->telefono_factura = $request->telefono_factura;
        $matricular->codigo = $request->codigo;
        $matricular->tipo_estudiante = $request->tipo_estudiante;
        $matricular->fecha_creacion =  $date->format('Y-m-d');
        $matricular->save();
        return redirect()->route('matricular.index')->with('info', 'Se ha matriculado correctamente al estudiante');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $matricular = Matriculacion::find($id);
       return view('matricular.show', compact('matricular'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matricular = Matriculacion::find($id);
        return view('matricular.edit', compact('matricular'));
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


        $matricular = Matriculacion::find($id);
        $matricular->inscripcion_id = $request->inscripcion_id;
        $matricular->cedula = $request->cedula;
        $matricular->nombres = $request->nombres;
        $matricular->apellidos = $request->apellidos;
        $matricular->curso = $request->curso;
        $matricular->especialidad = $request->especialidad;
        $matricular->paralelo = $request->paralelo;
        $matricular->cedula_r = $request->cedula_r;
        $matricular->razon_social = $request->razon_social;
        $matricular->direccion_factura = $request->direccion_factura;
        $matricular->telefono_factura = $request->telefono_factura;
        $matricular->codigo = $request->codigo;
        $matricular->save();
        return redirect()->route('matricular.index')->with('info', 'Se ha editado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricular = Matriculacion::find($id);
        $matricular->delete();
        return back()->with('info', 'La matricula se ha eliminado correctamente');
    }
    public function buscarAlumnoMatriculado($cedula)
    {
        $matriculados = DB::table('inscripciones')->select('id','cedula' ,'nombres', 'apellidos', 'codigo_nuevo')->where('cedula', 'LIKE', '%'.$cedula.'%')->get();
        return response()->json($matriculados);
    }

    public function alumnosPDF()
    {

        $pdf = PDF::loadView('pdf.alumnos');

        return $pdf->download('alumnos.pdf');


    }

    public function buscarAlumno()
    {
        return view('matricular.reportes');
    }
    public function buscarAlumnoReporte($dato)
    {

        $matriculados = DB::table('matriculados')
        ->select('*')
        ->where('cedula', 'LIKE', '%'.$dato.'%')
        ->orWhere('curso', 'LIKE', '%'.$dato.'%')
        ->get();


        return response()->json($matriculados);
    }

     public function import()
    {
        return view('matricular.import');
    }
    public function importMatriculacion(Request $request)
    {
       Excel::import(new MatriculacionImport, $request->import_file);

       return back()->with('info', 'Se ha cargado la informacion correctamente');
 }

 public function reporteMatriculados()
 {
    return view('matricular.reporteMatriculados');
 }

 public function matriculadosReporteStore(Request $request)
 {
    $curso = $request->curso;
    $paralelo = $request->paralelo;
    $todos = $request->todos;

    if(!empty($curso) && !empty($paralelo)){
    $matriculados = DB::table('matriculados')
    ->where('curso', $curso)
    ->where('paralelo', $paralelo)
    ->select('*')
    ->get();
    $pdf = PDF::loadView('pdf.reporte-matriculados', compact('matriculados'));

    return $pdf->download('matriculados-reporte.pdf');
    }
    elseif(!empty($todos))
    {
        $matriculados = DB::table('matriculados')
        ->select('*')
        ->get();
        $pdf = PDF::loadView('pdf.reporte-matriculados', compact('matriculados'));

        return $pdf->download('matriculados-reporte.pdf');
    }
    else
    {
        return view('matricular.reporteMatriculados')->with('error', 'Por favor ingresar opciones validas');
    }


 }
 public function indexConstancia()
 {
    return view('matricular.index-constancia');
 }
 public function constanciaDeEstudio(Request $request)
 {
    Carbon::setLocale('es');
    $data = Carbon::now();
    $matriculado = Matriculacion::where('cedula', $request->cedula)->get();
    $cargos = Cargos::all();


         $pdf = PDF::loadView('pdf.constancia-de-estudio', compact('matriculado', 'cargos', 'data'));

        return $pdf->download('constancia-de-estudio.pdf');

 }

 public function reportesBloqueados(){

    $matriculados = DB::table('inscripciones')
    ->where('tipo_estudiante', 'ANTIGUO')
    ->where('curso','NOVENO DE EGB')
    ->orWhere('curso','DECIMO DE EGB')
    ->orWhere('curso','SEGUNDO DE BACHILLERATO')
    ->select('*')
    ->get();


    $pdf = PDF::loadView('pdf.matriculadosBloqueados', compact('matriculados'));

        return $pdf->download('matriculados-bloqueados.pdf');

 }

 public function reporteMatriculadosTabla($curso, $paralelo)
 {
    $matriculados = DB::table('matriculados')
    ->where('curso', $curso)
    ->where('paralelo', $paralelo)
    ->select('*')
    ->get();

    return response()->json($matriculados);
 }
 public function reporteMatriculadosTablaTodos()
 {
     $matriculados = DB::table('matriculados')
     ->select('*')
     ->get();

     return response()->json($matriculados);
 }
 public function genderMale($curso, $paralelo)
 {
     $male = DB::table('matriculados')
     ->join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')
     ->where('matriculados.curso', $curso)
     ->where('matriculados.paralelo', $paralelo)
     ->where('inscripciones.sexo', 'M')
     ->select(DB::raw("count(inscripciones.sexo) as masculino"))
     ->get();

     return response()->json($male);
 }

 public function genderFemale($curso, $paralelo)
 {
    $female = DB::table('matriculados')
    ->join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')
    ->where('matriculados.curso', $curso)
    ->where('matriculados.paralelo', $paralelo)
    ->where('inscripciones.sexo', 'F')
    ->select(DB::raw("count(inscripciones.sexo) as femenino"))
    ->get();

    return response()->json($female);
 }
 public function genderMaleTodos()
 {
     $male = DB::table('matriculados')
     ->join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')
     ->where('inscripciones.sexo', 'M')
     ->select(DB::raw("count(inscripciones.sexo) as masculino"))
     ->get();

     return response()->json($male);
 }

 public function genderFemaleTodos()
 {
    $female = DB::table('matriculados')
    ->join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')
    ->where('inscripciones.sexo', 'F')
    ->select(DB::raw("count(inscripciones.sexo) as femenino"))
    ->get();

    return response()->json($female);
 }
 public function indexReporteMatriculados()
 {
     $matricular = Matriculacion::where('tipo_estudiante', 'BLOQUEADO')->whereIn('curso', ['DECIMO DE EGB', 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO'])->get();
     return view('matricular.reporte-matriculados-index', compact('matricular'));
 }

 public function changeStatus(Request $request, $id)
    {


        $matricular = Matriculacion::find($id);
        $matricular->tipo_estudiante = 'ANTIGUO';
        $matricular->save();
        return redirect()->route('matricular.index-repo-matri')->with('info', 'Se ha cambiado el status del alumno');


    }
    public function reporteTotal()
    {
        return view('matricular.reporteTotal');
    }

    public function reporteTotalStore(Request $request, $curso, $paralelo, $sexo)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;
        $sexo = $request->sexo;

        $total = DB::table("matriculados")
        ->join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')
        ->where('inscripciones.sexo',$sexo)
        ->select(DB::raw("COUNT(inscripciones.sexo)"))
        ->get();
        return response()->json($total);
    }
    public function totalAlumnosCobros()
    {
        return view('matricular.total-alumnosCobros');
    }
    public function totalAlumnosStore(Request $request)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;

        $sep = Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'LIKE', '%'.'SEP'.'%')->where('matriculados.curso', $curso)->where('matriculados.paralelo', $paralelo)->select('matriculados.cedula', 'facturacion.codigo', 'facturacion.fecha_inicio', 'facturacion.num_referencia', 'facturacion.referencias', 'facturacion.nombres', 'facturacion.valor', 'matriculados.curso', 'matriculados.paralelo')->orderBy('matriculados.apellidos')->distinct()->get();
        return view('matricular.total-alumnosCobros', compact('sep', 'curso', 'paralelo'));
    }
    public function certificadoMatricula()
    {
        return view('matricular.certificado-matricula');
    }
    public function certificadoStore(Request $request, $cedula)
    {
        $cedula = $request->cedula;
        $date = Carbon::now();
        $date->format('Y-m-d');

        $certificado = Matriculacion::where('cedula', $cedula)->select('apellidos', 'nombres', 'curso', 'paralelo', 'id')->groupBy('matriculados.id')->get();
        $pdf = PDF::loadView('pdf.certificado-matricula', compact('certificado', 'date'));

        return $pdf->download('matriculados-bloqueados.pdf');
    }
    public function cas()
    {
        return view('matricular.cas');
    }
    public function storeCas(Request $request)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;
        $matriculados = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', $curso)->where('matriculados.paralelo', $paralelo)->select('matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula','matriculados.curso', 'matriculados.paralelo', 'inscripciones.representante', 'inscripciones.nombres_representante', 'inscripciones.email', 'inscripciones.cedrepresentante')->groupBy('matriculados.id')->get();
        switch($request->printButton){
            case 'excel':
            return Excel::download(new ReporteCas($curso, $paralelo), 'reporte-cas.xls');
            break;
            case 'pdf':
            $pdf = PDF::loadView('pdf.reporte-cas', compact('matriculados'));
            return $pdf->download('reporte-cas.pdf');
            break;
        }
    }

    public function totalResumen()
    {
        //INI 1 A
        $inicial1A = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'A')->count();
        $inicial1AM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $inicial1AF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //INI 1 B
        $inicial1B = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'B')->count();
        $inicial1BM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $inicial1BF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //INI 1 C
        $inicial1C = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'C')->count();
        $inicial1CM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $inicial1CF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //INI 1 D
        $inicial1D = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'D')->count();
        $inicial1DM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $inicial1DF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //INI 2 A
        $inicial2A = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'A')->count();
        $inicial2AM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $inicial2AF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //INI 2 B
        $inicial2B = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'B')->count();
        $inicial2BM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $inicial2BF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //INI 2 C
        $inicial2C = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'C')->count();
        $inicial2CM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $inicial2CF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //INI 2 D
        $inicial2D = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'D')->count();
        $inicial2DM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $inicial2DF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE EGB A
        $pA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $pAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $pAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE EGB B
        $pB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $pBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $pBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE EGB C
        $pC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $pCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $pCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE EGB D
        $pD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $pDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $pDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE EGB A
        $sA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $sAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $sAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE EGB B
        $sB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $sBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $sBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE EGB C
        $sC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $sCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $sCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE EGB D
        $sD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $sDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $sDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE EGB A
        $tA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $tAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $tAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE EGB B
        $tB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $tBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $tBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE EGB C
        $tC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $tCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $tCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE EGB D
        $tD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $tDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $tDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //CUARTO DE EGB A
        $cA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $cAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $cAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //CUARTO DE EGB B
        $cB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $cBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $cBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //CUARTO DE EGB C
        $cC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $cCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $cCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //CUARTO DE EGB D
        $cD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $cDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $cDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //QUINTO DE EGB A
       $qA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->count();
       $qAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
       $qAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //QUINTO DE EGB B
       $qB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->count();
       $qBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
       $qBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //QUINTO DE EGB C
       $qC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->count();
       $qCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
       $qCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //QUINTO DE EGB D
       $qD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->count();
       $qDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
       $qDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //SEXTO DE EGB A
        $sexA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $sexAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $sexAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //SEXTO DE EGB B
        $sexB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $sexBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $sexBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //SEXTO DE EGB C
        $sexC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $sexCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $sexCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //SEXTO DE EGB D
        $sexD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $sexDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $sexDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEXTO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //SEPTIMO DE EGB A
        $sepA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $sepAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $sepAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //SEPTIMO DE EGB B
        $sepB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $sepBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $sepBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //SEPTIMO DE EGB C
        $sepC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $sepCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $sepCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //SEPTIMO DE EGB D
        $sepD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $sepDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $sepDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEPTIMO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //OCTAVO DE EGB A
        $octA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $octAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $octAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //OCTAVO DE EGB B
        $octB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $octBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $octBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //OCTAVO DE EGB C
        $octC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $octCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $octCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //OCTAVO DE EGB D
        $octD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $octDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $octDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'OCTAVO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //NOVENO DE EGB A
        $noA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $noAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $noAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //NOVENO DE EGB B
        $noB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $noBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $noBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //NOVENO DE EGB C
        $noC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $noCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $noCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //NOVENO DE EGB D
        $noD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $noDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $noDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'NOVENO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //DECIMO DE EGB A
        $deA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'A')->count();
        $deAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $deAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //DECIMO DE EGB B
        $deB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'B')->count();
        $deBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $deBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //DECIMO DE EGB C
        $deC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'C')->count();
        $deCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $deCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //DECIMO DE EGB D
        $deD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'D')->count();
        $deDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $deDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'DECIMO DE EGB')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE BACHILLERATO A
        $priA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->count();
        $priAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
        $priAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE BACHILLERATO B
        $priB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->count();
        $priBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
        $priBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE BACHILLERATO C
        $priC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->count();
        $priCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
        $priCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //PRIMERO DE BACHILLERATO D
        $priD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->count();
        $priDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
        $priDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE BACHILLERATO A
       $segA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->count();
       $segAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
       $segAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE BACHILLERATO B
       $segB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->count();
       $segBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
       $segBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE BACHILLERATO C
       $segC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->count();
       $segCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
       $segCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //SEGUNDO DE BACHILLERATO D
       $segD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->count();
       $segDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
       $segDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE BACHILLERATO A
       $tercA = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->count();
       $tercAM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'M')->count();
       $tercAF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'A')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE BACHILLERATO B
       $tercB = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->count();
       $tercBM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'M')->count();
       $tercBF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'B')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE BACHILLERATO C
       $tercC = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->count();
       $tercCM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'M')->count();
       $tercCF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'C')->where('inscripciones.sexo', 'F')->count();
        //TERCERO DE BACHILLERATO D
       $tercD = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->count();
       $tercDM = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'M')->count();
       $tercDF = Matriculacion::join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')->where('matriculados.curso', 'TERCERO DE BACHILLERATO')->where('matriculados.paralelo', 'D')->where('inscripciones.sexo', 'F')->count();

        //TERCERO DE EGB A

        return view('matricular.total-resumen', compact('inicial1A', 'inicial1AM', 'inicial1AF', 'inicial1B', 'inicial1BM', 'inicial1BF', 'inicial1C', 'inicial1CM', 'inicial1CF', 'inicial1D', 'inicial1DM', 'inicial1DF','inicial2A', 'inicial2AM', 'inicial2AF', 'inicial2B', 'inicial2BM', 'inicial2BF', 'inicial2C', 'inicial2CM', 'inicial2CF', 'inicial2D', 'inicial2DM', 'inicial2DF', 'pA', 'pAM', 'pAF', 'pB','pBM','pBF','pC','pCM','pCF','pD','pDM','pDF','sA','sAM','sAF','sB','sBM','sBF','sC','sCM','sCF','sD','sDM','sDF','tA','tAM','tAF','tB','tBM','tBF','tC','tCM','tCF','tD','tDM','tDF','cA','cAM','cAF','cB','cBM','cBF','cC','cCM','cCF','cD','cDM','cDF','qA','qAM' ,'qAF','qB','qBM','qBF','qC','qCM','qCF','qD','qDM','qDF','sexA','sexAM','sexAF','sexB','sexBM' ,'sexBF','sexC','sexCM','sexCF','sexD','sexDM','sexDF','sepA','sepAM','sepAF','sepB','sepBM','sepBF','sepC','sepCM' ,'sepCF','sepD','sepDM','sepDF','octA','octAM','octAF','octB','octBM','octBF','octC','octCM','octCF' ,'octD','octDM','octDF','noA','noAM','noAF','noB','noBM' ,'noBF','noC','noCM','noCF','noD','noDM','noDF' ,'deA','deAM','deAF','deB','deBM','deBF','deC','deCM','deCF','deD','deDM','deDF','priA','priAM' ,'priAF','priB','priBM','priBF','priC','priCM','priCF','priD','priDM','priDF','segA','segAM','segAF','segB','segBM','segBF','segC','segCM','segCF','segD','segDM','segDF','tercA','tercAM','tercAF','tercB','tercBM','tercBF','tercC' ,'tercCM','tercCF','tercD','tercDM','tercDF'));
    }


}
