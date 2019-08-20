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

        $eventos = Eventos::all();

        $frases = Frases::all();

        $noticias = Noticias::all();
 
        return view('home', compact('calendar_details', 'usuarios', 'fecha', 'roles', 'eventos', 'frases', 'noticias'));
    
    }
}
