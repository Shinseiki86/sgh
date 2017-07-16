<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Sancion;

class SancionController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tksancion-index', ['only' => ['index']]);
		$this->middleware('permission:tksancion-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tksancion-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tksancion-delete',   ['only' => ['destroy']]);
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
			'SANC_DESCRIPCION' => ['required', 'max:100'],
			'SANC_OBSERVACIONES' => ['max:300'],
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
		$sanciones = Sancion::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-tickets/sanciones/index', compact('sanciones'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-tickets/sanciones/create');
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
		$sancion = Sancion::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Sanción '.$sancion->SANC_ID.' creada exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.sanciones.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $SANC_ID
	 * @return Response
	 */
	public function edit($SANC_ID)
	{
		// Se obtiene el registro
		$sancion = Sancion::findOrFail($SANC_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/sanciones/edit', compact('sancion'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $SANC_ID
	 * @return Response
	 */
	public function update($SANC_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$sancion = Sancion::findOrFail($SANC_ID);
		//y se actualiza con los datos recibidos.
		$sancion->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Sanción '.$sancion->SANC_ID.' modificada exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.sanciones.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $SANC_ID
	 * @return Response
	 */
	public function destroy($SANC_ID, $showMsg=True)
	{
		$sancion = Sancion::findOrFail($SANC_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($sancion->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Sanción '.$sancion->SANC_ID.' no se puede borrar.', 'danger' );
		} else {
			$sancion->delete();
				flash_alert( 'Sanción '.$sancion->SANC_ID.' eliminada exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.sanciones.index');
	}
	
}
