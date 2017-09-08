<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Proceso;

class ProcesoController extends Controller
{
	protected $route = 'cnfg-organizacionales.procesos';
	protected $class = Proceso::class;

	public function __construct()
	{
		parent::__construct();
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
			'PROC_DESCRIPCION' => ['required','max:100','unique:PROCESOS,PROC_DESCRIPCION,'.$id.',PROC_ID'],
			'PROC_OBSERVACIONES' => ['max:300'],
			'GERE_ids' => ['array'],
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
		$procesos = Proceso::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('procesos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		return view($this->route.'.create', compact('arrGerencias'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(['gerencias'=>'GERE_ids']);
	}

	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $PROC_ID
	 * @return Response
	 */
	public function edit($PROC_ID)
	{
		// Se obtiene el registro
		$proceso = Proceso::findOrFail($PROC_ID);

		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		$GERE_ids = $proceso->gerencias->pluck('GERE_ID')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('proceso', 'arrGerencias', 'GERE_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PROC_ID
	 * @return Response
	 */
	public function update($PROC_ID)
	{
		dump(request()->all());
		parent::updateModel($PROC_ID, ['gerencias'=>'GERE_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PROC_ID
	 * @return Response
	 */
	public function destroy($PROC_ID)
	{
		parent::destroyModel($PROC_ID);
	}
	
}
