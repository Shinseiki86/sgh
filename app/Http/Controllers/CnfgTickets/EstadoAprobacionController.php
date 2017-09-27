<?php
namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Controllers\Controller;

use SGH\Models\EstadoAprobacion;

class EstadoAprobacionController extends Controller
{
	protected $route = 'cnfg-tickets.estadosaprobaciones';
	protected $class = EstadoAprobacion::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$estadosaprobaciones = EstadoAprobacion::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('estadosaprobaciones'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $ESAP_ID
	 * @return Response
	 */
	public function edit($ESAP_ID)
	{
		// Se obtiene el registro
		$estadoaprobacion = EstadoAprobacion::findOrFail($ESAP_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('estadoaprobacion'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $ESAP_ID
	 * @return Response
	 */
	public function update($ESAP_ID)
	{
		parent::updateModel($ESAP_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $ESAP_ID
	 * @return Response
	 */
	public function destroy($ESAP_ID)
	{
		parent::destroyModel($ESAP_ID);
	}
	
}
