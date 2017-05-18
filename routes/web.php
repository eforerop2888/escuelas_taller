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

/*
	Rutas para el modulo de escuelas
*/
Route::resource('escuelas', 'EscuelasController');

/*
	Rutas para el modulo de programas
*/
Route::resource('programas', 'ProgramasController');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
