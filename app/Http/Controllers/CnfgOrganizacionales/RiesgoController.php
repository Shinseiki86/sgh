<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Riesgo;

class RiesgoController extends Controller
{
	private $routeIndex = 'cnfg-organizacionales.riesgos.index';

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:riesgoarl-index', ['only' => ['index']]);
		$this->middleware('permission:riesgoarl-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:riesgoarl-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:riesgoarl-delete',   ['only' => ['destroy']]);
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
			'RIES_DESCRIPCION' => ['required', 'max:100', 'unique:RIESGOS,RIES_DESCRIPCION,'.$id.',RIES_ID'],
			'RIES_FACTOR' => ['required', 'numeric'],
			'RIES_OBSERVACIONES' => ['max:300'],
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
		$riesgos = Riesgo::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/riesgos/index', compact('riesgos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-organizacionales/riesgos/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Riesgo::class, $this->routeIndex);
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $RIES_ID
	 * @return Response
	 */
	public function edit($RIES_ID)
	{
		// Se obtiene el registro
		$riesgo = Riesgo::findOrFail($RIES_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/riesgos/edit', compact('riesgo'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $RIES_ID
	 * @return Response
	 */
	public function update($RIES_ID)
	{
		parent::updateModel($RIES_ID ,Riesgo::class, $this->routeIndex);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $RIES_ID
	 * @return Response
	 */
	public function destroy($RIES_ID)
	{
		parent::destroyModel($RIES_ID, Riesgo::class, $this->routeIndex);
	}
	
}
