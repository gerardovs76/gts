<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensaje;
use App\Notifications\MensajeriaNotificacion;
use Illuminate\Support\Facades\Notification;
use DB;

class MensajeController extends Controller
{
    public function index()
    {
    	$users = User::where('id', '!=', auth()->id())->get();
    	return view('mensaje.mensaje', compact('users'));
    }

    public function store(Request $request)

    {
    	$mensaje = new Mensaje;
    	$mensaje->envio_id = auth()->id();
    	$mensaje->recibio_id = $request->recibio_id;
    	$mensaje->body = $request->body;
    	$mensaje->save();

    	$paraUsuario = User::find($request->recibio_id);
   
    	$paraUsuario->notify(new MensajeriaNotificacion($mensaje));


    	return redirect()->route('mensaje.index')->with('info', 'El mensaje se ha enviado con exito');




    }

    public function registroMensaje()

    {

        $registroMensaje = DB::table('mensaje')
        ->join('users', 'mensaje.envio_id', '=', 'users.id')
        ->join('users', 'mensaje.recibio_id', '=', 'users.id')
        ->select('users.name', 'mensaje.body')
        ->distinct()
        ->get();

        return response()->json($registroMensaje);
    }
}
