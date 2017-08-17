<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\Models\Cnos;
use SGH\Models\Cargo;

class CargoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:cargo-index', ['only' => ['index']]);
		$this->middleware('permission:cargo-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:cargo-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:cargo-delete',   ['only' => ['destroy']]);
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
			'CARG_DESCRIPCION' => ['required','max:100','unique:CARGOS,CARG_DESCRIPCION,'.$id.',CARG_ID'],
			'CNOS_ID' => ['required'],
			'CARG_OBSERVACIONES' => ['max:300'],
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
		$cargos = Cargo::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-contratos/cargos/index', compact('cargos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrCnos = model_to_array(Cnos::class, 'CNOS_DESCRIPCION');

		return view('cnfg-contratos/cargos/create', compact('arrCnos'));
		
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Cargo::class, 'cnfg-contratos.cargos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function edit($CARG_ID)
	{
		// Se obtiene el registro
		$cargo = Cargo::findOrFail($CARG_ID);

		//Se crea un array con los CNOS disponibles
		$arrCnos = model_to_array(Cnos::class, 'CNOS_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-contratos/cargos/edit', compact('cargo', 'arrCnos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function update($CARG_ID)
	{
		parent::updateModel($CARG_ID, Cargo::class, 'cnfg-contratos.cargos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CARG_ID
	 * @return Response
	 */
	public function destroy($CARG_ID, $showMsg=True)
	{
		$cargo = Cargo::findOrFail($CARG_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cargo->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Cargo '.$cargo->CARG_ID.' no se puede borrar.', 'danger' );
		} else {
			$cargo->delete();
				flash_alert( 'Cargo '.$cargo->CARG_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-contratos.cargos.index');
	}
	
}
