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

//Autenticación
Route::auth();
Route::get('password/email/{USER_ID}', 'Auth\PasswordController@sendEmail');
Route::get('password/reset/{USER_ID}', 'Auth\PasswordController@showResetForm');
Route::get('password/reset', 'Auth\PasswordController@showResetForm');
Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'middleware' => ['auth', 'role:admin']], function() {
	Route::resource('usuarios', 'RegisterController');
	Route::resource('roles', 'RoleController');
	Route::resource('permisos', 'PermissionController');
	Route::resource('menu', 'MenuController', ['parameters'=>['menu' => 'MENU_ID']]);
	Route::post('menu/reorder', 'MenuController@reorder')->name('auth.menu.reorder');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/',  function(){return view('dashboard/index');});
});

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
	Route::resource('tipoentidades', 'TipoEntidadController');
	Route::resource('entidades', 'EntidadController');
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

Route::group(['prefix' => 'cnfg-ausentismos', 'namespace' => 'CnfgAusentismos'], function() {
	Route::resource('diagnosticos', 'DiagnosticoController');
	Route::get('getDiagnosticos', 'DiagnosticoController@getData')->name('diagnosticos.getData');
	Route::resource('conceptoausencias', 'ConceptoAusenciaController');
	Route::resource('tipoausentismos', 'TipoAusentismoController');
	Route::resource('ausentismos', 'AusentismoController');
	Route::get('/buscaContrato','AusentismoController@buscaContrato');
	Route::get('/buscaDx', 'AusentismoController@buscaDx');
	Route::get('/autocomplete',array('as'=>'autocomplete','uses'=>'AusentismoController@autocomplete'));
});