<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas para gestionar usuarios, uso el prefijo admin de administracion
Route::group(['prefix' => 'admin'],function(){
	//Usando el resource y el controlador usuario se me genera una ruta automaticamente para cada metodo del ControladorUsuarios
	Route::resource('usuario','ControladorUsuarios');
	//creo esta ruta para eliminar el usuario sin tener q entrar a un formulario aparte
	Route::get('usuario/{id}/destroy' , [
		'uses' => 'ControladorUsuarios@destroy',
		'as' => 'admin.usuario.destroy'
	]);

  Route::resource('escuela','ControladorEscuelas');
	//creo esta ruta para eliminar la escuela sin tener q entrar a un formulario aparte
	Route::get('escuela/{id}/destroy' , [
		'uses' => 'ControladorEscuelas@destroy',
		'as' => 'admin.escuela.destroy'
	]);

  Route::resource('alumno','ControladorAlumnos');
	//creo esta ruta para eliminar el alumno sin tener q entrar a un formulario aparte
	Route::get('alumno/{id}/destroy' , [
		'uses' => 'ControladorAlumnos@destroy',
		'as' => 'admin.alumno.destroy'
	]);

  Route::resource('registro','ControladorRegistros');
	//creo esta ruta para eliminar el alumno sin tener q entrar a un formulario aparte
	Route::get('registro/{id}/destroy' , [
		'uses' => 'ControladorRegistros@destroy',
		'as' => 'admin.registro.destroy'
	]);

  Route::resource('proveedor','ControladorProveedores');
	//creo esta ruta para eliminar el alumno sin tener q entrar a un formulario aparte
	Route::get('proveedor/{id}/destroy' , [
		'uses' => 'ControladorProveedores@destroy',
		'as' => 'admin.proveedor.destroy'
	]);

  Route::resource('categoria','ControladorCategorias');
	//creo esta ruta para eliminar el alumno sin tener q entrar a un formulario aparte
	Route::get('categoria/{id}/destroy' , [
		'uses' => 'ControladorCategorias@destroy',
		'as' => 'admin.categoria.destroy'
	]);

  Route::resource('tipoComida','ControladorTiposComidas');
	//creo esta ruta para eliminar el alumno sin tener q entrar a un formulario aparte
	Route::get('tipoComida/{id}/destroy' , [
		'uses' => 'ControladorTiposComidas@destroy',
		'as' => 'admin.tipoComida.destroy'
	]);

  Route::resource('estacion','ControladorEstaciones');
	//creo esta ruta para eliminar el alumno sin tener q entrar a un formulario aparte
	Route::get('estacion/{id}/destroy' , [
		'uses' => 'ControladorEstaciones@destroy',
		'as' => 'admin.estacion.destroy'
	]);

  Route::resource('insumo','ControladorInsumos');
	//creo esta ruta para eliminar el alumno sin tener q entrar a un formulario aparte
	Route::get('insumo/{id}/destroy' , [
		'uses' => 'ControladorInsumos@destroy',
		'as' => 'admin.insumo.destroy'
	]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
