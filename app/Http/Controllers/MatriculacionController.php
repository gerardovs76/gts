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
    public function buscarAlumnoMatriculado(Request $request, $cedula)
    {
        $cedula = $request->cedula;
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

    $matriculados = DB::table('matriculados')
    ->where('curso', $curso)
    ->where('paralelo', $paralelo)
    ->select('*')
    ->get();


    $pdf = PDF::loadView('pdf.reporte-matriculados', compact('matriculados'));

        return $pdf->download('matriculados-reporte.pdf');

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

        $sep = Matriculacion::join('facturacion', 'matriculados.codigo', '=', 'facturacion.codigo')->where('facturacion.referencias', 'LIKE', '%'.'SEP'.'%')->where('matriculados.curso', $curso)->where('matriculados.paralelo', $paralelo)->select('matriculados.cedula', 'facturacion.codigo', 'facturacion.fecha_inicio', 'facturacion.num_referencia', 'facturacion.referencias', 'facturacion.nombres', 'facturacion.valor', 'matriculados.curso', 'matriculados.paralelo')->distinct()->get();
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


}
