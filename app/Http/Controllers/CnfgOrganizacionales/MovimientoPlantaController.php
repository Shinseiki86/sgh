<?php
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Controllers\Controller;
use SGH\Models\MovimientoPlanta;
use SGH\Models\PlantaLaboral;

class MovimientoPlantaController extends Controller
{
	protected $route = 'cnfg-organizacionales.movimientosplantas';
	protected $class = MovimientoPlanta::class;

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
		$movimientosplantas = MovimientoPlanta::all();
		//dd($movimientosplantas);
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('movimientosplantas'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con las plantas autorizadas
		$arrPlantas = model_to_array(PlantaLaboral::class, 'PALA_ID');

		return view($this->route.'.create', compact('arrPlantas'));
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
		$movimientoplanta = MovimientoPlanta::findOrFail($PALA_ID);

		//Se crea un array con las plantas autorizadas
		$arrPlantas = model_to_array(PlantaLaboral::class, 'PALA_ID');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('movimientoplanta','arrPlantas'));
	}

	/**
	 * Muestra el formulario para realizar el movimiento de planta necesario
	 *
	 * @param  int  $PALA_ID
	 * @return Response
	 */
	/*
	public function variacionPlanta()
	{
		//variables para llamar al metodo que extrae la planta autorizada y el conteo de contratos
		$PALA_ID = request()->get('PALA_ID');

		// Se obtiene el registro
		$movimientoplanta = MovimientoPlanta::findOrFail($PALA_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.variacion', compact('movimientoplanta'));
	}
	*/

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($PALA_ID)
	{

		// Se obtiene el registro
		$movimientoplanta = MovimientoPlanta::findOrFail($PALA_ID);

		$empl_id = request()->get('EMPL_ID');
		$gere_id = request()->get('GERE_ID');
		$carg_id = request()->get('CARG_ID');
		$pala_cantidad = request()->get('PALA_CANTIDAD');

		
		if(
			($movimientoplanta->EMPL_ID == $empl_id && $movimientoplanta->GERE_ID == $gere_id) &&
			($movimientoplanta->CARG_ID == $carg_id && $movimientoplanta->PALA_CANTIDAD != $pala_cantidad)
		  ){

		  	$movimientoplanta->PALA_CANTIDAD = $pala_cantidad;
		    $movimientoplanta->save();
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
