<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use DB;
use App\Http\Requests\ProfesorRequest;
use App\MateriasProfesor;
use App\Nota_ta;
use App\Notas_ti;
use App\Notas_tg;
use App\Notas_le;
use App\Notas_ev;
use App\Notas_conducta;
use App\Notas_examen;
use App\User;
class ProfesorController extends Controller
{

    public function index()
    {
        $profesor = Profesor::all();
        return view('profesor.index', compact('profesor'));
    }


    public function create()
    {
        return view('profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfesorRequest $request)
    {
        $profesor = new Profesor;
        $profesor->cedula = $request->cedula;
        $profesor->nombres_apellidos = $request->nombres_apellidos;
        $profesor->direccion = $request->direccion;
        $profesor->fecha_nacimiento = $request->fecha_nacimiento;
        $profesor->correo = $request->correo;
        $profesor->movil = $request->movil;
        $profesor->convencional = $request->convencional;
        $profesor->perfil_docente = $request->perfil_docente;
        $profesor->ultimo_trabajo = $request->ultimo_trabajo;
        $profesor->tipo_contrato = $request->tipo_contrato;
        $profesor->cargo = $request->cargo;
        $profesor->save();
        return redirect()->route('profesor.index')->with('info', 'El profesor se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = Profesor::find($id);
        return view('profesor.show',compact('profesor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        return view('profesor.edit',compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfesorRequest $request, $id)
    {
        $profesor = Profesor::find($id);
        $profesor->cedula = $request->cedula;
        $profesor->nombres_apellidos = $request->nombres_apellidos;
        $profesor->direccion = $request->direccion;
        $profesor->fecha_nacimiento = $request->fecha_nacimiento;
        $profesor->correo = $request->correo;
        $profesor->movil = $request->movil;
        $profesor->convencional = $request->convencional;
        $profesor->perfil_docente = $request->perfil_docente;
        $profesor->ultimo_trabajo = $request->ultimo_trabajo;
        $profesor->tipo_contrato = $request->tipo_contrato;
        $profesor->cargo = $request->cargo;
        $profesor->save();
        return redirect()->route('profesor.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = Profesor::find($id);
        $profesor->delete();
        return back()->with('info', 'Profesor eliminado correctamente');
    }

    public function perfil()
    {
        return view('profesor.perfil');
    }

    public function perfilProfesorCedula($cedula)
    {
    $profesor = DB::table('profesors')
    ->select('cedula', 'nombres_apellidos', 'direccion', 'fecha_nacimiento', 'correo', 'movil', 'convencional', 'perfil_docente', 'ultimo_trabajo', 'tipo_contrato', 'cargo')
    ->where('cedula', 'LIKE', '%'.$cedula.'%')
    ->distinct()
    ->groupBy('profesors.id')
    ->get();

    return response()->json($profesor);
    }

    public function añadirMateriasProfesor()
    {
        return view('profesor.añadirMaterias');
    }
    public function buscarMateriasProfesor(Request $request, $cedula)
    {
        $cedula = $request->cedula;

        $profesor = DB::table('profesors')
        ->where('cedula', $cedula)
        ->select('nombres_apellidos', 'id')
        ->distinct()
        ->groupBy('id')
        ->get();


        return response()->json($profesor);
    }

    public function verProfesorMaterias()
    {
        return view('profesor.verMateriasProfesor');
    }
    public function verMateriasProfesor(Request $request, $cedula)
    {
    $cedula = $request->cedula;

    $profesor = DB::table('materias_profesores')
    ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
    ->join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
    ->select('profesors.nombres_apellidos as nombres', 'materias.materia as nombre_materia', 'materias.curso', 'materias.paralelo', 'materias_profesores.id')
    ->where('profesors.cedula', $cedula)
    ->distinct()
    ->get();


    return response()->json($profesor);
    }

    public function controlProfesor()
    {

        return view('profesor.controlProfesor');
    }
    public function controlNotasProfesor()
    {
        $profesorUser = User::join('profesors', 'users.cedula', '=', 'profesors.cedula')->pluck('users.id');
        foreach($profesorUser as $user)
        {
            $notas_ta = Nota_ta::where('autoridad_id', $user)->first();
            dd($notas_ta);
        }
    }

    }

