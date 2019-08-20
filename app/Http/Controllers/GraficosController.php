<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraficosController extends Controller
{

	public function generarGraficoNotas(Request $request, $curso, $paralelo, $parcial, $materia)
    {
	$curso = $request->curso;
        $paralelo = $request->paralelo; 
        $parcial = $request->parcial;
        $materia = $request->materia;


        $notas = DB::table('notas')
        ->join('matriculados', 'notas.matriculados_id', '=', 'matriculados.id')
        ->join('materias', 'notas.materias_id', '=', 'materias.id')
        ->select(DB::raw("CONCAT(matriculados.apellidos, ' ',matriculados.nombres) as nombres"), DB::raw("ROUND(SUM(notas.nota_ta) / SUM(notas.numero_tarea_ta), 3) as nota_ta"),DB::raw("ROUND(SUM(notas.nota_ti) / SUM(notas.numero_tarea_ti), 3) as nota_ti"),DB::raw("ROUND(SUM(notas.nota_tg) / SUM(notas.numero_tarea_tg), 3) as nota_tg"),DB::raw("ROUND(SUM(notas.nota_le) / SUM(notas.numero_tarea_le), 3) as nota_le"),DB::raw("ROUND(SUM(notas.nota_ev), 3) as nota_ev"))
        ->where('matriculados.curso', 'LIKE', '%'.$curso.'%')
        ->where('matriculados.paralelo', 'LIKE', '%'.$paralelo.'%')
        ->where('notas.parcial', 'LIKE', '%'.$parcial.'%')
        ->where('notas.materias_id', 'LIKE', '%'.$materia.'%')
        ->distinct()
        ->groupBy('matriculados.id')
        ->get();

        return response()->json($notas);

    }





    public function generarGrafico()
    {

    	$matriculado = DB::table('matriculados')
    	->select(DB::raw("COUNT(curso) as suma_curso"))
    	->where('curso', 'INICIAL 1')
    	->get()->toArray();

    	$matriculado = array_column($matriculado, 'suma_curso');


    	$matriculado2 = DB::table('matriculados')
    	->select(DB::raw("COUNT(curso) as suma_curso"))
    	->where('curso', 'INICIAL 2')
    	->get()->toArray();

    	$matriculado2 = array_column($matriculado2, 'suma_curso');
    



    	return view('graficos.graficos')->with('matriculado', json_encode($matriculado, JSON_NUMERIC_CHECK))->with('matriculado2', json_encode($matriculado2, JSON_NUMERIC_CHECK));
    }

    	public function generarMateriaGrafico(Request $request, $curso, $paralelo)
    	{

    		$curso = $request->curso; 
    		$paralelo = $request->paralelo;

    		$materias = DB::table('materias')
    		->select('materia', 'id')
    		->where('curso', 'LIKE', '%'.$curso.'%')
    		->where('paralelo', 'LIKE', '%'.$paralelo.'%')
    		->orderBy('id')
    		->get();

    		return response()->json($materias);



    	}

}
