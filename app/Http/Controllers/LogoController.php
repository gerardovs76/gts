<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function asignarLogo()
    {
    	return view('logo');
    }

    public function agregarLogo(Request $request)
    {
    	$file = $request->file('logo');
 
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
 
       return redirect()->route('logo.asignar')->with('info', 'El logo se ha cargado correctamente');






    }
}
