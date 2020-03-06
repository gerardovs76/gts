<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Carbon;
use DB;
use App\Matriculacion;
use App\Materias;

class PrimerQuimestre implements  FromView, WithEvents, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function __construct($curso, $paralelo)
    {
        $this->curso = $curso;
        $this->paralelo = $paralelo;

    }
     public function view(): View 
    {
        if($this->curso == 'INICIAL 1' || $this->curso == 'INICIAL 2' || $this->curso == 'PRIMERO DE EGB' || $this->curso == 'SEGUNDO DE EGB' || $this->curso == 'TERCERO DE EGB' || $this->curso == 'CUARTO DE EGB' || $this->curso == 'QUINTO DE EGB' || $this->curso == 'SEXTO DE EGB' || $this->curso == 'SEPTIMO DE EGB')
        {
            return view('notas.excel.reporte-primerQuimestre',[
                'materias' => Materias::join('matriculados as m1', 'materias.curso', '=', 'm1.curso')->join('matriculados as m2', 'materias.paralelo', '=', 'm2.paralelo')->where('m1.curso', $this->curso)->where('m2.paralelo', $this->paralelo)->select('materias.materia','materias.id', 'materias.tipo_materia')->distinct()->get(),
                'curso' => $this->curso,
                'paralelo' => $this->paralelo,
                'fecha_hoy' => Carbon::now()->format('Y'),
                'notas' => Matriculacion::with(['notas_ta1' => function($query){
                $query
                ->where('quimestre', '1')
                ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
                ->groupBy('matriculado_id', 'materias_id');
                 }])->with(['notas_ta2' => function($query2){
                    $query2
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
                    ->groupBy('matriculado_id', 'materias_id');
                     }])->with(['notas_ta3' => function($query3){
                        $query3
                        ->where('quimestre', '1')
                        ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
                        ->groupBy('matriculado_id', 'materias_id');
                         }])->with(['notas_ti1' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ti2' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ti3' => function($query6){
                    $query6
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_tg1' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_tg2' => function($query3){
                    $query3
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_tg3' => function($query3){
                    $query3
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_le1' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_le2' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_le3' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ev1' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ev2' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ev3' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_examen' => function($query6){
                    $query6
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', DB::raw("nota_exq / numero_tarea_exq as nota_final_examen"))
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_conducta1' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculados_id','faltas_j', 'faltas_i', 'conductas')
                   ->groupBy('matriculados_id');
                }])->with(['notas_conducta2' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculados_id','faltas_j', 'faltas_i', 'conductas')
                   ->groupBy('matriculados_id');
                }])->with(['notas_conducta3' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculados_id','faltas_j', 'faltas_i', 'conductas')
                   ->groupBy('matriculados_id');
                }])->with(['inscripcion' => function($query8){
                    $query8->select('cedula', 'nombres_representante');
                }])->where('curso', $this->curso)->where('paralelo',$this->paralelo)->groupBy('id')->orderBy('apellidos')->get()
             ]);
        }
        else{
            return view('notas.excel.reporte-primerQuimestre',[
                'materias' => Materias::join('matriculados as m1', 'materias.curso', '=', 'm1.curso')->join('matriculados as m2', 'materias.paralelo', '=', 'm2.paralelo')->where('m1.curso', $this->curso)->where('m2.paralelo', $this->paralelo)->select('materias.materia','materias.id', 'materias.tipo_materia')->distinct()->get(),
                'curso' => $this->curso,
                'paralelo' => $this->paralelo,
                'fecha_hoy' => Carbon::now()->format('Y'),
                'notas' => Matriculacion::with(['notas_ta1' => function($query){
                $query
                ->where('quimestre', '1')
                ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
                ->groupBy('matriculado_id', 'materias_id');
                 }])->with(['notas_ta2' => function($query2){
                    $query2
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
                    ->groupBy('matriculado_id', 'materias_id');
                     }])->with(['notas_ta3' => function($query3){
                        $query3
                        ->where('quimestre', '1')
                        ->select('matriculado_id', 'materias_id', 'nota_ta1', 'nota_ta2', 'nota_ta3', 'nota_ta4', 'nota_ta5')
                        ->groupBy('matriculado_id', 'materias_id');
                         }])->with(['notas_ti1' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ti2' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ti3' => function($query6){
                    $query6
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id','nota_ti1', 'nota_ti2', 'nota_ti3', 'nota_ti4', 'nota_ti5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_tg1' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_tg2' => function($query3){
                    $query3
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_tg3' => function($query3){
                    $query3
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_tg1', 'nota_tg2', 'nota_tg3', 'nota_tg4', 'nota_tg5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_le1' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_le2' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_le3' => function($query4){
                    $query4
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_le1', 'nota_le2', 'nota_le3', 'nota_le4', 'nota_le5')
                    ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ev1' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ev2' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_ev3' => function($query5){
                    $query5
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', 'nota_ev1', 'nota_ev2', 'nota_ev3', 'nota_ev4', 'nota_ev5')
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_examen' => function($query6){
                    $query6
                    ->where('quimestre', '1')
                    ->select('matriculado_id', 'materias_id', DB::raw("nota_exq / numero_tarea_exq as nota_final_examen"))
                   ->groupBy('matriculado_id', 'materias_id');
                }])->with(['notas_conducta1' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculados_id','faltas_j', 'faltas_i', 'conductas')
                   ->groupBy('matriculados_id');
                }])->with(['notas_conducta2' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculados_id','faltas_j', 'faltas_i', 'conductas')
                   ->groupBy('matriculados_id');
                }])->with(['notas_conducta3' => function($query7){
                    $query7
                    ->where('quimestre', '1')
                    ->select('matriculados_id','faltas_j', 'faltas_i', 'conductas')
                   ->groupBy('matriculados_id');
                }])->with(['inscripcion' => function($query8){
                    $query8->select('cedula', 'nombres_representante');
                }])->where('curso', $this->curso)->where('paralelo',$this->paralelo)->groupBy('id')->orderBy('apellidos')->get(),
                'inspe' => Matriculacion::withCount(['inspecciones as h1_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h1', '01');
        
                }])->withCount(['inspecciones as h2_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h2', '01');
        
                }])
                ->withCount(['inspecciones as h3_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h3', '01');
        
                }])
                ->withCount(['inspecciones as h4_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h4', '01');
        
                }])
                ->withCount(['inspecciones as h5_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h5', '01');
        
                }])
                ->withCount(['inspecciones as h6_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h6', '01');
        
                }])
                ->withCount(['inspecciones as h7_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h7', '01');
        
                }])
                ->withCount(['inspecciones as h8_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h8', '01');
        
                }])
                ->withCount(['inspecciones as h9_count_01' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h9', '01');
        
                }])
                ->withCount(['inspecciones as h1_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h1', '02');
        
                }])
                ->withCount(['inspecciones as h2_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h2', '02');
        
                }])
                ->withCount(['inspecciones as h3_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h3', '02');
        
                }])
                ->withCount(['inspecciones as h4_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h4', '02');
        
                }])
                ->withCount(['inspecciones as h5_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h5', '02');
        
                }])
                ->withCount(['inspecciones as h6_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h6', '02');
        
                }])
                ->withCount(['inspecciones as h7_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h7', '02');
        
                }])
                ->withCount(['inspecciones as h8_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h8', '02');
        
                }])
                ->withCount(['inspecciones as h9_count_02' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h9', '02');
        
                }])
                ->withCount(['inspecciones as h1_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h1', '03');
        
                }])
                ->withCount(['inspecciones as h2_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h2', '03');
        
                }])
                ->withCount(['inspecciones as h3_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h3', '03');
        
                }])
                ->withCount(['inspecciones as h4_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h4', '03');
        
                }])
                ->withCount(['inspecciones as h5_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h5', '03');
        
                }])
                ->withCount(['inspecciones as h6_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h6', '03');
        
                }])
                ->withCount(['inspecciones as h7_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h7', '03');
        
                }])
                ->withCount(['inspecciones as h8_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h8', '03');
        
                }])
                ->withCount(['inspecciones as h9_count_03' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h9', '03');
        
                }])
                ->withCount(['inspecciones as h1_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h1', '04');
        
                }])
                ->withCount(['inspecciones as h2_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h2', '04');
        
                }])
                ->withCount(['inspecciones as h3_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h3', '04');
        
                }])
                ->withCount(['inspecciones as h4_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h4', '04');
        
                }])
                ->withCount(['inspecciones as h5_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h5', '04');
        
                }])
                ->withCount(['inspecciones as h6_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h6', '04');
        
                }])
                ->withCount(['inspecciones as h7_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h7', '04');
        
                }])
                ->withCount(['inspecciones as h8_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h8', '04');
        
                }])
                ->withCount(['inspecciones as h9_count_04' => function($query){
                    $query
                    ->where('parcial', '1')
                    ->where('quimestre', '1')
                    ->where('h9', '04');
        
                }])
                ->where('curso', $this->curso)->where('paralelo',$this->paralelo)->groupBy('id')->orderBy('apellidos')->get(),
                'curso' => $this->curso,


                'inspe2' => Matriculacion::withCount(['inspecciones as h1_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h1', '01');
        
                }])->withCount(['inspecciones as h2_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h2', '01');
        
                }])
                ->withCount(['inspecciones as h3_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h3', '01');
        
                }])
                ->withCount(['inspecciones as h4_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h4', '01');
        
                }])
                ->withCount(['inspecciones as h5_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h5', '01');
        
                }])
                ->withCount(['inspecciones as h6_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h6', '01');
        
                }])
                ->withCount(['inspecciones as h7_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h7', '01');
        
                }])
                ->withCount(['inspecciones as h8_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h8', '01');
        
                }])
                ->withCount(['inspecciones as h9_count_01' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h9', '01');
        
                }])
                ->withCount(['inspecciones as h1_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h1', '02');
        
                }])
                ->withCount(['inspecciones as h2_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h2', '02');
        
                }])
                ->withCount(['inspecciones as h3_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h3', '02');
        
                }])
                ->withCount(['inspecciones as h4_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h4', '02');
        
                }])
                ->withCount(['inspecciones as h5_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h5', '02');
        
                }])
                ->withCount(['inspecciones as h6_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h6', '02');
        
                }])
                ->withCount(['inspecciones as h7_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h7', '02');
        
                }])
                ->withCount(['inspecciones as h8_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h8', '02');
        
                }])
                ->withCount(['inspecciones as h9_count_02' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h9', '02');
        
                }])
                ->withCount(['inspecciones as h1_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h1', '03');
        
                }])
                ->withCount(['inspecciones as h2_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h2', '03');
        
                }])
                ->withCount(['inspecciones as h3_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h3', '03');
        
                }])
                ->withCount(['inspecciones as h4_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h4', '03');
        
                }])
                ->withCount(['inspecciones as h5_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h5', '03');
        
                }])
                ->withCount(['inspecciones as h6_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h6', '03');
        
                }])
                ->withCount(['inspecciones as h7_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h7', '03');
        
                }])
                ->withCount(['inspecciones as h8_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h8', '03');
        
                }])
                ->withCount(['inspecciones as h9_count_03' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h9', '03');
        
                }])
                ->withCount(['inspecciones as h1_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h1', '04');
        
                }])
                ->withCount(['inspecciones as h2_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h2', '04');
        
                }])
                ->withCount(['inspecciones as h3_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h3', '04');
        
                }])
                ->withCount(['inspecciones as h4_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h4', '04');
        
                }])
                ->withCount(['inspecciones as h5_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h5', '04');
        
                }])
                ->withCount(['inspecciones as h6_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre','1')
                    ->where('h6', '04');
        
                }])
                ->withCount(['inspecciones as h7_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h7', '04');
        
                }])
                ->withCount(['inspecciones as h8_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h8', '04');
        
                }])
                ->withCount(['inspecciones as h9_count_04' => function($query){
                    $query
                    ->where('parcial', '2')
                    ->where('quimestre', '1')
                    ->where('h9', '04');
        
                }])
                ->where('curso', $this->curso)->where('paralelo',$this->paralelo)->groupBy('id')->orderBy('apellidos')->get(),
                'curso' => $this->curso,


                'inspe3' => Matriculacion::withCount(['inspecciones as h1_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h1', '01');
        
                }])->withCount(['inspecciones as h2_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h2', '01');
        
                }])
                ->withCount(['inspecciones as h3_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h3', '01');
        
                }])
                ->withCount(['inspecciones as h4_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h4', '01');
        
                }])
                ->withCount(['inspecciones as h5_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h5', '01');
        
                }])
                ->withCount(['inspecciones as h6_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h6', '01');
        
                }])
                ->withCount(['inspecciones as h7_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h7', '01');
        
                }])
                ->withCount(['inspecciones as h8_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h8', '01');
        
                }])
                ->withCount(['inspecciones as h9_count_01' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h9', '01');
        
                }])
                ->withCount(['inspecciones as h1_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h1', '02');
        
                }])
                ->withCount(['inspecciones as h2_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h2', '02');
        
                }])
                ->withCount(['inspecciones as h3_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h3', '02');
        
                }])
                ->withCount(['inspecciones as h4_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h4', '02');
        
                }])
                ->withCount(['inspecciones as h5_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h5', '02');
        
                }])
                ->withCount(['inspecciones as h6_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h6', '02');
        
                }])
                ->withCount(['inspecciones as h7_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h7', '02');
        
                }])
                ->withCount(['inspecciones as h8_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h8', '02');
        
                }])
                ->withCount(['inspecciones as h9_count_02' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h9', '02');
        
                }])
                ->withCount(['inspecciones as h1_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h1', '03');
        
                }])
                ->withCount(['inspecciones as h2_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h2', '03');
        
                }])
                ->withCount(['inspecciones as h3_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h3', '03');
        
                }])
                ->withCount(['inspecciones as h4_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h4', '03');
        
                }])
                ->withCount(['inspecciones as h5_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h5', '03');
        
                }])
                ->withCount(['inspecciones as h6_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h6', '03');
        
                }])
                ->withCount(['inspecciones as h7_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h7', '03');
        
                }])
                ->withCount(['inspecciones as h8_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h8', '03');
        
                }])
                ->withCount(['inspecciones as h9_count_03' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h9', '03');
        
                }])
                ->withCount(['inspecciones as h1_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h1', '04');
        
                }])
                ->withCount(['inspecciones as h2_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h2', '04');
        
                }])
                ->withCount(['inspecciones as h3_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h3', '04');
        
                }])
                ->withCount(['inspecciones as h4_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h4', '04');
        
                }])
                ->withCount(['inspecciones as h5_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h5', '04');
        
                }])
                ->withCount(['inspecciones as h6_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h6', '04');
        
                }])
                ->withCount(['inspecciones as h7_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h7', '04');
        
                }])
                ->withCount(['inspecciones as h8_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h8', '04');
        
                }])
                ->withCount(['inspecciones as h9_count_04' => function($query){
                    $query
                    ->where('parcial', '3')
                    ->where('quimestre', '1')
                    ->where('h9', '04');
        
                }])
                ->where('curso', $this->curso)->where('paralelo',$this->paralelo)->groupBy('id')->orderBy('apellidos')->get(),
                'curso' => $this->curso
             ]);
        }
        
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/logo-ministerio.png'));
        $drawing->setHeight(50);
        $drawing->setWidth(100);
        $drawing->setCoordinates('A1');
        return $drawing;
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $materias = Materias::join('matriculados as m1', 'materias.curso', '=', 'm1.curso')->join('matriculados as m2', 'materias.paralelo', '=', 'm2.paralelo')->where('m1.curso', $this->curso)->where('m2.paralelo', $this->paralelo)->select('materias.materia','materias.id', 'materias.tipo_materia')->distinct()->get();
            $matriculados = Matriculacion::where('curso', $this->curso)->where('paralelo', $this->paralelo)->get();
            $indicesMaterias = ['C','D', 'E', 'F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            $countMaterias = count($materias);
            $countMaterias = ($countMaterias - 1) + 3;
            $countMatriculados = count($matriculados);
            $countMatriculados = $countMatriculados + 9;
            foreach($materias as $key => $value)
            {
                $event->sheet->getColumnDimension(''.$indicesMaterias[$key].'')->setWidth(5)->setAutoSize(false);
            }
                $event->sheet->styleCells(
                    'A10:'.$indicesMaterias[$countMaterias].''.$countMatriculados.':',
                    [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => 'EB2B02'],
                            ],
    
                        ],
                        'font' => array(
                            'name'      =>  'Cambria',
                            'size'      =>  6,
                            'bold'      =>  true,
                            'color' => ['argb' => 'EB2B02'],
                        )
                    ]
                );
             $event->sheet->styleCells(
                'A6:'.$indicesMaterias[$countMaterias].''.$countMatriculados.':',
                [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  6,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
             /* $event->sheet->styleCells(
                'A6:'.$indicesMaterias[$countMaterias].'6:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
                        'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            );  */ 
            $event->sheet->styleCells(
                'A9:'.$indicesMaterias[$countMaterias].'9:',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
                        'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
              $event->sheet->styleCells(
                'A10:'.$indicesMaterias[$countMaterias].''.$countMatriculados.':',
                [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->styleCells(
                'E1',
                [
                    /* 'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
 */
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  16,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->styleCells(
                'D2',
                [
                    /* 'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
 */
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  14,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->styleCells(
                'E3',
                [
                    /* 'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
 */
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  14,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->styleCells(
                'F4',
                [
                    /* 'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
 */
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  12,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->styleCells(
                'E5',
                [
                    /* 'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
 */
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  10,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->styleCells(
                'A6:C6',
                [
                    /* 'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
 */
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->styleCells(
                'A7',
                [
                    /* 'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'EB2B02'],
                        ],
 */
                    'font' => array(
                        'name'      =>  'Cambria',
                        'size'      =>  8,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    )
                ]
            ); 
            $event->sheet->setCellValue('E1', 'COORDINACIÓN ZONAL 9');
            $event->sheet->setCellValue('D2', 'DISTRITO EDUCATIVO 17D07 - QUITUMBE');
            $event->sheet->setCellValue('E3', 'UNIDAD EDUCATIVA PAUL DIRAC');
            $event->sheet->setCellValue('F4', 'AÑO LECTIVO 2019-2020');
            $event->sheet->setCellValue('E5', 'CUADRO DEL PRIMER QUIMESTRE');
             /*   $event->sheet->setCellValue('B'.($countMatriculados + 4).'', 'RECTOR');
             $event->sheet->setCellValue('G'.($countMatriculados + 3).'', 'MONSERRATH RAMIREZ');
             $event->sheet->setCellValue('G'.($countMatriculados + 4).'', 'SECRETARIA'); */
             //$event->sheet->getStyle("A8")->getAlignment()->setTextRotation(90);
             /* $event->sheet->getStyle('C8')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('D8')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('E8')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('F8')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('G8')->getAlignment()->setTextRotation(90);
             $event->sheet->getStyle('H8')->getAlignment()->setTextRotation(90); */
             $event->sheet->getColumnDimension('B')->setWidth(35)->setAutoSize(false);
             $event->sheet->getColumnDimension('C')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('D')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('E')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('F')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('H')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('I')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('J')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('G')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('K')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('L')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('M')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('N')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('O')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('Q')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('P')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('Q')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('R')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('S')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('T')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('U')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('V')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('W')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('X')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('Y')->setWidth(5)->setAutoSize(false);
             $event->sheet->getColumnDimension('Z')->setWidth(5)->setAutoSize(false);

             $event->sheet->styleCells(
                'B'.($countMatriculados + 3).':B'.($countMatriculados + 4).'',
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]
            );
              $event->sheet->styleCells(
                'G'.($countMatriculados + 3).':G'.($countMatriculados + 4).'',
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]
            );
             
             },
    ];
}
}
