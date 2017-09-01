<?php

namespace SGH\Http\Controllers\Auth;

use SGH\Http\Requests;
use Validator;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Models\Permission;

class PermissionController extends Controller
{
	private $route = 'auth.permisos';
	private $class = Permission::class;

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:permisos-index', ['only' => ['index']]);
		$this->middleware('permission:permisos-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:permisos-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:permisos-delete',   ['only' => ['destroy']]);
	}


	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'name'         => ['required','max:15','unique:permissions,name,'.$id.',id'],
			'display_name' => ['required','max:50','unique:permissions,display_name,'.$id.',id'],
			'description'  => ['required','max:100'],
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
		$permisos = Permission::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('permisos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los Role disponibles
		$arrRoles = model_to_array(Role::class, 'display_name');

		return view($this->route.'.create', compact('arrRoles'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Permission::class, $this->route.'.index', ['roles'=>'roles_ids']);
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Se obtiene el registro
		$permiso = Permission::findOrFail($id);

		//Se crea un array con los Role disponibles
		$arrRoles = model_to_array(Role::class, 'display_name');
		$roles_ids = $permiso->roles->pluck('id')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('permiso', 'arrRoles', 'roles_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id, Permission::class, $this->route.'.index', ['roles'=>'roles_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, $showMsg=True)
	{
		parent::destroyModel($id, $this->class, $this->route.'.index');
	}
	
}
