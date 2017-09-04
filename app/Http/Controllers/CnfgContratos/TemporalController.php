<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\Models\Temporal;

class TemporalController extends Controller
{
	private $route = 'cnfg-contratos.temporales';
	private $class = Temporal::class;

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:temporales-index', ['only' => ['index']]);
		$this->middleware('permission:temporales-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:temporales-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:temporales-delete',   ['only' => ['destroy']]);
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
			'TEMP_RAZONSOCIAL' => ['required', 'max:300'],
			'TEMP_NOMBRECOMERCIAL' => ['required', 'max:300'],
			'TEMP_DIRECCION' => ['required', 'max:300'],
			'TEMP_OBSERVACIONES' => ['required', 'max:300'],
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
		$temporales = Temporal::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('temporales'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel($this->class, $this->route.'.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function edit($TEMP_ID)
	{
		// Se obtiene el registro
		$temporal = Temporal::findOrFail($TEMP_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('temporal'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function update($TEMP_ID)
	{
		parent::updateModel($TEMP_ID, $this->class, $this->route.'.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function destroy($TEMP_ID)
	{
		parent::destroyModel($TEMP_ID, $this->class, $this->route.'.index');
	}
	
}
