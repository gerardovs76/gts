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
        if($request->tipo_tareas == 'nota_ta')
        {
           
            $notas_ta = $request->nota_ta;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;

            foreach($matriculados_id as $key => $value)
            {
                $nota_ta = new Nota_ta;
                $nota_ta->nota_ta = $notas_ta[$key];
                $nota_ta->descripcion = $descripcion;
                $nota_ta->materias_id = $materias_id[$key];
                $nota_ta->matriculado_id = $matriculados_id[$key];
                $nota_ta->parcial = $parcial[$key];
                $nota_ta->quimestre = $quimestre[$key];
                $nota_ta->autoridad_id = auth()->user()->id;
                $nota_ta->numero_tarea_ta = '1';
                $nota_ta->save();
            }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
            
        }
        else if($request->tipo_tareas == 'nota_ti')
        {
            $notas_ti = $request->nota_ti;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;
            foreach($matriculados_id as $key => $value)
            {
                $nota_ti = new Notas_ti;
                $nota_ti->nota_ti = $notas_ti[$key];
                $nota_ti->descripcion = $descripcion;
                $nota_ti->materias_id = $materias_id[$key];
                $nota_ti->matriculado_id = $matriculados_id[$key];
                $nota_ti->parcial = $parcial[$key];
                $nota_ti->quimestre = $quimestre[$key];
                $nota_ti->autoridad_id = auth()->user()->id;
                $nota_ti->numero_tarea_ti = '1';
                $nota_ti->save();
            }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
            
        }
        else if($request->tipo_tareas == 'nota_tg')
        {
            $notas_tg = $request->nota_tg;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;
            foreach($matriculados_id as $key => $value)
            {
                $nota_tg = new Notas_tg;
                $nota_tg->nota_tg = $notas_tg[$key];
                $nota_tg->descripcion = $descripcion;
                $nota_tg->materias_id = $materias_id[$key];
                $nota_tg->matriculado_id = $matriculados_id[$key];
                $nota_tg->parcial = $parcial[$key];
                $nota_tg->quimestre = $quimestre[$key];
                $nota_tg->autoridad_id = auth()->user()->id;
                $nota_tg->numero_tarea_tg = '1';
                $nota_tg->save();
            }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
            
        }
        else if($request->tipo_tareas == 'nota_le')
        {
            $notas_le = $request->nota_le;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;
            foreach($matriculados_id as $key => $value)
            {
                $nota_le = new Notas_le;
                $nota_le->nota_le = $notas_le[$key];
                $nota_le->descripcion = $descripcion;
                $nota_le->materias_id = $materias_id[$key];
                $nota_le->matriculado_id = $matriculados_id[$key];
                $nota_le->parcial = $parcial[$key];
                $nota_le->quimestre = $quimestre[$key];
                $nota_le->autoridad_id = auth()->user()->id;
                $nota_le->numero_tarea_le = '1';
                $nota_le->save();
            }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
            
        }
        else if($request->tipo_tareas == 'nota_ev')
        {
            $notas_ev = $request->nota_ev;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;
            foreach($matriculados_id as $key => $value)
            {
                $nota_ev = new Notas_ev;
                $nota_ev->nota_ev = $notas_ev[$key];
                $nota_ev->descripcion = $descripcion;
                $nota_ev->materias_id = $materias_id[$key];
                $nota_ev->matriculado_id = $matriculados_id[$key];
                $nota_ev->parcial = $parcial[$key];
                $nota_ev->quimestre = $quimestre[$key];
                $nota_ev->autoridad_id = auth()->user()->id;
                $nota_ev->numero_tarea_ev = '1';
                $nota_ev->save();
            }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
            
        }
        else if($request->tipo_tareas == 'nota_conducta')
        {
            $notas_conducta = $request->conducta;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;
            foreach($matriculados_id as $key => $value)
            {
                $nota_conducta = new Notas_conducta;
                $nota_conducta->nota_conducta = $notas_conducta[$key];
                $nota_conducta->descripcion = $descripcion;
                $nota_conducta->materias_id = $materias_id[$key];
                $nota_conducta->matriculado_id = $matriculados_id[$key];
                $nota_conducta->parcial = $parcial[$key];
                $nota_conducta->quimestre = $quimestre[$key];
                $nota_conducta->autoridad_id = auth()->user()->id;
                $nota_conducta->numero_tarea_conducta = '1';
                $nota_conducta->save();
            }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
            
        }
        else if($request->tipo_tareas == 'nota_examen')
        {
            $notas_examen = $request->examen;
            $matriculados_id = $request->matriculados_id;
            $materias_id = $request->materias_id;
            $parcial = $request->parcial;
            $quimestre = $request->quimestre;
            $descripcion = $request->descripcion;
            foreach($matriculados_id as $key => $value)
            {
                $nota_examen = new Notas_examen;
                $nota_examen->nota_exq = $notas_examen[$key];
                $nota_examen->descripcion = $descripcion;
                $nota_examen->materias_id = $materias_id[$key];
                $nota_examen->matriculado_id = $matriculados_id[$key];
                $nota_examen->quimestre = $quimestre[$key];
                $nota_examen->autoridad_id = auth()->user()->id;
                $nota_examen->numero_tarea_exq = '1';
                $nota_examen->save();
            }
            return redirect()->route('notas.index')->with('info', 'La nota se ha agregado correctamente');
            
        }
        else{
            return redirect()->route('notas.index')->with('error', 'Hubo un error asignando el tipo de nota. Por favor intente de nuevo');
        }
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
        return view('notas.vernotas', compact('notas', 'quimestre'))->with('info', 'Se ha cargado las notas correctamete');

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
        if($ttarea == 'examen')
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
        else if($ttarea == 'conducta')
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
    public function deleteAllNotesResumen($descripcion, $created_at)
    {
        $notas = Notas::where('descripcion', $descripcion)->where('created_at', $created_at)->delete();
        return redirect()->back()->with('info', 'Todas las notas se han eliminado con existo!');
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
            DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) + SUM(notas.numero_tarea_ev)) / 5),3)  as nota_final"))
            ->groupBy('materias_id', 'matriculados_id');

 }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre){
     $query2->where('parcial', $parcial)
     ->where('quimestre', $quimestre)
     ->groupBy('matriculados_id');

 }])->with(['conducta' => function($que1) use ($parcial, $quimestre){
            $que1->where('parcial', $parcial)
            ->where('quimestre', $quimestre)
            ->select('matriculados_id', 'materias_id',DB::raw('sum(notas.conducta) / sum(notas.numero_conducta) as nota_conducta'))
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
             DB::raw("ROUND(((SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev) / SUM(notas.numero_tarea_ev)) / 5),3)  as nota_final"))
             ->groupBy('materias_id', 'matriculados_id');

  }])->with(['recuperaciones' => function($query2) use($parcial, $quimestre){
      $query2->where('parcial', $parcial)
      ->where('quimestre', $quimestre)
      ->groupBy('matriculados_id');

    }])->with(['conducta' => function($que1) use ($parcial, $quimestre){
        $que1->where('parcial', $parcial)
        ->where('quimestre', $quimestre)
        ->select('matriculados_id', 'materias_id',DB::raw('sum(notas.conducta) / sum(notas.numero_conducta) as nota_conducta'))
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


}
