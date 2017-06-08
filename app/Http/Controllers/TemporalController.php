<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Temporal;

class TemporalController extends Controller
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
			'TEMP_RAZONSOCIAL' => ['required', 'max:300'],
			'TEMP_NOMBRECOMERCIAL' => ['required', 'max:300'],
			'TEMP_DIRECCION' => ['required', 'max:300'],
			'TEMP_OBSERVACIONES' => ['required', 'max:300'],
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
		$temporales = Temporal::all();
		//Se carga la vista y se pasan los registros
		return view('admin/temporales/index', compact('temporales'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/temporales/create');
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
		$temporal = Temporal::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Temporal '.$temporal->TEMP_ID.' creada exitosamente.', 'success' );
		return redirect()->route('admin.temporales.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function edit($TEMP_ID)
	{
		// Se obtiene el registro
		$temporal = Temporal::findOrFail($TEMP_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/temporales/edit', compact('temporal'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function update($TEMP_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$temporal = Temporal::findOrFail($TEMP_ID);
		//y se actualiza con los datos recibidos.
		$temporal->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Temporal '.$temporal->TEMP_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.temporales.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function destroy($TEMP_ID, $showMsg=True)
	{
		$temporal = Temporal::findOrFail($TEMP_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($temporal->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$temporal->TEMP_ID.' no se puede borrar.', 'danger' );
		} else {
			$temporal->delete();
				flash_alert( 'Temporale '.$temporal->TEMP_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.temporales.index');
	}
	
}
