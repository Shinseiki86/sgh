<?php

namespace SGH\Http\Controllers\CnfgCasosMedicos;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\CasoMedico;
use SGH\Models\DiagnosticoGeneral;
use SGH\Models\Contrato;
use SGH\Models\Prospecto;

class CasoMedicoController extends Controller
{
	protected $route = 'cnfg-casosmedicos.casosmedicos';
	protected $class = CasoMedico::class;

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
		$casosmedicos = CasoMedico::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('casosmedicos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los diagnosticos generales
		$arrDiagnosticos = model_to_array(DiagnosticoGeneral::class, 'DIGE_DESCRIPCION');

		//Se crea un array con los estados de restricción
		$arrEstadosres = model_to_array(EstadoRestriccion::class, 'ESRE_DESCRIPCION');

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

		return view($this->route.'.create', compact('arrDiagnosticos','arrEstadosres','arrContratos'));
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
	 * @param  int  $CAME_ID
	 * @return Response
	 */
	public function edit($CAME_ID)
	{
		// Se obtiene el registro
		$casomedico = CasoMedico::findOrFail($CAME_ID);

		//Se crea un array con los diagnosticos generales
		$arrDiagnosticos = model_to_array(DiagnosticoGeneral::class, 'DIGE_DESCRIPCION');

		//Se crea un array con los estados de restricción
		$arrEstadosres = model_to_array(EstadoRestriccion::class, 'ESRE_DESCRIPCION');

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

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('casomedico','arrDiagnosticos','arrEstadosres','arrContratos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CAME_ID
	 * @return Response
	 */
	public function update($CAME_ID)
	{
		parent::updateModel($CAME_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CAME_ID
	 * @return Response
	 */
	public function destroy($CAME_ID)
	{
		parent::destroyModel($CAME_ID);
	}
	
}
