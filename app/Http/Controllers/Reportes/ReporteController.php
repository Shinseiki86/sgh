<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;
use Illuminate\Http\Request;

use SGH\Models\Prospecto;

class ReporteController extends Controller
{
	protected $data = null;

	private $reportes = [

		/*Bloque para reportes de Prospectos*/
		//==============================================================================================
		['id'=>'ProspectosSinContrato', 'title'=>'100 - HOJAS DE VIDA BÁSICAS'],
		['id'=>'ProspectosDescartados', 'title'=>'101 - HOJAS DE VIDA DESCARTADAS'],
		['id'=>'ProspectosCumpleanios', 'title'=>'102 - LISTADO DE CUMPLEAÑOS', 'filterRequired' => true],
		//==============================================================================================

		/*Bloque para reportes de Contratos*/
		//==============================================================================================
		['id'=>'ContratosActivos', 'title'=>'200 - CONTRATOS ACTIVOS'],
		['id'=>'ContratosHistorico', 'title'=>'201 - HISTÓRICO DE CONTRATOS'],
		['id'=>'ContratosIngresosPorFecha', 'title'=>'202 - INGRESOS POR FECHA', 'filterRequired' => true],
		['id'=>'ContratosRetirosPorFecha', 'title'=>'203 - RETIROS POR FECHA', 'filterRequired' => true],
		['id'=>'ContratosHistoriaPorCedula', 'title'=>'204 - HISTORIA LABORAL POR CÉDULA', 'filterRequired' => true],
		['id'=>'ContratosActivosPorPeriodo', 'title'=>'205 - ACTIVOS POR PERIODO', 'filterRequired' => true],
		['id'=>'ContratosProximosTemporalidad', 'title'=>'206 - PRÓXIMOS A TEMPORALIDAD'],
		['id'=>'ContratosProximosFinalizar', 'title'=>'207 - CONTRATOS PRÓXIMOS A FINALIZAR', 'filterRequired' => true],
		['id'=>'ContratosActivosPlantillaNovedades', 'title'=>'208 - ACTIVOS PLANTILLA DE NOVEDADES'],
		['id'=>'ContratosHeadcountRm', 'title'=>'209 - HEADCOUNT DE R.M'],
		['id'=>'ContratosHistoricoRm', 'title'=>'210 - HISTÓRICO DE R.M'],
		['id'=>'ContratosNovedadesRm', 'title'=>'211 - NOVEDADES DE SEGUIMIENTO A R.M'],
		
		['id'=>'ContratosAtributosPorEmpleado', 'title'=>'212 - ATRIBUTOS POR EMPLEADO', 'filterRequired' => true],
		//==============================================================================================

		/*Bloque para reportes de Plantas*/
		//==============================================================================================
		['id'=>'PlantasAutorizadas', 'title'=>'300 - PLANTAS DE PERSONAL AUTORIZADAS'],
		['id'=>'PlantasMovimientos', 'title'=>'301 - MOVIMIENTOS DE PLANTAS DE PERSONAL'],
		['id'=>'PlantasVrsActivos', 'title'=>'302 - PLANTAS Vs. ACTIVOS'],
		//==============================================================================================

		/*Bloque para reportes de Tickets*/
		//==============================================================================================
		['id'=>'ticketsPorFecha', 'title'=>'400 - LISTADO DE TICKETS'],
		//==============================================================================================

		/*Bloque para reportes de Ausentismos*/
		//==============================================================================================
		['id'=>'AusentismosListadoAusentismos', 'title'=>'500 - LISTADO DE AUSENTISMOS INICIALES'],
		['id'=>'AusentismosListadoAusentismosProrrogas', 'title'=>'501 - LISTADO DE AUSENTISMOS PROROGAS'],
		//==============================================================================================
	];

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:reportes');
		//Datos recibidos desde la vista.
		$this->data = parent::getRequest();
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arrReportes = $this->reportes;
		return view('reportes.index', compact('arrReportes'));
	}

	public function viewForm(Request $request)
	{
		$form = $request->input('form');

		return response()->json(view('reportes.formRep'.$form)->render());
	}


	/**
	 * 
	 *
	 * @return Response
	 */
	protected function buildJson($query, $columnChart = null)
	{
		$colletion = $query->get();
		$keys = $data = [];

		if(!$colletion->isEmpty()){
			$keys = array_keys($colletion->first()->toArray());
			$data = array_map(function ($arr){
					return array_flatten($arr);
				}, $colletion->toArray());
		}
		return response()->json(compact('keys', 'data', 'columnChart'));
	}

}
