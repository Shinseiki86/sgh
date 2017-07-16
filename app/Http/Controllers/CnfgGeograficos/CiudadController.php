<?php

namespace SGH\Http\Controllers\CnfgGeograficos;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Ciudad;
use SGH\Departamento;

class CiudadController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:ciudad-index', ['only' => ['index']]);
		$this->middleware('permission:ciudad-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:ciudad-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:ciudad-delete',   ['only' => ['destroy']]);
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
			'CIUD_CODIGO' => ['required', 'numeric'],
			'CIUD_DESCRIPCION' => ['required', 'max:300'],
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
		$ciudades = Ciudad::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-geograficos/ciudades/index', compact('ciudades'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los departamentos disponibles
		$arrDepartamentos = model_to_array(Departamento::class, 'DEPA_DESCRIPCION');

		return view('cnfg-geograficos/ciudades/create', compact('arrDepartamentos'));
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
		$ciudad = Ciudad::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Ciudad '.$ciudad->CIUD_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-geograficos.ciudades.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CIUD_ID
	 * @return Response
	 */
	public function edit($CIUD_ID)
	{
		// Se obtiene el registro
		$ciudad = Ciudad::findOrFail($CIUD_ID);

		//Se crea un array con los departamentos disponibles
		$arrDepartamentos = model_to_array(Departamento::class, 'DEPA_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-geograficos/ciudades/edit', compact('ciudad', 'arrDepartamentos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CIUD_ID
	 * @return Response
	 */
	public function update($CIUD_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$ciudad = Ciudad::findOrFail($CIUD_ID);
		//y se actualiza con los datos recibidos.
		$ciudad->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Ciudad '.$ciudad->CIUD_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('cnfg-geograficos.ciudades.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CIUD_ID
	 * @return Response
	 */
	public function destroy($CIUD_ID, $showMsg=True)
	{
		$ciudad = Ciudad::findOrFail($CIUD_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($ciudad->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Ciudad '.$ciudad->CIUD_ID.' no se puede borrar.', 'danger' );
		} else {
			$ciudad->delete();
				flash_alert( 'Ciudad '.$ciudad->CIUD_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-geograficos.ciudades.index');
	}


}

