<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Escuela;
use App\Registro;
use Illuminate\Http\Request;

class ControladorAlumnos extends Controller
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
      //el metodo searchAlumnos es para filtrar por el nombre, pero si no hay request no pasa nada y de esta forma igual fitro los alumnos por escuela
      $alumnos = Alumno::searchAlumnos($request->nombre)->where('escuela_id', $escuela->id)->orderBy('id','ASC')->paginate(5);
      return view('administracion.alumnos.index')
        ->with('escuela',$escuela)
        ->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('administracion.alumnos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $alumno = new Alumno($request->all());
      //Para que tome el escuela_id del usuario logueado
      $alumno->escuela_id = \Auth::user()->escuela_id;
      $alumno->save();
      Flash('Alumno ' . $alumno->nombre . ' Grabado con Exito')->success();
      return redirect()->route('alumno.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);
        $registros = Registro::all()->where('alumno_id', $alumno->id);
        return View('administracion.alumnos.ver')
          ->with('registros', $registros)
          ->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $alumno = Alumno::find($id);
      return view('administracion.alumnos.editar')->with('alumno',$alumno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $alumno = Alumno::find($id);
      $alumno->nombre = $request->nombre;
      $alumno->dni = $request->dni;
      $alumno->direccion = $request->direccion;
      $alumno->fechaNacimiento = $request->fechaNacimiento;
      $alumno->nombreTutor = $request->nombreTutor;
      $alumno->save();
      Flash('Alumno '.$alumno->nombre.' Modificado')->warning();
      return redirect()->route('alumno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $alumno = Alumno::find($id);
      $alumno->delete();
      Flash('Alumno '.$alumno->nombre.' Eliminado')->error();
      return redirect()->route('alumno.index');
    }
}
