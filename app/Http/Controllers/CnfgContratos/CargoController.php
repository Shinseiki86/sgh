<?php
namespace SGH\Http\Controllers\CnfgContratos;

use SGH\Http\Controllers\Controller;

use SGH\Models\Cno;
use SGH\Models\Cargo;

class CargoController extends Controller
{
	protected $route = 'cnfg-contratos.cargos';
	protected $class = Cargo::class;

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
		$cargos = Cargo::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('cargos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrCnos = model_to_array(Cno::class, 'CNOS_DESCRIPCION');

		return view($this->route.'.create', compact('arrCnos'));
		
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
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function edit($CARG_ID)
	{
		// Se obtiene el registro
		$cargo = Cargo::findOrFail($CARG_ID);

		//Se crea un array con los CNOS disponibles
		$arrCnos = model_to_array(Cno::class, 'CNOS_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('cargo', 'arrCnos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function update($CARG_ID)
	{
		parent::updateModel($CARG_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function destroy($CARG_ID)
	{
		parent::destroyModel($CARG_ID);
	}
	
}
