<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Tiposcontrato;

class TiposcontratosController extends Controller
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
			'TICO_DESCRIPCION' => ['required', 'max:100'],
			'TICO_OBSERVACIONES' => ['max:300'],
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
		$tiposcontratos = Tiposcontrato::sortable('TICO_CODIGO')->paginate();
		//Se carga la vista y se pasan los registros
		return view('admin/tiposcontratos/index', compact('tiposcontratos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/tiposcontratos/create');
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
		$cno = Tiposcontrato::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Tipo de contrato '.$cno->TICO_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.tiposcontratos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TICO_ID
	 * @return Response
	 */
	public function edit($TICO_ID)
	{
		// Se obtiene el registro
		$tiposcontrato = Tiposcontrato::findOrFail($TICO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/tiposcontratos/edit', compact('tiposcontrato'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TICO_ID
	 * @return Response
	 */
	public function update($TICO_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$cno = Tiposcontrato::findOrFail($TICO_ID);
		//y se actualiza con los datos recibidos.
		$cno->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Tiposcontrato '.$cno->TICO_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.tiposcontratos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TICO_ID
	 * @return Response
	 */
	public function destroy($TICO_ID, $showMsg=True)
	{
		$cno = Tiposcontrato::findOrFail($TICO_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cno->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Tiposcontrato '.$cno->TICO_ID.' no se puede borrar.', 'danger' );
		} else {
			$cno->delete();
				flash_alert( 'Tiposcontrato '.$cno->TICO_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.tiposcontratos.index');
	}
	
}
