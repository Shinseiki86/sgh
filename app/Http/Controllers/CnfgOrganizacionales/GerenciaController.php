<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Gerencia;
use SGH\Models\Empleador;

class GerenciaController extends Controller
{
	protected $route = 'cnfg-organizacionales.gerencias';
	protected $class = Gerencia::class;

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
	protected function validator($data, $GERE_ID = 0)
	{
		return Validator::make($data, [
			'GERE_DESCRIPCION' => ['required','max:100','unique:GERENCIAS,GERE_DESCRIPCION,'.$GERE_ID.',GERE_ID'],
			'GERE_OBSERVACIONES' => ['max:300'],
			'PROC_ids' => ['array'],
			'CECO_ids' => ['array'],
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
		$gerencias = Gerencia::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('gerencias'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		$arrCentrosCostos = model_to_array(CentroCosto::class, 'CECO_DESCRIPCION');

		//JSON con valores preseleccionados para el select múltiple
		$PROC_ids = json_encode([]);
		$CECO_ids = json_encode([]);

		return view($this->route.'.create', compact('arrEmpleadores', 'arrProcesos', 'arrCentrosCostos' ,'PROC_ids', 'CECO_ids'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(['procesos'=>'PROC_ids' , 'centroscostos'=>'CECO_ids']);
	}

	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function edit($GERE_ID)
	{
		// Se obtiene el registro
		$gerencia = Gerencia::findOrFail($GERE_ID);

		//Se crea un array con los CNOS disponibles
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		$arrCentrosCostos = model_to_array(CentroCosto::class, 'CECO_DESCRIPCION');

		//JSON con valores preseleccionados para el select múltiple
		$PROC_ids = $gerencia->procesos->pluck('PROC_ID')->toJson();
		$CECO_ids = $gerencia->centroscostos->pluck('CECO_ID')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('gerencia', 'arrEmpleadores', 'arrProcesos', 'arrCentrosCostos' ,'PROC_ids' , 'CECO_ids'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function update($GERE_ID)
	{
		parent::updateModel($GERE_ID, ['procesos'=>'PROC_ids' , 'centroscostos'=>'CECO_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function destroy($GERE_ID)
	{
		parent::destroyModel($GERE_ID);
	}
	
}
