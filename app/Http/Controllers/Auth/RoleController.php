<?php

namespace SGH\Http\Controllers\Auth;

use SGH\Http\Requests;
use Validator;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Models\Role;

class RoleController extends Controller
{
	protected $view = 'auth';
	protected $route = 'roles';
	protected $class = Role::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return  Validator::make($data, [
			'name'         => ['required','max:15','unique:roles,name,'.$id.',id'],
			'display_name' => ['required','max:50','unique:roles,display_name,'.$id.',id'],
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
		$roles = Role::all();
		//Se carga la vista y se pasan los registros
		return view($this->view.'.'.$this->route.'.index', compact('roles'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los Permission disponibles
		$arrPermisos = model_to_array(Permission::class, 'display_name');

		return view($this->view.'.'.$this->route.'.create', compact('arrPermisos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(['permissions'=>'permisos_ids']);
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
		$rol = Role::findOrFail($id);

		//Se crea un array con los Permission disponibles
		$arrPermisos = model_to_array(Permission::class, 'display_name');
		$permisos_ids = $rol->permissions->pluck('id')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->view.'.'.$this->route.'.edit', compact('rol', 'arrPermisos', 'permisos_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id, ['permissions'=>'permisos_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		parent::destroyModel($id);
	}
	
}
