<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insumo;
use App\Categoria;

class ControladorInsumos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $insumos = Insumo::SearchInsumos($request->nombre)->orderBy('id','ASC')->paginate(5);
      return view('administracion.insumos.admin.index')->with('insumos',$insumos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::OrderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return View('administracion.insumos.admin.crear')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $insumo = new Insumo($request->all());
      //Para que tome el escuela_id del usuario logueado
      $insumo->categoria_id = $request->categoria_id;
      $insumo->save();
      Flash('Insumo ' . $insumo->nombre . ' Grabado con Exito')->success();
      return redirect()->route('insumo.index');
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
      $insumo = Insumo::find($id);
      $categorias = Categoria::OrderBy('nombre', 'ASC')->pluck('nombre', 'id');
      return view('administracion.insumos.admin.editar')
        ->with('categorias', $categorias)
        ->with('insumo',$insumo);
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
      $insumo = Insumo::find($id);
      $insumo->nombre = $request->nombre;
      $insumo->descripcion = $request->descripcion;
      $insumo->cantidad = $request->cantidad;
      $insumo->fechaVencimiento = $request->fechaVencimiento;
      $insumo->calorias = $request->calorias;
      $insumo->save();
      Flash('Insumo '.$insumo->nombre.' Modificado')->warning();
      return redirect()->route('insumo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $insumo = Insumo::find($id);
      $insumo->delete();
      Flash('Insumo '.$insumo->nombre.' Eliminado')->error();
      return redirect()->route('insumo.index');
    }
}
