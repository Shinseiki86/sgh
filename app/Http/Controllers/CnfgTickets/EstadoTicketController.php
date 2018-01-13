<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\EstadoTicket;

class EstadoTicketController extends Controller
{
	protected $route = 'cnfg-tickets.estadostickets';
	protected $class = EstadoTicket::class;

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
			'ESTI_DESCRIPCION' => ['required', 'max:100', 'unique:ESTADOSTICKETS,ESTI_DESCRIPCION,'.$id.',ESTI_ID'],
			'ESTI_COLOR' => ['required', 'max:100'],
			'ESTI_OBSERVACIONES' => ['max:300'],
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
		$estadostickets = EstadoTicket::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('estadostickets'));
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
	 * @param  int  $ESTI_ID
	 * @return Response
	 */
	public function edit($ESTI_ID)
	{
		// Se obtiene el registro
		$estadoticket = EstadoTicket::findOrFail($ESTI_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('estadoticket'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $ESTI_ID
	 * @return Response
	 */
	public function update($ESTI_ID)
	{
		parent::updateModel($ESTI_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $ESTI_ID
	 * @return Response
	 */
	public function destroy($ESTI_ID)
	{
		parent::destroyModel($ESTI_ID);
	}
	
}
