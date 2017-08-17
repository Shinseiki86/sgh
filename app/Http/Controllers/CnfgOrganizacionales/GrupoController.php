<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Grupo;

class GrupoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:grupo-index', ['only' => ['index']]);
		$this->middleware('permission:grupo-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:grupo-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:grupo-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return Validator
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'GRUP_DESCRIPCION' => ['required', 'max:300', 'unique:GRUPOS,GRUP_DESCRIPCION,'.$id.',GRUP_ID'],
			'GRUP_OBSERVACIONES' => ['max:300'],
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
		$grupos = Grupo::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/grupos/index', compact('grupos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		return view('cnfg-organizacionales/grupos/create', compact('arrEmpleadores'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Grupo::class, 'cnfg-organizacionales.grupos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($EMPL_ID)
	{
		// Se obtiene el registro
		$grupo = Grupo::findOrFail($EMPL_ID);

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/grupos/edit', compact('grupo','arrEmpleadores'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($EMPL_ID)
	{
		parent::updateModel($EMPL_ID, Grupo::class, 'cnfg-organizacionales.grupos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($EMPL_ID, $showMsg=True)
	{
		$grupos = Grupo::findOrFail($EMPL_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($grupos->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Grupo '.$grupos->EMPL_ID.' no se puede borrar.', 'danger' );
		} else {
			$grupos->delete();
				flash_alert( 'Grupo '.$grupos->EMPL_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.grupos.index');
	}
	
}
