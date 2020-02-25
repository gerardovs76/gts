<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eventos;
use Calendar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Frases;
use App\Noticias;
use App\Inspecciones;
use App\Matriculacion;
use App\MatriculadosCarnet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home', compact('usuarios'));
    }

    public function cronograma()
    {

        $events = Eventos::get();

        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        $usuarios = Auth::user()->name;

        $fecha = Carbon::now();

        $fecha = $fecha->toTimeString();

        $roles = auth()->user()->roles;
        $foto_perfil = "";
        foreach($roles as $rol)
        {
            if($rol->name == "Alumno")
            {
                $cedula = auth()->user()->cedula;
                $matriculadosFoto = Matriculacion::where('cedula', $cedula)->get();
                foreach($matriculadosFoto as $foto)
                {
                    $foto_perfil = MatriculadosCarnet::where('matriculado_id', $foto->id)->get();
                    foreach($foto_perfil as $perfil)
                    {
                        $foto_perfil = $perfil->imagen;
                    }
                }
            }
        }
        $eventos = Eventos::all();
        $frases = Frases::all();
        $noticias = Noticias::all();
        $inspe = Matriculacion::withCount(['inspecciones as h1_count_01' => function($query){
            $query
            ->where('h1', '01');

        }])->withCount(['inspecciones as h2_count_01' => function($query){
            $query
            ->where('h2', '01');

        }])
        ->withCount(['inspecciones as h3_count_01' => function($query){
            $query
            ->where('h3', '01');

        }])
        ->withCount(['inspecciones as h4_count_01' => function($query){
            $query
            ->where('h4', '01');

        }])
        ->withCount(['inspecciones as h5_count_01' => function($query){
            $query
            ->where('h5', '01');

        }])
        ->withCount(['inspecciones as h6_count_01' => function($query){
            $query
            ->where('h6', '01');

        }])
        ->withCount(['inspecciones as h7_count_01' => function($query){
            $query
            ->where('h7', '01');

        }])
        ->withCount(['inspecciones as h8_count_01' => function($query){
            $query
            ->where('h8', '01');

        }])
        ->withCount(['inspecciones as h1_count_02' => function($query){
            $query
            ->where('h1', '02');

        }])
        ->withCount(['inspecciones as h2_count_02' => function($query){
            $query
            ->where('h2', '02');

        }])
        ->withCount(['inspecciones as h3_count_02' => function($query){
            $query
            ->where('h3', '02');

        }])
        ->withCount(['inspecciones as h4_count_02' => function($query){
            $query
            ->where('h4', '02');

        }])
        ->withCount(['inspecciones as h5_count_02' => function($query){
            $query
            ->where('h5', '02');

        }])
        ->withCount(['inspecciones as h6_count_02' => function($query){
            $query
            ->where('h6', '02');

        }])
        ->withCount(['inspecciones as h7_count_02' => function($query){
            $query
            ->where('h7', '02');

        }])
        ->withCount(['inspecciones as h8_count_02' => function($query){
            $query
            ->where('h8', '02');

        }])
        ->withCount(['inspecciones as h1_count_03' => function($query){
            $query
            ->where('h1', '03');

        }])
        ->withCount(['inspecciones as h2_count_03' => function($query){
            $query
            ->where('h2', '03');

        }])
        ->withCount(['inspecciones as h3_count_03' => function($query){
            $query
            ->where('h3', '03');

        }])
        ->withCount(['inspecciones as h4_count_03' => function($query){
            $query
            ->where('h4', '03');

        }])
        ->withCount(['inspecciones as h5_count_03' => function($query){
            $query
            ->where('h5', '03');

        }])
        ->withCount(['inspecciones as h6_count_03' => function($query){
            $query
            ->where('h6', '03');

        }])
        ->withCount(['inspecciones as h7_count_03' => function($query){
            $query
            ->where('h7', '03');

        }])
        ->withCount(['inspecciones as h8_count_03' => function($query){
            $query
            ->where('h8', '03');

        }])
        ->withCount(['inspecciones as h1_count_04' => function($query){
            $query
            ->where('h1', '04');

        }])
        ->withCount(['inspecciones as h2_count_04' => function($query){
            $query
            ->where('h2', '04');

        }])
        ->withCount(['inspecciones as h3_count_04' => function($query){
            $query
            ->where('h3', '04');

        }])
        ->withCount(['inspecciones as h4_count_04' => function($query){
            $query
            ->where('h4', '04');

        }])
        ->withCount(['inspecciones as h5_count_04' => function($query){
            $query
            ->where('h5', '04');

        }])
        ->withCount(['inspecciones as h6_count_04' => function($query){
            $query
            ->where('h6', '04');

        }])
        ->withCount(['inspecciones as h7_count_04' => function($query){
            $query
            ->where('h7', '04');

        }])
        ->withCount(['inspecciones as h8_count_04' => function($query){
            $query
            ->where('h8', '04');

        }])
        ->where('cedula', auth()->user()->cedula)->groupBy('matriculados.id')->get();

        return view('home', compact('calendar_details', 'usuarios', 'foto_perfil','fecha', 'roles', 'eventos', 'frases', 'noticias', 'inspe'));

    }


}
