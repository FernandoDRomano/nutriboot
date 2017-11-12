<?php

namespace App\Http\Controllers;

use App\Escuela;
use Illuminate\Http\Request;
use Laracast\Flash\Flash;

class ControladorEscuelas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $escuelas = Escuela::search($request->nombre)->orderBy('id','ASC')->paginate(5);
      return view('administracion.escuelas.index')->with('escuelas',$escuelas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.escuelas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $escuela = new Escuela($request->all());
      $escuela->save();
      Flash('Escuela ' . $escuela->nombre . ' Grabado con Exito')->success();
      return redirect()->route('escuela.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function show(Escuela $escuela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $escuela = Escuela::find($id);
      return view('administracion.escuelas.editar')->with('escuela',$escuela);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $escuela = Escuela::find($id);
      $escuela->nombre = $request->nombre;
      $escuela->direccion = $request->direccion;
      $escuela->telefono = $request->telefono;
      $escuela->save();
      Flash('Escuela '.$escuela->nombre.' Modificado')->warning();
      return redirect()->route('escuela.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $escuela = Escuela::find($id);
      $escuela->delete();
      Flash('Escuela '.$escuela->nombre.' Eliminada')->error();
      return redirect()->route('escuela.index');
    }
}
