<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecursosHumanos;
use DB;

class RecursosHumanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        return view('recursos_humanos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recursos_humanos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $recursos_humanos = new RecursosHumanos;
       $recursos_humanos->nombres_apellidos = $request->nombres_apellidos;
       $recursos_humanos->apellidos_paternos = $request->apellidos_paternos;
       $recursos_humanos->apellidos_maternos = $request->apellidos_maternos;
       $recursos_humanos->fecha_nacimiento = $request->fecha_nacimiento;
       $recursos_humanos->provincia = $request->provincia;
       $recursos_humanos->parroquia = $request->parroquia;
       $recursos_humanos->canton = $request->canton;
       $recursos_humanos->numero_telefono_domicilio = $request->numero_telefono_domicilio;
       $recursos_humanos->numero_telefono_celular = $request->numero_telefono_celular;
       $recursos_humanos->institucion_bancaria = $request->institucion_bancaria;
       $recursos_humanos->numero_cuenta = $request->numero_cuenta;
       $recursos_humanos->tipo_cuenta = $request->tipo_cuenta;
       $recursos_humanos->correo_electronico = $request->correo_electronico;
       $recursos_humanos->t_zapatos = $request->t_zapatos;
       $recursos_humanos->t_pantalon = $request->t_pantalon;
       $recursos_humanos->t_camiseta = $request->t_camiseta;
       $recursos_humanos->avenida = $request->avenida;
       $recursos_humanos->calle = $request->calle;
       $recursos_humanos->pasaje = $request->pasaje;
       $recursos_humanos->jiron = $request->jiron;
       $recursos_humanos->urb_lugar = $request->urb_lugar;
       $recursos_humanos->sector = $request->sector;
       $recursos_humanos->numero = $request->numero;
       $recursos_humanos->transversal = $request->transversal;
       $recursos_humanos->referencia = $request->referencia;
       $recursos_humanos->estado_civil = $request->estado_civil;
       $recursos_humanos->apellidos_paternos_c = $request->apellidos_paternos_c;
       $recursos_humanos->apellidos_maternos_c = $request->apellidos_maternos_c;
       $recursos_humanos->nombres_conyugue = $request->nombres_conyugue;
       $recursos_humanos->fecha_nacimiento_conyugue = $request->fecha_nacimiento_conyugue;
       $recursos_humanos->lugar_donde_labora = $request->lugar_donde_labora;
       $recursos_humanos->apellidos_nombres_hijos = $request->apellidos_nombres_hijos;
       $recursos_humanos->fecha_nacimiento_hijos = $request->fecha_nacimiento_hijos;
       $recursos_humanos->ocupacion = $request->ocupacion;
       $recursos_humanos->estado_civil_hijos = $request->estado_civil_hijos;
       $recursos_humanos->vive_con_usted = $request->vive_con_usted;
       $recursos_humanos->apellidos_nombres_familiares = $request->apellidos_nombres_familiares;
       $recursos_humanos->parentesco = $request->parentesco;
       $recursos_humanos->direccion_telefono = $request->direccion_telefono;
       $recursos_humanos->completa_incompleta = $request->completa_incompleta;
       $recursos_humanos->desde = $request->desde;
       $recursos_humanos->hasta = $request->hasta;
       $recursos_humanos->educacion_superior = $request->educacion_superior;
       $recursos_humanos->especialidad = $request->especialidad;
       $recursos_humanos->centro_de_estudios = $request->centro_de_estudios;
       $recursos_humanos->desde_edu_supe = $request->desde_edu_supe;
       $recursos_humanos->hasta_edu_supe = $request->hasta_edu_supe;
       $recursos_humanos->completa_incompleta_edu_sup = $request->completa_incompleta_edu_sup;
       $recursos_humanos->grado_academico_obtenido = $request->grado_academico_obtenido;
       $recursos_humanos->idioma_dialecto = $request->idioma_dialecto;
       $recursos_humanos->lee = $request->lee;
       $recursos_humanos->habla = $request->habla;
       $recursos_humanos->escribe = $request->escribe;
       $recursos_humanos->nombre_empresa = $request->nombre_empresa;
       $recursos_humanos->fecha_entrada_empresa = $request->fecha_entrada_empresa;
       $recursos_humanos->fecha_salida_empresa = $request->fecha_salida_empresa;
       $recursos_humanos->cargo = $request->cargo;
       $recursos_humanos->funciones_especificas = $request->funciones_especificas;
       $recursos_humanos->nombre_jefe = $request->nombre_jefe;
       $recursos_humanos->motivo_salida = $request->motivo_salida;
       $recursos_humanos->telefono_de_empresa = $request->telefono_de_empresa;
       $recursos_humanos->huellas_digitales = $request->huellas_digitales;
       $recursos_humanos->croquis = $request->croquis;
       $recursos_humanos->save();

       return redirect()->route('home')->with('info', 'Se ha agregado correctamente');
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



    public function BuscarProfesorRRHH(Request $request, $cedula)
    {
        $cedula = $request->cedula;
        $profesor = DB::table('profesors')->select('nombres_apellidos', 'id')->where('cedula', 'LIKE', '%'.$cedula.'%')->get();
        return response()->json($profesor);

    }
    public function perfil()
    {
      return view('recursos_humanos.perfil');
    }

    public function datosPerfil(Request $request, $cedula)
    {
      $cedula = $request->cedula;

      $recursos_humanos = DB::table('recursos_humanos')->where('cedula', $cedula)->select('nombres_apellidos', 'cedula', 'provincia', 'estado_civil')
      ->get();

      return response()->json($recursos_humanos);
    }
}
