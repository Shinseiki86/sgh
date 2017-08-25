<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\PlantaLaboral;

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
			'PALA_CANTIDAD' => ['numeric','required'],
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
		//dd($plantaslaborales);
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

		//Se crea un array con los empleadores
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		return view('cnfg-organizacionales/plantaslaborales/create', compact('arrEmpleadores','arrCargos'));
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
	public function edit($PALA_ID)
	{
		// Se obtiene el registro
		$plantalaboral = PlantaLaboral::findOrFail($PALA_ID);

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		//Se crea un array con los empleadores
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/plantaslaborales/edit', compact('plantalaboral','arrEmpleadores','arrCargos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($PALA_ID)
	{
		parent::updateModel($PALA_ID, PlantaLaboral::class, 'cnfg-organizacionales.plantaslaborales.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($PALA_ID, $showMsg=True)
	{
		$plantaslaborales = PlantaLaboral::findOrFail($PALA_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($plantaslaborales->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Planta Laboral '.$plantaslaborales->PALA_ID.' no se puede borrar.', 'danger' );
		} else {
			$plantaslaborales->delete();
				flash_alert( 'Planta Laboral '.$plantaslaborales->PALA_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.plantaslaborales.index');
	}
	
}
