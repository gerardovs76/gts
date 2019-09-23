<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medico;
use App\ObservacionMedico;
use DB;


class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        return view('medico.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cedula = $request->cedula;
        $fecha = $request->fecha;
        $nombres_apellidos = $request->nombres_apellidos;
        $curso = $request->curso;
        $paralelo = $request->paralelo;
        $sexo = $request->sexo;
        $grupo_sanguineo = $request->grupo_sanguineo;
        $peso = $request->peso;
        $talla = $request->talla;
        $direccion_completa = $request->direccion_completa;
        $plan_vacunacion = $request->plan_vacunacion;
        $enfermedades_padece = $request->enfermedades_padece;
        $reaccion_alergica_alimentos = $request->reaccion_alergica_alimentos;
        $reaccion_alergica_medicamentos = $request->reaccion_alergica_medicamentos;
        $reaccion_alergica_insectos = $request->reaccion_alergica_insectos;
        $reaccion_alergica_otros = $request->reaccion_alergica_otros;
        $bajo_tratamiento = $request->bajo_tratamiento;
        $p_padecio = $request->p_padecio;
        $nombres_completos_1 = $request->nombres_completos_1;
        $nombres_completos_2 = $request->nombres_completos_2;
        $nombres_completos_3 = $request->nombres_completos_3;
        $telef_fijo_1 = $request->telef_fijo_1;
        $telef_fijo_2 = $request->telef_fijo_2;
        $telef_fijo_3 = $request->telef_fijo_3;
        $movil_1 = $request->movil_1;
        $movil_2 = $request->movil_2;
        $movil_3 = $request->movil_3;
        $apellidos_nombres_madre = $request->apellidos_nombres_madre;
        $apellidos_nombres_padre = $request->apellidos_nombres_padre;
        $direccion_madre = $request->direccion_madre;
        $direccion_padre = $request->direccion_padre;
        $telefono_madre = $request->telefono_madre;
        $telefono_padre = $request->telefono_padre;
        $celular_madre = $request->celular_madre;
        $celular_padre = $request->celular_padre;
        
        $padece_p = implode(',' , $p_padecio);
        $p_p = trim($padece_p, ',');

        $enfermedades_p = implode(',', $enfermedades_padece);
        $e_p = trim($enfermedades_p, ',');

        $reaccion_alergica_a = implode(',', $reaccion_alergica_alimentos);
        $r_a = trim($reaccion_alergica_a, ',');

        $reaccion_alergica_m = implode(',', $reaccion_alergica_medicamentos);
        $r_m = trim($reaccion_alergica_m, ',');

        $reaccion_alergica_i = implode(',', $reaccion_alergica_insectos);
        $r_i = trim($reaccion_alergica_i, ',');

        $reaccion_alergica_o = implode(',', $reaccion_alergica_otros);
        $r_o = trim($reaccion_alergica_o, ',');

        $bajo_t = implode(',', $bajo_tratamiento);
        $b_t = trim($bajo_t, ',');



        $medico = new Medico;
        $medico->cedula = $cedula;
        $medico->fecha = $fecha;
        $medico->nombres_apellidos = $nombres_apellidos;
        $medico->curso = $curso;
        $medico->paralelo = $paralelo;
        $medico->sexo = $sexo;
        $medico->grupo_sanguineo = $grupo_sanguineo;
        $medico->peso = $peso;
        $medico->talla = $talla;
        $medico->direccion_completa = $direccion_completa;
        $medico->plan_vacunacion = $plan_vacunacion;
        $medico->enfermedades_padece = $e_p;
        $medico->reaccion_alergica_alimentos = $r_a;
        $medico->reaccion_alergica_medicamentos = $r_m;
        $medico->reaccion_alergica_insectos = $r_i;
        $medico->reaccion_alergica_otros = $r_o;
        $medico->bajo_tratamiento = $b_t;
        $medico->p_padecio = $p_p;
        $medico->nombres_completos_1 =  $nombres_completos_1;
        $medico->nombres_completos_2 = $nombres_completos_2;
        $medico->nombres_completos_3 = $nombres_completos_3;
        $medico->telef_fijo_1 =   $telef_fijo_1;
        $medico->telef_fijo_2 =  $telef_fijo_2;
        $medico->telef_fijo_3 =  $telef_fijo_3;
        $medico->movil_1 = $movil_1;
        $medico->movil_2 = $movil_2;
        $medico->movil_3 = $movil_3;
        $medico->apellidos_nombres_madre = $apellidos_nombres_madre;
        $medico->apellidos_nombres_padre = $apellidos_nombres_padre;
        $medico->direccion_madre = $direccion_madre;
        $medico->direccion_padre = $direccion_padre;
        $medico->telefono_madre = $telefono_madre;
        $medico->telefono_padre = $telefono_padre;
        $medico->celular_madre = $celular_madre;
        $medico->celular_padre = $celular_padre;
        $medico->save();

        return view('medico.index')->with('info', 'Se ha agregado la observacion del medico correctamente');
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verPerfil()
   {

    return view('medico.show');


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
    public function medicoAlumno(Request $request, $cedula)
    {
        $cedula = $request->cedula;

        $matriculado = DB::table('matriculados')
        ->join('inscripciones', 'matriculados.cedula', '=', 'inscripciones.cedula')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"), 'matriculados.curso', 'matriculados.paralelo', 'inscripciones.sexo', 'inscripciones.edad', DB::raw("CONCAT(apellidos_madre, ' ', nombres_madre) as nombres_madre"), 'inscripciones.telefono_madre as telefono_madre', 'inscripciones.celular_madre as celular_madre', DB::raw("CONCAT(apellidos_padre, ' ',nombres_padre) as nombres_padre"), 'inscripciones.telefono_padre as telefono_padre', 'inscripciones.celular_padre as celular_padre')
        ->where('matriculados.cedula', 'LIKE', '%'.$cedula.'%')
        ->distinct()
        ->get();


        return response()->json($matriculado);
    }

    public function observacionMedica()
    {

        return view('medico.observacion');

    }

    public function asignarObservacionMedica(Request $request)
    {

        $observacion = new ObservacionMedico;
        $observacion->matriculados_id = $request->matriculados_id;
        $observacion->fecha = $request->fecha;
        $observacion->diagnostico = $request->diagnostico;
        $observacion->medicamentos = $request->medicamentos;
        $observacion->observacion = $request->observacion;
        $observacion->save();

        return view('medico.observacion')->with('info', 'Se agrego la observación correctamente');




    }
    public function buscarAlumnoMedico(Request $request, $curso)
    {
        $curso = $request->curso;

        $alumno = DB::table('matriculados')
        ->select(DB::raw("CONCAT(apellidos, ' ',nombres) as nombres"), DB::raw("CONCAT(curso, ' ', paralelo) as grado"), 'id')
        ->where('curso', 'LIKE', '%'.$curso.'%')
        ->distinct()
        ->get();

        return response()->json($alumno);

    }

    public function reporte()
    {
        return view('medico.reporte');
    }

    public function verReporte(Request $request, $cedula)
    {
        $cedula = $request->cedula;

        $matriculados = DB::table('medico_observacion')
        ->join('matriculados', 'medico_observacion.matriculados_id', '=', 'matriculados.id')
        ->select('matriculados.apellidos', 'matriculados.nombres','matriculados.curso', 'matriculados.paralelo', 'medico_observacion.fecha', 'medico_observacion.diagnostico', 'medico_observacion.medicamentos', 'medico_observacion.observacion')
        ->where('matriculados.cedula', $cedula)
        
        ->get();

        return response()->json($matriculados);
    }
}
