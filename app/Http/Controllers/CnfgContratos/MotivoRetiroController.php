<?php

namespace SGH\Http\Controllers\CnfgContratos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use SGH\Models\MotivoRetiro;

class MotivoRetiroController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:motretiro-index', ['only' => ['index']]);
		$this->middleware('permission:motretiro-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:motretiro-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:motretiro-delete',   ['only' => ['destroy']]);
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
			'MORE_DESCRIPCION' => ['required','max:100','unique:MOTIVOSRETIROS,MORE_DESCRIPCION,'.$id.',MORE_ID'],
			'MORE_OBSERVACIONES' => ['max:300'],
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
		$motivosretiros = MotivoRetiro::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-contratos/motivosretiros/index', compact('motivosretiros'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-contratos/motivosretiros/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(MotivoRetiro::class, 'cnfg-contratos.motivosretiros.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $MORE_ID
	 * @return Response
	 */
	public function edit($MORE_ID)
	{
		// Se obtiene el registro
		$motivoretiro = MotivoRetiro::findOrFail($MORE_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-contratos/motivosretiros/edit', compact('motivoretiro'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $MORE_ID
	 * @return Response
	 */
	public function update($MORE_ID)
	{
		parent::updateModel($MORE_ID, MotivoRetiro::class, 'cnfg-contratos.motivosretiros.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $MORE_ID
	 * @return Response
	 */
	public function destroy($MORE_ID, $showMsg=True)
	{
		$motivoretiro = MotivoRetiro::findOrFail($MORE_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($motivoretiro->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Motivosretiro '.$motivoretiro->MORE_ID.' no se puede borrar.', 'danger' );
		} else {
			$motivoretiro->delete();
				flash_alert( 'Motivosretiro '.$motivoretiro->MORE_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-contratos.motivosretiros.index');
	}
	
}
