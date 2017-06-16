<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\TipoEmpleador;

class TipoEmpleadorController extends Controller
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
			'TIEM_DESCRIPCION' => ['required', 'max:100'],
			'TIEM_OBSERVACIONES' => ['max:300'],
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
		$tiposempleadores = TipoEmpleador::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/tiposempleadores/index', compact('tiposempleadores'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-organizacionales/tiposempleadores/create');
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
		$cno = TipoEmpleador::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Tipo de empleador '.$cno->TIEM_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.tiposempleadores.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function edit($TIEM_ID)
	{
		// Se obtiene el registro
		$tipoempleador = TipoEmpleador::findOrFail($TIEM_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/tiposempleadores/edit', compact('tipoempleador'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function update($TIEM_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$cno = TipoEmpleador::findOrFail($TIEM_ID);
		//y se actualiza con los datos recibidos.
		$cno->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Tipo de empleador '.$cno->TIEM_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.tiposempleadores.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function destroy($TIEM_ID, $showMsg=True)
	{
		$cno = TipoEmpleador::findOrFail($TIEM_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cno->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Tipo de empleador '.$cno->TIEM_ID.' no se puede borrar.', 'danger' );
		} else {
			$cno->delete();
				flash_alert( 'Tipo de empleador '.$cno->TIEM_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.tiposempleadores.index');
	}
	
}
