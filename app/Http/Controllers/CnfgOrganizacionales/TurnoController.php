<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Turno;

class TurnoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:turno-index', ['only' => ['index']]);
		$this->middleware('permission:turno-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:turno-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:turno-delete',   ['only' => ['destroy']]);
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
			'TURN_DESCRIPCION' => ['required', 'max:300', 'unique:TURNOS,TURN_DESCRIPCION,'.$id.',TURN_ID'],
			'TURN_CODIGO' => ['required','max:10'],
			'TURN_HORAINICIO' => ['required'],
			'TURN_HORAFINAL' => ['required'],
			'TURN_CODIGO' => ['required','max:10'],
			'TURN_OBSERVACIONES' => ['max:300'],
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
		$turnos = Turno::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/turnos/index', compact('turnos'));
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

		return view('cnfg-organizacionales/turnos/create', compact('arrEmpleadores'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Turno::class, 'cnfg-organizacionales.turnos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TURN_ID
	 * @return Response
	 */
	public function edit($TURN_ID)
	{
		// Se obtiene el registro
		$turno = Turno::findOrFail($TURN_ID);

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/turnos/edit', compact('turno','arrEmpleadores'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TURN_ID
	 * @return Response
	 */
	public function update($TURN_ID)
	{
		parent::updateModel($TURN_ID, Turno::class, 'cnfg-organizacionales.turnos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TURN_ID
	 * @return Response
	 */
	public function destroy($TURN_ID, $showMsg=True)
	{
		$turnos = Turno::findOrFail($TURN_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($turnos->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Turno '.$turnos->TURN_ID.' no se puede borrar.', 'danger' );
		} else {
			$turnos->delete();
				flash_alert( 'Turno '.$turnos->TURN_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.turnos.index');
	}
	
}
