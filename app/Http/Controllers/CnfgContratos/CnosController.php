<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\Cnos;

class CnosController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:cnos-index', ['only' => ['index']]);
		$this->middleware('permission:cnos-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:cnos-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:cnos-delete',   ['only' => ['destroy']]);
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
			'CNOS_CODIGO' => ['required','numeric','unique:CNOS,CNOS_CODIGO,'.$id.',CNOS_ID'],
			'CNOS_DESCRIPCION' => ['required','max:300','unique:CNOS,CNOS_DESCRIPCION,'.$id.',CNOS_ID'],
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
		$cnos = Cnos::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-contratos/cnos/index', compact('cnos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-contratos/cnos/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Cnos::class, 'cnfg-contratos.cnos.index');
	}

	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CNOS_ID
	 * @return Response
	 */
	public function edit($CNOS_ID)
	{
		// Se obtiene el registro
		$cno = Cnos::findOrFail($CNOS_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-contratos/cnos/edit', compact('cno'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CNOS_ID
	 * @return Response
	 */
	public function update($CNOS_ID)
	{
		parent::updateModel($CNOS_ID, Cnos::class, 'cnfg-contratos.cnos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CNOS_ID
	 * @return Response
	 */
	public function destroy($CNOS_ID, $showMsg=True)
	{
		$cno = Cnos::findOrFail($CNOS_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cno->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Cno '.$cno->CNOS_ID.' no se puede borrar.', 'danger' );
		} else {
			$cno->delete();
				flash_alert( 'Cno '.$cno->CNOS_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-contratos.cnos.index');
	}
	
}
