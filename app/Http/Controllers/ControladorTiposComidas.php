<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoComida;
use Laracast\Flash\Flash;

class ControladorTiposComidas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $tiposComidas = TipoComida::SearchTipoComida($request->nombre)->orderBy('id','ASC')->paginate(5);
      return view('administracion.tiposComidas.index')->with('tiposComidas',$tiposComidas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.tiposComidas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipoComida = new TipoComida($request->all());
      $tipoComida->save();
      Flash('Tipo de Comida ' . $tipoComida->nombre . ' Grabado con Exito')->success();
      return redirect()->route('tipoComida.index');
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
      $tipoComida = TipoComida::find($id);
      return view('administracion.tiposComidas.editar')->with('tipoComida',$tipoComida);
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
      $tipoComida = TipoComida::find($id);
      $tipoComida->nombre = $request->nombre;
      $tipoComida->save();
      Flash('Tipo de Comida '.$tipoComida->nombre.' Modificado')->warning();
      return redirect()->route('tipoComida.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tipoComida = TipoComida::find($id);
      $tipoComida->delete();
      Flash('Tipo de Comida '.$tipoComida->nombre.' Eliminado')->error();
      return redirect()->route('tipoComida.index');
    }
}
