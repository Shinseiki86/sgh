<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Cno;

class CnosController extends Controller
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
			'CNOS_CODIGO' => ['required', 'numeric'],
			'CNOS_DESCRIPCION' => ['required', 'max:300'],
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
		$cnos = Cno::all();
		//Se carga la vista y se pasan los registros
		return view('admin/cnos/index', compact('cnos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/cnos/create');
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
		$cno = Cno::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Cno '.$cno->CNOS_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.cnos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CNOS_ID
	 * @return Response
	 */
	public function edit($CNOS_ID)
	{
		// Se obtiene el registro
		$cno = Cno::findOrFail($CNOS_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/cnos/edit', compact('cno'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CNOS_ID
	 * @return Response
	 */
	public function update($CNOS_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$cno = Cno::findOrFail($CNOS_ID);
		//y se actualiza con los datos recibidos.
		$cno->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Cno '.$cno->CNOS_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.cnos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CNOS_ID
	 * @return Response
	 */
	public function destroy($CNOS_ID, $showMsg=True)
	{
		$cno = Cno::findOrFail($CNOS_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cno->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Cno '.$cno->CNOS_ID.' no se puede borrar.', 'danger' );
		} else {
			$cno->delete();
				flash_alert( 'Cno '.$cno->CNOS_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.cnos.index');
	}
	
}
