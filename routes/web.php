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
Route::group(['middleware' => 'loggin'], function(){
	Route::get('/', function () {
	    return view('auth.login');
	});
});

Auth::routes();

/*
	Rutas de usuarios Personalizadas
*/

Route::resource('usuarios', 'Auth\UsuariosController');
Route::get('contraseña', 'Auth\UsuariosController@formPassword')->name('contraseña');

Route::group(['middleware' => ['auth', 'password']], function () {
	/*
		Rutas para el modulo de escuelas
	*/
	Route::resource('escuelas', 'EscuelasController');

	/*
		Rutas para el modulo de programas
	*/
	Route::resource('programas', 'ProgramasController');

	/*
		Rutas para el modulo de modulos
	*/
	Route::resource('modulos', 'ModulosController');

	/*
		Rutas para el modulo de estudiantes
	*/
	Route::resource('estudiantes', 'EstudiantesController');

	/*
		Rutas para el modulo de Cooperantes
	*/
	Route::resource('cooperantes', 'CooperantesController');

	/*
		Rutas para el modulo de Cursos de extensión
	*/
	Route::resource('cursos', 'CursosExtensionController');

	/*
		Rutas para el modulo de informes
	*/
	Route::get('informes', 'InformesController@index')->name('informes');
	Route::post('listaescuelas', 'InformesController@listaEscuelas')->name('informes.listaescuelas');
	Route::post('informeespecifico', 'InformesController@generarInforme')->name('informes.informeespecifico');
	Route::post('exportarinforme', 'InformesController@showExcel')->name('informes.exportarinforme');
	Route::post('graficoespecifico', 'InformesController@generarGraficos')->name('informes.graficoespecifico');

	Route::get('/home', 'HomeController@index')->name('home');
});