<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\TipoEmpleador;

class TipoEmpleadorController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tipoemple-index', ['only' => ['index']]);
		$this->middleware('permission:tipoemple-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tipoemple-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tipoemple-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id)
	{
		$validator = Validator::make($data, [
			'TIEM_DESCRIPCION' => ['required', 'max:100', 'unique:TIPOSEMPLEADORES,TIEM_DESCRIPCION,'.$id.',TIEM_ID'],
			'TIEM_OBSERVACIONES' => ['max:300'],
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
		$tiposempleadores = TipoEmpleador::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/tiposempleadores/index', compact('tiposempleadores'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-organizacionales/tiposempleadores/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(TipoEmpleador::class, 'cnfg-organizacionales.tiposempleadores.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function edit($TIEM_ID)
	{
		// Se obtiene el registro
		$tipoempleador = TipoEmpleador::findOrFail($TIEM_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/tiposempleadores/edit', compact('tipoempleador'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function update($TIEM_ID)
	{
		parent::updateModel($TIEM_ID, TipoEmpleador::class, 'cnfg-organizacionales.tiposempleadores.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TIEM_ID
	 * @return Response
	 */
	public function destroy($TIEM_ID, $showMsg=True)
	{
		$cno = TipoEmpleador::findOrFail($TIEM_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cno->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Tipo de empleador '.$cno->TIEM_ID.' no se puede borrar.', 'danger' );
		} else {
			$cno->delete();
				flash_alert( 'Tipo de empleador '.$cno->TIEM_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.tiposempleadores.index');
	}
	
}
