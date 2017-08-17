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
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:permiso-index', ['only' => ['index']]);
		$this->middleware('permission:permiso-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:permiso-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:permiso-delete',   ['only' => ['destroy']]);
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
		return view('auth/permisos/index', compact('permisos'));
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

		return view('auth/permisos/create', compact('arrRoles'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Permission::class, 'auth.permisos.index', ['roles_ids'=>'roles']);
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
		return view('auth/permisos/edit', compact('permiso', 'arrRoles', 'roles_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id, Permission::class, 'auth.permisos.index', ['roles_ids'=>'roles']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, $showMsg=True)
	{
		$permiso = Permission::findOrFail($id);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($permiso->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Permiso "'.$permiso->display_name.'" no se puede borrar.', 'danger' );
		} else {
			$permiso->delete();
				flash_alert( 'Permiso "'.$permiso->display_name.'" eliminado exitosamente.', 'success' );
		}

		return redirect()->route('auth.permisos.index');
	}
	
}
