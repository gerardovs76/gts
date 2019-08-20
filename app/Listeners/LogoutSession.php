<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ControlProfesor;
use Request;
use Caffeinated\Shinobi\Models\Role;
use Auth;

class LogoutSession
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {   
        if(Auth::user()->isRole('profesor')){
      ControlProfesor::create([
        'user_id' => $event->user->id,
        'logout' => new \DateTime,
      ]);
  }
  
    }
}
