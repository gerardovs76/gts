<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecciones;
use App\Matriculacion;
use DB;

class LeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
   public function index()
    {
       $lecciones = Matriculacion::orderBy('leccion', 'DESC');
       return view('lecciones.index', compact('lecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $matriculados = Matriculacion::with('lecciones')->orderBy('id', 'ASC')->pluck('nombres');
        return view('lecciones.create', compact('matriculados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materias_id = $request->materias_id;
        $parcial = $request->parcial;
        $matriculados_id = $request->matriculados_id;
        $leccion = $request->leccion;
        $descripcion = $request->descripcion;

        foreach ($request->materias_id as $key => $value) {
            $le = new Lecciones;
            $le->materias_id = $materias_id[$key];
            $le->parcial = $parcial[$key];
            $le->matriculados_id = $matriculados_id[$key];
            $le->leccion = $leccion[$key];
            $le->descripcion = $descripcion;
            $le->numero_tarea = "1";
            $le->save();
        }
        return redirect()->route('parcial1.index')->with('info', 'La nota se ha agregado correctamente');

    }      
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function show($id)
    {   $lecciones = Lecciones::find($id);
        return view('Lecciones.show', compact('lecciones'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecciones = TareasGrupales::find($id);
        return view('tareasGrupales.edit', compact('lecciones'));
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
        $lecciones = Lecciones::find($id);
        $lecciones->leccion = $request->leccion;
        $lecciones->descripcion = $request->descripcion;
        $lecciones->save();
        return redirect()->route('parcial1.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $lecciones = Lecciones::find($id);
    $lecciones->delete();
    return back()->with('info', 'Se ha eliminado el trabajo academico correspondiente');
    }

    public function asignarNota(){

    $matriculado = DB::table('matriculados')
        ->join('cursos', 'matriculados.curso', '=', 'cursos.curso')
        ->select(DB::raw("CONCAT(matriculados.apellidos, '' , matriculados.nombres) as nombres"), 'matriculados.id')
        ->where('cursos.curso', 'INICIAL 1')
        ->get();
    if(!empty($matriculado)){

        $leccion = new Lecciones;
        $leccion->leccion = $request->leccion;
        $leccion->descripcion = $request->descripcion;
        $leccion->save();

        return view('parcial1')->with('matriculado', $matriculado)->with('leccion', $leccion);
    }
    }
    public function verNotas(){
    /*$ta = DB::table('matriculados')->select(DB::raw("CONCAT(apellidos, ' ', nombres) as nombres"), 'cedula', 'curso')->where('curso', 'INICIAL 1')->get();*/
    }

    public function descripcionNota(){

        $matriculados = DB::table('matriculados')->join('cursos', 'matriculados.curso', '=', 'cursos.curso')->select(DB::raw("CONCAT(matriculados.apellidos, ' ', matriculados.nombres) as nombres"), 'matriculados.id as id')->where('cursos.curso', 'INICIAL 1')->get();
        return response()->json($matriculados);
    }
    public function NotaFinalLecciones(){

    $matriculados = DB::table('matriculados')->join('lecciones', 'matriculados.id', '=', 'lecciones.matriculados_id')->
    select(DB::raw("CONCAT(matriculados.nombres, ' ', matriculados.apellidos) as nombres"), DB::raw("SUM(lecciones.leccion) / SUM(lecciones.numero_tarea) as nota_final"), 'matriculados.id')->where('matriculados.curso', 'INICIAL 1')->groupBy('matriculados.id')->get();

    return view('parcial1.index', compact('matriculados'));

    }
}
