<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas;
use App\Materias;
use DB;
use App\Matriculacion;
use App\Supletorios;
use App\Remediales;
use App\Gracia;
use App\Recuperacion;
use App\MateriaEspeciales;
use App\NotasEspeciales;
use Illuminate\Support\Facades\Auth;
use App\Profesor;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Input;
use App\Exports\NominaEstudiante;
use App\Exports\PrimerQuimestre;
use App\Exports\CuadroFinal;
use App\Exports\CuadroFinal2;
use App\Exports\SegundoQuimestre;
use Maatwebsite\Excel\Facades\Excel;
use App\Abanderados;
use App\Exports\AbanderadosExport;
use App\MateriasProfesor;
use App\Inspecciones;
use App\Http\Requests\NotasRequest;
use App\Http\Requests\NotasExamenRequest;
use Validator;
use App\Nota_ta;
use App\Notas_ti;
use App\Notas_tg;
use App\Notas_le;
use App\Notas_ev;
use App\Notas_conducta;
use App\Notas_examen;



class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
   {
    set_time_limit(300);
   }
   public function index()
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin')  || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
        {
            return view('notas.index');
        }
        elseif(Auth::user()->isRole('profesor')){
            $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->distinct()
            ->pluck('materias.curso');
            $profesorParalelo = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->distinct()
            ->pluck('materias.paralelo');
            return view('notas.index', compact('profesorCurso', 'profesorParalelo'));
        }

    }
    public function editarNotas()
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin')  || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
        {
            return view('notas.editar-notas');
        }
        elseif(Auth::user()->isRole('profesor')){
            return view('notas.editar-notas');
        }

    }
    public function store(NotasRequest $request)
    {
        $nota_ta1 = $request->nota_ta1;
        $nota_ta2 = $request->nota_ta2;
        $nota_ta3 = $request->nota_ta3;
        $nota_ta4 = $request->nota_ta4;
        $nota_ta5 = $request->nota_ta5;
        $descripcion_ta1 = $request->descripcion_ta1;
        $descripcion_ta2 = $request->descripcion_ta2;
        $descripcion_ta3 = $request->descripcion_ta3;
        $descripcion_ta4 = $request->descripcion_ta4;
        $descripcion_ta5 = $request->descripcion_ta5;
        $nota_ti1 = $request->nota_ti1;
        $nota_ti2 = $request->nota_ti2;
        $nota_ti3 = $request->nota_ti3;
        $nota_ti4 = $request->nota_ti4;
        $nota_ti5 = $request->nota_ti5;
        $descripcion_ti1 = $request->descripcion_ti1;
        $descripcion_ti2 = $request->descripcion_ti2;
        $descripcion_ti3 = $request->descripcion_ti3;
        $descripcion_ti4 = $request->descripcion_ti4;
        $descripcion_ti5 = $request->descripcion_ti5;
        $nota_tg1 = $request->nota_tg1;
        $nota_tg2 = $request->nota_tg2;
        $nota_tg3 = $request->nota_tg3;
        $nota_tg4 = $request->nota_tg4;
        $nota_tg5 = $request->nota_tg5;
        $descripcion_tg1 = $request->descripcion_tg1;
        $descripcion_tg2 = $request->descripcion_tg2;
        $descripcion_tg3 = $request->descripcion_tg3;
        $descripcion_tg4 = $request->descripcion_tg4;
        $descripcion_tg5 = $request->descripcion_tg5;
        $nota_le1 = $request->nota_le1;
        $nota_le2 = $request->nota_le2;
        $nota_le3 = $request->nota_le3;
        $nota_le4 = $request->nota_le4;
        $nota_le5 = $request->nota_le5;
        $nota_ev1 = $request->nota_ev1;
        $nota_ev2 = $request->nota_ev2;
        $nota_ev3 = $request->nota_ev3;
        $nota_ev4 = $request->nota_ev4;
        $nota_ev5 = $request->nota_ev5;
        $nota_examen = $request->examen;
        $descripcion_le1 = $request->descripcion_le1;
        $descripcion_le2 = $request->descripcion_le2;
        $descripcion_le3 = $request->descripcion_le3;
        $descripcion_le4 = $request->descripcion_le4;
        $descripcion_le5 = $request->descripcion_le5;
        $descripcion_ev1 = $request->descripcion_ev1;
        $descripcion_ev2 = $request->descripcion_ev2;
        $descripcion_ev3 = $request->descripcion_ev3;
        $descripcion_ev4 = $request->descripcion_ev4;
        $descripcion_ev5 = $request->descripcion_ev5;
        $id_nota_ta = $request->id_nota_ta;
        $id_nota_ti = $request->id_nota_ti;
        $id_nota_tg = $request->id_nota_tg;
        $id_nota_le = $request->id_nota_le;
        $id_nota_ev = $request->id_nota_ev;
        $id_nota_examen = $request->id_nota_examen;
        $parcial = $request->parcial;
        $quimestre = $request->quimestre;
        $matriculados_id = $request->matriculados_id;
        $materias_id = $request->materias_id;
        if($request->id_nota_ta)
        {
            foreach($matriculados_id as $key => $value){
                $new_notas = Nota_ta::find($id_nota_ta[$key]);
                $new_notas->nota_ta1 = ($nota_ta1[$key] == '' ? 0 : $nota_ta1[$key]);
                $new_notas->nota_ta2 = ($nota_ta2[$key] == '' ? 0 : $nota_ta2[$key]);
                $new_notas->nota_ta3 = ($nota_ta3[$key] == '' ? 0 : $nota_ta3[$key]);
                $new_notas->nota_ta4 = ($nota_ta4[$key] == '' ? 0 : $nota_ta4[$key]);
                $new_notas->nota_ta5 = ($nota_ta5[$key] == '' ? 0 : $nota_ta5[$key]);
                $new_notas->descripcion_ta1 = $descripcion_ta1;
                $new_notas->descripcion_ta2 = $descripcion_ta2;
                $new_notas->descripcion_ta3 = $descripcion_ta3;
                $new_notas->descripcion_ta4 = $descripcion_ta4;
                $new_notas->descripcion_ta5 = $descripcion_ta5;
                $new_notas->materias_id = $materias_id;
                $new_notas->matriculado_id = $matriculados_id[$key];
                $new_notas->parcial = $parcial;
                $new_notas->quimestre = $quimestre;
                $new_notas->autoridad_id = auth()->user()->id;
                $new_notas->numero_tarea_ta1 = '1';
                $new_notas->numero_tarea_ta2 = '1';
                $new_notas->numero_tarea_ta3 = '1';
                $new_notas->numero_tarea_ta4 = '1';
                $new_notas->numero_tarea_ta5 = '1';
                $new_notas->save();

            }
        }
    if($request->id_nota_ti)
    {

        foreach($matriculados_id as $key => $value){
            $new_notas = Notas_ti::find($id_nota_ti[$key]);
            $new_notas->nota_ti1 = ($nota_ti1[$key] == '' ? 0 : $nota_ti1[$key]);
            $new_notas->nota_ti2 = ($nota_ti2[$key] == '' ? 0 : $nota_ti2[$key]);
            $new_notas->nota_ti3 = ($nota_ti3[$key] == '' ? 0 : $nota_ti3[$key]);
            $new_notas->nota_ti4 = ($nota_ti4[$key] == '' ? 0 : $nota_ti4[$key]);
            $new_notas->nota_ti5 = ($nota_ti5[$key] == '' ? 0 : $nota_ti5[$key]);
            $new_notas->descripcion_ti1 = $descripcion_ti1;
            $new_notas->descripcion_ti2 = $descripcion_ti2;
            $new_notas->descripcion_ti3 = $descripcion_ti3;
            $new_notas->descripcion_ti4 = $descripcion_ti4;
            $new_notas->descripcion_ti5 = $descripcion_ti5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_ti1 = '1';
            $new_notas->numero_tarea_ti2 = '1';
            $new_notas->numero_tarea_ti3 = '1';
            $new_notas->numero_tarea_ti4 = '1';
            $new_notas->numero_tarea_ti5 = '1';
            $new_notas->save();

        }
    }
    if($request->id_nota_tg)
    {
        foreach($matriculados_id as $key => $value){
            $new_notas = Notas_tg::find($id_nota_tg[$key]);
            $new_notas->nota_tg1 = ($nota_tg1[$key] == '' ? 0 : $nota_tg1[$key]);
            $new_notas->nota_tg2 = ($nota_tg2[$key] == '' ? 0 : $nota_tg2[$key]);
            $new_notas->nota_tg3 = ($nota_tg3[$key] == '' ? 0 : $nota_tg3[$key]);
            $new_notas->nota_tg4 = ($nota_tg4[$key] == '' ? 0 : $nota_tg4[$key]);
            $new_notas->nota_tg5 = ($nota_tg5[$key] == '' ? 0 : $nota_tg5[$key]);
            $new_notas->descripcion_tg1 = $descripcion_tg1;
            $new_notas->descripcion_tg2 = $descripcion_tg2;
            $new_notas->descripcion_tg3 = $descripcion_tg3;
            $new_notas->descripcion_tg4 = $descripcion_tg4;
            $new_notas->descripcion_tg5 = $descripcion_tg5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_tg1 = '1';
            $new_notas->numero_tarea_tg2 = '1';
            $new_notas->numero_tarea_tg3 = '1';
            $new_notas->numero_tarea_tg4 = '1';
            $new_notas->numero_tarea_tg5 = '1';
            $new_notas->save();

        }
    }
    if($request->id_nota_le)
    {
        foreach($matriculados_id as $key => $value){
            $new_notas = Notas_le::find($id_nota_le[$key]);
            $new_notas->nota_le1 = ($nota_le1[$key] == '' ? 0 : $nota_le1[$key]);
            $new_notas->nota_le2 = ($nota_le2[$key] == '' ? 0 : $nota_le2[$key]);
            $new_notas->nota_le3 = ($nota_le3[$key] == '' ? 0 : $nota_le3[$key]);
            $new_notas->nota_le4 = ($nota_le4[$key] == '' ? 0 : $nota_le4[$key]);
            $new_notas->nota_le5 = ($nota_le5[$key] == '' ? 0 : $nota_le5[$key]);
            $new_notas->descripcion_le1 = $descripcion_le1;
            $new_notas->descripcion_le2 = $descripcion_le2;
            $new_notas->descripcion_le3 = $descripcion_le3;
            $new_notas->descripcion_le4 = $descripcion_le4;
            $new_notas->descripcion_le5 = $descripcion_le5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_le1 = '1';
            $new_notas->numero_tarea_le2 = '1';
            $new_notas->numero_tarea_le3 = '1';
            $new_notas->numero_tarea_le4 = '1';
            $new_notas->numero_tarea_le5 = '1';
            $new_notas->save();

        }
    }
    if($request->id_nota_ev)
    {
        foreach($matriculados_id as $key => $value){
            $new_notas = Notas_ev::find($id_nota_ev[$key]);
            $new_notas->nota_ev1 = ($nota_ev1[$key] == '' ? 0 : $nota_ev1[$key]);
            $new_notas->nota_ev2 = ($nota_ev2[$key] == '' ? 0 : $nota_ev2[$key]);
            $new_notas->nota_ev3 = ($nota_ev3[$key] == '' ? 0 : $nota_ev3[$key]);
            $new_notas->nota_ev4 = ($nota_ev4[$key] == '' ? 0 : $nota_ev4[$key]);
            $new_notas->nota_ev5 = ($nota_ev5[$key] == '' ? 0 : $nota_ev5[$key]);
            $new_notas->descripcion_ev1 = $descripcion_ev1;
            $new_notas->descripcion_ev2 = $descripcion_ev2;
            $new_notas->descripcion_ev3 = $descripcion_ev3;
            $new_notas->descripcion_ev4 = $descripcion_ev4;
            $new_notas->descripcion_ev5 = $descripcion_ev5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_ev1 = '1';
            $new_notas->numero_tarea_ev2 = '1';
            $new_notas->numero_tarea_ev3 = '1';
            $new_notas->numero_tarea_ev4 = '1';
            $new_notas->numero_tarea_ev5 = '1';
            $new_notas->save();

        }
    }
    if($id_nota_examen)
    {
        foreach($matriculados_id as $key => $value){
            $new_notas = Notas_examen::find($id_nota_examen[$key]);
            $new_notas->nota_exq = ($nota_examen[$key] == '' ? 0 : $nota_examen[$key]);
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_exq = '1';
            $new_notas->save();

        }
    }
    if($id_nota_ta == null || $id_nota_ti == null || $id_nota_tg == null || $id_nota_le == null || $id_nota_ev == null || $id_nota_examen)
    {
        foreach($matriculados_id as $key => $value){
            $new_notas = new Nota_ta;
            $new_notas->nota_ta1 = ($nota_ta1[$key] == '' ? 0 : $nota_ta1[$key]);
            $new_notas->nota_ta2 = ($nota_ta2[$key] == '' ? 0 : $nota_ta2[$key]);
            $new_notas->nota_ta3 = ($nota_ta3[$key] == '' ? 0 : $nota_ta3[$key]);
            $new_notas->nota_ta4 = ($nota_ta4[$key] == '' ? 0 : $nota_ta4[$key]);
            $new_notas->nota_ta5 = ($nota_ta5[$key] == '' ? 0 : $nota_ta5[$key]);
            $new_notas->descripcion_ta1 = $descripcion_ta1;
            $new_notas->descripcion_ta2 = $descripcion_ta2;
            $new_notas->descripcion_ta3 = $descripcion_ta3;
            $new_notas->descripcion_ta4 = $descripcion_ta4;
            $new_notas->descripcion_ta5 = $descripcion_ta5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_ta1 = '1';
            $new_notas->numero_tarea_ta2 = '1';
            $new_notas->numero_tarea_ta3 = '1';
            $new_notas->numero_tarea_ta4 = '1';
            $new_notas->numero_tarea_ta5 = '1';
            $new_notas->save();

        }
        foreach($matriculados_id as $key => $value){
            $new_notas = new Notas_ti;
            $new_notas->nota_ti1 = ($nota_ti1[$key] == '' ? 0 : $nota_ti1[$key]);
            $new_notas->nota_ti2 = ($nota_ti2[$key] == '' ? 0 : $nota_ti2[$key]);
            $new_notas->nota_ti3 = ($nota_ti3[$key] == '' ? 0 : $nota_ti3[$key]);
            $new_notas->nota_ti4 = ($nota_ti4[$key] == '' ? 0 : $nota_ti4[$key]);
            $new_notas->nota_ti5 = ($nota_ti5[$key] == '' ? 0 : $nota_ti5[$key]);
            $new_notas->descripcion_ti1 = $descripcion_ti1;
            $new_notas->descripcion_ti2 = $descripcion_ti2;
            $new_notas->descripcion_ti3 = $descripcion_ti3;
            $new_notas->descripcion_ti4 = $descripcion_ti4;
            $new_notas->descripcion_ti5 = $descripcion_ti5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_ti1 = '1';
            $new_notas->numero_tarea_ti2 = '1';
            $new_notas->numero_tarea_ti3 = '1';
            $new_notas->numero_tarea_ti4 = '1';
            $new_notas->numero_tarea_ti5 = '1';
            $new_notas->save();

        }
        foreach($matriculados_id as $key => $value){
            $new_notas = new Notas_tg;
            $new_notas->nota_tg1 = ($nota_tg1[$key] == '' ? 0 : $nota_tg1[$key]);
            $new_notas->nota_tg2 = ($nota_tg2[$key] == '' ? 0 : $nota_tg2[$key]);
            $new_notas->nota_tg3 = ($nota_tg3[$key] == '' ? 0 : $nota_tg3[$key]);
            $new_notas->nota_tg4 = ($nota_tg4[$key] == '' ? 0 : $nota_tg4[$key]);
            $new_notas->nota_tg5 = ($nota_tg5[$key] == '' ? 0 : $nota_tg5[$key]);
            $new_notas->descripcion_tg1 = $descripcion_tg1;
            $new_notas->descripcion_tg2 = $descripcion_tg2;
            $new_notas->descripcion_tg3 = $descripcion_tg3;
            $new_notas->descripcion_tg4 = $descripcion_tg4;
            $new_notas->descripcion_tg5 = $descripcion_tg5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_tg1 = '1';
            $new_notas->numero_tarea_tg2 = '1';
            $new_notas->numero_tarea_tg3 = '1';
            $new_notas->numero_tarea_tg4 = '1';
            $new_notas->numero_tarea_tg5 = '1';
            $new_notas->save();

        }
        foreach($matriculados_id as $key => $value){
            $new_notas = new Notas_le;
            $new_notas->nota_le1 = ($nota_le1[$key] == '' ? 0 : $nota_le1[$key]);
            $new_notas->nota_le2 = ($nota_le2[$key] == '' ? 0 : $nota_le2[$key]);
            $new_notas->nota_le3 = ($nota_le3[$key] == '' ? 0 : $nota_le3[$key]);
            $new_notas->nota_le4 = ($nota_le4[$key] == '' ? 0 : $nota_le4[$key]);
            $new_notas->nota_le5 = ($nota_le5[$key] == '' ? 0 : $nota_le5[$key]);
            $new_notas->descripcion_le1 = $descripcion_le1;
            $new_notas->descripcion_le2 = $descripcion_le2;
            $new_notas->descripcion_le3 = $descripcion_le3;
            $new_notas->descripcion_le4 = $descripcion_le4;
            $new_notas->descripcion_le5 = $descripcion_le5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_le1 = '1';
            $new_notas->numero_tarea_le2 = '1';
            $new_notas->numero_tarea_le3 = '1';
            $new_notas->numero_tarea_le4 = '1';
            $new_notas->numero_tarea_le5 = '1';
            $new_notas->save();

        }
        foreach($matriculados_id as $key => $value){
            $new_notas = new Notas_ev;
            $new_notas->nota_ev1 = ($nota_ev1[$key] == '' ? 0 : $nota_ev1[$key]);
            $new_notas->nota_ev2 = ($nota_ev2[$key] == '' ? 0 : $nota_ev2[$key]);
            $new_notas->nota_ev3 = ($nota_ev3[$key] == '' ? 0 : $nota_ev3[$key]);
            $new_notas->nota_ev4 = ($nota_ev4[$key] == '' ? 0 : $nota_ev4[$key]);
            $new_notas->nota_ev5 = ($nota_ev5[$key] == '' ? 0 : $nota_ev5[$key]);
            $new_notas->descripcion_ev1 = $descripcion_ev1;
            $new_notas->descripcion_ev2 = $descripcion_ev2;
            $new_notas->descripcion_ev3 = $descripcion_ev3;
            $new_notas->descripcion_ev4 = $descripcion_ev4;
            $new_notas->descripcion_ev5 = $descripcion_ev5;
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->parcial = $parcial;
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_ev1 = '1';
            $new_notas->numero_tarea_ev2 = '1';
            $new_notas->numero_tarea_ev3 = '1';
            $new_notas->numero_tarea_ev4 = '1';
            $new_notas->numero_tarea_ev5 = '1';
            $new_notas->save();

        }
        foreach($matriculados_id as $key => $value){
            $new_notas = new Notas_examen;
            $new_notas->nota_exq = ($nota_examen[$key] == '' ? 0 : $nota_examen[$key]);
            $new_notas->materias_id = $materias_id;
            $new_notas->matriculado_id = $matriculados_id[$key];
            $new_notas->quimestre = $quimestre;
            $new_notas->autoridad_id = auth()->user()->id;
            $new_notas->numero_tarea_exq = '1';
            $new_notas->save();
        }


    }

        return redirect()->route('notas.store')->with('info', 'La nota se ha cargado correctamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\notass  $notass
     * @return \Illuminate\Http\Response
     */
    public function examenQuimestralStore(NotasExamenRequest $request)
    {
            $notas_examen = $request->examen;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;
            foreach($matriculados_id as $key => $value)
            {
                $nota_examen = new Notas_examen;
                if($notas_examen[$key] == null)
                {
                    $nota_examen->nota_exq = 0;
                }else{
                    $nota_examen->nota_exq = $notas_examen[$key];
                }
                $nota_examen->descripcion = $descripcion;
                $nota_examen->materias_id = $materias_id[$key];
                $nota_examen->matriculado_id = $matriculados_id[$key];
                $nota_examen->quimestre = $quimestre[$key];
                $nota_examen->autoridad_id = auth()->user()->id;
                $nota_examen->numero_tarea_exq = '1';
                $nota_examen->save();
            }
            return redirect()->route('notas.examen')->with('info', 'La nota se ha agregado correctamente');

        }
    public function show($id)
    {
        $notas = Notas::find($id);
        return view('notas.show', compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\notass  $notass
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $tt)
    {
        if($tt == 'nota_ta')
        {
            $notas = Nota_ta::find($id);
            $tt = 'nota_ta';
            return view('notas.edit', compact('notas', 'tt'));
        }
        else if($tt == 'nota_ti')
        {
            $notas = Notas_ti::find($id);
            $tt = 'nota_ti';
                  return view('notas.edit', compact('notas', 'tt'));
        }
        else if($tt == 'nota_tg')
        {
            $notas = Notas_tg::find($id);
            $tt = 'nota_tg';
                  return view('notas.edit', compact('notas', 'tt'));
        }
        else if($tt == 'nota_le')
        {
            $notas = Notas_le::find($id);
            $tt = 'nota_le';
                  return view('notas.edit', compact('notas', 'tt'));
        }
        else if($tt == 'nota_ev')
        {
            $notas = Notas_ev::find($id);
            $tt = 'nota_ev';
                  return view('notas.edit', compact('notas', 'tt'));
        }
        else if($tt == 'conducta')
        {
            $notas = Notas_conducta::find($id);
            $tt = 'conducta';
                  return view('notas.edit', compact('notas', 'tt'));
        }
        else if($tt == 'examen')
        {
            $notas = Notas_examen::find($id);
            $tt = 'examen';
            return view('notas.edit', compact('notas', 'tt'));
        }
        else {
            return redirect()-back()->with('error', 'Informacion mal suministrada');
        }


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notass  $notass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $tt)
    {
        if($tt == 'nota_ta')
        {
            $notas_ta = $request->nota_ta;
            $matriculados_id = $request->matriculado_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            $nota_ta = Nota_ta::find($id);
            $nota_ta->nota_ta = $notas_ta;
            $nota_ta->descripcion = $descripcion;
            $nota_ta->materias_id = $materias_id;
            $nota_ta->matriculado_id = $matriculados_id;
            $nota_ta->parcial = $parcial;
            $nota_ta->quimestre = $quimestre;
            $nota_ta->autoridad_id = auth()->user()->id;
            $nota_ta->numero_tarea_ta = '1';
            $nota_ta->save();
            return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');

        }
        else if($tt == 'nota_ti')
        {
            $notas_ti = $request->nota_ti;
            $matriculados_id = $request->matriculado_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            $nota_ti = Notas_ti::find($id);
            $nota_ti->nota_ti = $notas_ti;
            $nota_ti->descripcion = $descripcion;
            $nota_ti->materias_id = $materias_id;
            $nota_ti->matriculado_id = $matriculados_id;
            $nota_ti->parcial = $parcial;
            $nota_ti->quimestre = $quimestre;
            $nota_ti->autoridad_id = auth()->user()->id;
            $nota_ti->numero_tarea_ti = '1';
            $nota_ti->save();
            return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');

        }
        else if($tt == 'nota_tg')
        {
            $notas_tg = $request->nota_tg;
            $matriculados_id = $request->matriculado_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            $nota_tg = Notas_tg::find($id);
            $nota_tg->nota_tg = $notas_tg;
            $nota_tg->descripcion = $descripcion;
            $nota_tg->materias_id = $materias_id;
            $nota_tg->matriculado_id = $matriculados_id;
            $nota_tg->parcial = $parcial;
            $nota_tg->quimestre = $quimestre;
            $nota_tg->autoridad_id = auth()->user()->id;
            $nota_tg->numero_tarea_tg = '1';
            $nota_tg->save();
            return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');

        }
        else if($tt == 'nota_le')
        {
            $notas_le = $request->nota_le;
            $matriculados_id = $request->matriculado_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            $nota_le = Notas_le::find($id);
            $nota_le->nota_le = $notas_le;
            $nota_le->descripcion = $descripcion;
            $nota_le->materias_id = $materias_id;
            $nota_le->matriculado_id = $matriculados_id;
            $nota_le->parcial = $parcial;
            $nota_le->quimestre = $quimestre;
            $nota_le->autoridad_id = auth()->user()->id;
            $nota_le->numero_tarea_le = '1';
            $nota_le->save();
            return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');

        }
        else if($tt == 'nota_ev')
        {
            $notas_ev = $request->nota_ev;
            $matriculados_id = $request->matriculado_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            $nota_ev = Notas_ev::find($id);
            $nota_ev->nota_ev = $notas_ev;
            $nota_ev->descripcion = $descripcion;
            $nota_ev->materias_id = $materias_id;
            $nota_ev->matriculado_id = $matriculados_id;
            $nota_ev->parcial = $parcial;
            $nota_ev->quimestre = $quimestre;
            $nota_ev->autoridad_id = auth()->user()->id;
            $nota_ev->numero_tarea_ev = '1';
            $nota_ev->save();
            return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');

        }
        else if($tt == 'conducta')
        {
            $notas_conducta = $request->nota_conducta;
            $matriculados_id = $request->matriculado_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            $conducta = Notas_conducta::find($id);
            $conducta->nota_conducta = $notas_conducta;
            $conducta->descripcion = $descripcion;
            $conducta->materias_id = $materias_id;
            $conducta->matriculado_id = $matriculados_id;
            $conducta->parcial = $parcial;
            $conducta->quimestre = $quimestre;
            $conducta->autoridad_id = auth()->user()->id;
            $conducta->numero_tarea_conducta = '1';
            $conducta->save();
            return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');

        }
        else if($tt == 'examen')
        {
            $examen = $request->nota_exq;
            $matriculados_id = $request->matriculado_id;
            $materias_id = $request->materias_id;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            $nota_examen = Notas_examen::find($id);
            $nota_examen->nota_exq = $examen;
            $nota_examen->descripcion = $descripcion;
            $nota_examen->materias_id = $materias_id;
            $nota_examen->matriculado_id = $matriculados_id;
            $nota_examen->quimestre = $quimestre;
            $nota_examen->autoridad_id = auth()->user()->id;
            $nota_examen->numero_tarea_exq = '1';
            $nota_examen->save();
            return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');

        }
    }
    public function destroy($id, $tt)
    {
        if($tt == 'nota_ta')
        {

            $notas = Nota_ta::find($id);
            $notas->delete();
            return back()->with('info', 'Las notas ha sido eliminada exitosamente');
        }
        else if($tt == 'nota_ti')
        {
            $notas = Notas_ti::find($id);
            $notas->delete();
            return back()->with('info', 'Las notas ha sido eliminada exitosamente');
        }
        else if($tt == 'nota_tg')
        {
            $notas = Notas_tg::find($id);
            $notas->delete();
            return back()->with('info', 'Las notas ha sido eliminada exitosamente');
        }
        else if($tt == 'nota_le')
        {
            $notas = Notas_le::find($id);
            $notas->delete();
            return back()->with('info', 'Las notas ha sido eliminada exitosamente');
        }
        else if($tt == 'nota_ev')
        {
            $notas = Notas_ev::find($id);
            $notas->delete();
            return back()->with('info', 'Las notas ha sido eliminada exitosamente');
        }
        else if($tt == 'conducta')
        {
            $notas = Notas_conducta::find($id);
            $notas->delete();
            return back()->with('info', 'Las notas ha sido eliminada exitosamente');
        }
        else if($tt == 'examen')
        {
            $notas = Notas_examen::find($id);
            $notas->delete();
            return back()->with('info', 'Las notas ha sido eliminada exitosamente');
        }
        else {
            return redirect()-back()->with('error', 'Informacion mal suministrada');
        }

    }
     public function buscarMateriaAlumno($cursos, $paralelo){
         if(Auth::user()->isRole('super-admin')  || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
         {
       $matriculado = DB::table('materias')
      ->select('materias.materia', 'materias.id')
      ->where('materias.curso',$cursos)
      ->where('materias.paralelo',$paralelo)
      ->get();

      return response()->json($matriculado);

         }
         elseif(Auth::user()->isRole('profesor') )
         {
        $users = Auth::user()->cedula;
         $matriculado = DB::table('materias_profesores')
         ->join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
         ->join('profesors', 'materias_profesores.profesores_id', '=','profesors.id')
      ->select('materias.materia', 'materias.id')
      ->where('profesors.cedula',$users)
      ->where('materias.curso',$cursos)
      ->where('materias.paralelo',$paralelo)
      ->get();

      return response()->json($matriculado);
}

    }
    public function buscarAlumnoNotas($cursos, $paralelo, $materia, $parcial, $quimestre)
    {
        if($parcial == 3)
        {
            $matriculados = DB::table('matriculados')
            ->join('materias as m1', 'matriculados.curso', 'm1.curso')
            ->join('materias as m2', 'matriculados.paralelo', 'm2.paralelo')
             ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"), 'matriculados.id as id')
             ->where('matriculados.curso', $cursos)
             ->where('matriculados.paralelo', $paralelo)
             ->orderBy('matriculados.apellidos')
             ->distinct()
             ->get();

             $all_notas = DB::table('matriculados')
             ->join('notas_ta as n_ta', 'matriculados.id', '=', 'n_ta.matriculado_id')
             ->join('notas_ti as n_ti', 'matriculados.id', '=', 'n_ti.matriculado_id')
             ->join('notas_tg as n_tg', 'matriculados.id', '=', 'n_tg.matriculado_id')
             ->join('notas_le as n_le', 'matriculados.id', '=', 'n_le.matriculado_id')
             ->join('notas_ev as n_ev', 'matriculados.id', '=', 'n_ev.matriculado_id')
             ->join('notas_exq', 'matriculados.id', '=', 'notas_exq.matriculado_id')
             ->where('matriculados.curso', $cursos)
             ->where('matriculados.paralelo', $paralelo)
             ->where('n_ta.materias_id', $materia)
             ->where('n_ti.materias_id', $materia)
             ->where('n_tg.materias_id', $materia)
             ->where('n_le.materias_id', $materia)
             ->where('n_ev.materias_id', $materia)
             ->where('n_ta.parcial', $parcial)
             ->where('n_ti.parcial', $parcial)
             ->where('n_tg.parcial', $parcial)
             ->where('n_le.parcial', $parcial)
             ->where('n_ev.parcial', $parcial)
             ->where('n_ta.quimestre', $quimestre)
             ->where('n_ti.quimestre', $quimestre)
             ->where('n_tg.quimestre', $quimestre)
             ->where('n_le.quimestre', $quimestre)
             ->where('n_ev.quimestre', $quimestre)
             ->where('notas_exq.quimestre', $quimestre)
             ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),'n_ta.id as id_nota_ta','n_ti.id as id_nota_ti','n_tg.id as id_nota_tg','n_le.id as id_nota_le','n_ev.id as id_nota_ev', 'matriculados.id as id','n_ta.nota_ta1','n_ta.nota_ta2','n_ta.nota_ta3','n_ta.nota_ta4','n_ta.nota_ta5', 'n_ta.descripcion_ta1','n_ta.descripcion_ta2','n_ta.descripcion_ta3','n_ta.descripcion_ta4','n_ta.descripcion_ta5'
             ,'n_ti.nota_ti1','n_ti.nota_ti2','n_ti.nota_ti3','n_ti.nota_ti4','n_ti.nota_ti5', 'n_ti.descripcion_ti1','n_ti.descripcion_ti2','n_ti.descripcion_ti3','n_ti.descripcion_ti4','n_ti.descripcion_ti5'
             ,'n_tg.nota_tg1','n_tg.nota_tg2','n_tg.nota_tg3','n_tg.nota_tg4','n_tg.nota_tg5', 'n_tg.descripcion_tg1','n_tg.descripcion_tg2','n_tg.descripcion_tg3','n_tg.descripcion_tg4','n_tg.descripcion_tg5'
             ,'n_le.nota_le1','n_le.nota_le2','n_le.nota_le3','n_le.nota_le4','n_le.nota_le5', 'n_le.descripcion_le1','n_le.descripcion_le2','n_le.descripcion_le3','n_le.descripcion_le4','n_le.descripcion_le5'
             ,'n_ev.nota_ev1','n_ev.nota_ev2','n_ev.nota_ev3','n_ev.nota_ev4','n_ev.nota_ev5', 'n_ev.descripcion_ev1','n_ev.descripcion_ev2','n_ev.descripcion_ev3','n_ev.descripcion_ev4','n_ev.descripcion_ev5'
            ,'notas_exq.id as id_nota_examen', 'notas_exq.nota_exq'
             )
             ->orderBy('matriculados.apellidos')
             ->groupBy('matriculados.id','n_ta.materias_id', 'n_ti.materias_id', 'n_tg.materias_id', 'n_le.materias_id','n_ev.materias_id')
             ->distinct()
             ->get();
             $data['matriculados'] = $matriculados;
             $data['all_notas'] = $all_notas;
             return response()->json($data);
        }
        else {
            $matriculados = DB::table('matriculados')
            ->join('materias as m1', 'matriculados.curso', 'm1.curso')
            ->join('materias as m2', 'matriculados.paralelo', 'm2.paralelo')
             ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"), 'matriculados.id as id')
             ->where('matriculados.curso', $cursos)
             ->where('matriculados.paralelo', $paralelo)
             ->orderBy('matriculados.apellidos')
             ->distinct()
             ->get();

             $all_notas = DB::table('matriculados')
             ->join('notas_ta as n_ta', 'matriculados.id', '=', 'n_ta.matriculado_id')
             ->join('notas_ti as n_ti', 'matriculados.id', '=', 'n_ti.matriculado_id')
             ->join('notas_tg as n_tg', 'matriculados.id', '=', 'n_tg.matriculado_id')
             ->join('notas_le as n_le', 'matriculados.id', '=', 'n_le.matriculado_id')
             ->join('notas_ev as n_ev', 'matriculados.id', '=', 'n_ev.matriculado_id')
             ->join('notas_exq as n_examen', 'matriculados.id', '=', 'n_examen.matriculado_id')
             ->where('matriculados.curso', $cursos)
             ->where('matriculados.paralelo', $paralelo)
             ->where('n_ta.materias_id', $materia)
             ->where('n_ti.materias_id', $materia)
             ->where('n_tg.materias_id', $materia)
             ->where('n_le.materias_id', $materia)
             ->where('n_ev.materias_id', $materia)
             ->where('n_ta.parcial', $parcial)
             ->where('n_ti.parcial', $parcial)
             ->where('n_tg.parcial', $parcial)
             ->where('n_le.parcial', $parcial)
             ->where('n_ev.parcial', $parcial)
             ->where('n_ta.quimestre', $quimestre)
             ->where('n_ti.quimestre', $quimestre)
             ->where('n_tg.quimestre', $quimestre)
             ->where('n_le.quimestre', $quimestre)
             ->where('n_ev.quimestre', $quimestre)
             //->where('n_examen.quimetre', $quimestre)
             ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),'n_ta.id as id_nota_ta','n_ti.id as id_nota_ti','n_tg.id as id_nota_tg','n_le.id as id_nota_le','n_ev.id as id_nota_ev', 'matriculados.id as id','n_ta.nota_ta1','n_ta.nota_ta2','n_ta.nota_ta3','n_ta.nota_ta4','n_ta.nota_ta5', 'n_ta.descripcion_ta1','n_ta.descripcion_ta2','n_ta.descripcion_ta3','n_ta.descripcion_ta4','n_ta.descripcion_ta5'
             ,'n_ti.nota_ti1','n_ti.nota_ti2','n_ti.nota_ti3','n_ti.nota_ti4','n_ti.nota_ti5', 'n_ti.descripcion_ti1','n_ti.descripcion_ti2','n_ti.descripcion_ti3','n_ti.descripcion_ti4','n_ti.descripcion_ti5'
             ,'n_tg.nota_tg1','n_tg.nota_tg2','n_tg.nota_tg3','n_tg.nota_tg4','n_tg.nota_tg5', 'n_tg.descripcion_tg1','n_tg.descripcion_tg2','n_tg.descripcion_tg3','n_tg.descripcion_tg4','n_tg.descripcion_tg5'
             ,'n_le.nota_le1','n_le.nota_le2','n_le.nota_le3','n_le.nota_le4','n_le.nota_le5', 'n_le.descripcion_le1','n_le.descripcion_le2','n_le.descripcion_le3','n_le.descripcion_le4','n_le.descripcion_le5'
             ,'n_ev.nota_ev1','n_ev.nota_ev2','n_ev.nota_ev3','n_ev.nota_ev4','n_ev.nota_ev5', 'n_ev.descripcion_ev1','n_ev.descripcion_ev2','n_ev.descripcion_ev3','n_ev.descripcion_ev4','n_ev.descripcion_ev5'
             //,'n_examen.id as id_nota_examen', 'n_examen.nota_exq'
             )
             ->orderBy('matriculados.apellidos')
             ->groupBy('matriculados.id','n_ta.materias_id', 'n_ti.materias_id', 'n_tg.materias_id', 'n_le.materias_id','n_ev.materias_id')
             ->distinct()
             ->get();
             $data['matriculados'] = $matriculados;
             $data['all_notas'] = $all_notas;
             return response()->json($data);
        }

    }
    public function buscarAlumnoNotas2($cursos, $paralelo)
    {
        $matriculados = DB::table('matriculados')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"), 'matriculados.id as id')
        ->where('curso', 'LIKE', '%'.$cursos.'%')
        ->where('paralelo', 'LIKE', '%'.$paralelo.'%')
        ->orderBy('matriculados.apellidos')
        ->distinct()
        ->get();


        return response()->json($matriculados);

    }
    public function verNotasCargadas()
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin')  || Auth::user()->isRole('dece') || Auth::user()->isRole('admin')){
            return view('notas.vernotas');
        }elseif(Auth::user()->isRole('profesor')){
            return view('notas.vernotas');
        }


    }
    public function cargarMateriasProfesor()
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('admin') || Auth::user()->isRole('dece'))
        {

        }
        elseif(Auth::user()->isRole('profesor'))
        {
        $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->select('materias.curso')
            ->distinct()
            ->get();
        return response()->json($profesorCurso);
        }

    }
    public function cargarMateriasProfesorParalelo()
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('admin') || Auth::user()->isRole('dece'))
        {

        }
        elseif(Auth::user()->isRole('profesor'))
        {
        $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->select('materias.paralelo')
            ->distinct()
            ->get();
        return response()->json($profesorCurso);
        }
    }
    public function cargarMateriasProfesorView($curso, $paralelo)
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('admin') || Auth::user()->isRole('dece'))
        {
            $materias = Materias::where('curso', $curso)->where('paralelo', $paralelo)->select('materia', 'id')->distinct()
            ->get();
            return response()->json($materias);
        }
        elseif(Auth::user()->isRole('profesor'))
        {
            $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->where('materias.curso', $curso)
            ->where('materias.paralelo', $paralelo)
            ->select('materias.materia', 'materias.id')
            ->groupBy('materias.id')
            ->get();
        return response()->json($profesorCurso);
        }

    }
    public function cargarMateriasEspecialesProfesorView($curso, $paralelo)
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('admin') || Auth::user()->isRole('dece'))
        {
            $materias = Materias::where('curso', $curso)->where('paralelo', $paralelo)->where('tipo_materia', '!=', 'NO')->select('materia', 'id')->distinct()
            ->get();
            return response()->json($materias);
        }
        elseif(Auth::user()->isRole('profesor'))
        {
            $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->where('materias.tipo_materia', '!=', 'NO')
            ->where('materias.curso', $curso)
            ->where('materias.paralelo', $paralelo)
            ->select('materias.materia', 'materias.id')
            ->groupBy('materias.id')
            ->get();
        return response()->json($profesorCurso);
        }
    }
    public function cargarNotas($curso, $paralelo)
    {
    $materias = Materias::where('tipo_materia', '!=', 'SI')->where('curso', $curso)->where('paralelo', $paralelo)->select('*')->get();

    return response()->json($materias);

    }
    public function cargarMateriasRecuperacion($curso, $paralelo)
{
    $materias = Materias::where('curso', $curso)->where('paralelo', $paralelo)->select('*')->get();
    return response()->json($materias);
}

     public function cargarNotasEspeciales($curso, $paralelo)
    {
        if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
        {
            $materias = DB::table('materias')
            ->select('id', 'materia')
            ->where('curso',$curso)
            ->where('paralelo',$paralelo)
            ->where('tipo_materia', '!=', 'NO')
            ->distinct()
            ->get();

            return response()->json($materias);

        }
        else
        {
            $materias = DB::table('materias')
            ->select('id', 'materia')
            ->where('curso', 'LIKE', $curso)
            ->where('paralelo', 'LIKE', $paralelo)
            ->where('tipo_materia', '!=', 'NO')
            ->distinct()
            ->get();

            return response()->json($materias);
        }

    }
    public function cargarNotasAlumnos(Request $request)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;
        $quimestre = $request->quimestre;
        $parcial = $request->parcial;
        $materia = $request->materia;
        $notas = Matriculacion::with(['notas_ta' => function($query1) use($parcial, $quimestre, $materia){
            $query1
            ->where('parcial', $parcial)
            ->where('materias_id', $materia)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
            ->groupBy('matriculado_id', 'materias_id');
             }])->with(['notas_ti' => function($query2) use($parcial, $quimestre, $materia){
                $query2
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_tg' => function($query3) use($parcial, $quimestre, $materia){
                $query3
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_le' => function($query4) use($parcial, $quimestre, $materia){
                $query4
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_ev' => function($query5) use($parcial, $quimestre, $materia){
                $query5
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
               ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_examen' => function($query6) use($quimestre, $materia){
                $query6
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', DB::raw("ROUND(SUM(nota_exq) / SUM(numero_tarea_exq), 2) as nota_final_examen"))
               ->groupBy('matriculado_id', 'materias_id');
            }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();

        return view('notas.vernotas', compact('notas', 'quimestre', 'curso', 'paralelo'))->with('info', 'Se ha cargado las notas correctamete');

    }
    public function notasEdit($idestudiante, $ttarea, $parcial, $quimestre, $materia)
    {
        if($ttarea == 'examen')
        {
            $notas = Notas_examen::join('matriculados', 'notas_exq.matriculado_id', 'matriculados.id')
            ->join('materias', 'notas_exq.materias_id', '=', 'materias.id')
            ->select('notas_exq.nota_exq as nota', 'notas_exq.id', 'notas_exq.descripcion', 'notas_exq.created_at')
            ->where('matriculados.id', $idestudiante)
            ->where('notas_exq.quimestre', $quimestre)
            ->where('notas_exq.materias_id', $materia)
            ->get();
             return response()->json($notas);

        }else if($ttarea == 'nota_ta'){

           $notas = Nota_ta::join('matriculados', 'notas_ta.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_ta.materias_id', '=', 'materias.id')
           ->select('notas_ta.nota_ta as nota', 'notas_ta.id', 'notas_ta.descripcion', 'notas_ta.created_at')
           ->where('matriculados.id', $idestudiante)
           ->where('notas_ta.parcial', $parcial)
           ->where('notas_ta.quimestre', $quimestre)
           ->where('notas_ta.materias_id', $materia)
           ->get();
            return response()->json($notas);
        }else if($ttarea == 'nota_ti')
        {
            $notas = Notas_ti::join('matriculados', 'notas_ti.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_ti.materias_id', '=', 'materias.id')
           ->select('notas_ti.nota_ti as nota', 'notas_ti.id', 'notas_ti.descripcion', 'notas_ti.created_at')
           ->where('matriculados.id', $idestudiante)
           ->where('notas_ti.parcial', $parcial)
           ->where('notas_ti.quimestre', $quimestre)
           ->where('notas_ti.materias_id', $materia)
           ->get();
            return response()->json($notas);

        }
        else if($ttarea == 'nota_tg')
        {
            $notas = Notas_tg::join('matriculados', 'notas_tg.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_tg.materias_id', '=', 'materias.id')
           ->select('notas_tg.nota_tg as nota', 'notas_tg.id', 'notas_tg.descripcion', 'notas_tg.created_at')
           ->where('matriculados.id', $idestudiante)
           ->where('notas_tg.parcial', $parcial)
           ->where('notas_tg.quimestre', $quimestre)
           ->where('notas_tg.materias_id', $materia)
           ->get();
            return response()->json($notas);

        }
        else if($ttarea == 'nota_le')
        {
            $notas = Notas_le::join('matriculados', 'notas_le.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_le.materias_id', '=', 'materias.id')
           ->select('notas_le.nota_le as nota', 'notas_le.id', 'notas_le.descripcion', 'notas_le.created_at')
           ->where('matriculados.id', $idestudiante)
           ->where('notas_le.parcial', $parcial)
           ->where('notas_le.quimestre', $quimestre)
           ->where('notas_le.materias_id', $materia)
           ->get();
            return response()->json($notas);

        }
        else if($ttarea == 'nota_ev')
        {
            $notas = Notas_ev::join('matriculados', 'notas_ev.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_ev.materias_id', '=', 'materias.id')
           ->select('notas_ev.nota_ev as nota', 'notas_ev.id', 'notas_ev.descripcion', 'notas_ev.created_at')
           ->where('matriculados.id', $idestudiante)
           ->where('notas_ev.parcial', $parcial)
           ->where('notas_ev.quimestre', $quimestre)
           ->where('notas_ev.materias_id', $materia)
           ->get();
            return response()->json($notas);

        }
        else if($ttarea == 'conducta')
        {
            $notas = Notas_conducta::join('matriculados', 'notas_conducta.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_conducta.materias_id', '=', 'materias.id')
           ->select('notas_conducta.nota_conducta as nota', 'notas_conducta.id', 'notas_conducta.descripcion', 'notas_conducta.created_at')
           ->where('matriculados.id', $idestudiante)
           ->where('notas_conducta.parcial', $parcial)
           ->where('notas_conducta.quimestre', $quimestre)
           ->where('notas_conducta.materias_id', $materia)
           ->get();
            return response()->json($notas);
        }

    }

    public function resumenNotaStore($ttarea, $parcial, $quimestre, $materia)
    {
        if($ttarea == 'nota_examen')
        {
            $notas = Notas_examen::join('matriculados', 'notas_exq.matriculado_id', 'matriculados.id')
            ->join('materias', 'notas_exq.materias_id', '=', 'materias.id')
            ->select('notas_exq.nota_exq as nota', 'notas_exq.id', 'notas_exq.descripcion', 'notas_exq.created_at')
            ->where('notas_exq.quimestre', $quimestre)
            ->where('notas_exq.materias_id', $materia)
            ->groupBy('notas_exq.descripcion')
            ->get();
             return response()->json($notas);

        }else if($ttarea == 'nota_ta'){

           $notas = Nota_ta::join('matriculados', 'notas_ta.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_ta.materias_id', '=', 'materias.id')
           ->select('notas_ta.nota_ta as nota', 'notas_ta.id', 'notas_ta.descripcion', 'notas_ta.created_at')
           ->where('notas_ta.parcial', $parcial)
           ->where('notas_ta.quimestre', $quimestre)
           ->where('notas_ta.materias_id', $materia)
           ->groupBy('notas_ta.descripcion')
           ->get();
            return response()->json($notas);
        }else if($ttarea == 'nota_ti')
        {
            $notas = Notas_ti::join('matriculados', 'notas_ti.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_ti.materias_id', '=', 'materias.id')
           ->select('notas_ti.nota_ti as nota', 'notas_ti.id', 'notas_ti.descripcion', 'notas_ti.created_at')
           ->where('notas_ti.parcial', $parcial)
           ->where('notas_ti.quimestre', $quimestre)
           ->where('notas_ti.materias_id', $materia)
           ->groupBy('notas_ti.descripcion')
           ->get();
            return response()->json($notas);

        }
        else if($ttarea == 'nota_tg')
        {
            $notas = Notas_tg::join('matriculados', 'notas_tg.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_tg.materias_id', '=', 'materias.id')
           ->select('notas_tg.nota_tg as nota', 'notas_tg.id', 'notas_tg.descripcion', 'notas_tg.created_at')
           ->where('notas_tg.parcial', $parcial)
           ->where('notas_tg.quimestre', $quimestre)
           ->where('notas_tg.materias_id', $materia)
           ->groupBy('notas_tg.descripcion')
           ->get();
            return response()->json($notas);
        }
        else if($ttarea == 'nota_le')
        {
            $notas = Notas_le::join('matriculados', 'notas_le.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_le.materias_id', '=', 'materias.id')
           ->select('notas_le.nota_le as nota', 'notas_le.id', 'notas_le.descripcion', 'notas_le.created_at')
           ->where('notas_le.parcial', $parcial)
           ->where('notas_le.quimestre', $quimestre)
           ->where('notas_le.materias_id', $materia)
           ->groupBy('notas_le.descripcion')
           ->get();
            return response()->json($notas);

        }
        else if($ttarea == 'nota_ev')
        {
            $notas = Notas_ev::join('matriculados', 'notas_ev.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_ev.materias_id', '=', 'materias.id')
           ->select('notas_ev.nota_ev as nota', 'notas_ev.id', 'notas_ev.descripcion', 'notas_ev.created_at')
           ->where('notas_ev.parcial', $parcial)
           ->where('notas_ev.quimestre', $quimestre)
           ->where('notas_ev.materias_id', $materia)
           ->groupBy('notas_ev.descripcion')
           ->get();
            return response()->json($notas);
        }
        else if($ttarea == 'nota_conducta')
        {
            $notas = Notas_conducta::join('matriculados', 'notas_conducta.matriculado_id', 'matriculados.id')
           ->join('materias', 'notas_conducta.materias_id', '=', 'materias.id')
           ->select('notas_conducta.nota_conducta as nota', 'notas_conducta.id', 'notas_conducta.descripcion', 'notas_conducta.created_at')
           ->where('notas_conducta.parcial', $parcial)
           ->where('notas_conducta.quimestre', $quimestre)
           ->where('notas_conducta.materias_id', $materia)
           ->groupBy('notas_conducta.descripcion')
           ->get();
            return response()->json($notas);
        }
    }
        public function deleteAllNotesResumen($descripcion, $created_at, $tt)
        {
            if($tt == 'nota_ta')
            {
                $notas = Nota_ta::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
                if($notas == 0)
                {
                    $notas = Nota_ta::where('created_at', $created_at)->delete();
                }
                return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
            }
            if($tt == 'nota_ti')
            {
                $notas = Notas_ti::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
                if($notas == 0)
                {
                    $notas = Notas_ti::where('created_at', $created_at)->delete();
                }
                return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
            }
            if($tt == 'nota_tg')
            {

                $notas = Notas_tg::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
                if($notas == 0)
                {
                    $notas = Notas_tg::where('created_at', $created_at)->delete();
                }
                return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
            }
            if($tt == 'nota_le')
            {
                $notas = Notas_le::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
               if($notas == 0)
               {
                   $notas = Notas_le::where('created_at', $created_at)->delete();
               }
                return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
            }
            if($tt == 'nota_ev')
            {
                $notas = Notas_ev::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
                if($notas == 0)
                {
                    $notas = Notas_ev::where('created_at', $created_at)->delete();
                }
                return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
            }
            if($tt == 'nota_conducta')
            {
                $notas = Notas_conducta::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
               if($notas == 0)
               {
                   $notas = Notas_conducta::where('created_at', $created_at)->delete();
               }
                return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
            }
            if($tt == 'nota_examen')
            {
                $notas = Notas_examen::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
                if($notas == 0)
                {
                    $notas = Notas_examen::where('created_at', $created_at)->delete();
                }
                return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
            }

        }
    public function verNotasEspeciales()
    {
        $users = Auth::user()->cedula;
        if(Auth::user()->isRole('super-admin')  || Auth::user()->isRole('dece') || Auth::user()->isRole('admin')){
            return view('notas.vernotas-especiales');
        }elseif(Auth::user()->isRole('profesor')){
            $profesorCurso = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->distinct()
            ->pluck('materias.curso');
            $profesorParalelo = MateriasProfesor::join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
            ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
            ->where('profesors.cedula', $users)
            ->pluck('materias.paralelo');
            return view('notas.vernotas-especiales', compact('profesorCurso', 'profesorParalelo', 'profesor'));
        }

    }
    public function cargarNotasEspecialesAlumnos(Request $request)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;
        $quimestre = $request->quimestre;
        $parcial = $request->parcial;
        $materia = $request->materia;
        $notas = Matriculacion::with(['notas_ta' => function($query1) use($parcial, $quimestre, $materia){
            $query1->where('materias_id', $materia)
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', DB::raw("ROUND(SUM(notas_ta.nota_ta) / SUM(notas_ta.numero_tarea_ta), 3) as nota_final_ta"))
            ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_ti' => function($query2) use($parcial, $quimestre, $materia){
                $query2->where('materias_id', $materia)
                ->where('parcial', $parcial)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', DB::raw("ROUND(SUM(notas_ti.nota_ti) / SUM(notas_ti.numero_tarea_ti), 3) as nota_final_ti"))
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_tg' => function($query3) use($parcial, $quimestre, $materia){
                $query3->where('materias_id', $materia)
                ->where('parcial', $parcial)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', DB::raw("ROUND(SUM(notas_tg.nota_tg) / SUM(notas_tg.numero_tarea_tg), 3) as nota_final_tg"))
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_le' => function($query4) use($parcial, $quimestre, $materia){
                $query4->where('materias_id', $materia)
                ->where('parcial', $parcial)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', DB::raw("ROUND(SUM(notas_le.nota_le) / SUM(notas_le.numero_tarea_le), 3) as nota_final_le"))
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_ev' => function($query5) use($parcial, $quimestre, $materia){
                $query5->where('materias_id', $materia)
                ->where('parcial', $parcial)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', DB::raw("ROUND(SUM(notas_ev.nota_ev) / SUM(notas_ev.numero_tarea_ev), 3) as nota_final_ev"))
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_conducta' => function($query6) use($parcial, $quimestre, $materia){
                $query6->where('materias_id', $materia)
                ->where('parcial', $parcial)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', DB::raw("ROUND(SUM(notas_conducta.nota_conducta) / SUM(notas_conducta.numero_tarea_conducta), 3) as nota_final_conducta"))
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_examen' => function($query7) use($quimestre, $materia){
                $query7->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', DB::raw("ROUND(SUM(notas_exq.nota_exq) / SUM(notas_exq.numero_tarea_exq), 3) as nota_final_examen"))
                ->groupBy('matriculado_id', 'materias_id');
            }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();

    return view('notas.vernotas-especiales', compact('notas'))->with('info', 'La nota especial se ha cargado con exito');

      }

    public function supletoriosNotas()
    {
        return view('notas.supletorios');
    }
    public function sumaSupletorio($curso, $paralelo, $quimestre, $parcial, $materia)
    {
       $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->join('materias', 'notas.materias_id', '=', 'materias.id')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"),
         DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev)) / 5  as nota_final"), 'notas.id as nota_id', 'matriculados.id as matriculados_id')
        ->where('matriculados.curso',$curso)
        ->where('matriculados.paralelo',$paralelo)
        ->where('notas.quimestre',$quimestre)
        ->where('notas.parcial',$parcial)
        ->where('notas.materias_id',$materia)
        ->havingRaw('nota_final <= 7')
        ->orderBy('matriculados.apellidos')
        ->distinct()
        ->groupBy('matriculados.id')
        ->get();

        return response()->json($notas);
    }
    public function supletorioStore(Request $request)
    {
      $matriculados_id = $request->matriculados_id;
      $nota_supletorio = $request->nota_supletorio;
      $promedio_notas = $request->promedio_notas;
      $quimestre = $request->quimestre;
      $parcial = $request->parcial;
      $materias_id = $request->materia;

      foreach ($request->matriculados_id as $key => $value) {
        $supletorio = new Supletorios;
        $supletorio->matriculados_id = $matriculados_id[$key];
        $supletorio->nota_supletorio = $nota_supletorio[$key];
        $supletorio->promedio_notas = $promedio_notas[$key];
        $supletorio->quimestre = $quimestre[$key];
        $supletorio->parcial = $parcial[$key];
        $supletorio->materias_id = $materias_id[$key];
        $supletorio->save();
      }

      return redirect()->route('notas.supletorios')->with('info', 'Se agrego el supletorio correctamente');

    }

    public function promedioSupletorio()
    {
      $supletorio = DB::table('supletorios')
      ->join('matriculados', 'supletorios.matriculados_id', '=', 'matriculados.id')
      ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),
       DB::raw("(supletorios.nota_supletorio + supletorios.promedio_notas) / 2 as promedio_supletorio"), 'supletorios.promedio_notas as promedio_notas', 'supletorios.nota_supletorio as nota_supletorio')
      ->distinct()
      ->groupBy('matriculados.id')
      ->get();

      return response()->json($supletorio);

    }


    public function remedialNotas()
    {
      return view('notas.remedial');
    }


    public function remedialPromedioSupletorio(Request $request, $curso, $paralelo, $quimestre, $parcial, $materia)
    {
      $curso = $request->curso;
      $paralelo = $request->paralelo;
      $quimestre = $request->quimestre;
      $parcial = $request->parcial;
      $materia = $request->materia;

      $remedial = DB::table('supletorios')
      ->join('matriculados', 'supletorios.matriculados_id', '=', 'matriculados.id')
      ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),
        DB::raw("(supletorios.nota_supletorio + supletorios.promedio_notas) / 2 as promedio_supletorio"), 'matriculados.id as matriculados_id')
        ->where('matriculados.curso', 'LIKE', '%'.$curso.'%')
        ->where('matriculados.paralelo', 'LIKE', '%'.$paralelo.'%')
        ->where('supletorios.quimestre', 'LIKE', '%'.$quimestre.'%')
        ->where('supletorios.parcial', 'LIKE', '%'.$parcial.'%')
        ->where('supletorios.materias_id', 'LIKE', '%'.$materia.'%')
        ->orderBy('matriculados.apellidos')
        ->distinct()
        ->groupBy('matriculados.id')
        ->get();

        return response()->json($remedial);

    }

    public function remedialStore(Request $request)
    {

      $matriculados_id = $request->matriculados_id;
      $promedio_supletorio = $request->promedio_supletorio;
      $nota_remedial = $request->nota_remedial;
      $parcial = $request->parcial;
      $quimestre = $request->quimestre;
      $materias_id = $request->materias_id;

      foreach ($request->matriculados_id as $key => $value) {
        $remedial = new Remediales;
        $remedial->matriculados_id = $matriculados_id[$key];
        $remedial->promedio_supletorio = $promedio_supletorio[$key];
        $remedial->nota_remedial = $nota_remedial[$key];
        $remedial->parcial = $parcial[$key];
        $remedial->quimestre = $quimestre[$key];
        $remedial->materias_id = $materias_id[$key];
        $remedial->save();
      }

      return redirect()->route('notas.remedial')->with('info', 'Se ha agregado el remedial correctamente');

    }

    public function remedialPromedio()
    {

      $remedial = DB::table('remediales')
      ->join('matriculados', 'remediales.matriculados_id', '=', 'matriculados.id')
      ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),
       DB::raw("(remediales.nota_remedial + remediales.promedio_supletorio) / 2 as promedio_remedial"), 'remediales.promedio_supletorio as promedio_supletorio', 'remediales.nota_remedial as nota_remedial')
       ->orderBy('matriculados.apellidos')
      ->distinct()
      ->groupBy('matriculados.id')
      ->get();



      return response()->json($remedial);

    }


    public function gracia()
    {

      return view('notas.gracia');
    }

    public function graciaRemedialPromedio(Request $request, $curso, $paralelo, $quimestre, $parcial, $materia)
    {
      $curso = $request->curso;
      $paralelo = $request->paralelo;
      $quimestre = $request->quimestre;
      $parcial = $request->parcial;
      $materia = $request->materia;


      $remedial = DB::table('remediales')
      ->join('matriculados', 'remediales.matriculados_id', '=', 'matriculados.id')
      ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),
        DB::raw("(remediales.nota_remedial + remediales.promedio_supletorio) / 2 as promedio_remedial"),
        'matriculados.id as id')
      ->where('matriculados.curso', 'LIKE', '%'.$curso.'%')
        ->where('matriculados.paralelo', 'LIKE', '%'.$paralelo.'%')
        ->where('remediales.quimestre', 'LIKE', '%'.$quimestre.'%')
        ->where('remediales.parcial', 'LIKE', '%'.$parcial.'%')
        ->where('remediales.materias_id', 'LIKE', '%'.$materia.'%')
        ->orderBy('matriculados.apellidos')
        ->distinct()
        ->groupBy('matriculados.id')
        ->get();

        return response()->json($remedial);

    }

    public function graciaStore(Request $request)
    {
      $matriculados_id = $request->matriculados_id;
      $materias_id = $request->materias_id;
      $nota_gracia = $request->nota_gracia;
      $promedio_remedial = $request->promedio_remedial;
      $quimestre = $request->quimestre;
      $parcial = $request->parcial;

      foreach ($request->matriculados_id as $key => $value) {
        $gracia = new Gracia;
        $gracia->matriculados_id = $matriculados_id[$key];
        $gracia->materias_id = $materias_id[$key];
        $gracia->nota_gracia = $nota_gracia[$key];
        $gracia->promedio_remedial = $promedio_remedial[$key];
        $gracia->quimestre = $quimestre[$key];
        $gracia->parcial = $parcial[$key];
        $gracia->save();
      }
      return redirect()->route('notas.gracia')->with('info', 'Se ha agregado la nota de gracia correctamente');

    }

    public function graciaPromedio()
    {
      $gracia = DB::table('gracias')
      ->join('matriculados', 'gracias.matriculados_id', '=', 'matriculados.id')
      ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),
      DB::raw("(gracias.nota_gracia + gracias.promedio_remedial) / 2 as promedio_gracia"), 'gracias.promedio_remedial as promedio_remedial', 'gracias.nota_gracia as nota_gracia', 'matriculados.id as id')
      ->orderBy('matriculados.apellidos')
      ->distinct()
      ->groupBy('matriculados.id')
      ->get();

      return response()->json($gracia);

    }
    public function notasPorcentaje()
    {
      return view('notas.notas-porcentaje');
    }
    public function asignarDatosProfesor()
    {
        if(Auth::user()->isRole('super-admin')  || Auth::user()->isRole('dece') || Auth::user()->isRole('admin')){

        }
        elseif(Auth::user()->isRole('profesor'))
        {
      $users = Auth::user()->cedula;
      $datos = DB::table('materias_profesores')
      ->join('materias', 'materias_profesores.materias_id', '=', 'materias.id')
      ->join('profesors', 'materias_profesores.profesores_id', '=', 'profesors.id')
      ->where('profesors.cedula', $users)
      ->select('materias.curso as curso', 'materias.especialidad as especialidad', 'materias.paralelo as paralelo')
      ->distinct()
      ->get();

      return response()->json($datos);
        }

    }
    public function resumenNotas()
    {
        return view('notas.nota-resumen');
    }
    public function libretaIndividual()
    {
      return view('notas.libretaIndividual');
    }

    public function descargarLibreta(Request $request)
    {
      $curso = $request->curso;
      $quimestre = $request->quimestre;
      $parcial = $request->parcial;
      $paralelo = $request->paralelo;
      $materias = Materias::join('matriculados as m1', 'materias.curso', '=', 'm1.curso')->join('matriculados as m2', 'materias.paralelo', '=', 'm2.paralelo')->where('m1.curso', $curso)->where('m2.paralelo', $paralelo)->select('materias.materia','materias.id', 'materias.tipo_materia')->distinct()->get();
      $notas = Matriculacion::with(['notas_ta' => function($query1) use($parcial, $quimestre){
        $query1
        ->where('parcial', $parcial)
        ->where('quimestre', $quimestre)
        ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
        ->groupBy('matriculado_id', 'materias_id');
         }])->with(['notas_ti' => function($query2) use($parcial, $quimestre){
            $query2
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
            ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_tg' => function($query3) use($parcial, $quimestre){
            $query3
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
            ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_le' => function($query4) use($parcial, $quimestre){
            $query4
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
            ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_ev' => function($query5) use($parcial, $quimestre){
            $query5
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
           ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_examen' => function($query6) use($quimestre){
            $query6
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', DB::raw("nota_exq / numero_tarea_exq as nota_final_examen"))
           ->groupBy('matriculado_id', 'materias_id');
        }])->with(['inscripcion' => function($query8){
            $query8->select('cedula', 'nombres_representante');
        }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();
      /*   $notasPromedioFinalTa = [];
        $notasPromedioFinalTi = [];
        $notasPromedioFinalTg = [];
        $notasPromedioFinalLe = [];
        $notasPromedioFinalEv = [];
        foreach($notas as $nota)
        {
            foreach($nota->notas_ta as $notas_ta)
            {
                $notasPromedioFinalTa[] = [
                    'matriculado_id' => $notas_ta->matriculado_id,
                    'nota_final' => $notas_ta->nota_final_ta,
                    'materias_id' => $notas_ta->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_ti as $notas_ti)
            {
                $notasPromedioFinalTi[] = [
                    'matriculado_id' => $notas_ti->matriculado_id,
                    'nota_final' => $notas_ti->nota_final_ti,
                    'materias_id' => $notas_ti->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_tg as $notas_tg)
            {
                $notasPromedioFinalTg[] = [
                    'matriculado_id' => $notas_tg->matriculado_id,
                    'nota_final' => $notas_tg->nota_final_tg,
                    'materias_id' => $notas_tg->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_le as $notas_le)
            {
                $notasPromedioFinalLe[] = [
                    'matriculado_id' => $notas_le->matriculado_id,
                    'nota_final' => $notas_le->nota_final_le,
                    'materias_id' => $notas_le->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_ev as $notas_ev)
            {
                $notasPromedioFinalEv[] = [
                    'matriculado_id' => $notas_ev->matriculado_id,
                    'nota_final' => $notas_ev->nota_final_ev,
                    'materias_id' => $notas_ev->materias_id
                ];
            }
        } */
        $inspe = Matriculacion::withCount(['inspecciones as h1_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '01');

        }])->withCount(['inspecciones as h2_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '01');

        }])
        ->withCount(['inspecciones as h3_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '01');

        }])
        ->withCount(['inspecciones as h4_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '01');

        }])
        ->withCount(['inspecciones as h5_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '01');

        }])
        ->withCount(['inspecciones as h6_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '01');

        }])
        ->withCount(['inspecciones as h7_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '01');

        }])
        ->withCount(['inspecciones as h8_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '01');

        }])
        ->withCount(['inspecciones as h9_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '01');

        }])
        ->withCount(['inspecciones as h1_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '02');

        }])
        ->withCount(['inspecciones as h2_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '02');

        }])
        ->withCount(['inspecciones as h3_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '02');

        }])
        ->withCount(['inspecciones as h4_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '02');

        }])
        ->withCount(['inspecciones as h5_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '02');

        }])
        ->withCount(['inspecciones as h6_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '02');

        }])
        ->withCount(['inspecciones as h7_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '02');

        }])
        ->withCount(['inspecciones as h8_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '02');

        }])
        ->withCount(['inspecciones as h9_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '02');

        }])
        ->withCount(['inspecciones as h1_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '03');

        }])
        ->withCount(['inspecciones as h2_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '03');

        }])
        ->withCount(['inspecciones as h3_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '03');

        }])
        ->withCount(['inspecciones as h4_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '03');

        }])
        ->withCount(['inspecciones as h5_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '03');

        }])
        ->withCount(['inspecciones as h6_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '03');

        }])
        ->withCount(['inspecciones as h7_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '03');

        }])
        ->withCount(['inspecciones as h8_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '03');

        }])
        ->withCount(['inspecciones as h9_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '03');

        }])
        ->withCount(['inspecciones as h1_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '04');

        }])
        ->withCount(['inspecciones as h2_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '04');

        }])
        ->withCount(['inspecciones as h3_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '04');

        }])
        ->withCount(['inspecciones as h4_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '04');

        }])
        ->withCount(['inspecciones as h5_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '04');

        }])
        ->withCount(['inspecciones as h6_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '04');

        }])
        ->withCount(['inspecciones as h7_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '04');

        }])
        ->withCount(['inspecciones as h8_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '04');

        }])
        ->withCount(['inspecciones as h9_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '04');

        }])
        ->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('matriculados.id')->get();
       $pdf = PDF::loadView('pdf.libreta-individual', compact('notas','inspe','materias', 'notasPromedioFinalTa', 'notasPromedioFinalTi', 'notasPromedioFinalTg', 'notasPromedioFinalLe', 'notasPromedioFinalEv', 'parcial', 'quimestre','representante'));
       return $pdf->download('libreta-individual.pdf');

    }

    public function libretaColectiva()
    {
      return view('notas.libretaColectiva');
    }

    public function descargarLibretaColectiva(Request $request)
    {
        $curso = $request->curso;
      $quimestre = $request->quimestre;
      $parcial = $request->parcial;
      $paralelo = $request->paralelo;
      $materias = Materias::join('matriculados', 'materias.curso', '=', 'matriculados.curso')->where('materias.curso', $curso)->select('materias.materia')->distinct()->get();

     $notas = Matriculacion::with(['notas' => function($query1) use($quimestre){
            $query1
            ->where('parcial', '1')
            ->where('quimestre', $quimestre)
            ->select('matriculados_id', 'materias_id',
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev)) / 5),3)  as nota_final"))
            ->groupBy('materias_id', 'matriculados_id');

    }])->with(['parcial2' => function($query5) use($quimestre){
    $query5->where('parcial', '2')
    ->where('quimestre', $quimestre)
    ->select('matriculados_id', 'materias_id',
    DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev)) / 5),3)  as nota_final"))
    ->groupBy('materias_id', 'matriculados_id');

    }])->with(['parcial3' => function($query6) use($quimestre){
    $query6->where('parcial', '3')
    ->where('quimestre', $quimestre)
    ->select('matriculados_id', 'materias_id',
    DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev)) / 5),3)  as nota_final"))
    ->groupBy('materias_id', 'matriculados_id');

    }])->with(['examen' => function($query7) use($quimestre){
    $query7->where('quimestre', $quimestre)
    ->where('examen', '!=', '')
    ->select('matriculados_id', 'quimestre',DB::raw('SUM(notas.examen) as nota_examen'), 'materias_id', 'id')
    ->groupBy('materias_id', 'matriculados_id');


    }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre){
     $query2->where('quimestre', $quimestre)
     ->where('parcial', '1')
     ->select('matriculados_id', 'promedio_final', 'materias_id', 'promedio_notas')
     ->groupBy('matriculados_id');


    }])->with(['recuperaciones_p2' => function($que1) use($parcial, $quimestre){
    $que1->where('quimestre', $quimestre)
    ->where('parcial', '2')
    ->select('matriculados_id', 'promedio_final', 'materias_id')
    ->groupBy('matriculados_id');

    }])->with(['recuperaciones_p3' => function($que2) use($parcial, $quimestre){
    $que2->where('quimestre', $quimestre)
    ->where('parcial', '3')
    ->select('matriculados_id', 'promedio_final', 'materias_id')
    ->groupBy('matriculados_id');

    }])->with(['conducta' => function($que3) use ($quimestre){
                $que3->where('quimestre', $quimestre)
                ->select('matriculados_id', 'materias_id',DB::raw('sum(notas.conducta) / sum(notas.numero_conducta) as nota_conducta'))
                ->groupBy('matriculados_id');
    }])->with(['inscripcion' => function($query3){
    $query3->select('cedula', 'nombres_representante');


    }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();

     $representante = DB::table('inscripciones')
     ->select('inscripciones.nombres_representante')
     ->where('inscripciones.curso', $curso)
     ->get();

     $materias = DB::table('materias')
     ->select('materia', 'id', 'tipo_materia')
     ->where('curso', $curso)
     ->where('paralelo', $paralelo)
     ->distinct()
     ->get();

     $inspe = Matriculacion::withCount(['inspecciones as h1_count_01' => function($query) use($quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h1', '01');

    }])->withCount(['inspecciones as h2_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h2', '01');

    }])
    ->withCount(['inspecciones as h3_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h3', '01');

    }])
    ->withCount(['inspecciones as h4_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h4', '01');

    }])
    ->withCount(['inspecciones as h5_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h5', '01');

    }])
    ->withCount(['inspecciones as h6_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h6', '01');

    }])
    ->withCount(['inspecciones as h7_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h7', '01');

    }])
    ->withCount(['inspecciones as h8_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h8', '01');

    }])
    ->withCount(['inspecciones as h9_count_01' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h9', '01');

    }])
    ->withCount(['inspecciones as h1_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h1', '02');

    }])
    ->withCount(['inspecciones as h2_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h2', '02');

    }])
    ->withCount(['inspecciones as h3_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h3', '02');

    }])
    ->withCount(['inspecciones as h4_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h4', '02');

    }])
    ->withCount(['inspecciones as h5_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h5', '02');

    }])
    ->withCount(['inspecciones as h6_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h6', '02');

    }])
    ->withCount(['inspecciones as h7_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h7', '02');

    }])
    ->withCount(['inspecciones as h8_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h8', '02');

    }])
    ->withCount(['inspecciones as h9_count_02' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h9', '02');

    }])
    ->withCount(['inspecciones as h1_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h1', '03');

    }])
    ->withCount(['inspecciones as h2_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h2', '03');

    }])
    ->withCount(['inspecciones as h3_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h3', '03');

    }])
    ->withCount(['inspecciones as h4_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h4', '03');

    }])
    ->withCount(['inspecciones as h5_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h5', '03');

    }])
    ->withCount(['inspecciones as h6_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h6', '03');

    }])
    ->withCount(['inspecciones as h7_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h7', '03');

    }])
    ->withCount(['inspecciones as h8_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h8', '03');

    }])
    ->withCount(['inspecciones as h9_count_03' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h9', '03');

    }])
    ->withCount(['inspecciones as h1_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h1', '04');

    }])
    ->withCount(['inspecciones as h2_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h2', '04');

    }])
    ->withCount(['inspecciones as h3_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h3', '04');

    }])
    ->withCount(['inspecciones as h4_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h4', '04');

    }])
    ->withCount(['inspecciones as h5_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h5', '04');

    }])
    ->withCount(['inspecciones as h6_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h6', '04');

    }])
    ->withCount(['inspecciones as h7_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h7', '04');

    }])
    ->withCount(['inspecciones as h8_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h8', '04');

    }])
    ->withCount(['inspecciones as h9_count_04' => function($query) use($parcial, $quimestre){
        $query
        ->where('quimestre', $quimestre)
        ->where('h9', '04');

    }])
    ->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('matriculados.id')->get();

       $pdf = PDF::loadView('pdf.libreta-colectiva', compact('notas', 'materias', 'inspe', 'parcial', 'quimestre','representante'));


       return $pdf->download('libreta-colectiva.pdf');
    }
    public function nominaEstudiante()
    {
      return view('notas.reportesExcel');
    }

    public function reportesExcel(Request $request){
      $curso = $request->curso;
      $paralelo = $request->paralelo;

      if($request->tipo_documento == 'NOMINA1')
      {
        return Excel::download(new NominaEstudiante($curso, $paralelo), 'nomina-estudiante.xls');
      }
      else if($request->tipo_documento == 'NOMINA2'){
       return Excel::download(new CuadroFinal($curso, $paralelo), 'nomina2.xls');
      }
      else if($request->tipo_documento == 'PRIMERQUIMESTRE')
      {
         return Excel::download(new PrimerQuimestre($curso, $paralelo), 'primer-quimestre.xls');

           // $matriculados = Matriculacion::join('notas', 'matriculados.id', '=', 'notas.matriculados_id')->select('nombres', 'apellidos')->where('curso', $curso)->groupBy('matriculados.id')->get();
      }
      else if($request->tipo_documento == 'SEGUNDOQUIMESTRE')
      {
        return Excel::download(new SegundoQuimestre($curso, $paralelo), 'segundo-quimestre.xls');
      }
      else if($request->tipo_documento == 'CUADROFINAL')
      {
        return Excel::download(new CuadroFinal2($curso, $paralelo), 'cuadro-final.xls');
      }
    }
    public function verNotasAlumnos()
    {
        $user = Auth::user()->cedula;
        $matriculados = Matriculacion::where('cedula', $user)->select(DB::raw("CONCAT(apellidos, ' ',nombres) as nombres"), 'cedula')->orderBy('matriculados.apellidos')->get();
        return view('notas.ver-notas-alumnos', compact('matriculados', 'materias'));
    }
    public function cargarNotasParaAlumnos(Request $request)
    {
        $cedula = $request->cedula;
        $quimestre = $request->quimestre;
        $parcial = $request->parcial;
        $materia = $request->materia;
        $notas = Matriculacion::with(['notas_ta' => function($query1) use($parcial, $quimestre, $materia){
            $query1
            ->where('parcial', $parcial)
            ->where('materias_id', $materia)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
            ->groupBy('matriculado_id', 'materias_id');
             }])->with(['notas_ti' => function($query2) use($parcial, $quimestre, $materia){
                $query2
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_tg' => function($query3) use($parcial, $quimestre, $materia){
                $query3
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_le' => function($query4) use($parcial, $quimestre, $materia){
                $query4
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_ev' => function($query5) use($parcial, $quimestre, $materia){
                $query5
                ->where('parcial', $parcial)
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
               ->groupBy('matriculado_id', 'materias_id');
            }])->with(['notas_examen' => function($query6) use($quimestre, $materia){
                $query6
                ->where('materias_id', $materia)
                ->where('quimestre', $quimestre)
                ->select('matriculado_id', 'materias_id', DB::raw("nota_exq / numero_tarea_exq as nota_final_examen"))
               ->groupBy('matriculado_id', 'materias_id');
            }])->where('cedula', $cedula)->groupBy('id')->orderBy('apellidos')->get();

        return view('notas.ver-notas-alumnos', compact('notas'))->with('info', 'Se ha cargado la nota correctamente');
    }

    public function cargarMateriasAlumnos($cedula)
    {
       $materiasMatriculados = Materias::join('matriculados as m1', 'materias.curso', '=', 'm1.curso')
       ->join('matriculados as m2', 'materias.paralelo', '=', 'm2.paralelo')
       ->where('m1.cedula', $cedula)
       ->where('m2.cedula', $cedula)
       ->select('materias.materia', 'materias.id')
       ->distinct()
       ->get();
       return response()->json($materiasMatriculados);
    }

    public function recuperacion()
    {
        return view('notas.recuperacion');
    }

    public function sumaRecuperacion($curso, $paralelo, $quimestre, $parcial, $materia)
    {
       $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->join('materias', 'notas.materias_id', '=', 'materias.id')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"),
         DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev)) / 5  as nota_final"), 'notas.id as nota_id', 'matriculados.id as matriculados_id')
        ->where('matriculados.curso',$curso)
        ->where('matriculados.paralelo',$paralelo)
        ->where('notas.quimestre',$quimestre)
        ->where('notas.parcial',$parcial)
        ->where('notas.materias_id',$materia)
        ->havingRaw('nota_final <= 7')
        ->orderBy('matriculados.apellidos')
        ->distinct()
        ->groupBy('matriculados.id')
        ->get();

        return response()->json($notas);
    }
    public function recuperacionStore(Request $request)
    {

      $matriculados_id = $request->matriculados_id;
      $materias_id = $request->materias_id;
      $nota_recuperacion = $request->nota_recuperacion;
      $promedio_notas = $request->promedio_notas;
      $quimestre = $request->quimestre;
      $parcial = $request->parcial;


      foreach ($request->matriculados_id as $key => $value) {
        $recuperacion = new Recuperacion;
        $recuperacion->matriculados_id = $matriculados_id[$key];
        $recuperacion->materias_id = $materias_id[$key];
        $recuperacion->nota_recuperacion = round($nota_recuperacion[$key], 4);
        $recuperacion->promedio_notas = round($promedio_notas[$key], 4);
        $recuperacion->quimestre = $quimestre[$key];
        $recuperacion->parcial = $parcial[$key];
        $recuperacion->promedio_final = (($nota_recuperacion[$key]) + ($promedio_notas[$key])) / 2;
        $recuperacion->save();
      }
      return redirect()->route('notas.recuperacion')->with('info', 'Se ha agregado la nota de recuperacion correctamente');

    }

    public function promedioRecuperacion($curso, $paralelo, $quimestre, $parcial, $materia)
    {
        $recuperacion = DB::table('recuperacion')
      ->join('matriculados', 'recuperacion.matriculados_id', '=', 'matriculados.id')
      ->where('matriculados.curso', $curso)
      ->where('matriculados.paralelo', $paralelo)
      ->where('recuperacion.quimestre', $quimestre)
      ->where('recuperacion.parcial', $parcial)
      ->where('recuperacion.materias_id', $materia)
      ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"),
       DB::raw("(recuperacion.nota_recuperacion + recuperacion.promedio_notas) / 2 as promedio_recuperacion"), 'recuperacion.promedio_notas as promedio_notas', 'recuperacion.nota_recuperacion as nota_recuperacion')
       ->orderBy('matriculados.apellidos')
      ->distinct()
      ->groupBy('matriculados.id')
      ->get();

      return response()->json($recuperacion);
    }

    public function abanderados()
    {
        return view('notas.abanderados');
    }

    public function apiAbanderados($curso, $paralelo)
    {
        $matriculados = Matriculacion::where('curso', $curso)->where('paralelo', $paralelo)->select('id', 'nombres', 'apellidos', 'cedula')->get();

        return response()->json($matriculados);
    }
    public function abanderadoStore(Request $request)
    {
        $matriculados_id = $request->matriculados_id;
        $basica_2 = $request->basica_2;
        $basica_3 = $request->basica_3;
        $basica_4 = $request->basica_4;
        $basica_5 = $request->basica_5;
        $basica_6 = $request->basica_6;
        $basica_7 = $request->basica_7;
        $basica_8 = $request->basica_8;
        $basica_9 = $request->basica_9;
        $basica_10 = $request->basica_10;
        $bachillerato_1 = $request->bachillerato_1;
        $bachillerato_2 = $request->bachillerato_2;

        foreach($request->bachillerato_2 as $key => $value)
        {
        $abanderados = new Abanderados;
        $abanderados->matriculados_id = $matriculados_id[$key];
        $abanderados->basica_2 = $basica_2[$key];
        $abanderados->basica_3 = $basica_3[$key];
        $abanderados->basica_4 = $basica_4[$key];
        $abanderados->basica_5 = $basica_5[$key];
        $abanderados->basica_6 = $basica_6[$key];
        $abanderados->basica_7 = $basica_7[$key];
        $abanderados->basica_8 = $basica_8[$key];
        $abanderados->basica_9 = $basica_9[$key];
        $abanderados->basica_10 = $basica_10[$key];
        $abanderados->bachillerato_1 = $bachillerato_1[$key];
        $abanderados->bachillerato_2 = $bachillerato_2[$key];
        $abanderados->promedio_final = bcdiv((($basica_2[$key] + $basica_3[$key] + $basica_4[$key] + $basica_5[$key] + $basica_6[$key] + $basica_7[$key] + $basica_8[$key] + $basica_9[$key] + $basica_10[$key] + $bachillerato_1[$key] + $bachillerato_2[$key]) / 11 ), '1', '3');
        $abanderados->save();
        }

        return redirect()->route('notas.abanderados')->with('info', 'Se ha asignado correctamente la notas de abanderados');

    }
    public function abanderadosExcel(Request $request)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;

        return Excel::download(new AbanderadosExport($curso, $paralelo), 'abanderados-reporte.xlsx');

    }
    public function reporteIndividualLibreta()
    {
        return view('notas.reporte-individual');
    }
    public function reporteIndividualLibretaStore(Request $request)
    {
        $codigo = $request->get('codigo');
        $quimestre = $request->get('quimestre');
        $parcial = $request->get('parcial');
        $materias = Materias::join('matriculados as m1', 'materias.curso', '=', 'm1.curso')->join('matriculados as m2', 'materias.paralelo', '=', 'm2.paralelo')->where('m1.codigo', $codigo)->where('m2.codigo', $codigo)->select('materias.materia','materias.id', 'materias.tipo_materia')->distinct()->get();
      $notas = Matriculacion::with(['notas_ta' => function($query1) use($parcial, $quimestre){
        $query1
        ->where('parcial', $parcial)
        ->where('quimestre', $quimestre)
        ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
        ->groupBy('matriculado_id', 'materias_id');
         }])->with(['notas_ti' => function($query2) use($parcial, $quimestre){
            $query2
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
            ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_tg' => function($query3) use($parcial, $quimestre){
            $query3
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
            ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_le' => function($query4) use($parcial, $quimestre){
            $query4
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
            ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_ev' => function($query5) use($parcial, $quimestre){
            $query5
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
           ->groupBy('matriculado_id', 'materias_id');
        }])->with(['notas_examen' => function($query6) use($quimestre){
            $query6
            ->where('quimestre', $quimestre)
            ->select('matriculado_id', 'materias_id', DB::raw("nota_exq / numero_tarea_exq as nota_final_examen"))
           ->groupBy('matriculado_id', 'materias_id');
        }])->with(['inscripcion' => function($query8){
            $query8->select('cedula', 'nombres_representante');
        }])->where('codigo', $codigo)->groupBy('id')->orderBy('apellidos')->get();
       /*  $notasPromedioFinalTa = [];
        $notasPromedioFinalTi = [];
        $notasPromedioFinalTg = [];
        $notasPromedioFinalLe = [];
        $notasPromedioFinalEv = [];
        foreach($notas as $nota)
        {
            foreach($nota->notas_ta as $notas_ta)
            {
                $notasPromedioFinalTa[] = [
                    'matriculado_id' => $notas_ta->matriculado_id,
                    'nota_final' => $notas_ta->nota_final_ta,
                    'materias_id' => $notas_ta->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_ti as $notas_ti)
            {
                $notasPromedioFinalTi[] = [
                    'matriculado_id' => $notas_ti->matriculado_id,
                    'nota_final' => $notas_ti->nota_final_ti,
                    'materias_id' => $notas_ti->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_tg as $notas_tg)
            {
                $notasPromedioFinalTg[] = [
                    'matriculado_id' => $notas_tg->matriculado_id,
                    'nota_final' => $notas_tg->nota_final_tg,
                    'materias_id' => $notas_tg->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_le as $notas_le)
            {
                $notasPromedioFinalLe[] = [
                    'matriculado_id' => $notas_le->matriculado_id,
                    'nota_final' => $notas_le->nota_final_le,
                    'materias_id' => $notas_le->materias_id
                ];
            }
        }
        foreach($notas as $nota)
        {
            foreach($nota->notas_ev as $notas_ev)
            {
                $notasPromedioFinalEv[] = [
                    'matriculado_id' => $notas_ev->matriculado_id,
                    'nota_final' => $notas_ev->nota_final_ev,
                    'materias_id' => $notas_ev->materias_id
                ];
            }
        } */
        $inspe = Matriculacion::withCount(['inspecciones as h1_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '01');

        }])->withCount(['inspecciones as h2_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '01');

        }])
        ->withCount(['inspecciones as h3_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '01');

        }])
        ->withCount(['inspecciones as h4_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '01');

        }])
        ->withCount(['inspecciones as h5_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '01');

        }])
        ->withCount(['inspecciones as h6_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '01');

        }])
        ->withCount(['inspecciones as h7_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '01');

        }])
        ->withCount(['inspecciones as h8_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '01');

        }])
        ->withCount(['inspecciones as h9_count_01' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '01');

        }])
        ->withCount(['inspecciones as h1_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '02');

        }])
        ->withCount(['inspecciones as h2_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '02');

        }])
        ->withCount(['inspecciones as h3_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '02');

        }])
        ->withCount(['inspecciones as h4_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '02');

        }])
        ->withCount(['inspecciones as h5_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '02');

        }])
        ->withCount(['inspecciones as h6_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '02');

        }])
        ->withCount(['inspecciones as h7_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '02');

        }])
        ->withCount(['inspecciones as h8_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '02');

        }])
        ->withCount(['inspecciones as h9_count_02' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '02');

        }])
        ->withCount(['inspecciones as h1_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '03');

        }])
        ->withCount(['inspecciones as h2_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '03');

        }])
        ->withCount(['inspecciones as h3_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '03');

        }])
        ->withCount(['inspecciones as h4_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '03');

        }])
        ->withCount(['inspecciones as h5_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '03');

        }])
        ->withCount(['inspecciones as h6_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '03');

        }])
        ->withCount(['inspecciones as h7_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '03');

        }])
        ->withCount(['inspecciones as h8_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '03');

        }])
        ->withCount(['inspecciones as h9_count_03' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '03');

        }])
        ->withCount(['inspecciones as h1_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h1', '04');

        }])
        ->withCount(['inspecciones as h2_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h2', '04');

        }])
        ->withCount(['inspecciones as h3_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h3', '04');

        }])
        ->withCount(['inspecciones as h4_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h4', '04');

        }])
        ->withCount(['inspecciones as h5_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h5', '04');

        }])
        ->withCount(['inspecciones as h6_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h6', '04');

        }])
        ->withCount(['inspecciones as h7_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h7', '04');

        }])
        ->withCount(['inspecciones as h8_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h8', '04');

        }])
        ->withCount(['inspecciones as h9_count_04' => function($query) use($parcial, $quimestre){
            $query
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->where('h9', '04');

        }])
        ->where('codigo', $codigo)->groupBy('matriculados.id')->get();
       $pdf = PDF::loadView('pdf.libreta-individual', compact('notas','inspe','materias', 'notasPromedioFinalTa', 'notasPromedioFinalTi', 'notasPromedioFinalTg', 'notasPromedioFinalLe', 'notasPromedioFinalEv', 'parcial', 'quimestre','representante'));
       return $pdf->download('libreta-individual.pdf');
    }
    public function promediosFinales()
    {
        $curso = 'INICIAL 1';
        $paralelo = 'A';
        $parcial = '1';
        $quimestre = '1';
        $materia = '1';
        $notas = Matriculacion::with(['notas' => function($query1) use($parcial, $quimestre, $materia){
            $query1->where('materias_id', $materia)
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculados_id', DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),
            DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),
            DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),
            DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),
            DB::raw("ROUND(SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev), 3) as nota_ev"),
            DB::raw("ROUND(SUM(notas.conducta) / SUM(notas.numero_conducta), 3) as nota_conducta"),
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev)) / 5),3)  as nota_final"))
            ->groupBy('matriculados_id');

 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre, $materia){
     $query2->where('parcial', $parcial)
     ->where('quimestre', $quimestre)
     ->where('materias_id', $materia)
     ->groupBy('matriculados_id');


 }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();
 dd(json_encode($notas));

    }
    public function examenQuimestral()
    {
        return view('notas.examen');
    }

}
