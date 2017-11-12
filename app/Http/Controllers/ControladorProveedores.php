<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use App\Escuela;
use App\Proveedor;

class ControladorProveedores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //Primero obtengo el id de la escuela perteneciente al usuario autenticado en el sistema
      $escuela = Escuela::find(\Auth::user()->escuela_id);
      //Una ves que encuentro la escuela le paso para que filtre con el where el escuela_id, de esta forma solo me traera los alumnos de esa escuela
      //el metodo searchProveedores es para filtrar por el nombre, pero si no hay request no pasa nada y de esta forma igual fitro los alumnos por escuela
      $proveedores = Proveedor::searchProveedores($request->nombre)->where('escuela_id', $escuela->id)->orderBy('id','ASC')->paginate(5);
      return view('administracion.proveedores.index')
        ->with('escuela', $escuela)
        ->with('proveedores',$proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.proveedores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $proveedor = new Proveedor($request->all());
      //Para que tome el escuela_id del usuario logueado
      $proveedor->escuela_id = \Auth::user()->escuela_id;
      $proveedor->save();
      Flash('Proveedor ' . $proveedor->nombre . ' Grabado con Exito')->success();
      return redirect()->route('proveedor.index');
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
      $proveedor = Proveedor::find($id);
      return view('administracion.proveedores.editar')->with('proveedor',$proveedor);
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
      $proveedor = Proveedor::find($id);
      $proveedor->nombre = $request->nombre;
      $proveedor->save();
      Flash('Proveedor '.$proveedor->nombre.' Modificado')->warning();
      return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $proveedor = Proveedor::find($id);
      $proveedor->delete();
      Flash('Proveedor '.$proveedor->nombre.' Eliminado')->error();
      return redirect()->route('proveedor.index');
    }
}
