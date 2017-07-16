<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Riesgo;

class RiesgoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:riesgoarl-index', ['only' => ['index']]);
		$this->middleware('permission:riesgoarl-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:riesgoarl-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:riesgoarl-delete',   ['only' => ['destroy']]);
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
			'RIES_DESCRIPCION' => ['required', 'max:100'],
			'RIES_FACTOR' => ['required', 'numeric'],
			'RIES_OBSERVACIONES' => ['max:300'],
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
		$riesgos = Riesgo::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/riesgos/index', compact('riesgos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-organizacionales/riesgos/create');
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
		$riesgo = Riesgo::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Riesgo '.$riesgo->RIES_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.riesgos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $RIES_ID
	 * @return Response
	 */
	public function edit($RIES_ID)
	{
		// Se obtiene el registro
		$riesgo = Riesgo::findOrFail($RIES_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/riesgos/edit', compact('riesgo'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $RIES_ID
	 * @return Response
	 */
	public function update($RIES_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$riesgo = Riesgo::findOrFail($RIES_ID);
		//y se actualiza con los datos recibidos.
		$riesgo->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Riesgo '.$riesgo->RIES_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.riesgos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $RIES_ID
	 * @return Response
	 */
	public function destroy($RIES_ID, $showMsg=True)
	{
		$riesgo = Riesgo::findOrFail($RIES_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($riesgo->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$riesgo->RIES_ID.' no se puede borrar.', 'danger' );
		} else {
			$riesgo->delete();
				flash_alert( 'Riesgo '.$riesgo->RIES_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.riesgos.index');
	}
	
}
