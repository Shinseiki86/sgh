<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Prioridad;

class PrioridadController extends Controller
{
    //

    public function __construct()
	{
		$this->middleware('auth');
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
			'PRIO_DESCRIPCION' => ['required', 'max:100'],
			'PRIO_COLOR' => ['required', 'max:100'],
			'PRIO_OBSERVACIONES' => ['max:300'],
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
		$prioridades = Prioridad::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-tickets/prioridades/index', compact('prioridades'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-tickets/prioridades/create');
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
		$prioridad = Prioridad::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Prioridad '.$prioridad->PRIO_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.prioridades.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function edit($PRIO_ID)
	{
		// Se obtiene el registro
		$prioridad = Prioridad::findOrFail($PRIO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/prioridades/edit', compact('prioridad'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function update($PRIO_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$prioridad = Prioridad::findOrFail($PRIO_ID);
		//y se actualiza con los datos recibidos.
		$prioridad->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Prioridad '.$prioridad->PRIO_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.prioridades.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function destroy($PRIO_ID, $showMsg=True)
	{
		$prioridad = Prioridad::findOrFail($PRIO_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($prioridad->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$prioridad->PRIO_ID.' no se puede borrar.', 'danger' );
		} else {
			$prioridad->delete();
				flash_alert( 'Prioridad '.$prioridad->PRIO_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.prioridades.index');
	}
	
}