<?php

namespace App\Http\Controllers;

use App\Registro;
use App\Alumno;
use App\Escuela;
use Illuminate\Http\Request;

class ControladorRegistros extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('administracion.registros.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $registro = new Registro();
      $registro->fecha = $request->fecha;
      $registro->peso = $request->peso;
      $registro->altura = $request->altura;
      $registro->imc = $request->peso / ($request->altura * $request->altura);
      $registro->alumno_id = $request->alumno_id;
      $registro->save();
      Flash('Registro del Alumno ' . $registro->alumno->nombre . ' Grabado con Exito')->success();
      //Le paso el alumno_id a la ruta alumno.show que vendria a ser como mi index, debido
      //a que no encontre otra forma de trabajarlo por el momento
      return redirect()->route('alumno.show', $registro->alumno_id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //DEBIDO A QUE NO ENCONTRE LA FORMA DE PASARLE UN PARAMETRO A LA RUTA INDEX, UTILIZO ESTA RUTA PARA LLAMAR A LA RUTA CREATE
      $alumno = Alumno::find($id);
      return view('administracion.registros.crear')
      ->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $registro = Registro::find($id);
      $alumno = Alumno::find($registro->alumno_id);
      return view('administracion.registros.editar')
        ->with('alumno',$alumno)
        ->with('registro', $registro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $registro = Registro::find($id);
      $registro->fecha = $request->fecha;
      $registro->peso = $request->peso;
      $registro->altura = $request->altura;
      $registro->imc = $request->peso / ($request->altura * $request->altura);
      $registro->alumno_id = $request->alumno_id;
      $registro->save();
      Flash('Registro del Alumno ' . $registro->alumno->nombre . ' Modificado con Exito')->warning();
      //Le paso el alumno_id a la ruta alumno.show que vendria a ser como mi index, debido
      //a que no encontre otra forma de trabajarlo por el momento
      return redirect()->route('alumno.show', $registro->alumno_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Registro::find($id);
        //obtengo el id del alumno antes de eliminarlo para pasarlo a la ruta alumno.show
        //en este caso esa ruta seria como mi index, por ahora no encontre otra forma de trabajarlo
        $alumno_id = $registro->alumno_id;
        $registro->delete();
        Flash('Registro del Alumno ' . $registro->alumno->nombre . ' Eliminado')->error();
        return redirect()->route('alumno.show', $alumno_id);
    }
}
