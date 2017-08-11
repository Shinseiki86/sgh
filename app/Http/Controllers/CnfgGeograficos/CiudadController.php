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

	private $routeIndex = 'cnfg-geograficos.ciudades.index';

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
	protected function validator($data, $id = 0)
	{
		return validator::make($data, [
			'CIUD_CODIGO' => ['required', 'numeric', 'unique:CIUDADES,CIUD_CODIGO,'.$id.',CIUD_CODIGO'],
			'CIUD_NOMBRE' => ['required', 'max:300', 'unique:CIUDADES,CIUD_NOMBRE,'.$id.',CIUD_CODIGO'],
		]);

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
		$arrDepartamentos = model_to_array(Departamento::class, 'DEPA_NOMBRE');

		return view('cnfg-geograficos/ciudades/create', compact('arrDepartamentos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Ciudad::class, $this->routeIndex);
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
		$arrDepartamentos = model_to_array(Departamento::class, 'DEPA_NOMBRE');

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
		parent::updateModel($CIUD_ID, Ciudad::class, $this->routeIndex);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CIUD_ID
	 * @return Response
	 */
	public function destroy($CIUD_ID, $showMsg=True)
	{
		parent::destroyModel($CIUD_ID, Ciudad::class, $this->routeIndex);
	}


}

