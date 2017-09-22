<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Turno;

class TurnoController extends Controller
{
	protected $route = 'cnfg-organizacionales.turnos';
	protected $class = Turno::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return Validator
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'TURN_DESCRIPCION' => ['required', 'max:300', 'unique:TURNOS,TURN_DESCRIPCION,'.$id.',TURN_ID'],
			'TURN_CODIGO' => ['required','max:10'],
			'TURN_HORAINICIOPI' => ['required'],
			'TURN_HORAFINALPI' => ['required'],
			//'TURN_HORAINICIOSI' => ['required'],
			//'TURN_HORAFINALSI' => ['required'],
			'TURN_CODIGO' => ['required','max:10'],
			'TURN_OBSERVACIONES' => ['max:300'],
			'TURN_TIPOTURNO' => ['max:20'],
		]);
	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$turnos = Turno::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('turnos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		$arrTipoTurnos = array(
			'OPERATIVO' => 'OPERATIVO',
			'ADMINISTRATIVO' => 'ADMINISTRATIVO'
		);

		return view($this->route.'.create', compact('arrEmpleadores','arrTipoTurnos'));
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
	 * @param  int  $TURN_ID
	 * @return Response
	 */
	public function edit($TURN_ID)
	{
		// Se obtiene el registro
		$turno = Turno::findOrFail($TURN_ID);

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		$arrTipoTurnos = array(
			'OPERATIVO' => 'OPERATIVO',
			'ADMINISTRATIVO' => 'ADMINISTRATIVO'
		);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('turno','arrEmpleadores','arrTipoTurnos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TURN_ID
	 * @return Response
	 */
	public function update($TURN_ID)
	{
		parent::updateModel($TURN_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TURN_ID
	 * @return Response
	 */
	public function destroy($TURN_ID)
	{
		parent::destroyModel($TURN_ID);
	}
	
}
