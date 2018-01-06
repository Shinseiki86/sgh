<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;
use Illuminate\Http\Request;

use SGH\Models\Prospecto;

class ReporteController extends Controller
{
	protected $data = null;

	private $reportes = [
		['id'=>'ContratosActPorFecha', 'title'=>'100 - CONTRATOS ACTIVOS'],
		['id'=>'ContratosHistorico', 'title'=>'101 - HISTÓRICO DE CONTRATOS'],
		['id'=>'ContratosIngresosPorFecha', 'title'=>'102 - INGRESOS POR FECHA'],
		['id'=>'ContratosRetirosPorFecha', 'title'=>'103 - RETIROS POR FECHA'],
		['id'=>'ContratosHistoriaPorCedula', 'title'=>'104 - HISTORIA LABORAL POR CÉDULA', 'filterRequired' => true],
		['id'=>'ContratosProximosTemporalidad', 'title'=>'105 - PRÓXIMOS A TEMPORALIDAD'],
		['id'=>'ContratosHeadcountRm', 'title'=>'108 - HEADCOUNT DE R.M'],
		['id'=>'ContratosHistoricoRm', 'title'=>'109 - HISTÓRICO DE R.M'],
		['id'=>'ContratosNovedadesRm', 'title'=>'110 - NOVEDADES DE SEGUIMIENTO A R.M'],

		['id'=>'ProspectosSinContrato', 'title'=>'106 - HOJAS DE VIDA BÁSICAS'],
		['id'=>'ProspectosDescartados', 'title'=>'107 - HOJAS DE VIDA DESCARTADAS', 'filterRequired' => true],

		['id'=>'PlantasAutorizadas', 'title'=>'111 - PLANTAS DE PERSONAL AUTORIZADAS'],
		['id'=>'PlantasMovimientos', 'title'=>'112 - MOVIMIENTOS DE PLANTAS DE PERSONAL'],

		['id'=>'ticketsPorFecha', 'title'=>'999 - TICKETS POR FECHA Y ESTADO'],
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
