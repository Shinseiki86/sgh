<?php

namespace SGH\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Departamento;

class DepartamentoController extends Controller
{
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
			'DEPA_CODIGO' => ['required', 'numeric'],
			'DEPA_DESCRIPCION' => ['required', 'max:300'],
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
		$departamentos = Departamento::sortable('DEPA_CODIGO')->paginate();
		//Se carga la vista y se pasan los registros
		return view('admin/departamentos/index', compact('departamentos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/departamentos/create');
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
		$departamento = Departamento::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Departamento '.$departamento->DEPA_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.departamentos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function edit($DEPA_ID)
	{
		// Se obtiene el registro
		$departamento = Departamento::findOrFail($DEPA_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/departamentos/edit', compact('departamento'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function update($DEPA_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$departamento = Departamento::findOrFail($DEPA_ID);
		//y se actualiza con los datos recibidos.
		$departamento->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Departamento '.$departamento->DEPA_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.departamentos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function destroy($DEPA_ID, $showMsg=True)
	{
		$departamento = Departamento::findOrFail($DEPA_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($departamento->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Departamento '.$departamento->DEPA_ID.' no se puede borrar.', 'danger' );
		} else {
			$departamento->delete();
				flash_alert( 'Departamento '.$departamento->DEPA_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.departamentos.index');
	}


}

