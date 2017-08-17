<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\Models\Temporal;

class TemporalController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:emprtemp-index', ['only' => ['index']]);
		$this->middleware('permission:emprtemp-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:emprtemp-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:emprtemp-delete',   ['only' => ['destroy']]);
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
			'TEMP_RAZONSOCIAL' => ['required', 'max:300'],
			'TEMP_NOMBRECOMERCIAL' => ['required', 'max:300'],
			'TEMP_DIRECCION' => ['required', 'max:300'],
			'TEMP_OBSERVACIONES' => ['required', 'max:300'],
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
		$temporales = Temporal::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-contratos/temporales/index', compact('temporales'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-contratos/temporales/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Temporal::class, 'cnfg-contratos.temporales.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function edit($TEMP_ID)
	{
		// Se obtiene el registro
		$temporal = Temporal::findOrFail($TEMP_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-contratos/temporales/edit', compact('temporal'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function update($TEMP_ID)
	{
		parent::updateModel($TEMP_ID, Temporal::class, 'cnfg-contratos.temporales.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function destroy($TEMP_ID, $showMsg=True)
	{
		$temporal = Temporal::findOrFail($TEMP_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($temporal->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$temporal->TEMP_ID.' no se puede borrar.', 'danger' );
		} else {
			$temporal->delete();
				flash_alert( 'Temporale '.$temporal->TEMP_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-contratos.temporales.index');
	}
	
}
