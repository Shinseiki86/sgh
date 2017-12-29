<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use SGH\Models\Prospecto;

class ReporteController extends Controller
{
	protected $data = null;

	private $reportes = [
		'ContratosActPorFecha' => '100 - CONTRATOS ACTIVOS',
		'HistoricoContratos' => '101 - HISTORICO DE CONTRATOS',
		'IngresosPorFecha' => '102 - INGRESOS POR FECHA',
		'RetirosPorFecha' => '103 - RETIROS POR FECHA',
		'HistoriaPorCedula' => '104 - HISTORIA LABORAL POR CEDULA',
		'ProximosTemporalidad' => '105 - PROXIMOS A TEMPORALIDAD',
		'HojasDeVida' => '106 - HOJAS DE VIDA BÁSICA',
		'HojasDeVidaDescartadas' => '107 - HOJAS DE VIDA DESCARTADAS',
		'HeadcountRm' => '108 - HEADCOUNT DE R.M',
		'HistoricoRm' => '109 - HISTORICO DE R.M',
		'NovedadesRm' => '110 - NOVEDADES DE SEGUIMIENTO A R.M',
		'PlantasAutorizadas' => '111 - PLANTAS DE PERSONAL AUTORIZADAS',
		'MovimientosPlantas' => '112 - MOVIMIENTOS DE PLANTAS DE PERSONAL',
		'TicketsActPorFecha' => 'TICKETS POR FECHA Y ESTADO',
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

		
		$arrEstados = model_to_array(EstadoTicket::class, 'ESTI_DESCRIPCION');
		$arrEmpresas = model_to_array(Empleador::class, 'EMPL_NOMBRECOMERCIAL');
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');
		$arrCentros = model_to_array(CentroCosto::class, 'CECO_DESCRIPCION');
		$arrTemporales = model_to_array(Temporal::class, 'TEMP_NOMBRECOMERCIAL');
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');
		$arrGrupos = model_to_array(Grupo::class, 'GRUP_DESCRIPCION');
		$arrTurnos = model_to_array(Turno::class, 'TURN_DESCRIPCION');
		$arrEstadosContratos = model_to_array(EstadoContrato::class, 'ESCO_DESCRIPCION');
		$arrEstadosRestriccion = model_to_array(EstadoRestriccion::class, 'ESRE_DESCRIPCION');

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
		return view('reportes.index', compact('arrReportes', 'arrEstados','arrEmpresas','arrGerencias','arrCentros','arrTemporales','arrCargos','arrGrupos','arrTurnos','arrEstadosContratos','arrProspectos','arrEstadosRestriccion','arrProspectosSinContrato'));
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
