<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Centroscosto;
use SGH\Gerencia;

class CentroscostosController extends Controller
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
			'CECO_CODIGO' => ['required', 'unique:CENTROSCOSTOS'], //forma para validar un campo unique
			'CECO_DESCRIPCION' => ['required', 'max:100'],
			'GERE_ID' => ['required'],
			'CECO_OBSERVACIONES' => ['max:300'],
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
		$centroscostos = Centroscosto::sortable('CECO_DESCRIPCION')->paginate();
		//Se carga la vista y se pasan los registros
		return view('admin/centroscostos/index', compact('centroscostos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		return view('admin/centroscostos/create', compact('arrGerencias'));
		
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
		$centrocosto = Centroscosto::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Centro de costo '.$centrocosto->CECO_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.centroscostos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function edit($CECO_ID)
	{
		// Se obtiene el registro
		$centrocosto = Centroscosto::findOrFail($CECO_ID);

		//Se crea un array con los CNOS disponibles
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/centroscostos/edit', compact('centrocosto', 'arrGerencias'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function update($CECO_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$centrocosto = Centroscosto::findOrFail($CECO_ID);
		//y se actualiza con los datos recibidos.
		$centrocosto->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Centro de costo '.$centrocosto->CECO_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.centroscostos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function destroy($CECO_ID, $showMsg=True)
	{
		$centrocosto = Centroscosto::findOrFail($CECO_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($centrocosto->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Centro de costo '.$centrocosto->CECO_ID.' no se puede borrar.', 'danger' );
		} else {
			$centrocosto->delete();
				flash_alert( 'Centro de costo '.$centrocosto->CECO_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.centroscostos.index');
	}
	
}
