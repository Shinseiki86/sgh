<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Cargo;
use SGH\Cno;

class CargosController extends Controller
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
			'CARG_DESCRIPCION' => ['required', 'max:100'],
			'CNOS_ID' => ['required'],
			'CARG_OBSERVACIONES' => ['max:300'],
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
		$cargos = Cargo::all();
		//Se carga la vista y se pasan los registros
		return view('admin/cargos/index', compact('cargos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrCnos = model_to_array(Cno::class, 'CNOS_DESCRIPCION');

		return view('admin/cargos/create', compact('arrCnos'));
		
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
		$cargo = Cargo::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Cargo '.$cargo->CARG_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.cargos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function edit($CARG_ID)
	{
		// Se obtiene el registro
		$cargo = Cargo::findOrFail($CARG_ID);

		//Se crea un array con los CNOS disponibles
		$arrCnos = model_to_array(Cno::class, 'CNOS_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/cargos/edit', compact('cargo', 'arrCnos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function update($CARG_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$cargo = Cargo::findOrFail($CARG_ID);
		//y se actualiza con los datos recibidos.
		$cargo->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Cargo '.$cargo->CARG_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.cargos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function destroy($CARG_ID, $showMsg=True)
	{
		$cargo = Cargo::findOrFail($CARG_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cargo->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Cargo '.$cargo->CARG_ID.' no se puede borrar.', 'danger' );
		} else {
			$cargo->delete();
				flash_alert( 'Cargo '.$cargo->CARG_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.cargos.index');
	}
	
}
