<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Autenticación
Route::auth();
Route::resource('usuarios', 'Auth\AuthController');
//Route::resource('roles', 'Auth\RolController');
Route::get('password/email/{USER_id}', 'Auth\PasswordController@sendEmail');
Route::get('password/reset/{USER_id}', 'Auth\PasswordController@showResetForm');
//['middleware' => ['auth', 'permission:admin']]

Route::group(['prefix' => '', 'middleware' => ['auth', 'role:admin']], function() {
	Route::get('/home', 'SBAdminController@home');
	Route::get('/', 'SBAdminController@home');
	Route::get('/charts', 'SBAdminController@mcharts');
	Route::get('/tables', 'SBAdminController@table');
	Route::get('/forms', 'SBAdminController@form');
	Route::get('/buttons', 'SBAdminController@buttons');
	Route::get('/icons', 'SBAdminController@icons');
	Route::get('/panels', 'SBAdminController@panel');
	Route::get('/typography', 'SBAdminController@typography');
	Route::get('/notifications', 'SBAdminController@notifications');
	Route::get('/blank', 'SBAdminController@blank');
	Route::get('/documentation', 'SBAdminController@documentation');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
	Route::get('/',  function(){
		return view('layouts/admin');
	});
	Route::resource('departamentos', 'DepartamentoController');
	Route::resource('ciudades', 'CiudadController');
	Route::resource('cnos', 'CnosController');
	Route::resource('cargos', 'CargosController');
	Route::resource('tiposcontratos', 'TiposcontratosController');
	Route::resource('temporales', 'TemporalesController');
	Route::resource('empleadores', 'EmpleadoresController');
	Route::resource('prospectos', 'ProspectosController');
	Route::resource('clasescontratos', 'ClasescontratosController');
	Route::resource('gerencias', 'GerenciasController');
	Route::resource('centroscostos', 'CentroscostosController');
	Route::resource('tiposempleadores', 'TiposempleadoresController');
	Route::resource('estadoscontratos', 'EstadoscontratosController');
	Route::resource('motivosretiros', 'MotivosretirosController');
	Route::resource('contratos', 'ContratosController');
	//upload tablas de TNL
	//Route::get('upload', 'UploadController@index');
	Route::post('upload', 'UploadsController@upload');

	Route::resource('uploads', 'UploadsController');

	Route::post('delete', 'UploadsController@delete');
});