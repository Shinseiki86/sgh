<?php
namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Controllers\Controller;

use SGH\Models\Prioridad;

class PrioridadController extends Controller
{
	protected $route = 'cnfg-tickets.prioridades';
	protected $class = Prioridad::class;

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
		$prioridades = Prioridad::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('prioridades'));
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
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function edit($PRIO_ID)
	{
		// Se obtiene el registro
		$prioridad = Prioridad::findOrFail($PRIO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('prioridad'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function update($PRIO_ID)
	{
		parent::updateModel($PRIO_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function destroy($PRIO_ID)
	{
		parent::destroyModel($PRIO_ID);
	}
	
}
