<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notas;
use App\Nota_ta;
use App\Notas_ti;
use App\Notas_tg;
use App\Notas_le;
use App\Notas_ev;
use App\Notas_conducta;
use App\Notas_examen;
class SaveControllerApp extends Controller
{
   public function salvarNotasTa()
   {
       $salvarNotas = Notas::where('notas.nota_ta', '<>', 'null')
        ->select('notas.materias_id', 'notas.matriculados_id', 'notas.parcial', 'notas.quimestre', 'notas.numero_tarea_ta', 'notas.autoridad_id', 'notas.created_at', 'notas.updated_at', 'notas.nota_ta', 'notas.descripcion', 'notas.id')
        ->get();
        foreach($salvarNotas as $salvarNota)
        {
            $notas_ta = new Nota_ta;
            $notas_ta->id_antiguo = $salvarNota->id;
            $notas_ta->matriculado_id = $salvarNota->matriculados_id;
            $notas_ta->materias_id = $salvarNota->materias_id;
            $notas_ta->nota_ta = $salvarNota->nota_ta;
            $notas_ta->numero_tarea_ta = ($salvarNota->numero_tarea_ta == null ? '1' : $salvarNota->numero_tarea_ta);
            $notas_ta->descripcion = $salvarNota->descripcion;
            $notas_ta->parcial = $salvarNota->parcial;
            $notas_ta->quimestre = $salvarNota->quimestre;
            $notas_ta->autoridad_id = $salvarNota->autoridad_id;
            $notas_ta->created_at = $salvarNota->created_at;
            $notas_ta->updated_at = $salvarNota->updated_at;
            $notas_ta->save();
        }
       
        return "ok";
    }
    public function salvarNotasTi()
    {

        $salvarNotas = Notas::where('notas.nota_ti', '<>', 'null')
        ->select('notas.materias_id', 'notas.matriculados_id', 'notas.parcial', 'notas.quimestre', 'notas.numero_tarea_ti', 'notas.autoridad_id', 'notas.created_at', 'notas.updated_at', 'notas.nota_ti', 'notas.descripcion', 'notas.id')
        ->get();
        foreach($salvarNotas as $salvarNota)
        {
            $notas_ta = new Notas_ti;
            $notas_ta->id_antiguo = $salvarNota->id;
            $notas_ta->matriculado_id = $salvarNota->matriculados_id;
            $notas_ta->materias_id = $salvarNota->materias_id;
            $notas_ta->nota_ti = $salvarNota->nota_ti;
            $notas_ta->numero_tarea_ti = ($salvarNota->numero_tarea_ti == null ? '1' : $salvarNota->numero_tarea_ti);
            $notas_ta->descripcion = $salvarNota->descripcion;
            $notas_ta->parcial = $salvarNota->parcial;
            $notas_ta->quimestre = $salvarNota->quimestre;
            $notas_ta->autoridad_id = $salvarNota->autoridad_id;
            $notas_ta->created_at = $salvarNota->created_at;
            $notas_ta->updated_at = $salvarNota->updated_at;
            $notas_ta->save(); 
        }
       
        return "ok";

    }
    public function salvarNotasTg()
    {
        $salvarNotas = Notas::where('notas.nota_tg', '<>', 'null')
        ->select('notas.materias_id', 'notas.matriculados_id', 'notas.parcial', 'notas.quimestre', 'notas.numero_tarea_tg', 'notas.autoridad_id', 'notas.created_at', 'notas.updated_at', 'notas.nota_tg', 'notas.descripcion', 'notas.id')
        ->get();
        foreach($salvarNotas as $salvarNota)
        {
       
            $notas_ta = new Notas_tg;
            $notas_ta->id_antiguo = $salvarNota->id;
            $notas_ta->matriculado_id = $salvarNota->matriculados_id;
            $notas_ta->materias_id = $salvarNota->materias_id;
            $notas_ta->nota_tg = $salvarNota->nota_tg;
            $notas_ta->numero_tarea_tg = ($salvarNota->numero_tarea_tg == null ? '1' : $salvarNota->numero_tarea_tg);
            $notas_ta->descripcion = $salvarNota->descripcion;
            $notas_ta->parcial = $salvarNota->parcial;
            $notas_ta->quimestre = $salvarNota->quimestre;
            $notas_ta->autoridad_id = $salvarNota->autoridad_id;
            $notas_ta->created_at = $salvarNota->created_at;
            $notas_ta->updated_at = $salvarNota->updated_at;
            $notas_ta->save();

       
            
        }
       
        return "ok";
    }
    public function salvarNotasLe()
    {
        $salvarNotas = Notas::where('notas.nota_le', '<>', 'null')
        ->select('notas.materias_id', 'notas.matriculados_id', 'notas.parcial', 'notas.quimestre', 'notas.numero_tarea_le', 'notas.autoridad_id', 'notas.created_at', 'notas.updated_at', 'notas.nota_le', 'notas.descripcion', 'notas.id')
        ->get();
        foreach($salvarNotas as $salvarNota)
        {
       
            $notas_ta = new Notas_le;
            $notas_ta->id_antiguo = $salvarNota->id;
            $notas_ta->matriculado_id = $salvarNota->matriculados_id;
            $notas_ta->materias_id = $salvarNota->materias_id;
            $notas_ta->nota_le = $salvarNota->nota_le;
            $notas_ta->numero_tarea_le = ($salvarNota->numero_tarea_le == null ? '1' : $salvarNota->numero_tarea_le);
            $notas_ta->descripcion = $salvarNota->descripcion;
            $notas_ta->parcial = $salvarNota->parcial;
            $notas_ta->quimestre = $salvarNota->quimestre;
            $notas_ta->autoridad_id = $salvarNota->autoridad_id;
            $notas_ta->created_at = $salvarNota->created_at;
            $notas_ta->updated_at = $salvarNota->updated_at;
            $notas_ta->save();

       
            
        }
       
        return "ok";
    }
    public function salvarNotasEv()
    {
        $salvarNotas = Notas::where('notas.nota_ev', '<>', 'null')
        ->select('notas.materias_id', 'notas.matriculados_id', 'notas.parcial', 'notas.quimestre', 'notas.numero_tarea_ev', 'notas.autoridad_id', 'notas.created_at', 'notas.updated_at', 'notas.nota_ev', 'notas.descripcion', 'notas.id')
        ->get();
        foreach($salvarNotas as $salvarNota)
        {
       
            $notas_ta = new Notas_ev;
            $notas_ta->id_antiguo = $salvarNota->id;
            $notas_ta->matriculado_id = $salvarNota->matriculados_id;
            $notas_ta->materias_id = $salvarNota->materias_id;
            $notas_ta->nota_ev = $salvarNota->nota_ev;
            $notas_ta->numero_tarea_ev = ($salvarNota->numero_tarea_ev == null ? '1' : $salvarNota->numero_tarea_ev);
            $notas_ta->descripcion = $salvarNota->descripcion;
            $notas_ta->parcial = $salvarNota->parcial;
            $notas_ta->quimestre = $salvarNota->quimestre;
            $notas_ta->autoridad_id = $salvarNota->autoridad_id;
            $notas_ta->created_at = $salvarNota->created_at;
            $notas_ta->updated_at = $salvarNota->updated_at;
            $notas_ta->save();

       
            
        }
       
        return "ok";
    }
    public function salvarNotasConducta()
    {
        $salvarNotas = Notas::where('notas.conducta', '<>', 'null')
        ->select('notas.materias_id', 'notas.matriculados_id', 'notas.parcial', 'notas.quimestre', 'notas.numero_conducta', 'notas.autoridad_id', 'notas.created_at', 'notas.updated_at', 'notas.conducta', 'notas.descripcion', 'notas.id')
        ->get();
        foreach($salvarNotas as $salvarNota)
        {
       
            $notas_ta = new Notas_conducta;
            $notas_ta->id_antiguo = $salvarNota->id;
            $notas_ta->matriculado_id = $salvarNota->matriculados_id;
            $notas_ta->materias_id = $salvarNota->materias_id;
            $notas_ta->nota_conducta = $salvarNota->conducta;
            $notas_ta->numero_tarea_conducta = ($salvarNota->numero_conducta == null ? '1' : $salvarNota->numero_conducta);
            $notas_ta->descripcion = $salvarNota->descripcion;
            $notas_ta->parcial = $salvarNota->parcial;
            $notas_ta->quimestre = $salvarNota->quimestre;
            $notas_ta->autoridad_id = $salvarNota->autoridad_id;
            $notas_ta->created_at = $salvarNota->created_at;
            $notas_ta->updated_at = $salvarNota->updated_at;
            $notas_ta->save();

       
            
        }
       
        return "ok";
    }

    public function salvarNotasExamen()
    {
        $salvarNotas = Notas::where('notas.examen', '<>', 'null')
        ->select('notas.materias_id', 'notas.matriculados_id', 'notas.quimestre', 'notas.autoridad_id', 'notas.created_at', 'notas.updated_at', 'notas.examen', 'notas.descripcion', 'notas.id')
        ->get();
        foreach($salvarNotas as $salvarNota)
        {
       
            $notas_ta = new Notas_examen;
            $notas_ta->id_antiguo = $salvarNota->id;
            $notas_ta->matriculado_id = $salvarNota->matriculados_id;
            $notas_ta->materias_id = $salvarNota->materias_id;
            $notas_ta->nota_exq = $salvarNota->examen;
            $notas_ta->numero_tarea_exq = '1';
            $notas_ta->descripcion = $salvarNota->descripcion;
            $notas_ta->quimestre = $salvarNota->quimestre;
            $notas_ta->autoridad_id = $salvarNota->autoridad_id;
            $notas_ta->created_at = $salvarNota->created_at;
            $notas_ta->updated_at = $salvarNota->updated_at;
            $notas_ta->save();

       
            
        }
       
        return "ok";
    }
}
