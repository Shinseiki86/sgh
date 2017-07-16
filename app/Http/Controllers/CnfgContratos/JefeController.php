<?php

namespace SGH\Http\Controllers\CnfgContratos;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Prospecto;
use SGH\Jefe;

use Carbon\Carbon;

class JefeController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:jefe-index', ['only' => ['index']]);
		$this->middleware('permission:jefe-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:jefe-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:jefe-delete',   ['only' => ['destroy']]);
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
			'PROS_ID' => ['required'],
			'JEFE_OBSERVACIONES' => ['max:300'],
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
		$jefes = Jefe::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-contratos/jefes/index', compact('jefes'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$primaryKey = 'PROS_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::activos()->orderBy('PROSPECTOS.'.$primaryKey)->select([ 'PROSPECTOS.'.$primaryKey , $column ])->get();
		$arrJefes = $prospecto->pluck($columnName, $primaryKey)->toArray();

		return view('cnfg-contratos/jefes/create', compact('arrJefes'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Jefe::class, 'cnfg-contratos.jefes.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $JEFE_ID
	 * @return Response
	 */
	public function edit($JEFE_ID)
	{
		// Se obtiene el registro
		$jefe = Jefe::findOrFail($JEFE_ID);

		$primaryKey = 'PROS_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::activos()->orderBy('PROSPECTOS.'.$primaryKey)->select([ 'PROSPECTOS.'.$primaryKey , $column ])->get();
		$arrJefes = $prospecto->pluck($columnName, $primaryKey)->toArray();

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-contratos/jefes/edit', compact('jefe', 'arrJefes'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $JEFE_ID
	 * @return Response
	 */
	public function update($JEFE_ID)
	{
		parent::updateModel($JEFE_ID, Jefe::class, 'cnfg-contratos.jefes.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $JEFE_ID
	 * @return Response
	 */
	public function destroy($JEFE_ID, $showMsg=True)
	{
		$jefes = Jefe::findOrFail($JEFE_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($jefes->JEFE_creadopor == 'SYSTEM'){
			flash_modal( 'Jefe '.nombre_empleado($jefes->PROS_ID).' no se puede borrar.', 'danger' );
		} else {
			$jefes->delete();
			flash_alert( 'Jefe '. nombre_empleado($jefes->PROS_ID) .' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-contratos.jefes.index');
	}
	
}
