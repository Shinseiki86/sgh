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
	Route::resource('cargos', 'CargoController');
	Route::resource('tiposcontratos', 'TipoContratoController');
	Route::resource('temporales', 'TemporalController');
	Route::resource('empleadores', 'EmpleadorController');
	Route::resource('prospectos', 'ProspectoController');
	Route::resource('clasescontratos', 'ClaseContratoController');
	Route::resource('gerencias', 'GerenciaController');
	Route::resource('centroscostos', 'CentroCostoController');
	Route::resource('tiposempleadores', 'TipoEmpleadorController');
	Route::resource('estadoscontratos', 'EstadoContratoController');
	Route::resource('motivosretiros', 'MotivoRetiroController');
	Route::resource('contratos', 'ContratoController');
	//upload tablas de TNL
	//Route::get('upload', 'UploadController@index');
	Route::post('upload', 'UploadController@upload');

	Route::resource('uploads', 'UploadController');

	Route::post('delete', 'UploadController@delete');
});