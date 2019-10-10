<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materias;
use DB;
use App\Cursos;
use Barryvdh\DomPDF\Facade as PDF;
use App\MateriaEspeciales;
use App\MateriasProfesor;
use App\Http\Requests\MateriasRequest;
use App\Imports\MateriasImport;
use Maatwebsite\Excel\Facades\Excel;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $materias = Materias::all();
        return view('materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriasRequest $request)
    {

        $materias = new Materias;
        $materias->materia = $request->materia;
        $materias->curso = $request->curso;
        $materias->especialidad = $request->especialidad;
        $materias->paralelo = $request->paralelo;
        $materias->tipo_materia = $request->tipo_materia;
        $materias->save();

        return redirect()->route('materias.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materias = Materias::find($id);
        return view('materias.show', compact('materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materias = Materias::find($id);
        return view('materias.edit', compact('materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(MateriasRequest $request, $id)
    {
        $materias = Materias::find($id);
        $materias->materia  = $request->materia;
        $materias->curso  = $request->curso;
        $materias->especialidad = $request->especialidad;
        $materias->paralelo = $request->paralelo;
        $materias->tipo_materia = $request->tipo_materia;
        $materias->save();

        return redirect()->route('materias.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materias = Materias::find($id);
        $materias->delete();
        return back()->with('info', 'La materia ha sido eliminado exitosamente');
    }
    public function materiasPDF()
    {
        $materias = Materias::select('materia', 'curso', 'paralelo')->get();

        $pdf = PDF::loadView('pdf.materiasPorCurso', compact('materias'));

        return $pdf->download('malla_curricular.pdf');
    }

    public function materiaEspecial()
    {
        return view('materias.materias_especiales');

    }
    public function materiaEspecialStore(Request $request)
    {
        $materias = new MateriaEspeciales;
        $materias->curso = $request->curso;
        $materias->paralelo = $request->paralelo;
        $materias->especialidad = $request->especialidad;
        $materias->materia = $request->materia;
        $materias->save();

        return redirect()->route('materias.especiales')->with('info', 'Se ha agregado la materia especial correctamente');

    }

    public function buscarMateriasAñadir(Request $request, $curso, $paralelo)
    {
        $curso = $request->curso;
        $paralelo = $request->paralelo;
        $materias = DB::table('materias')
        ->select('materia', 'id')
        ->where('curso', 'LIKE', '%'.$curso.'%')
        ->where('paralelo', 'LIKE', '%'.$paralelo.'%')
        ->distinct()
        ->groupBy('id')
        ->get();

        return response()->json($materias);



    }

    public function añadirMateriaStore(Request $request)

    {

            $materias = new MateriasProfesor;
            $materias->profesores_id = $request->profesores_id;
            $materias->materias_id = $request->materias_id;
            $materias->save();


            return redirect()->route('profesor.añadirMaterias')->with('info', 'Se ha añadido la materia correctamente');
    }
    public function importMaterias()
    {
        return view('materias.import-materias');
    }

    public function importMateriaStore(Request $request)
    {

        Excel::import(new MateriasImport, $request->import_file);

        return back()->with('info', 'Se ha cargado la informacion correctamente');

    }
    public function deleteMateriasAsignadasProfesor($id)
    {
        $materiasProfesor = MateriasProfesor::find($id);
        $materiasProfesor->delete();
        return back()->with('info', 'Materia eliminada a el profesor correctamente');
    }



}
