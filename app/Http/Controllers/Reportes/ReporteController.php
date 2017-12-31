<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use SGH\Models\Prospecto;

class ReporteController extends Controller
{
	protected $data = null;

	private $reportes = [
		'ContratosActPorFecha' => '100 - CONTRATOS ACTIVOS',
		'ContratosHistorico' => '101 - HISTÓRICO DE CONTRATOS',
		'ContratosIngresosPorFecha' => '102 - INGRESOS POR FECHA',
		'ContratosRetirosPorFecha' => '103 - RETIROS POR FECHA',
		'ContratosHistoriaPorCedula' => '104 - HISTORIA LABORAL POR CÉDULA',
		'ContratosProximosTemporalidad' => '105 - PRÓXIMOS A TEMPORALIDAD',
		'ContratosHeadcountRm' => '108 - HEADCOUNT DE R.M',
		'ContratosHistoricoRm' => '109 - HISTÓRICO DE R.M',
		'ContratosNovedadesRm' => '110 - NOVEDADES DE SEGUIMIENTO A R.M',

		'ProspectosSinContrato' => '106 - HOJAS DE VIDA BÁSICAS',
		'ProspectosDescartados' => '107 - HOJAS DE VIDA DESCARTADAS',

		'PlantasAutorizadas' => '111 - PLANTAS DE PERSONAL AUTORIZADAS',
		'PlantasMovimientos' => '112 - MOVIMIENTOS DE PLANTAS DE PERSONAL',

		'TicketsActPorFecha' => '999 - TICKETS POR FECHA Y ESTADO',
	];

	public function __construct()
	{
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

		//Se crea un array con los prospectos que han tenido contratos
		$primaryKey = 'PROS_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';
		$arrProspectos = Prospecto::retirados()
			->orderBy('CONTRATOS.'.$primaryKey)
			->select([ 'PROSPECTOS.'.$primaryKey , $column ])
			->get();
		$arrProspectos = model_to_array($arrProspectos, $columnName, $primaryKey);

		$arrProspectosSinContrato = Prospecto::orderBy('PROSPECTOS.'.$primaryKey)
			->select([ 'PROSPECTOS.'.$primaryKey , $column ])
			->get();
		$arrProspectosSinContrato = model_to_array($arrProspectosSinContrato, $columnName, $primaryKey);

		//Se carga la vista y se pasan los registros
		return view('reportes.index', compact('arrReportes','arrProspectos','arrProspectosSinContrato'));
	}


	/**
	 * 
	 *
	 * @return Response
	 */
	protected function buildJson($queryCollect, $columnChart = null)
	{
		$colletion = $queryCollect->get();
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
