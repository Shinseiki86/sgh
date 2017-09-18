<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\EstadoAprobacion;

class EstadoAprobacionController extends Controller
{
	protected $view = 'cnfg-tickets';
	protected $route = 'estadosaprobaciones';
	protected $class = EstadoAprobacion::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'ESAP_DESCRIPCION' => ['required', 'max:100', 'unique:ESTADOSAPROBACIONES,ESAP_DESCRIPCION,'.$id.',ESAP_ID'],
			'ESAP_COLOR' => ['required', 'max:100'],
			'ESAP_OBSERVACIONES' => ['max:300'],
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
		$estadosaprobaciones = EstadoAprobacion::all();
		//Se carga la vista y se pasan los registros
		return view($this->view.'.'.$this->route.'.index', compact('estadosaprobaciones'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->view.'.'.$this->route.'.create');
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
	 * @param  int|EstadoAprobacion  $estadoaprobacion
	 * @return Response
	 */
	public function edit(EstadoAprobacion $estadoaprobacion)
	{
		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->view.'.'.$this->route.'.edit', compact('estadoaprobacion'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
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
