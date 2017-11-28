<?php
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Controllers\Controller;
use SGH\Models\PlantaLaboral;

class PlantaLaboralController extends Controller
{
	protected $route = 'cnfg-organizacionales.plantaslaborales';
	protected $class = PlantaLaboral::class;

	public function __construct()
	{
		parent::__construct();
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
		return view($this->route.'.index', compact('plantaslaborales'));
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

		//Se crea un array con los cargos
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		//Se crea un array con las gerencias
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		return view($this->route.'.create', compact('arrEmpleadores','arrCargos','arrGerencias'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
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

		//Se crea un array con los cargos
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		//Se crea un array con las gerencias
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('plantalaboral','arrEmpleadores','arrCargos','arrGerencias'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($PALA_ID)
	{

		// Se obtiene el registro
		$plantalaboral = PlantaLaboral::findOrFail($PALA_ID);

		$empl_id = request()->get('EMPL_ID');
		$gere_id = request()->get('GERE_ID');
		$carg_id = request()->get('CARG_ID');
		$pala_cantidad = request()->get('PALA_CANTIDAD');

		
		if(
			($plantalaboral->EMPL_ID == $empl_id && $plantalaboral->GERE_ID == $gere_id) &&
			($plantalaboral->CARG_ID == $carg_id && $plantalaboral->PALA_CANTIDAD != $pala_cantidad)
		  ){

		  	$plantalaboral->PALA_CANTIDAD = $pala_cantidad;
		    $plantalaboral->save();
		    flash_alert('Planta laboral modificado exitosamente.', 'success' );
			return redirect()->route($this->route.'.index')->send();

		}else{
			parent::updateModel($PALA_ID);
		}

		
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($PALA_ID)
	{
		parent::destroyModel($PALA_ID);
	}
	
}
