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

        $totalNomina =  $sep = Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'LIKE', '%'.'SEP'.'%')->where('matriculados.curso', $curso)->where('matriculados.paralelo', $paralelo)->select(DB::raw("SUM(facturacion.valor) as valor_final"))->orderBy('matriculados.apellidos')->distinct()->get();
        $sep = Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'LIKE', '%'.'SEP'.'%')->where('matriculados.curso', $curso)->where('matriculados.paralelo', $paralelo)->select('matriculados.cedula', 'facturacion.codigo', 'facturacion.fecha_inicio', 'facturacion.num_referencia', 'facturacion.referencias', 'facturacion.nombres', 'facturacion.valor', 'matriculados.curso', 'matriculados.paralelo')->orderBy('matriculados.apellidos')->distinct()->get();
        return view('matricular.total-alumnosCobros', compact('sep', 'curso', 'paralelo', 'totalNomina'));
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

        return view('matricular.total-resumen', compact('inicial1A', 'inicial1AM', 'inicial1AF', 'inicial1B', 'inicial1BM', 'inicial1BF', 'inicial1C', 'inicial1CM', 'inicial1CF', 'inicial1D', 'inicial1DM', 'inicial1DF','inicial2A', 'inicial2AM', 'inicial2AF', 'inicial2B', 'inicial2BM', 'inicial2BF', 'inicial2C', 'inicial2CM', 'inicial2CF', 'inicial2D', 'inicial2DM', 'inicial2DF', 'pA', 'pAM', 'pAF', 'pB','pBM','pBF','pC','pCM','pCF','pD','pDM','pDF','sA','sAM','sAF','sB','sBM','sBF','sC','sCM','sCF','sD','sDM','sDF','tA','tAM','tAF','tB','tBM','tBF','tC','tCM','tCF','tD','tDM','tDF','cA','cAM','cAF','cB','cBM','cBF','cC','cCM','cCF','cD','cDM','cDF','qA','qAM' ,'qAF','qB','qBM','qBF','qC','qCM','qCF','qD','qDM','qDF','sexA','sexAM','sexAF','sexB','sexBM' ,'sexBF','sexC','sexCM','sexCF','sexD','sexDM','sexDF','sepA','sepAM','sepAF','sepB','sepBM','sepBF','sepC','sepCM' ,'sepCF','sepD','sepDM','sepDF','octA','octAM','octAF','octB','octBM','octBF','octC','octCM','octCF' ,'octD','octDM','octDF','noA','noAM','noAF','noB','noBM' ,'noBF','noC','noCM','noCF','noD','noDM','noDF' ,'deA','deAM','deAF','deB','deBM','deBF','deC','deCM','deCF','deD','deDM','deDF','priA','priAM' ,'priAF','priB','priBM','priBF','priC','priCM','priCF','priD','priDM','priDF','segA','segAM','segAF','segB','segBM','segBF','segC','segCM','segCF','segD','segDM','segDF','tercA','tercAM','tercAF','tercB','tercBM','tercBF','tercC' ,'tercCM','tercCF','tercD','tercDM','tercDF'));
    }
    public function listaTotal()
    {
        $inicial1A = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $inicial1B = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $inicial1C = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'INICIAL 1')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $inicial2A = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $inicial2B = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $inicial2C = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'INICIAL 2')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $priA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $priB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $priC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $priD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'PRIMERO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $seA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $seB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $seC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $seD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'SEGUNDO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $teA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $teB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $teC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $teD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'TERCERO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $cuaA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $cuaB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $cuaC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $cuaD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'CUARTO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $quiA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $quiB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $quiC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $quiD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sexA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sexB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sexC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sexD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sepA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sepB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sepC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $sepD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $octA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $octB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $octC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $octD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $novA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $novB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $novC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $novD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $decA = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'A')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $decB = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'B')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $decC = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'C')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $decD = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('matriculados.curso', 'QUINTO DE EGB')->where('matriculados.paralelo', 'D')->select('matriculados.curso', 'matriculados.nombres', 'matriculados.apellidos', 'matriculados.cedula', 'matriculados.codigo as codigo_mac', 'matriculados.paralelo', 'inscripciones.sexo', 'facturacion.codigo as codigo_fac', 'facturacion.valor', 'inscripciones.codigo_nuevo as codigo_ins')->distinct()->get();
        $i1am = '0';
        $i1af = '0';
        $i1bm = '0';
        $i1bf = '0';
        $i1cm = '0';
        $i1cf = '0';
        $i2am = '0';
        $i2af = '0';
        $i2bm = '0';
        $i2bf = '0';
        $i2cm = '0';
        $i2cf = '0';
        $pam = '0';
        $paf = '0';
        $pbm = '0';
        $pbf = '0';
        $pcm = '0';
        $pcf = '0';
        $pdm = '0';
        $pdf = '0';
        $sam = '0';
        $saf = '0';
        $sbm = '0';
        $sbf = '0';
        $scm = '0';
        $scf = '0';
        $sdm = '0';
        $sdf = '0';
        $tam = '0';
        $taf = '0';
        $tbm = '0';
        $tbf = '0';
        $tcm = '0';
        $tcf = '0';
        $tdm = '0';
        $tdf = '0';
        $cam = '0';
        $caf = '0';
        $cbm = '0';
        $cbf = '0';
        $ccm = '0';
        $ccf = '0';
        $cdm = '0';
        $cdf = '0';
        $cam = '0';
        $caf = '0';
        $qam = '0';
        $qaf = '0';
        $qbm = '0';
        $qbf = '0';
        $qcm = '0';
        $qcf = '0';
        $qdm = '0';
        $qdf = '0';
        $sexam = '0';
        $sexaf = '0';
        $sexbm = '0';
        $sexbf = '0';
        $sexcm = '0';
        $sexcf = '0';
        $sexdm = '0';
        $sexdf = '0';
        $sepam = '0';
        $sepaf = '0';
        $sepbm = '0';
        $sepbf = '0';
        $sepcm = '0';
        $sepcf = '0';
        $sepdm = '0';
        $sepdf = '0';
        $octam = '0';
        $octaf = '0';
        $octbm = '0';
        $octbf = '0';
        $octcm = '0';
        $octcf = '0';
        $octdm = '0';
        $octdf = '0';
        $novam = '0';
        $novaf = '0';
        $novbm = '0';
        $novbf = '0';
        $novcm = '0';
        $novcf = '0';
        $novdm = '0';
        $novdf = '0';
        $decam = '0';
        $decaf = '0';
        $decbm = '0';
        $decbf = '0';
        $deccm = '0';
        $deccf = '0';
        $decdm = '0';
        $decdf = '0';
        foreach($inicial1A as $ini1a)
        {
            if($ini1a->sexo == 'M')
            {
                $i1am++;
            }
            elseif($ini1a->sexo == 'F')
            {
                $i1af++;
            }
        }
        foreach($inicial1B as $ini1b)
        {
            if($ini1b->sexo == 'M')
            {
                $i1bm++;
            }
            elseif($ini1b->sexo == 'F')
            {
                $i1bf++;
            }
        }
        foreach($inicial1C as $ini1c)
        {
            if($ini1c->sexo == 'M')
            {
                $i1cm++;
            }
            elseif($ini1c->sexo == 'F')
            {
                $i1cf++;
            }
        }
        foreach($inicial2A as $ini2a)
        {
            if($ini2a->sexo == 'M')
            {
                $i2am++;
            }
            elseif($ini2a->sexo == 'F')
            {
                $i2af++;
            }
        }
        foreach($inicial2B as $ini2b)
        {
            if($ini2b->sexo == 'M')
            {
                $i2bm++;
            }
            elseif($ini2b->sexo == 'F')
            {
                $i2bf++;
            }
        }
        foreach($inicial2C as $ini2c)
        {
            if($ini2c->sexo == 'M')
            {
                $i2cm++;
            }
            elseif($ini2c->sexo == 'F')
            {
                $i2cf++;
            }
        }
        foreach($priA as $pa)
        {
            if($pa->sexo == 'M')
            {
                $pam++;
            }
            elseif($pa->sexo == 'F')
            {
                $paf++;
            }
        }
        foreach($priB as $pb)
        {
            if($pb->sexo == 'M')
            {
                $pbm++;
            }
            elseif($pb->sexo == 'F')
            {
                $pbf++;
            }
        }
        foreach($priC as $pc)
        {
            if($pc->sexo == 'M')
            {
                $pcm++;
            }
            elseif($pc->sexo == 'F')
            {
                $pcf++;
            }
        }
        foreach($priD as $pd)
        {
            if($pd->sexo == 'M')
            {
                $pdm++;
            }
            elseif($pd->sexo == 'F')
            {
                $pdf++;
            }
        }
        foreach($seA as $sea)
        {
            if($sea->sexo == 'M')
            {
                $sam++;
            }
            elseif($sea->sexo == 'F')
            {
                $saf++;
            }
        }
        foreach($seB as $seb)
        {
            if($seb->sexo == 'M')
            {
                $sbm++;
            }
            elseif($seb->sexo == 'F')
            {
                $sbf++;
            }
        }
        foreach($seC as $sc)
        {
            if($sc->sexo == 'M')
            {
                $scm++;
            }
            elseif($sc->sexo == 'F')
            {
                $scf++;
            }
        }
        foreach($seD as $sd)
        {
            if($sd->sexo == 'M')
            {
                $sdm++;
            }
            elseif($sd->sexo == 'F')
            {
                $sdf++;
            }
        }
        foreach($teA as $tea)
        {
            if($tea->sexo == 'M')
            {
                $tam++;
            }
            elseif($tea->sexo == 'F')
            {
                $taf++;
            }
        }
        foreach($teB as $teb)
        {
            if($teb->sexo == 'M')
            {
                $tbm++;
            }
            elseif($teb->sexo == 'F')
            {
                $tbf++;
            }
        }
        foreach($teC as $tc)
        {
            if($tc->sexo == 'M')
            {
                $tcm++;
            }
            elseif($tc->sexo == 'F')
            {
                $tcf++;
            }
        }
        foreach($cuaD as $td)
        {
            if($td->sexo == 'M')
            {
                $tdm++;
            }
            elseif($td->sexo == 'F')
            {
                $tdf++;
            }
        }
        foreach($cuaA as $cuaa)
        {
            if($cuaa->sexo == 'M')
            {
                $cam++;
            }
            elseif($cuaa->sexo == 'F')
            {
                $caf++;
            }
        }
        foreach($cuaB as $cuab)
        {
            if($cuab->sexo == 'M')
            {
                $cbm++;
            }
            elseif($cuab->sexo == 'F')
            {
                $cbf++;
            }
        }
        foreach($cuaC as $cuac)
        {
            if($cuac->sexo == 'M')
            {
                $ccm++;
            }
            elseif($cuac->sexo == 'F')
            {
                $ccf++;
            }
        }
        foreach($cuaD as $cd)
        {
            if($cd->sexo == 'M')
            {
                $cdm++;
            }
            elseif($cd->sexo == 'F')
            {
                $cdf++;
            }
        }
        foreach($quiA as $quia)
        {
            if($quia->sexo == 'M')
            {
                $qam++;
            }
            elseif($quia->sexo == 'F')
            {
                $qaf++;
            }
        }
        foreach($quiB as $quib)
        {
            if($quib->sexo == 'M')
            {
                $qbm++;
            }
            elseif($quib->sexo == 'F')
            {
                $qbf++;
            }
        }
        foreach($quiC as $quic)
        {
            if($quic->sexo == 'M')
            {
                $qcm++;
            }
            elseif($quic->sexo == 'F')
            {
                $ccf++;
            }
        }
        foreach($quiD as $qd)
        {
            if($qd->sexo == 'M')
            {
                $qdm++;
            }
            elseif($qd->sexo == 'F')
            {
                $qdf++;
            }
        }
        foreach($sexA as $sexa)
        {
            if($sexa->sexo == 'M')
            {
                $sexam++;
            }
            elseif($sexa->sexo == 'F')
            {
                $sexaf++;
            }
        }
        foreach($sexB as $sexb)
        {
            if($sexb->sexo == 'M')
            {
                $sexbm++;
            }
            elseif($sexb->sexo == 'F')
            {
                $sexbf++;
            }
        }
        foreach($sexC as $sexc)
        {
            if($sexc->sexo == 'M')
            {
                $sexcm++;
            }
            elseif($sexc->sexo == 'F')
            {
                $sexcf++;
            }
        }
        foreach($sexD as $sexd)
        {
            if($sexd->sexo == 'M')
            {
                $sexdm++;
            }
            elseif($sexd->sexo == 'F')
            {
                $sexdf++;
            }
        }
        foreach($sepA as $sepa)
        {
            if($sepa->sexo == 'M')
            {
                $sepam++;
            }
            elseif($sepa->sexo == 'F')
            {
                $sepaf++;
            }
        }
        foreach($sepB as $sepb)
        {
            if($sepb->sexo == 'M')
            {
                $sepbm++;
            }
            elseif($sepb->sexo == 'F')
            {
                $sepbf++;
            }
        }
        foreach($sepC as $sepc)
        {
            if($sepc->sexo == 'M')
            {
                $sepcm++;
            }
            elseif($sepc->sexo == 'F')
            {
                $sepcf++;
            }
        }
        foreach($sepD as $sepd)
        {
            if($sepd->sexo == 'M')
            {
                $sepdm++;
            }
            elseif($sepd->sexo == 'F')
            {
                $sepdf++;
            }
        }
        foreach($octA as $octa)
        {
            if($octa->sexo == 'M')
            {
                $octam++;
            }
            elseif($octa->sexo == 'F')
            {
                $octaf++;
            }
        }
        foreach($octB as $octb)
        {
            if($octb->sexo == 'M')
            {
                $octbm++;
            }
            elseif($octb->sexo == 'F')
            {
                $octbf++;
            }
        }
        foreach($octC as $octc)
        {
            if($octc->sexo == 'M')
            {
                $octcm++;
            }
            elseif($octc->sexo == 'F')
            {
                $octcf++;
            }
        }
        foreach($octD as $octd)
        {
            if($octd->sexo == 'M')
            {
                $octdm++;
            }
            elseif($octd->sexo == 'F')
            {
                $octdf++;
            }
        }
        foreach($novA as $nova)
        {
            if($nova->sexo == 'M')
            {
                $novam++;
            }
            elseif($nova->sexo == 'F')
            {
                $novaf++;
            }
        }
        foreach($novB as $novb)
        {
            if($novb->sexo == 'M')
            {
                $novbm++;
            }
            elseif($novb->sexo == 'F')
            {
                $novbf++;
            }
        }
        foreach($novC as $novc)
        {
            if($novc->sexo == 'M')
            {
                $novcm++;
            }
            elseif($novc->sexo == 'F')
            {
                $novcf++;
            }
        }
        foreach($novD as $novd)
        {
            if($novd->sexo == 'M')
            {
                $novdm++;
            }
            elseif($novd->sexo == 'F')
            {
                $novdf++;
            }
        }
        foreach($decA as $deca)
        {
            if($deca->sexo == 'M')
            {
                $decam++;
            }
            elseif($deca->sexo == 'F')
            {
                $decaf++;
            }
        }
        foreach($decB as $decb)
        {
            if($decb->sexo == 'M')
            {
                $decbm++;
            }
            elseif($decb->sexo == 'F')
            {
                $decbf++;
            }
        }
        foreach($decC as $decc)
        {
            if($decc->sexo == 'M')
            {
                $deccm++;
            }
            elseif($decc->sexo == 'F')
            {
                $deccf++;
            }
        }
        foreach($decD as $decd)
        {
            if($decd->sexo == 'M')
            {
                $decdm++;
            }
            elseif($decd->sexo == 'F')
            {
                $decdf++;
            }
        }
       $total = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->count();
       $totalM = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('inscripciones.sexo', 'M')->count();
       $totalF = Matriculacion::join('inscripciones', 'matriculados.codigo', '=', 'inscripciones.codigo_nuevo')->join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('inscripciones.sexo', 'F')->count();
       $date = Carbon::now();
        $pdf = PDF::loadView('pdf.total-lista', compact('total', 'totalM', 'totalF','date','i1am', 'i1af', 'i1bm', 'i1bf', 'i1cm', 'i1cf','i2am', 'i2af', 'i2bm', 'i2bf', 'i2cm', 'i2cf', 'pam', 'paf','pbm', 'pbf','pcm', 'pcf','pdm', 'pdf', 'sam', 'saf', 'sbm', 'sbf', 'scm', 'scf', 'sdm', 'sdf', 'tam', 'taf', 'tbm', 'tbf', 'tcm', 'tcf', 'tdm', 'tdf', 'cam', 'caf', 'cbm', 'cbf', 'ccm', 'ccf', 'cdm', 'cdf', 'qam', 'qaf', 'qbm', 'qbf', 'qcm', 'qcf', 'qdm', 'qdf', 'sexam', 'sexaf', 'sexbm', 'sexbf', 'sexcm', 'sexcf', 'sexdm', 'sexdf', 'sepam', 'sepaf', 'sepbm', 'sepbf', 'sepcm', 'sepcf', 'sepdm', 'sepdf', 'octam', 'octaf', 'octbm', 'octbf', 'octcm', 'octcf', 'octdm', 'octdf', 'novam', 'novaf', 'novbm', 'novbf', 'novcm', 'novcf', 'novdm', 'novdf', 'decam', 'decaf', 'decbm', 'decbf', 'deccm', 'deccf', 'decdm', 'decdf'));


        return $pdf->download('matriculados-total-lista.pdf');

    }




}
