<?php

namespace SGH\Http\Controllers\CnfgContratos;

use SGH\Http\Controllers\Controller;

use SGH\Models\Empleador;
use SGH\Models\Prospecto;
use SGH\Models\Negocio;

class NegocioController extends Controller
{
	protected $route = 'cnfg-contratos.negocios';
	protected $class = Negocio::class;

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
		$negocios = Negocio::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('negocios'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los Empleadores disponibles
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		//Se crea un array con los prospectos disponibles (no descartados)
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS'));

		return view($this->route.'.create', compact('arrEmpleadores','arrProspectos'));
		
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		//dd(request());
		parent::storeModel();
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $NEGO_ID
	 * @return Response
	 */
	public function edit($NEGO_ID)
	{
		// Se obtiene el registro
		$negocio = Negocio::findOrFail($NEGO_ID);

		//Se crea un array con los Empleadores disponibles
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		//Se crea un array con los prospectos disponibles (no descartados)
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS'));

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('negocio', 'arrEmpleadores', 'arrProspectos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $NEGO_ID
	 * @return Response
	 */
	public function update($NEGO_ID)
	{
		parent::updateModel($NEGO_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $NEGO_ID
	 * @return Response
	 */
	public function destroy($NEGO_ID)
	{
		parent::destroyModel($NEGO_ID);
	}
	
}
