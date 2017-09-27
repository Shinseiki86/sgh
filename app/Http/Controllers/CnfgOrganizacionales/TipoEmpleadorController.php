<?php
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Controllers\Controller;

use SGH\Models\TipoEmpleador;

class TipoEmpleadorController extends Controller
{
	protected $route = 'cnfg-organizacionales.tiposempleadores';
	protected $class = TipoEmpleador::class;

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
		$tiposempleadores = TipoEmpleador::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('tiposempleadores'));
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
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function edit($TIEM_ID)
	{
		// Se obtiene el registro
		$tipoempleador = TipoEmpleador::findOrFail($TIEM_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('tipoempleador'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function update($TIEM_ID)
	{
		parent::updateModel($TIEM_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function destroy($TIEM_ID)
	{
		parent::destroyModel($TIEM_ID);
	}
	
}
