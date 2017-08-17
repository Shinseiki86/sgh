<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\PlantaLaboral;

class PlantaLaboralController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:plantaslaborales-index', ['only' => ['index']]);
		$this->middleware('permission:plantaslaborales-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:plantaslaborales-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:plantaslaborales-delete',   ['only' => ['destroy']]);
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
			'EMPL_ID' => ['numeric', 'required'],
			'CARG_ID' => ['numeric', 'required'],
			'PALA_CANTIDAD' => ['required'],
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
		$plantaslaborales = PlantaLaboral::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/plantaslaborales/index', compact('plantaslaborales'));
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

		return view('cnfg-organizacionales/plantaslaborales/create', compact('arrEmpleadores'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(PlantaLaboral::class, 'cnfg-organizacionales.plantaslaborales.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($EMPL_ID)
	{
		// Se obtiene el registro
		$grupo = PlantaLaboral::findOrFail($EMPL_ID);

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/plantaslaborales/edit', compact('grupo','arrEmpleadores'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($EMPL_ID)
	{
		parent::updateModel($EMPL_ID, PlantaLaboral::class, 'cnfg-organizacionales.plantaslaborales.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($EMPL_ID, $showMsg=True)
	{
		$plantaslaborales = PlantaLaboral::findOrFail($EMPL_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($plantaslaborales->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'PlantaLaboral '.$plantaslaborales->EMPL_ID.' no se puede borrar.', 'danger' );
		} else {
			$plantaslaborales->delete();
				flash_alert( 'PlantaLaboral '.$plantaslaborales->EMPL_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.plantaslaborales.index');
	}
	
}
