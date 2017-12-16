<?php

namespace SGH\Http\Controllers\CnfgContratos;

use SGH\Http\Controllers\Controller;

use SGH\Models\EmpleadoAtributo;
use SGH\Models\Contrato;
use SGH\Models\Prospecto;
use SGH\Models\Atributo;

class EmpleadoAtributoController extends Controller
{
	protected $route = 'cnfg-contratos.empleadoatributo';
	protected $class = EmpleadoAtributo::class;

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
		$empleadoatributos = EmpleadoAtributo::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('empleadoatributos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los atributos disponibles
		$arrAtributos = model_to_array(Atributo::class, 'ATRI_DESCRIPCION');

		$primaryKey = 'CONT_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA'
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::activos()->orderBy('CONTRATOS.'.$primaryKey)->select([ 'CONTRATOS.'.$primaryKey , $column ])->get();
		$arrContratos = $prospecto->pluck($columnName, $primaryKey)->toArray();


		return view($this->route.'.create', compact('arrAtributos','arrContratos'));
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
	 * @param  int  $EMAT_ID
	 * @return Response
	 */
	public function edit($EMAT_ID)
	{
		// Se obtiene el registro
		$empleadoatributo = EmpleadoAtributo::findOrFail($EMAT_ID);

		//Se crea un array con los atributos disponibles
		$arrAtributos = model_to_array(Atributo::class, 'ATRI_DESCRIPCION');

		$prospecto = Prospecto::activos()->orderBy('CONTRATOS.'.$primaryKey)->select([ 'CONTRATOS.'.$primaryKey , $column ])->get();
		$arrContratos = $prospecto->pluck($columnName, $primaryKey)->toArray();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('empleadoatributo','arrAtributos','arrContratos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMAT_ID
	 * @return Response
	 */
	public function update($EMAT_ID)
	{
		parent::updateModel($EMAT_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMAT_ID
	 * @return Response
	 */
	public function destroy($EMAT_ID)
	{
		parent::destroyModel($EMAT_ID);
	}
	
}
