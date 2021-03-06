<?php
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Controllers\Controller;

use SGH\Models\CentroCosto;
use SGH\Models\Gerencia;

class CentroCostoController extends Controller
{
	protected $route = 'cnfg-organizacionales.centroscostos';
	protected $class = CentroCosto::class;

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
		$centroscostos = CentroCosto::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/centroscostos/index', compact('centroscostos'));
	}
	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');
		return view('cnfg-organizacionales/centroscostos/create', compact('arrGerencias'));
		
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
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function edit($CECO_ID)
	{
		// Se obtiene el registro
		$centrocosto = CentroCosto::findOrFail($CECO_ID);
		//Se crea un array con los CNOS disponibles
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');
		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/centroscostos/edit', compact('centrocosto', 'arrGerencias'));
	}
	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function update($CECO_ID)
	{
		parent::updateModel($CECO_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function destroy($CECO_ID)
	{
		parent::destroyModel($CECO_ID);
	}
	
}