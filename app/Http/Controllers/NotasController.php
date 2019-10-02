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

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    public function store(Request $request)
    {
            $nota_ta = $request->nota_ta;
            $nota_ti = $request->nota_ti;
            $nota_tg = $request->nota_tg;
            $nota_le = $request->nota_le;
            $nota_ev = $request->nota_ev;
            $descripcion = $request->descripcion;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $conducta = $request->conducta;
            $examen = $request->examen;

            foreach ($request->matriculados_id as $key => $value) {
                if(!empty($examen))
                {
                    $nota = new Notas;
                    $nota->examen = $examen[$key];
                    $nota->quimestre = $quimestre[$key];
                    $nota->matriculados_id = $matriculados_id[$key];
                    $nota->materias_id = $materias_id[$key];
                    $nota->save();
                }else{
                $nota = new Notas;
                $nota->nota_ta = $nota_ta[$key];
                $nota->nota_ti = $nota_ti[$key];
                $nota->nota_tg = $nota_tg[$key];
                $nota->nota_le = $nota_le[$key];
                $nota->nota_ev = $nota_ev[$key];
                $nota->descripcion = $descripcion;
                $nota->matriculados_id = $matriculados_id[$key];
                $nota->materias_id = $materias_id[$key];
                $nota->parcial = $parcial[$key];
                $nota->quimestre = $quimestre[$key];
                $nota->conducta = $conducta[$key];
                $nota->autoridad_id = auth()->user()->id;
                if(!empty($nota_ta))
                {
                    $nota->numero_tarea_ta = '1';
                }
                else if(!empty($nota_ti))
                {
                    $nota->numero_tarea_ti = '1';
                }
                else if(!empty($nota_tg))
                {
                    $nota->numero_tarea_tg = '1';
                }
                else if(!empty($nota_le))
                {
                    $nota->numero_tarea_le = '1';
                }
                else if(!empty($nota_ev))
                {
                    $nota->numero_tarea_ev = '1';
                }
                else if(!empty($conducta))
                {
                    $nota->numero_conducta = '1';
                }
                $nota->save();
            }
        }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\notass  $notass
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        $notas = Notas::find($id);
        return view('notas.edit', compact('notas'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notass  $notass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nota_ta = $request->nota_ta;
        $nota_ti = $request->nota_ti;
        $nota_tg = $request->nota_tg;
        $nota_le = $request->nota_le;
        $nota_ev = $request->nota_ev;
        $descripcion = $request->descripcion;
        $matriculados_id = $request->matriculados_id;
        $materias_id = $request->materias_id;
        $parcial = $request->parcial;
        $quimestre = $request->quimestre;
        $conducta = $request->conducta;
        $examen = $request->examen;

            $nota = Notas::find($id);
            $nota->nota_ta = $nota_ta;
            $nota->nota_ti = $nota_ti;
            $nota->nota_tg = $nota_tg;
            $nota->nota_le = $nota_le;
            $nota->nota_ev = $nota_ev;
            $nota->descripcion = $descripcion;
            $nota->matriculados_id = $matriculados_id;
            $nota->materias_id = $materias_id;
            $nota->parcial = $parcial;
            $nota->quimestre = $quimestre;
            $nota->conducta = $conducta;
            $nota->examen = $examen;
            $nota->save();

        return redirect()->route('notas.editar-notas')->with('info', 'La nota se ha editado correctamente');
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notass  $notass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $notas = Notas::find($id);
        $notas->delete();
        return back()->with('info', 'Las notas ha sido eliminada exitosamente');
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
    public function buscarAlumnoNotas($cursos, $paralelo)
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
            ->where('curso', 'LIKE', '%'.$curso.'%')
            ->where('paralelo', 'LIKE', '%'.$paralelo.'%')
            ->where('tipo_materia', '!=', 'NO')
            ->distinct()
            ->get();

            return response()->json($materias);

        }
        else
        {
            $materias = DB::table('materias')
            ->select('id', 'materia')
            ->where('curso', 'LIKE', '%'.$curso.'%')
            ->where('paralelo', 'LIKE', '%'.$paralelo.'%')
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
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
            ->groupBy('matriculados_id', 'materias_id');

 }])->with(['examen' => function($query7) use($quimestre){
    $query7->where('quimestre', $quimestre)
    ->select('matriculados_id', DB::raw("sum(examen) as nota_examen"))
    ->groupBy('matriculados_id');
 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre, $materia){
     $query2->where('parcial', $parcial)
     ->where('quimestre', $quimestre)
     ->where('materias_id', $materia)
     ->groupBy('matriculados_id');


 }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();

        return view('notas.vernotas', compact('notas', 'quimestre'))->with('info', 'Se ha cargado las notas correctamete');

    }
    public function notasEdit($idestudiante, $ttarea, $parcial, $quimestre, $materia)
    {
        if($ttarea == 'examen')
        {
            $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->select(DB::raw('notas.'.$ttarea.''), 'notas.id', 'notas.descripcion', 'notas.created_at')
        ->where('notas.'.$ttarea.'', '!=', 'null')
        ->where('matriculados.id', '=', $idestudiante)
        ->where('notas.quimestre', '=', $quimestre)
        ->groupBy('notas.examen')
        ->get();

        return response()->json($notas);

        }else{
            $notas = DB::table('notas')
            ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
            ->join('materias', 'notas.materias_id', '=', 'materias.id')
            ->select(DB::raw('notas.'.$ttarea.''), 'notas.id', 'notas.descripcion', 'notas.created_at')
            ->where('notas.'.$ttarea.'', '!=', 'null')
            ->where('matriculados.id', '=', $idestudiante)
            ->where('notas.parcial', '=', $parcial)
            ->where('notas.quimestre', '=', $quimestre)
            ->where('notas.materias_id', $materia)
            ->get();

            return response()->json($notas);
        }

    }

    public function resumenNotaStore($ttarea, $parcial, $quimestre, $materia)
    {
        $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->join('materias', 'notas.materias_id', '=', 'materias.id')
        ->select('notas.id', 'notas.descripcion', 'notas.created_at')
        ->where('notas.'.$ttarea.'', '!=', 'null')
        ->where('notas.parcial', '=', $parcial)
        ->where('notas.quimestre', '=', $quimestre)
        ->where('notas.materias_id', $materia)
        ->groupBy('notas.descripcion')
        ->distinct('notas.descripcion')
        ->get();

        return response()->json($notas);

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
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
            ->groupBy('matriculados_id', 'materias_id');

 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre, $materia){
     $query2->where('parcial', $parcial)
     ->where('quimestre', $quimestre)
     ->where('materias_id', $materia)
     ->groupBy('matriculados_id');


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
         DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5  as nota_final"), 'notas.id as nota_id', 'matriculados.id as matriculados_id')
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
      $materias = Materias::join('matriculados', 'materias.curso', '=', 'matriculados.curso')->where('materias.curso', $curso)->select('materias.materia')->distinct()->get();

     $notas = Matriculacion::with(['notas' => function($query1) use($parcial, $quimestre){
            $query1
            ->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculados_id', 'materias_id', DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),
            DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),
            DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),
            DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),
            DB::raw("ROUND(SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev), 3) as nota_ev"),
            DB::raw("ROUND(SUM(notas.conducta) / SUM(notas.numero_conducta), 3) as nota_conducta"),
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
            ->groupBy('materias_id', 'matriculados_id');

 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre){
     $query2->where('parcial', $parcial)
     ->where('quimestre', $quimestre)
     ->groupBy('matriculados_id');


 }])->with(['inscripcion' => function($query3){
    $query3->select('cedula', 'nombres_representante');
 }])->with(['materias' => function($query4) use($curso,$paralelo){
    $query4->select('curso', 'materia', 'tipo_materia','id')
    ->where('curso', $curso)
    ->where('paralelo', $paralelo);
 }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();
     $representante = DB::table('inscripciones')
     ->select('inscripciones.nombres_representante')
     ->where('inscripciones.curso', $curso)
     ->get();
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



       $pdf = PDF::loadView('pdf.libreta-individual', compact('notas', 'materias', 'inspe', 'parcial', 'quimestre','representante'));


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
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
            ->groupBy('materias_id', 'matriculados_id');

 }])->with(['parcial2' => function($query5) use($quimestre){
    $query5->where('parcial', '2')
    ->where('quimestre', $quimestre)
    ->select('matriculados_id', 'materias_id',
    DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
    ->groupBy('materias_id', 'matriculados_id');

 }])->with(['parcial3' => function($query6) use($quimestre){
    $query6->where('parcial', '3')
    ->where('quimestre', $quimestre)
    ->select('matriculados_id', 'materias_id',
    DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
    ->groupBy('materias_id', 'matriculados_id');

 }])->with(['examen' => function($query7) use($quimestre){
    $query7->where('quimestre', $quimestre)
    ->select('matriculados_id','examen', 'materias_id')
    ->groupBy('examen');
 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre){
     $query2->where('quimestre', $quimestre)
     ->groupBy('matriculados_id');
 }])->with(['inscripcion' => function($query3){
    $query3->select('cedula', 'nombres_representante');
 }])->with(['materias' => function($query4) use($curso,$paralelo){
    $query4->select('curso', 'materia', 'tipo_materia','id')
    ->where('curso', $curso)
    ->where('paralelo', $paralelo);
 }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();
     $representante = DB::table('inscripciones')
     ->select('inscripciones.nombres_representante')
     ->where('inscripciones.curso', $curso)
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
        $materias = Materias::join('matriculados', 'materias.curso', '=', 'matriculados.curso')->where('matriculados.cedula', $user)->pluck('materias.materia', 'materias.id');

        return view('notas.ver-notas-alumnos', compact('matriculados', 'materias'));
    }

    public function cargarNotasParaAlumnos(Request $request)
    {
        $cedula = $request->cedula;
        $quimestre = $request->quimestre;
        $parcial = $request->parcial;
        $materia = $request->materia;

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
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
            ->groupBy('matriculados_id');

 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre, $materia){
     $query2->where('parcial', $parcial)
     ->where('quimestre', $quimestre)
     ->where('materias_id', $materia)
     ->groupBy('matriculados_id');


 }])->where('cedula', $cedula)->groupBy('id')->orderBy('apellidos')->get();

        return view('notas.ver-notas-alumnos', compact('notas'))->with('info', 'Se ha cargado la nota correctamente');
    }

    public function cargarMateriasAlumnos($cedula)
    {
       $materiasMatriculados = Materias::join('matriculados', 'materias.curso', '=', 'matriculados.curso')
       ->where('matriculados.cedula', $cedula)
       ->select('materias.materia', 'materias.id')
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
         DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5  as nota_final"), 'notas.id as nota_id', 'matriculados.id as matriculados_id')
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

      $materias = Materias::join('matriculados', 'materias.curso', '=', 'matriculados.curso')->where('matriculados.codigo', $codigo)->select('materias.materia')->distinct()->get();

      $notas = Matriculacion::with(['notas' => function($query1) use($parcial, $quimestre){
             $query1
             ->where('parcial', $parcial)
             ->where('quimestre', $quimestre)
             ->select('matriculados_id', 'materias_id', DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),
             DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),
             DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),
             DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),
             DB::raw("ROUND(SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev), 3) as nota_ev"),
             DB::raw("ROUND(SUM(notas.conducta) / SUM(notas.numero_conducta), 3) as nota_conducta"),
             DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
             ->groupBy('materias_id', 'matriculados_id');

  }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre){
      $query2->where('parcial', $parcial)
      ->where('quimestre', $quimestre)
      ->groupBy('matriculados_id');


  }])->with(['inscripcion' => function($query3){
     $query3->select('cedula', 'nombres_representante');
  }])->with(['materias' => function($query4){
     $query4->select('curso', 'materia', 'tipo_materia','id');
  }])->where('codigo', $codigo)->groupBy('id')->orderBy('apellidos')->get();
      $representante = DB::table('inscripciones')
      ->select('inscripciones.nombres_representante')
      ->where('inscripciones.codigo_nuevo', $codigo)
      ->get();
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



        $pdf = PDF::loadView('pdf.libreta-individual-reporte', compact('notas', 'materias', 'inspe', 'parcial', 'quimestre','representante'));

       return $pdf->download('reporte-individual.pdf');
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
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5),3)  as nota_final"))
            ->groupBy('matriculados_id');

 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre, $materia){
     $query2->where('parcial', $parcial)
     ->where('quimestre', $quimestre)
     ->where('materias_id', $materia)
     ->groupBy('matriculados_id');


 }])->where('curso', $curso)->where('paralelo', $paralelo)->groupBy('id')->orderBy('apellidos')->get();
 dd(json_encode($notas));

    }


}
