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

Route::group(['middleware' => 'auth'], function() {
	Route::get('/',  function(){return view('layouts/menu');});
});

//Rutas para admin y owner
Route::group(['middleware' => ['auth', 'role:admin|owner']], function() {

	Route::group(['prefix' => 'cnfg-contratos', 'namespace' => 'CnfgContratos'], function() {
		Route::resource('cnos', 'CnosController', ['parameters'=>['cnos' => 'CNOS_ID']]);
		Route::resource('cargos', 'CargoController', ['parameters'=>['cargos' => 'CARG_ID']]);
		Route::resource('tiposcontratos', 'TipoContratoController', ['parameters'=>['tiposcontratos' => 'TICO_ID']]);
		Route::resource('temporales', 'TemporalController');
		Route::resource('clasescontratos', 'ClaseContratoController');
		Route::resource('estadoscontratos', 'EstadoContratoController');
		Route::resource('motivosretiros', 'MotivoRetiroController');
	});

	Route::group(['prefix' => 'cnfg-organizacionales', 'namespace' => 'CnfgOrganizacionales'], function() {
		Route::resource('empleadores', 'EmpleadorController');
		Route::resource('gerencias', 'GerenciaController');
		Route::resource('procesos', 'ProcesoController');
		Route::resource('centroscostos', 'CentroCostoController');
		Route::resource('tiposempleadores', 'TipoEmpleadorController');
		Route::resource('riesgos', 'RiesgoController');
	});

	Route::group(['prefix' => 'cnfg-geograficos', 'namespace' => 'CnfgGeograficos'], function() {
		Route::resource('departamentos', 'DepartamentoController');
		Route::resource('ciudades', 'CiudadController');
	});

	Route::group(['prefix' => 'gestion-humana', 'namespace' => 'GestionHumana'], function() {
		Route::resource('prospectos', 'ProspectoController', ['parameters'=>['prospectos' => 'PROS_ID']]);
		Route::resource('contratos', 'ContratoController', ['parameters'=>['contratos' => 'CONT_ID']]);
		Route::group(['prefix' => 'helpers', 'namespace' => 'Helpers'], function() {
			//upload tablas de TNL
			Route::get('validadorTNL', 'TnlController@index')->name('tnl.index');
			Route::get('validadorTNL/upload', 'TnlController@create')->name('tnl.create');
			Route::post('validadorTNL/upload', 'TnlController@store')->name('tnl.store');
			Route::post('validadorTNL/delete', 'TnlController@delete')->name('tnl.delete');
		});
	});

	Route::group(['prefix' => 'cnfg-tickets', 'namespace' => 'CnfgTickets'], function() {
		Route::resource('prioridades', 'PrioridadController');
		Route::resource('estadostickets', 'EstadoTicketController');
		Route::resource('categorias', 'CategoriaController');
		Route::resource('tickets', 'TicketController');
	});

});


/*Route::group(['prefix' => 'sbadmin', 'middleware' => ['auth', 'role:admin']], function() {
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
});*/
