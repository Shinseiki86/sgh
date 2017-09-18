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
	protected $view  = 'cnfg-organizacionales';
	protected $route = 'turnos';
	protected $class = Riesgo::class;

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
			'TURN_HORAINICIO' => ['required'],
			'TURN_HORAFINAL' => ['required'],
			'TURN_CODIGO' => ['required','max:10'],
			'TURN_OBSERVACIONES' => ['max:300'],
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
		return view($this->view.'.'.$this->route.'.index', compact('turnos'));
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

		return view($this->view.'.'.$this->route.'.create', compact('arrEmpleadores'));
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
	public function edit(Turno $turno)
	{
		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->view.'.'.$this->route.'.edit', compact('turno','arrEmpleadores'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TURN_ID
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		parent::destroyModel($id);
	}
	
}
