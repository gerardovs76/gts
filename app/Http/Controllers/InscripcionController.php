<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AlumnosInscritos;
use App\Exports\InscripcionesUsuariosE;
use App\Exports\InscritosAntiguos;
use App\Exports\InscritosNuevos;
use App\Imports\InscripcionImport;
use App\Imports\InscritosAntiguosImport;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Requests\InscripcionesRequest;
use Mail;
use Illuminate\Support\Facades\Input;
use App\Exports\InscritosBloqueados;
use App\ValidarIdentificacion;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripcion = Inscripcion::all();
        return view('inscripcion.index', compact('inscripcion'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inscripcion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscripcionesRequest $request)
    {
        $date = Carbon::now();
        $years = $request->fecha_nacimiento;
        $validate = new ValidarIdentificacion();
        if($request->tipo_estudiante == 'NUEVO')
        {
        $inscripcion = new Inscripcion;
        if($validate->validarCedula($request->cedula))
        {
            $inscripcion->cedula  = $request->cedula;
        }
        else{
            return redirect()->route('inscripcion.create')->with('error', 'Cedula en formato incorrecto');
        }
        $inscripcion->nombres = $request->nombres;
        $inscripcion->apellidos  = $request->apellidos;
        $inscripcion->fecha_nacimiento  = $request->fecha_nacimiento;
        $inscripcion->edad = (Carbon::parse($years)->age);
        $inscripcion->curso = $request->curso;
        $inscripcion->edad_representante = $request->edad_representante;
        $inscripcion->fn_representante = $request->fn_representante;
        $inscripcion->direccion_alumno  = $request->direccion_alumno;
        $inscripcion->sexo = $request->sexo;
        $inscripcion->representante = $request->representante;
        $inscripcion->tipo_persona = $request->tipo_persona;
        $inscripcion->sector = $request->sector;
        $inscripcion->email = $request->email;
        $inscripcion->profesion = $request->profesion;
        $inscripcion->ocupacion = $request->ocupacion;
        $inscripcion->nombres_representante = $request->nombres_representante;
        $inscripcion->direccion_representante = $request->direccion_representante;
        $inscripcion->cedula_padre = $request->cedula_padre;
        $inscripcion->apellidos_padre = $request->apellidos_padre;
        $inscripcion->nombres_padre = $request->nombres_padre;
        $inscripcion->direccion_padre = $request->direccion_padre;
        $inscripcion->telefono_padre = $request->telefono_padre;
        $inscripcion->celular_padre = $request->celular_padre;
        $inscripcion->correo_padre = $request->correo_padre;
        $inscripcion->profesion_padre = $request->profesion_padre;
        $inscripcion->ocupacion_padre = $request->ocupacion_padre;
        $inscripcion->cedula_madre = $request->cedula_madre;
        $inscripcion->apellidos_madre = $request->apellidos_madre;
        $inscripcion->nombres_madre = $request->nombres_madre;
        $inscripcion->direccion_madre = $request->direccion_madre;
        $inscripcion->telefono_madre = $request->telefono_madre;
        $inscripcion->celular_madre = $request->celular_madre;
        $inscripcion->correo_madre = $request->correo_madre;
        $inscripcion->profesion_madre = $request->profesion_madre;
        $inscripcion->ocupacion_madre = $request->ocupacion_madre;
        if($validate->validarRucPersonaNatural($request->cedrepresentante))
        {
            $inscripcion->cedrepresentante = $request->cedrepresentante;
        }
        elseif($validate->validarRucSociedadPrivada($request->cedrepresentante))
        {
            $inscripcion->cedrepresentante = $request->cedrepresentante;

        }
        elseif($validate->validarRucSociedadPublica($request->cedrepresentante))
        {
            $inscripcion->cedrepresentante = $request->cedrepresentante;
        }
        else{
            return redirect()->route('inscripcion.create')->with('error', 'Formato de RUC incorrecto');
        }
        $inscripcion->cedrepresentante  = $request->cedrepresentante;
        $inscripcion->direccion_representante  = $request->direccion_representante;
        $inscripcion->movil= $request->movil;
        $inscripcion->convencional =$request->convencional;
        $inscripcion->codigo_nuevo = $request->codigo_nuevo;
        $inscripcion->tipo_estudiante = $request->tipo_estudiante;
        $inscripcion->fecha = $request->fecha;
        $inscripcion->hora = $request->hora;
        $inscripcion->fecha_creacion = $date->format('Y-m-d');
        $inscripcion->paralelo = 'C';
        $inscripcion->save();
        $pdf = PDF::loadView('pdf.inscritos', compact('inscripcion'));

        return $pdf->download('inscritos.pdf');
        }
    elseif($request->tipo_estudiante == 'ANTIGUO'){
        $years = $request->fecha_nacimiento;
        $inscripcion = new Inscripcion;
        if($validate->validarCedula($request->cedula))
        {
            $inscripcion->cedula  = $request->cedula;
        }
        else{
            return redirect()->route('inscripcion.create')->with('error', 'Cedula en formato incorrecto');
        }
        $inscripcion->nombres = $request->nombres;
        $inscripcion->apellidos  = $request->apellidos;
        $inscripcion->fecha_nacimiento  = $request->fecha_nacimiento;
        $inscripcion->edad = (Carbon::parse($years)->age);
        $inscripcion->curso = $request->curso;
        $inscripcion->edad_representante = $request->edad_representante;
        $inscripcion->fn_representante = $request->fn_representante;
        $inscripcion->direccion_alumno  = $request->direccion_alumno;
        $inscripcion->sexo = $request->sexo;
        $inscripcion->representante = $request->representante;
        $inscripcion->tipo_persona = $request->tipo_persona;
        $inscripcion->sector = $request->sector;
        $inscripcion->email = $request->email;
        $inscripcion->profesion = $request->profesion;
        $inscripcion->ocupacion = $request->ocupacion;
        $inscripcion->nombres_representante = $request->nombres_representante;
        $inscripcion->direccion_representante = $request->direccion_representante;
        $inscripcion->cedula_padre = $request->cedula_padre;
        $inscripcion->apellidos_padre = $request->apellidos_padre;
        $inscripcion->nombres_padre = $request->nombres_padre;
        $inscripcion->direccion_padre = $request->direccion_padre;
        $inscripcion->telefono_padre = $request->telefono_padre;
        $inscripcion->celular_padre = $request->celular_padre;
        $inscripcion->correo_padre = $request->correo_padre;
        $inscripcion->profesion_padre = $request->profesion_padre;
        $inscripcion->ocupacion_padre = $request->ocupacion_padre;
        $inscripcion->cedula_madre = $request->cedula_madre;
        $inscripcion->apellidos_madre = $request->apellidos_madre;
        $inscripcion->nombres_madre = $request->nombres_madre;
        $inscripcion->direccion_madre = $request->direccion_madre;
        $inscripcion->telefono_madre = $request->telefono_madre;
        $inscripcion->celular_madre = $request->celular_madre;
        $inscripcion->correo_madre = $request->correo_madre;
        $inscripcion->profesion_madre = $request->profesion_madre;
        $inscripcion->ocupacion_madre = $request->ocupacion_madre;
        if($validate->validarRucPersonaNatural($request->cedrepresentante))
        {
            $inscripcion->cedrepresentante = $request->cedrepresentante;
        }
        elseif($validate->validarRucSociedadPrivada($request->cedrepresentante))
        {
            $inscripcion->cedrepresentante = $request->cedrepresentante;

        }
        elseif($validate->validarRucSociedadPublica($request->cedrepresentante))
        {
            $inscripcion->cedrepresentante = $request->cedrepresentante;
        }
        else{
            return redirect()->route('inscripcion.create')->with('error', 'Formato de RUC incorrecto');
        }
        $inscripcion->direccion_representante  = $request->direccion_representante;
        $inscripcion->movil= $request->movil;
        $inscripcion->convencional =$request->convencional;
        $inscripcion->codigo_nuevo = $request->codigo_nuevo;
        $inscripcion->fecha_creacion = $date->format('Y-m-d');
        $inscripcion->paralelo = $request->paralelo;
        if($request->curso == 'DECIMO DE EGB'||$request->curso == 'PRIMERO DE BACHILLERATO'||$request->curso == 'SEGUNDO DE BACHILLERATO')
        {
            $inscripcion->tipo_estudiante = 'BLOQUEADO';
        }
        else{
            $inscripcion->tipo_estudiante = $request->tipo_estudiante;
        }

        $inscripcion->save();
        $pdf = PDF::loadView('pdf.inscritos', compact('inscripcion'));

        return $pdf->download('inscritos.pdf');

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscripcion  $Inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscripcion = Inscripcion::find($id);
        return view('inscripcion.show', compact('inscripcion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscripcion  $Inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscripcion = Inscripcion::find($id);
        return view('inscripcion.edit', compact('inscripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscripcion  $Inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inscripcion = Inscripcion::find($id);
        $inscripcion->cedula  = $request->cedula;
        $inscripcion->nombres = $request->nombres;
        $inscripcion->apellidos  = $request->apellidos;
        $inscripcion->fecha_nacimiento  = $request->fecha_nacimiento;
        $inscripcion->fn_representante = $request->fn_representante;
        $inscripcion->edad = $request->edad;
        $inscripcion->curso = $request->curso;
        $inscripcion->direccion_alumno  = $request->direccion_alumno;
        $inscripcion->sexo = $request->sexo;
        $inscripcion->representante = $request->representante;
        $inscripcion->tipo_persona = $request->tipo_persona;
        $inscripcion->sector = $request->sector;
        $inscripcion->email = $request->email;
        $inscripcion->profesion = $request->profesion;
        $inscripcion->ocupacion = $request->ocupacion;
        $inscripcion->nombres_representante = $request->nombres_representante;
        $inscripcion->direccion_representante = $request->direccion_representante;
        $inscripcion->edad_representante = $request->edad_representante;
        $inscripcion->cedula_padre = $request->cedula_padre;
        $inscripcion->apellidos_padre = $request->apellidos_padre;
        $inscripcion->nombres_padre = $request->nombres_padre;
        $inscripcion->direccion_padre = $request->direccion_padre;
        $inscripcion->telefono_padre = $request->telefono_padre;
        $inscripcion->celular_padre = $request->celular_padre;
        $inscripcion->correo_padre = $request->correo_padre;
        $inscripcion->profesion_padre = $request->profesion_padre;
        $inscripcion->ocupacion_padre = $request->ocupacion_padre;
        $inscripcion->cedula_madre = $request->cedula_madre;
        $inscripcion->apellidos_madre = $request->apellidos_madre;
        $inscripcion->nombres_madre = $request->nombres_madre;
        $inscripcion->direccion_madre = $request->direccion_madre;
        $inscripcion->telefono_madre = $request->telefono_madre;
        $inscripcion->celular_madre = $request->celular_madre;
        $inscripcion->correo_madre = $request->correo_madre;
        $inscripcion->profesion_madre = $request->profesion_madre;
        $inscripcion->ocupacion_madre = $request->ocupacion_madre;
        $inscripcion->cedrepresentante  = $request->cedrepresentante;
        $inscripcion->direccion_representante  = $request->direccion_representante;
        $inscripcion->movil  = $request->movil;
        $inscripcion->convencional =$request->convencional;
        $inscripcion->codigo_nuevo = $request->codigo_nuevo;
        $inscripcion->save();
        return redirect()->route('inscripcion.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscripcion  $Inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscripcion = Inscripcion::find($id);
        $inscripcion->delete();
        return back()->with('info', 'El alumno ha sido eliminado exitosamente');
    }
    public function codigoAleatorio()
    {
        $numero = 1;

        for($i=0;$i>=$numero;$i++){
        dd(str_pad($numero[$i], 4, '0', STR_PAD_LEFT));
    }


    }
    public function reportesInscritos()
    {
        return view('inscripcion.reportes');
    }

    public function buscarReporteInscritos()
    {
        $fecha = date('Y-m-d');
        $inscritos = Inscripcion::select('nombres', 'curso', 'edad', 'convencional', 'email')->get();
         $pdf = PDF::loadView('pdf.alumnos', compact('inscritos', 'fecha'));

        return $pdf->download('alumnos.pdf');

    }
    public function buscarReporteInscritosExcel(){

        return Excel::download(new AlumnosInscritos, 'alumnos-inscritos.xlsx');



    }
    public function perfil()
    {
        return view('inscripcion.perfil');
    }

    public function buscarPerfilCedula($cedula)
    {

        $inscripcion = DB::table('inscripciones')
        ->select('cedula', 'nombres', 'apellidos', 'edad', DB::raw("CONCAT(cedrepresentante, ' ', nombres_representante) as info_representante"),'representante', 'direccion_representante', 'convencional', 'movil', 'sexo')
        ->where('cedula', 'LIKE', '%'.$cedula.'%')
        ->distinct()
        ->orderBy('inscripciones.id')
        ->get();


        return response()->json($inscripcion);
    }
    public function buscarPerfilApellidos($apellidos)
    {

        $inscripcion = DB::table('inscripciones')
        ->select('cedula', 'nombres', 'apellidos', 'edad', DB::raw("CONCAT(cedrepresentante, ' ', nombres_representante) as info_representante"),'representante', 'direccion_representante', 'convencional', 'movil', 'sexo')
        ->where('apellidos', 'LIKE', '%'.$apellidos.'%')
        ->distinct()
        ->orderBy('inscripciones.id')
        ->get();


        return response()->json($inscripcion);
    }
    public function importarDatos()
    {
        return view('inscripcion.importarData');
    }
    public function import(Request $request)
    {

       Excel::import(new InscritosAntiguosImport, $request->import_file);

       return back()->with('info', 'Se ha cargado la informacion correctamente');
 }
        public function buscarReporteInscritosUsuarios(){

        return Excel::download(new InscripcionesUsuariosE, 'usuarios-inscritos.xls');



    }
    public function busquedaAntiguos(Request $request, $codigo)
    {
        $codigo = $request->codigo;
        $antiguos = DB::table('antiguo_inscritos')
        ->select('*')
        ->where('codigo', $codigo)

        ->get();

        return response()->json($antiguos);
    }
    public function exportarInscripciones()
    {
        return view('inscripcion.reportesInscripcion');
    }

    public function exportInscritos(Request $request)
    {
        if($request->tipo_estudiante == 'NUEVO'){
        $fecha = $request->fecha;
        $fecha_hasta = $request->fecha_hasta;
        return Excel::download(new InscritosNuevos($fecha, $fecha_hasta), 'carga-masivaNuevos.xls');
    }
    else if($request->tipo_estudiante == 'ANTIGUO')
    {
        $fecha = $request->fecha;
          $fecha_hasta = $request->fecha_hasta;
        return Excel::download(new InscritosAntiguos($fecha, $fecha_hasta), 'carga-masivaAntiguos.xls');
    }
    else if ($request->tipo_estudiante == 'BLOQUEADO')
    {
        $fecha = $request->fecha;
        $fecha_hasta = $request->fecha_hasta;

        return Excel::download(new InscritosBloqueados($fecha, $fecha_hasta), 'carga-masivaBloqueados.xls');
    }

    }



}
