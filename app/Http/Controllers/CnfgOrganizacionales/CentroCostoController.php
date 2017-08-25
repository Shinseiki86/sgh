<?php
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use Validator;
use SGH\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\CentroCosto;
use SGH\Models\Gerencia;

class CentroCostoController extends Controller
{
	private $route = 'cnfg-organizacionales.centroscostos';
	private $class = CentroCosto::class;

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:ceco-index', ['only' => ['index']]);
		$this->middleware('permission:ceco-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:ceco-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:ceco-delete',   ['only' => ['destroy']]);
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
			'CECO_CODIGO'        => ['numeric', 'required', 'unique:CENTROSCOSTOS,CECO_CODIGO,'.$id.',CECO_ID'],//forma para validar un campo unique
			'CECO_DESCRIPCION'   => ['required', 'max:100'],
			'GERE_ID'            => ['required'],
			'CECO_OBSERVACIONES' => ['max:300'],
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
		$centroscostos = CentroCosto::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/centroscostos/index', compact('centroscostos'));
	}
	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');
		return view('cnfg-organizacionales/centroscostos/create', compact('arrGerencias'));
		
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
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function edit($CECO_ID)
	{
		// Se obtiene el registro
		$centrocosto = CentroCosto::findOrFail($CECO_ID);
		//Se crea un array con los CNOS disponibles
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');
		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/centroscostos/edit', compact('centrocosto', 'arrGerencias'));
	}
	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function update($CECO_ID)
	{
		parent::updateModel($CECO_ID, $this->class, $this->route.'.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CECO_ID
	 * @return Response
	 */
	public function destroy($CECO_ID)
	{
		parent::destroyModel($CECO_ID, $this->class, $this->route.'.index');
	}
	
}