<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estacion;
use Laracast\Flash\Flash;

class ControladorEstaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $estaciones = Estacion::SearchEstaciones($request->nombre)->orderBy('id','ASC')->paginate(5);
      return view('administracion.estaciones.index')->with('estaciones',$estaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.estaciones.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $estacion = new Estacion($request->all());
      $estacion->save();
      Flash('Estación ' . $estacion->nombre . ' Grabado con Exito')->success();
      return redirect()->route('estacion.index');
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
      $estacion = Estacion::find($id);
      return view('administracion.estaciones.editar')->with('estacion',$estacion);
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
      $estacion = Estacion::find($id);
      $estacion->nombre = $request->nombre;
      $estacion->save();
      Flash('Estación '.$estacion->nombre.' Modificado')->warning();
      return redirect()->route('estacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $estacion = Estacion::find($id);
      $estacion->delete();
      Flash('Estación '.$estacion->nombre.' Eliminada')->error();
      return redirect()->route('estacion.index');
    }
}
