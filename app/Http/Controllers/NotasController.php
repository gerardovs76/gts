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



class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
   public function index(Request $request)
    {   
      
   
         return view('notas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = Cursos::orderBy('id', 'ASC')->pluck('curso');
        return view('notas.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            foreach ($request->matriculados_id as $key => $value) {
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
                $nota->save();
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
        $notas = Notas::find($id);
        $notas->curso    = $request->curso;
        $notas->asignatura    = $request->asignatura;
        $notas->tareas    = $request->tareas;
        $notas->parcial_1    = $request->parcial_1;
        $notas->parcial_2   = $request->parcial_2;
        $notas->parcial_3   = $request->parcial_3;
        $notas->examen_quimestral    = $request->examen_quimestral;
        $notas->promedio    = $request->promedio;
        $notas->save();
        return redirect()->route('notas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notass  $notass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notas = Notas::find($id);
        $notas->delete();
        return back()->with('info', 'Las notas ha sido eliminada exitosamente');
    }
     public function buscarMateriaAlumno(Request $request,$cursos, $paralelo){
         if(Auth::user()->roles('super-admin'))
         {
              $cursos = $request->curso;
            $paralelo = $request->paralelo;
         $matriculado = DB::table('materias')
      ->select('materias.materia', 'materias.id')
      ->where('materias.curso',$cursos)
      ->where('materias.paralelo',$paralelo)
      ->get();
      
      return response()->json($matriculado);
             
         }
         elseif(Auth::user()->roles('profesor'))
         {
        $cursos = $request->cursos;
        $especialidad = $request->especialidad;
        $paralelo = $request->paralelo;
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
    public function buscarAlumnoNotas(Request $request, $cursos, $paralelo)
    {
        $cursos = $request->cursos;
        $paralelo = $request->paralelo;

        $matriculados = DB::table('matriculados')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"), 'matriculados.id as id')
        ->where('curso', 'LIKE', '%'.$cursos.'%')
        ->where('paralelo', 'LIKE', '%'.$paralelo.'%')
        ->distinct()
        ->get();


        return response()->json($matriculados);

    }
    public function verNotasCargadas()
    {
        return view('notas.vernotas');

    }

    public function cargarNotas(Request $request, $curso, $paralelo)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;

    $materias = DB::table('materias')
    ->select('id', 'materia')
    ->where('curso', 'LIKE', '%'.$curso.'%')
    ->where('paralelo', 'LIKE', '%'.$paralelo.'%')
    ->distinct()
    ->get();

    return response()->json($materias);

    }

     public function cargarNotasEspeciales(Request $request, $curso, $paralelo)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;

    $materias = DB::table('materias')
    ->select('id', 'materia')
    ->where('curso', 'LIKE', '%'.$curso.'%')
    ->where('paralelo', 'LIKE', '%'.$paralelo.'%')
    ->where('tipo_materia', 'SI')
    ->distinct()
    ->get();

    return response()->json($materias);

    }

    public function cargarNotasAlumnos(Request $request, $curso, $paralelo, $quimestre, $parcial, $materia)
    {

        $curso = $request->curso;
        $paralelo = $request->paralelo; 
        $parcial = $request->parcial;
        $materia = $request->materia;
        $quimestre = $request->quimestre;



        $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->join('materias', 'notas.materias_id', '=', 'materias.id')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"),DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),DB::raw("ROUND(SUM(notas.nota_ev), 3) as nota_ev"), DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5  as nota_final"))
        ->where('matriculados.curso', 'LIKE', '%'.$curso.'%')
        ->where('matriculados.paralelo', 'LIKE', '%'.$paralelo.'%')
        ->where('notas.quimestre', 'LIKE', '%'.$quimestre.'%')
        ->where('notas.parcial', 'LIKE', '%'.$parcial.'%')
        ->where('notas.materias_id', 'LIKE', '%'.$materia.'%')
        ->distinct()
        ->groupBy('matriculados.id')
        ->get();


        return response()->json($notas);

    }

    public function verNotasEspeciales()
    {
      return view('notas.vernotas-especiales');
    }
    public function cargarNotasEspecialesAlumnos(Request $request, $curso, $paralelo, $quimestre, $parcial, $materia)
    {

        $curso = $request->curso;
        $paralelo = $request->paralelo; 
        $parcial = $request->parcial;
        $materia = $request->materia;
        $quimestre = $request->quimestre;

        $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->join('materias', 'notas.materias_id', '=', 'materias.id')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"),DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),DB::raw("ROUND(SUM(notas.nota_ev), 3) as nota_ev"), DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5  as nota_final"))
        ->where('matriculados.curso', 'LIKE', '%'.$curso.'%')
        ->where('matriculados.paralelo', 'LIKE', '%'.$paralelo.'%')
        ->where('notas.quimestre', 'LIKE', '%'.$quimestre.'%')
        ->where('notas.parcial', 'LIKE', '%'.$parcial.'%')
        ->where('notas.materias_id', 'LIKE', '%'.$materia.'%')
        ->distinct()
        ->groupBy('matriculados.id')
        ->get();



        foreach($notas as $nota)
        {
        
          
          if(($nota->nota_ta > '9') && ($nota->nota_ta == '10') &&($nota->nota_ti > '9') && ($nota->nota_ti == '10') && ($nota->nota_tg > '9') && ($nota->nota_tg == '10') &&($nota->nota_le > '9') && ($nota->nota_le == '10') &&($nota->nota_ev > '9') && ($nota->nota_ev == '10')){

            $nota->nota_ta = 'A';
            $nota->nota_ti = 'A';
            $nota->nota_tg = 'A';
            $nota->nota_le = 'A';
            $nota->nota_ev = 'A';
           
           }
           
           elseif(($nota->nota_ta < '8.99') && ($nota->nota_ta == '7') &&($nota->nota_ti < '8.99') && ($nota->nota_ti == '7') &&($nota->nota_tg < '8.99') && ($nota->nota_tg == '7') &&($nota->nota_le < '8.99') && ($nota->nota_le == '7') &&($nota->nota_ev < '8.99') && ($nota->nota_ev == '7'))
           {
            $nota->nota_ta = 'B';
            $nota->nota_ti = 'B';
            $nota->nota_tg = 'B';
            $nota->nota_le = 'B';
            $nota->nota_ev = 'B';
           
           }
           elseif(($nota->nota_ta > '4.01') && ($nota->nota_ta == '6.99') && ($nota->nota_ti > '4.01') && ($nota->nota_ti == '6.99') && ($nota->nota_tg > '4.01') && ($nota->nota_tg == '6.99') && ($nota->nota_le > '4.01') && ($nota->nota_le == '6.99') && ($nota->nota_ev > '4.01') && ($nota->nota_ev == '6.99'))
           {
            $nota->nota_ta = 'C';
            $nota->nota_ti = 'C';
            $nota->nota_tg = 'C';
            $nota->nota_le = 'C';
            $nota->nota_ev = 'C';
            
           }
           elseif(($nota->nota_ta < '4.01') && ($nota->nota_ti < '4.01') && ($nota->nota_tg < '4.01') && ($nota->nota_le < '4.01') && ($nota->nota_ev < '4.01') && ($nota->nota_final < '4.01'))
           {
            $nota->nota_ta = 'D';
            $nota->nota_ti = 'D';
            $nota->nota_tg = 'D';
            $nota->nota_le = 'D';
            $nota->nota_ev = 'D';
           
           }
               
        }

         return response()->json($notas);

      }

    public function supletoriosNotas()
    {
        return view('notas.supletorios');
    }
    public function sumaSupletorio(Request $request, $curso, $paralelo, $quimestre, $parcial, $materia)
    {
      $curso = $request->curso;
      $paralelo = $request->paralelo; 
      $quimestre = $request->quimestre; 
      $parcial = $request->parcial;
      $materia = $request->materia;


       $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->join('materias', 'notas.materias_id', '=', 'materias.id')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"),
         DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5  as nota_final"), 'notas.id as nota_id', 'matriculados.id as matriculados_id')
        ->where('matriculados.curso', 'LIKE', '%'.$curso.'%')
        ->where('matriculados.paralelo', 'LIKE', '%'.$paralelo.'%')
        ->where('notas.quimestre', 'LIKE', '%'.$quimestre.'%')
        ->where('notas.parcial', 'LIKE', '%'.$parcial.'%')
        ->where('notas.materias_id', 'LIKE', '%'.$materia.'%')
        ->havingRaw('nota_final <= 7')
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
      ->distinct()
      ->groupBy('matriculados.id')
      ->get();

      return response()->json($gracia);

    }

    public function notaEspeciales()
    {
      return view('notas.notaEspecial');
    }

    public function buscarMateriaEspecial(Request $request, $curso, $especialidad, $paralelo)
    {
      $curso = $request->curso;
      $especialidad = $request->especialidad;
      $paralelo = $request->paralelo;
   

      $materias = DB::table('materias_especiales')
      ->select('materia', 'id')
      ->where('curso', 'LIKE', '%'.$curso.'%')
      ->where('especialidad', 'LIKE', '%'.$especialidad.'%')
      ->where('paralelo', 'LIKE', '%'.$paralelo)
      ->distinct()
      ->get();

      return response()->json($materias);

    }

    public function materiaEspecialStore(Request $request)
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

            foreach ($request->descripcion as $key => $value) {
                $nota = new NotasEspeciales;
                $nota->nota_ta = $nota_ta[$key];
                $nota->nota_ti = $nota_ti[$key];
                $nota->nota_tg = $nota_tg[$key];
                $nota->nota_le = $nota_le[$key];
                $nota->nota_ev = $nota_ev[$key];
                $nota->descripcion = $descripcion[$key];
                $nota->matriculados_id = $matriculados_id[$key];
                $nota->materias_id = $materias_id[$key];
                $nota->parcial = $parcial[$key];
                $nota->quimestre = $quimestre[$key];
                $nota->save();

              }


              return redirec()->route('notas.especiales')->wiht('info', 'La nota especial se ha agregado con exito');

    }

    public function notasPorcentaje()
    {
      return view('notas.notas-porcentaje');
    }
    public function asignarDatosProfesor()
    {
        if(Auth::user()->roles('super-admin')){
            
        }
        elseif(Auth::user()->roles('profesor'))
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

    public function libretaIndividual()
    {
      return view('notas.libretaIndividual');
    }

    public function descargarLibreta(Request $request)
    {
      $cedula = $request->get('cedula');
      $quimestre = $request->get('quimestre');
      $parcial = $request->get('parcial');

      $matriculados = Matriculacion::join('notas', 'matriculados.id', '=', 'notas.matriculados_id')->select('nombres', 'apellidos', 'curso', 'paralelo', 'quimestre', 'parcial')->where('cedula', $cedula)->groupBy('matriculados.id')->get();
     

      $libreta = DB::table('notas')
      ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
      ->join('materias', 'notas.materias_id', '=', 'materias.id')
      ->select('materias.materia',DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),DB::raw("ROUND(SUM(notas.nota_ev), 3) as nota_ev"), DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5  as nota_final"))
      ->where('matriculados.cedula', $cedula)
      ->where('notas.quimestre', $quimestre)
      ->where('notas.parcial', $parcial)
      ->distinct()
      ->groupBy('materias.id')
      ->get();
     
     $representante = DB::table('inscripciones')
     ->select('inscripciones.nombres_representante')
     ->where('inscripciones.cedula', $cedula)
     ->get();

       $pdf = PDF::loadView('pdf.libreta-individual', compact('libreta', 'matriculados', 'representante'));


       return $pdf->download('libreta-individual.pdf');

    }

    public function libretaColectiva()
    {
      return view('notas.libretaColectiva');
    }

    public function descargarLibretaColectiva(Request $request)
    {
      $curso = $request->get('curso');
      $quimestre = $request->get('quimestre');
      $parcial = $request->get('parcial');
      $user = Auth()->user()->cedula;

      $matriculados = Matriculacion::join('notas', 'matriculados.id', '=', 'notas.matriculados_id')->select('nombres', 'apellidos', 'curso', 'paralelo', 'quimestre', 'parcial')->where('cedula', $user)->groupBy('matriculados.id')->get();
     

      $libreta = DB::table('notas')
      ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
      ->join('materias', 'notas.materias_id', '=', 'materias.id')
      ->select('materias.materia',DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),DB::raw("ROUND(SUM(notas.nota_ev), 3) as nota_ev"), DB::raw("(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta) + SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti) + SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg) + SUM(notas.nota_le) / SUM(notas.numero_tarea_le) + SUM(notas.nota_ev)) / 5  as nota_final"))
      ->where('matriculados.curso', $curso)
      ->where('notas.quimestre', $quimestre)
      ->where('notas.parcial', $parcial)
      ->distinct()
      ->groupBy('materias.id')
      ->get();
     
     $representante = DB::table('inscripciones')
     ->select('inscripciones.nombres_representante')
     ->where('inscripciones.cedula', $user)
     ->get();

       $pdf = PDF::loadView('pdf.libreta-colectiva', compact('libreta', 'matriculados', 'representante'));


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

}
