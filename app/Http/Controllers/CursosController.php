<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;
use DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $cursos = Cursos::orderBy('id', 'DESC')->paginate();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cursos = new Cursos;
        $cursos->cedula  = $request->cedula;
        $cursos->nombres = $request->nombres;
        $cursos->apellidos = $request->apellidos;
        $cursos->curso  = $request->curso;
        $cursos->especialidad  = $request->especialidad;
        $cursos->paralelo = $request->paralelo;
        $cursos->save();
        
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursos = Cursos::find($id);
        return view('cursos.show', compact('cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursos = Cursos::find($id);
        return view('cursos.edit', compact('cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cursos = Cursos::find($id);


        $cursos->cedula  = $request->cedula;
        $cursos->nombres = $request->nombres;
        $cursos->apellidos = $request->apellidos;
        $cursos->curso  = $request->curso;
        $cursos->especialidad  = $request->especialidad;
        $cursos->paralelo = $request->paralelo;
        $cursos->save();

        return redirect()->route('cursos.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursos = Cursos::find($id);
        $cursos->delete();
        return back()->with('info', 'El curso ha sido eliminado exitosamente');
    }
    public function autocomplete(Request $request){
        $term = $request->input('term');
        
        $results = array();
        
        $queries = DB::table('alumnos')
            ->where('nombres', 'LIKE', '%'.$term.'%')
            ->orWhere('apellidos', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
    
    foreach ($queries as $query)
    {
        $results[] = [ 'cedula' => $query->cedula, 'value' => $query->nombres.' '.$query->apellidos ];
    }
   
    return Response()->json($results);

        }

    }
   

