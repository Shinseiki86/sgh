<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Sancion;

class SancionController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tksancion-index', ['only' => ['index']]);
		$this->middleware('permission:tksancion-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tksancion-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tksancion-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($request->all(), [
			'SANC_DESCRIPCION' => ['required', 'max:100', 'unique:SANCIONES,SANC_DESCRIPCION,'.$id.',SANC_ID'],
			'SANC_OBSERVACIONES' => ['max:300'],
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
		$sanciones = Sancion::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-tickets/sanciones/index', compact('sanciones'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-tickets/sanciones/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Sancion::class, 'cnfg-tickets.sanciones.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $SANC_ID
	 * @return Response
	 */
	public function edit($SANC_ID)
	{
		// Se obtiene el registro
		$sancion = Sancion::findOrFail($SANC_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/sanciones/edit', compact('sancion'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $SANC_ID
	 * @return Response
	 */
	public function update($SANC_ID)
	{
		parent::updateModel($SANC_ID, Sancion::class, 'cnfg-tickets.sanciones.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $SANC_ID
	 * @return Response
	 */
	public function destroy($SANC_ID, $showMsg=True)
	{
		$sancion = Sancion::findOrFail($SANC_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($sancion->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Sanción '.$sancion->SANC_ID.' no se puede borrar.', 'danger' );
		} else {
			$sancion->delete();
				flash_alert( 'Sanción '.$sancion->SANC_ID.' eliminada exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.sanciones.index');
	}
	
}
