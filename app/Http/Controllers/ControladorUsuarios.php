<?php

namespace App\Http\Controllers;

use App\User;
use App\Perfil;
use App\Escuela;
use Illuminate\Http\Request;
use Laracast\Flash\Flash;

class ControladorUsuarios extends Controller
{
    function __construct(){
      $this->middleware(['auth','roles']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::searchUsers($request->nombre)->orderBy('id','ASC')->paginate(5);
        return view('administracion.usuarios.index')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles = Perfil::OrderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $escuelas = Escuela::OrderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('administracion.usuarios.crear')
        ->with('perfiles', $perfiles)
        ->with('escuelas', $escuelas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $usuario = new User($request->all());
      $usuario ->password = bcrypt($request->password);
      $usuario->save();
      Flash('Usuario ' . $usuario->nombreUsuario . ' Grabado con Exito')->success();
      return redirect()->route('usuario.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $usuario = User::find($id);
      $perfiles = Perfil::OrderBy('nombre', 'ASC')->pluck('nombre', 'id');
      $escuelas = Escuela::OrderBy('nombre', 'ASC')->pluck('nombre', 'id');
      return view('administracion.usuarios.editar')
      ->with('perfiles', $perfiles)
      ->with('escuelas', $escuelas)
      ->with('usuario',$usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $usuario = User::find($id);
      $usuario->nombreUsuario = $request->nombreUsuario;
      $usuario->nombre = $request->nombre;
      $usuario->direccion = $request->direccion;
      $usuario->dni = $request->dni;
      $usuario->cargo = $request->cargo;
      $usuario->perfil_id = $request->perfil_id;
      $usuario->save();
      Flash('Usuario '.$usuario->nombreUsuario.' Modificado')->warning();
      return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $usuario = User::find($id);
      $usuario->delete();
      Flash('Usuario '.$usuario->nombreUsuario.' Eliminado')->error();
      return redirect()->route('usuario.index');

    }
}
