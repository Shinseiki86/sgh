<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\TipoContrato;

class TipoContratoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tipocontrato-index', ['only' => ['index']]);
		$this->middleware('permission:tipocontrato-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tipocontrato-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tipocontrato-delete',   ['only' => ['destroy']]);
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
			'TICO_DESCRIPCION' => ['required','max:100','unique:TIPOSCONTRATOS,TICO_DESCRIPCION,'.$id.',TICO_ID'],
			'TICO_OBSERVACIONES' => ['max:300'],
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
		$tiposcontratos = TipoContrato::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-contratos/tiposcontratos/index', compact('tiposcontratos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-contratos/tiposcontratos/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(TipoContrato::class, 'cnfg-contratos.tiposcontratos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TICO_ID
	 * @return Response
	 */
	public function edit($TICO_ID)
	{
		// Se obtiene el registro
		$tiposcontrato = TipoContrato::findOrFail($TICO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-contratos/tiposcontratos/edit', compact('tiposcontrato'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TICO_ID
	 * @return Response
	 */
	public function update($TICO_ID)
	{
		parent::updateModel($TICO_ID, TipoContrato::class, 'cnfg-contratos.tiposcontratos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TICO_ID
	 * @return Response
	 */
	public function destroy($TICO_ID, $showMsg=True)
	{
		$cno = TipoContrato::findOrFail($TICO_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($cno->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Tiposcontrato '.$cno->TICO_ID.' no se puede borrar.', 'danger' );
		} else {
			$cno->delete();
				flash_alert( 'Tiposcontrato '.$cno->TICO_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-contratos.tiposcontratos.index');
	}
	
}
