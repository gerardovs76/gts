<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Frases;
use DB;

class FrasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frases = Frases::orderBy('id', 'DESC')->paginate();
        return view('frases.index', compact('frases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frases = new Frases;
        $frases->autor = $request->autor;
        $frases->frase = $request->frase;
        $frases->save();


        return redirect()->route('frases.create')->with('info', 'Se ha creado la frase correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frases = Frases::find($id);
        return view('frases.edit', compact('frases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $frases = Frases::find($id);
        $frases->autor = $request->autor;
        $frases->frase = $request->frase;
        $frases->save();


        return redirect()->route('frases.index')->with('info', 'Se ha editado la frase correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frases = Frases::find($id);
        $frases->delete();

        return redirect()->route('frases.index')->with('info', 'La frase se ha eliminado correctamente');
    }

    public function traerFrases()

{
    $frases = DB::table('frases')
    ->select('autor', 'frase')
    ->get();

    return response()->json($frases);
}

}
