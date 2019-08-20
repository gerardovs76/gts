<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ControlProfesor;
use Caffeinated\Shinobi\Models\Role;
use Auth;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        if(Auth::user()->isRole('profesor')){
        ControlProfesor::create([
        'user_id' => $event->user->id,
        'login' => new \DateTime,
      ]);
    }
    
 }
}
