<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\TipoIncidente;

class TipoIncidenteController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tktpincidente-index', ['only' => ['index']]);
		$this->middleware('permission:tktpincidente-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tktpincidente-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tktpincidente-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		$validator = Validator::make($data, [
			'TIIN_DESCRIPCION' => ['required', 'max:100', 'unique:TIPOSINCIDENTES,TIIN_DESCRIPCION,'.$id.',TIIN_ID'],
			'TIIN_OBSERVACIONES' => ['max:300'],
		]);

		if ($validator->fails())
			return redirect()->back()
						->withErrors($validator)
						->withInput()->send();
	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$tiposincidentes = TipoIncidente::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-tickets/tiposincidentes/index', compact('tiposincidentes'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-tickets/tiposincidentes/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(TipoIncidente::class, 'cnfg-tickets.tiposincidentes.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TIIN_ID
	 * @return Response
	 */
	public function edit($TIIN_ID)
	{
		// Se obtiene el registro
		$tipoincidente = TipoIncidente::findOrFail($TIIN_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/tiposincidentes/edit', compact('tipoincidente'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TIIN_ID
	 * @return Response
	 */
	public function update($TIIN_ID)
	{
		parent::updateModel($TIIN_ID, TipoIncidente::class, 'cnfg-tickets.tiposincidentes.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TIIN_ID
	 * @return Response
	 */
	public function destroy($TIIN_ID, $showMsg=True)
	{
		$tipoincidente = TipoIncidente::findOrFail($TIIN_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($tipoincidente->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$tipoincidente->TIIN_ID.' no se puede borrar.', 'danger' );
		} else {
			$tipoincidente->delete();
				flash_alert( 'TipoIncidente '.$tipoincidente->TIIN_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.tiposincidentes.index');
	}
	
}
