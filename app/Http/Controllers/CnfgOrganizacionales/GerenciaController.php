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
	private $route = 'cnfg-organizacionales.gerencias';
	private $class = Gerencia::class;

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:gerencia-index', ['only' => ['index']]);
		$this->middleware('permission:gerencia-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:gerencia-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:gerencia-delete',   ['only' => ['destroy']]);
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
			'EMPL_ID' => ['required'],
			'GERE_OBSERVACIONES' => ['max:300'],
			'PROC_ids' => ['array'],
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

		//JSON con valores preseleccionados para el select múltiple
		$PROC_ids = json_encode([]);

		return view($this->route.'.create', compact('arrEmpleadores', 'arrProcesos', 'PROC_ids'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel($this->class, $this->route.'.index', ['procesos'=>'PROC_ids']);
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

		//JSON con valores preseleccionados para el select múltiple
		$PROC_ids = $gerencia->procesos->pluck('PROC_ID')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('gerencia', 'arrEmpleadores', 'arrProcesos', 'PROC_ids'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function update($GERE_ID)
	{
		parent::updateModel($GERE_ID, $this->class, $this->route.'.index', ['procesos'=>'PROC_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function destroy($GERE_ID, $showMsg=True)
	{
		parent::destroyModel($GERE_ID, $this->class, $this->route.'.index');
	}
	
}
