<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\Imports\InscritosUsuarios;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Auth;
use DB;
use App\Cargos;
use App\Matriculacion;
use App\Profesor;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
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
        $user = User::find($id);
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

    public function buscarControl(Request $request, $cedula)
    {
        $control = DB::table('users')
        ->join('control_profesor', 'control_profesor.user_id', '=', 'users.id')
        ->select('users.name', 'control_profesor.login', 'control_profesor.logout')
        ->where('users.cedula',$cedula)
        ->orderBy('control_profesor.created_at','ASC')
        ->get();


        return response()->json($control);

    }
    public function importarDataUsuarios()
    {
        return view('users.importarData');
    }
      public function importUsers(Request $request)
    {

       Excel::import(new InscritosUsuarios, $request->import_file);

       return back()->with('info', 'Se ha cargado la informacion correctamente');
 }

        public function asignarCargos()
        {
            return view('users.asignarCargos');
        }

        public function storeCargos(Request $request)
        {
            $cargo = new Cargos;
            $cargo->nombres = $request->nombre;
            $cargo->cargo = $request->cargo;
            $cargo->save();


            return redirect()->route('users.asignar-cargo')->with('info', 'Se ha agregado el cargo correctamente');
        }
        public function asignarRol(Request $request, $cedula)
        {
            $cedula = $request->cedula;

            $usuarioA = DB::table('matriculados')
            ->where('cedula', $cedula)
            ->select('*')
            ->get();



           return response()->json($usuarioA);

        }

}
