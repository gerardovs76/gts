<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensaje;
use App\Notifications\MensajeriaNotificacion;
use Illuminate\Support\Facades\Notification;
use DB;
use App\Matriculacion;

class MensajeController extends Controller
{
    public function index()
    {
        $usersInicial1 = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'INICIAL 1')
        ->select('users.id', 'users.name')
        ->get();
        $usersInicial2 = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'INICIAL 2')
        ->select('users.id', 'users.name')
        ->get();
        $users1eroB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'PRIMERO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users2doB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'SEGUNDO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users3roB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'TERCERO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users4toB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'CUARTO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users5toB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'QUINTO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users6toB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'SEXTO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users7moB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'SEPTIMO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users8voB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'OCTAVO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users9noB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'NOVENO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users10moB = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'DECIMO DE EGB')
        ->select('users.id', 'users.name')
        ->get();
        $users1bgu = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'PRIMERO DE BACHILLERATO')
        ->select('users.id', 'users.name')
        ->get();
        $users2bgu = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'SEGUNDO DE BACHILLERATO')
        ->select('users.id', 'users.name')
        ->get();
        $users3bgu = User::join('matriculados', 'users.cedula', '=', 'matriculados.cedula')
        ->where('users.id', '!=', auth()->id())
        ->where('matriculados.curso', 'TERCERO DE BACHILLERATO')
        ->select('users.id', 'users.name')
        ->get();

        $matriculadosCedula = Matriculacion::select('cedula')->get()->toArray();
        $autoridades = User::whereNotIn('cedula',$matriculadosCedula)->select('id', 'name')->get();
    	return view('mensaje.mensaje', compact('usersInicial1', 'usersInicial2', 'users1eroB', 'users2doB', 'users3roB', 'users4toB', 'users5toB', 'users6toB', 'users7moB', 'users8voB', 'users9noB', 'users10moB', 'users1bgu', 'users2bgu', 'users3bgu', 'autoridades'));
    }

    public function store(Request $request)

    {
        $recibio_id = $request->recibio_id;
        foreach($recibio_id as $key => $value)
        {
    	$mensaje = new Mensaje;
    	$mensaje->envio_id = auth()->id();
    	$mensaje->recibio_id = $recibio_id[$key];
    	$mensaje->body = $request->body;
    	$mensaje->save();
        $paraUsuario = User::find($recibio_id[$key]);
    	$paraUsuario->notify(new MensajeriaNotificacion($mensaje));
        }
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
