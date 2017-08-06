<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Prioridad;

class PrioridadController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tkprioridad-index', ['only' => ['index']]);
		$this->middleware('permission:tkprioridad-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tkprioridad-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tkprioridad-delete',   ['only' => ['destroy']]);
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
			'PRIO_DESCRIPCION' => ['required', 'max:100', 'unique:PRIORIDADES,PRIO_DESCRIPCION,'.$id.',PRIO_ID'],
			'PRIO_COLOR' => ['required', 'max:100'],
			'PRIO_OBSERVACIONES' => ['max:300'],
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
		$prioridades = Prioridad::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-tickets/prioridades/index', compact('prioridades'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-tickets/prioridades/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Prioridad::class, 'cnfg-tickets.prioridades.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function edit($PRIO_ID)
	{
		// Se obtiene el registro
		$prioridad = Prioridad::findOrFail($PRIO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/prioridades/edit', compact('prioridad'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function update($PRIO_ID)
	{
		parent::updateModel($PRIO_ID, Prioridad::class, 'cnfg-tickets.prioridades.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PRIO_ID
	 * @return Response
	 */
	public function destroy($PRIO_ID, $showMsg=True)
	{
		$prioridad = Prioridad::findOrFail($PRIO_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($prioridad->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$prioridad->PRIO_ID.' no se puede borrar.', 'danger' );
		} else {
			$prioridad->delete();
				flash_alert( 'Prioridad '.$prioridad->PRIO_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.prioridades.index');
	}
	
}
