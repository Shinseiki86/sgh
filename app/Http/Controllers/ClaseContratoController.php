<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\ClaseContrato;

class ClaseContratoController extends Controller
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
			'CLCO_DESCRIPCION' => ['required', 'max:100'],
			'CLCO_OBSERVACIONES' => ['max:300'],
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
		$clasescontratos = ClaseContrato::all();
		//Se carga la vista y se pasan los registros
		return view('admin/clasescontratos/index', compact('clasescontratos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/clasescontratos/create');
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
		$clasecontrato = ClaseContrato::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Clase de contrato '.$clasecontrato->CLCO_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.clasescontratos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CLCO_ID
	 * @return Response
	 */
	public function edit($CLCO_ID)
	{
		// Se obtiene el registro
		$clasecontrato = ClaseContrato::findOrFail($CLCO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/clasescontratos/edit', compact('clasecontrato'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CLCO_ID
	 * @return Response
	 */
	public function update($CLCO_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$cno = ClaseContrato::findOrFail($CLCO_ID);
		//y se actualiza con los datos recibidos.
		$cno->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Clase de contrato '.$cno->CLCO_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.clasescontratos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CLCO_ID
	 * @return Response
	 */
	public function destroy($CLCO_ID, $showMsg=True)
	{
		$clasecontrato = ClaseContrato::findOrFail($CLCO_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($clasecontrato->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Tiposcontrato '.$clasecontrato->CLCO_ID.' no se puede borrar.', 'danger' );
		} else {
			$clasecontrato->delete();
				flash_alert( 'Clase de contrato '.$clasecontrato->CLCO_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.clasescontratos.index');
	}
	
}
