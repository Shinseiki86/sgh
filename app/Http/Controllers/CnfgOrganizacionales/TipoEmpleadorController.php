<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\TipoEmpleador;

class TipoEmpleadorController extends Controller
{
	private $route = 'cnfg-organizacionales.tiposempleadores';
	private $class = Riesgo::class;

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tiposempleadores-index', ['only' => ['index']]);
		$this->middleware('permission:tiposempleadores-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tiposempleadores-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tiposempleadores-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id)
	{
		return Validator::make($data, [
			'TIEM_DESCRIPCION' => ['required', 'max:100', 'unique:TIPOSEMPLEADORES,TIEM_DESCRIPCION,'.$id.',TIEM_ID'],
			'TIEM_OBSERVACIONES' => ['max:300'],
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
		$tiposempleadores = TipoEmpleador::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('tiposempleadores'));
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
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function edit($TIEM_ID)
	{
		// Se obtiene el registro
		$tipoempleador = TipoEmpleador::findOrFail($TIEM_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('tipoempleador'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function update($TIEM_ID)
	{
		parent::updateModel($TIEM_ID, $this->class, $this->route.'.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function destroy($TIEM_ID)
	{
		parent::destroyModel($TIEM_ID, $this->class, $this->route.'.index');
	}
	
}
