<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Gerencia;
use SGH\Empleadore;

class GerenciasController extends Controller
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
			'GERE_DESCRIPCION' => ['required', 'max:100'],
			'EMPL_ID' => ['required'],
			'GERE_OBSERVACIONES' => ['max:300'],
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
		$gerencias = Gerencia::sortable('GERE_DESCRIPCION')->paginate();
		//Se carga la vista y se pasan los registros
		return view('admin/gerencias/index', compact('gerencias'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrEmpleadores = model_to_array(Empleadore::class, 'EMPL_RAZONSOCIAL');

		return view('admin/gerencias/create', compact('arrEmpleadores'));
		
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
		$cargo = Gerencia::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Gerencia '.$cargo->GERE_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.gerencias.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function edit($GERE_ID)
	{
		// Se obtiene el registro
		$gerencia = Gerencia::findOrFail($GERE_ID);

		//Se crea un array con los CNOS disponibles
		$arrEmpleadores = model_to_array(Empleadore::class, 'EMPL_RAZONSOCIAL');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/gerencias/edit', compact('gerencia', 'arrEmpleadores'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function update($GERE_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$cargo = Gerencia::findOrFail($GERE_ID);
		//y se actualiza con los datos recibidos.
		$cargo->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Gerencia '.$cargo->GERE_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.gerencias.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function destroy($GERE_ID, $showMsg=True)
	{
		$cargo = Gerencia::findOrFail($GERE_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cargo->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Gerencia '.$cargo->GERE_ID.' no se puede borrar.', 'danger' );
		} else {
			$cargo->delete();
				flash_alert( 'Gerencia '.$cargo->GERE_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.gerencias.index');
	}
	
}
