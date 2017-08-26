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
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
	Route::resource('usuarios', 'AuthController');
	Route::resource('roles', 'RoleController');
	Route::resource('permisos', 'PermissionController');
});
Route::get('password/email/{USER_id}', 'Auth\PasswordController@sendEmail');
Route::get('password/reset/{USER_id}', 'Auth\PasswordController@showResetForm');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/',  function(){return view('dashboard/index');});
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
		Route::resource('grupos', 'GrupoController');
		Route::resource('turnos', 'TurnoController');
		Route::resource('plantaslaborales', 'PlantaLaboralController');
	});

	Route::group(['prefix' => 'cnfg-geograficos', 'namespace' => 'CnfgGeograficos'], function() {
		Route::resource('paises', 'PaisController', ['parameters'=>['pais' => 'PAIS_ID']]);
		Route::get('getPaises', 'PaisController@getData');
		Route::resource('departamentos', 'DepartamentoController', ['parameters'=>['departamento' => 'DEPA_ID']]);
		Route::get('getDepartamentos', 'DepartamentoController@getData');
		Route::resource('ciudades', 'CiudadController', ['parameters'=>['ciudad' => 'CIUD_ID']]);
		Route::get('getCiudades', 'CiudadController@getData');
	});

	Route::group(['prefix' => 'gestion-humana', 'namespace' => 'GestionHumana'], function() {
		Route::resource('prospectos', 'ProspectoController', ['parameters'=>['prospectos' => 'PROS_ID']]);
		Route::get('getProspectos', 'ProspectoController@getData');
		Route::resource('contratos', 'ContratoController', ['parameters'=>['contratos' => 'CONT_ID']]);
		Route::get('getContratos', 'ContratoController@getData');
		Route::get('getContratosEmpleador', 'ContratoController@getContratosEmpleador');

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
		Route::resource('tiposincidentes', 'TipoIncidenteController');
		Route::resource('estadosaprobaciones', 'EstadoAprobacionController');
		Route::resource('sanciones', 'SancionController');
		Route::resource('tickets', 'TicketController');
		Route::get('tickets/autorizar/{TICK_ID}', 'TicketController@autorizarTicket');
		Route::post('tickets/rechazar/{TICK_ID}', 'TicketController@rechazarTicket');
		Route::post('tickets/cerrar/{TICK_ID}', 'TicketController@cerrarTicket');
		Route::get('getTicketsPorEstado', 'TicketController@getTicketsPorEstado');
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


Route::resource('tipoEntidads', 'TipoEntidadController');
Route::get('getTipoEntidad', 'TipoEntidadController@getData');
Route::get('tipoEntidads/{id}/delete', [
    'as' => 'tipoEntidads.delete',
    'uses' => 'TipoEntidadController@destroy',
]);


Route::resource('entidads', 'EntidadController');
Route::get('getEntidad', 'EntidadController@getData');
Route::get('entidads/{id}/delete', [
    'as' => 'entidads.delete',
    'uses' => 'EntidadController@destroy',
]);


Route::resource('pruebas', 'PruebaController');
Route::get('getPrueba', 'PruebaController@getData');
Route::get('pruebas/{id}/delete', [
    'as' => 'pruebas.delete',
    'uses' => 'PruebaController@destroy',
]);
