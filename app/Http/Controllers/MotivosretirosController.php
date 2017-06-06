<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Motivosretiro;

class MotivosretirosController extends Controller
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
			'MORE_DESCRIPCION' => ['required', 'max:100'],
			'MORE_OBSERVACIONES' => ['max:300'],
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
		$motivosretiros = Motivosretiro::sortable('MORE_CODIGO')->paginate();
		//Se carga la vista y se pasan los registros
		return view('admin/motivosretiros/index', compact('motivosretiros'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/motivosretiros/create');
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
		$motivoretiro = Motivosretiro::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Motivo de retiro '.$motivoretiro->MORE_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.motivosretiros.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $MORE_ID
	 * @return Response
	 */
	public function edit($MORE_ID)
	{
		// Se obtiene el registro
		$motivoretiro = Motivosretiro::findOrFail($MORE_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/motivosretiros/edit', compact('motivoretiro'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $MORE_ID
	 * @return Response
	 */
	public function update($MORE_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$motivoretiro = Motivosretiro::findOrFail($MORE_ID);
		//y se actualiza con los datos recibidos.
		$motivoretiro->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Motivo de retiro '.$motivoretiro->MORE_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.motivosretiros.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $MORE_ID
	 * @return Response
	 */
	public function destroy($MORE_ID, $showMsg=True)
	{
		$motivoretiro = Motivosretiro::findOrFail($MORE_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($motivoretiro->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Motivosretiro '.$motivoretiro->MORE_ID.' no se puede borrar.', 'danger' );
		} else {
			$motivoretiro->delete();
				flash_alert( 'Motivosretiro '.$motivoretiro->MORE_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.motivosretiros.index');
	}
	
}
