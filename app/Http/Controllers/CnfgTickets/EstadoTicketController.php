<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\EstadoTicket;

class EstadoTicketController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tkestados-index', ['only' => ['index']]);
		$this->middleware('permission:tkestados-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tkestados-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tkestados-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($request)
	{
		$validator = Validator::make($request->all(), [
			'ESTI_DESCRIPCION' => ['required', 'max:100'],
			'ESTI_COLOR' => ['required', 'max:100'],
			'ESTI_OBSERVACIONES' => ['max:300'],
		]);

		if ($validator->fails())
			return redirect()->back()
						->withErrors($validator)
						->withInput()->send();
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
		return view('cnfg-tickets/estados/index', compact('estadostickets'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-tickets/estados/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		//Se crea el registro.
		$estadoticket = EstadoTicket::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'EstadoTicket '.$estadoticket->ESTI_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.estadostickets.index');
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
		return view('cnfg-tickets/estados/edit', compact('estadoticket'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $ESTI_ID
	 * @return Response
	 */
	public function update($ESTI_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$estadoticket = EstadoTicket::findOrFail($ESTI_ID);
		//y se actualiza con los datos recibidos.
		$estadoticket->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'EstadoTicket '.$estadoticket->ESTI_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.estadostickets.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $ESTI_ID
	 * @return Response
	 */
	public function destroy($ESTI_ID, $showMsg=True)
	{
		$estadoticket = EstadoTicket::findOrFail($ESTI_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($estadoticket->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$estadoticket->ESTI_ID.' no se puede borrar.', 'danger' );
		} else {
			$estadoticket->delete();
				flash_alert( 'EstadoTicket '.$estadoticket->ESTI_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.estadostickets.index');
	}
	
}
