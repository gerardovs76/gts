<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticias;
use DB;

class NoticiasController extends Controller
{
    public function index()
    {
        $noticias = Noticias::orderby('id', 'DESC')->paginate();
    	return view('noticias.index', compact('noticias'));
    }

    public function create()
    {
    	return view('noticias.create');
    }

    public function store(Request $request)
    {
    	$noticias = new Noticias;
    	$noticias->nombre = $request->nombre;
    	$noticias->slug = $request->slug;
    	$noticias->descripcion = $request->descripcion;
    	$noticias->save();


    	return redirect()->route('noticias.create')->with('info', 'Se ha agregado la noticia correctamente');
    }

    public function edit($id)
    {
        $noticias = Noticias::find($id);
        return view('noticias.edit', compact('noticias'));
    }


    public function update(Request $request, $id)
    {
        $noticias = Noticias::find($id);
        $noticias->nombre = $request->nombre;
        $noticias->slug = $request->slug;
        $noticias->descripcion = $request->descripcion;
        $noticias->save();


        return redirect()->route('noticias.index')->with('info', 'Se ha editado la noticia correctamente');
    }

    public function destroy($id)
    {
        $noticias = Noticias::find($id);
        $noticias->delete();


        return redirect()->route('noticias.index')->with('info', 'Se ha eliminado la noticias correctamente');

    }

    public function traerNoticias()
    {
        $noticias = DB::table('noticias')
        ->select('nombre', 'slug', 'descripcion')
        ->get();

        return response()->json($noticias);
    }
}
