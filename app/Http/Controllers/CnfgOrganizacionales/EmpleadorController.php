<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Empleador;

class EmpleadorController extends Controller
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
			'EMPL_RAZONSOCIAL' => ['required', 'max:300'],
			'EMPL_NOMBRECOMERCIAL' => ['required', 'max:300'],
			'EMPL_DIRECCION' => ['required', 'max:300'],
			'EMPL_OBSERVACIONES' => ['required', 'max:300'],
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
		$empleadores = Empleador::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/empleadores/index', compact('empleadores'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-organizacionales/empleadores/create');
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
		$empleador = Empleador::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Empleador '.$empleador->EMPL_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.empleadores.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($EMPL_ID)
	{
		// Se obtiene el registro
		$empleador = Empleador::findOrFail($EMPL_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/empleadores/edit', compact('empleador'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($EMPL_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$empleador = Empleador::findOrFail($EMPL_ID);
		//y se actualiza con los datos recibidos.
		$empleador->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Empleador '.$empleador->EMPL_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.empleadores.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($EMPL_ID, $showMsg=True)
	{
		$empleador = Empleador::findOrFail($EMPL_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($empleador->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$empleador->EMPL_ID.' no se puede borrar.', 'danger' );
		} else {
			$empleador->delete();
				flash_alert( 'Empleador '.$empleador->EMPL_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.empleadores.index');
	}
	
}
