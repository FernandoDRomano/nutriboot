<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Laracast\Flash\Flash;

class ControladorCategorias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $categorias = Categoria::searchCategorias($request->nombre)->orderBy('id','ASC')->paginate(5);
      return view('administracion.categorias.index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.categorias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $categoria = new Categoria($request->all());
      $categoria->save();
      Flash('Categoria ' . $categoria->nombre . ' Grabado con Exito')->success();
      return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categoria = Categoria::find($id);
      return view('administracion.categorias.editar')->with('categoria',$categoria);
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
      $categoria = Categoria::find($id);
      $categoria->nombre = $request->nombre;
      $categoria->save();
      Flash('Categoria '.$categoria->nombre.' Modificado')->warning();
      return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $categoria = Categoria::find($id);
      $categoria->delete();
      Flash('Categoria '.$categoria->nombre.' Eliminada')->error();
      return redirect()->route('categoria.index');
    }
}
