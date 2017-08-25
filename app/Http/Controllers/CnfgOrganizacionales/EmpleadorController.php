<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Empleador;

class EmpleadorController extends Controller
{
	private $route = 'cnfg-organizacionales.empleadores';
	private $class = Empleador::class;

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:empleador-index', ['only' => ['index']]);
		$this->middleware('permission:empleador-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:empleador-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:empleador-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'EMPL_RAZONSOCIAL' => ['required', 'max:300', 'unique:EMPLEADORES,EMPL_RAZONSOCIAL,'.$id.',EMPL_ID'],
			'EMPL_NOMBRECOMERCIAL' => ['required', 'max:300', 'unique:EMPLEADORES,EMPL_NOMBRECOMERCIAL,'.$id.',EMPL_ID'],
			'EMPL_NIT' => ['required', 'max:15', 'unique:EMPLEADORES,EMPL_NIT,'.$id.',EMPL_ID'],
			'EMPL_DIRECCION' => ['required', 'max:300'],
			'EMPL_OBSERVACIONES' => ['max:300'],
			'EMPL_NOMBREREPRESENTANTE' => ['required','max:300'],
			'EMPL_CEDULAREPRESENTANTE' => ['required'],
			'CIUD_CEDULA' => ['required'],
			'CIUD_DOMICILIO' => ['required'],
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
		$empleadores = Empleador::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('empleadores'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrCiudades = model_to_array(Ciudad::class, 'CIUD_NOMBRE');

		return view($this->route.'.create', compact('arrCiudades'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		//dd(request()->all());
		parent::storeModel(Empleador::class, $this->route.'.index');
	}

	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($EMPL_ID)
	{
		// Se obtiene el registro
		$empleador = Empleador::findOrFail($EMPL_ID);

		$arrCiudades = model_to_array(Ciudad::class, 'CIUD_NOMBRE');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('empleador','arrCiudades'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($EMPL_ID)
	{
		parent::updateModel($EMPL_ID, $this->class, $this->route.'.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($EMPL_ID)
	{
		parent::destroyModel($EMPL_ID, $this->class, $this->route.'.index');
	}
	
}
