<?php
namespace SGH\Http\Controllers;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Contrato;
use SGH\Models\PlantaLaboral;
use SGH\Models\EstadoContrato;
use SGH\Models\TipoContrato;
use SGH\Models\ClaseContrato;
use SGH\Models\Ticket;
use SGH\Models\EstadoTicket;
use SGH\Models\Prospecto;


class ReporteController extends Controller
{
	private $data = null;

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
		'TicketsActPorFecha' => 'TICKETS ABIERTOS',
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
	public function buildJson($queryCollect)
	{
		$colletion = $queryCollect->get();
		$keys = $data = [];

		if(!$colletion->isEmpty()){
			$keys = array_keys($colletion->first()->toArray());
			$data = array_map(function ($arr){
					return array_flatten($arr);
				}, $colletion->toArray());
		}
		return response()->json(['keys'=>$keys, 'data'=>$data]);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function contratosActPorFecha()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function ticketsActPorFecha()
	{
		$queryCollect = Ticket::leftJoin('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
							//->whereIn('TICKETS.ESTI_ID', [EstadoTicket::ABIERTO, EstadoTicket::REASIGNADO])
							->select([
								'TICK_ID as ID',
								'TICK_DESCRIPCION as Descripción',
								'TICK_FECHASOLICITUD as Fecha_Solicitud',
								'TICK_FECHAAPROBACION as Fecha_Aprobación',
								'ESTI_DESCRIPCION as Estado',
							]);

		if(isset($this->data['fchaSolicitudDesde']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '>=', Carbon::parse($this->data['fchaSolicitudDesde']));
		if(isset($this->data['fchaSolicitudHasta']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '<=', Carbon::parse($this->data['fchaSolicitudHasta']));

		if(isset($this->data['fchaAprobDesde']))
			$queryCollect->whereDate('TICK_FECHAAPROBACION', '>=', Carbon::parse($this->data['fchaAprobDesde']));
		if(isset($this->data['fchaAprobHasta']))
			$queryCollect->whereDate('TICK_FECHAAPROBACION', '<=', Carbon::parse($this->data['fchaAprobHasta']));

		if(isset($this->data['estado']))
			$queryCollect->where('TICKETS.ESTI_ID', '=', $this->data['estado']);

		return $this->buildJson($queryCollect);
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function historicoContratos()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							//->where('ESTADOSCONTRATOS.ESCO_ID', EstadoContrato::ACTIVO)
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['estado']))
			$queryCollect->where('CONTRATOS.ESCO_ID', '=', $this->data['estado']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function activosPorPeriodo()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							//->where('ESTADOSCONTRATOS.ESCO_ID', EstadoContrato::ACTIVO)
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['estado']))
			$queryCollect->where('CONTRATOS.ESCO_ID', '=', $this->data['estado']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);


		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function ingresosPorFecha()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO,EstadoContrato::RETIRADO,EstadoContrato::VACACIONES])
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function retirosPorFecha()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::RETIRADO])
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaRetiroDesde']))
			$queryCollect->whereDate('CONT_FECHARETIRO', '>=', Carbon::parse($this->data['fchaRetiroDesde']));
		if(isset($this->data['fchaRetiroHasta']))
			$queryCollect->whereDate('CONT_FECHARETIRO', '<=', Carbon::parse($this->data['fchaRetiroHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function historiaPorCedula()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['prospecto']))
			$queryCollect->where('CONTRATOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($queryCollect);
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function proximosTemporalidad()
	{

		$fechaactual = Carbon::now();


		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
							->where('CONTRATOS.TICO_ID', TipoContrato::INDIRECTO)
							->where('CONTRATOS.CLCO_ID', ClaseContrato::OBRALABOR)
							->select([
								/*
								$fechaactual->diffInDays(Carbon::createFromFormat("Y-m-d","CONTRATOS.CONT_FECHAINGRESO")) . 'as prueba',
								*/
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);


		/*
		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		*/
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);

		return $this->buildJson($queryCollect);
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function headcountRm()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->join('CASOSMEDICOS', 'CASOSMEDICOS.CONT_ID', '=', 'CONTRATOS.CONT_ID')
							->join('DIAGNOSTICOSGENERALES', 'DIAGNOSTICOSGENERALES.DIGE_ID', '=', 'CASOSMEDICOS.DIGE_ID')
							->join('ESTADOSRESTRICCION', 'ESTADOSRESTRICCION.ESRE_ID', '=', 'CASOSMEDICOS.ESRE_ID')
							->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'CASOSMEDICOS.CAME_FECHARESTRICCION AS FECHA_RESTRICCION',
								'ESTADOSRESTRICCION.ESRE_DESCRIPCION AS ESTADO_RESTRICCION',
								'DIAGNOSTICOSGENERALES.DIGE_DESCRIPCION AS DIAGNOSTICO_GENERAL',
								'CASOSMEDICOS.CAME_DIAGESPECIFICO AS DIAGNOSTICO_ESPECIFICO',
								'CASOSMEDICOS.CAME_PCL AS P.C.L',
								'CASOSMEDICOS.CAME_CONTINGENCIA AS CONTINGENCIA',
								'CASOSMEDICOS.CAME_LUGARREUBICACION AS LUGAR_REUBICACION',
								'CASOSMEDICOS.CAME_LABOR AS LABOR',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',				
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								//'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								//'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								//'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								//'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								//'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								//'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								//'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								/*
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								*/
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								//'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['estadorestriccion']))
			$queryCollect->where('CASOSMEDICOS.ESRE_ID', '=', $this->data['estadorestriccion']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function historicoRm()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->join('CASOSMEDICOS', 'CASOSMEDICOS.CONT_ID', '=', 'CONTRATOS.CONT_ID')
							->join('DIAGNOSTICOSGENERALES', 'DIAGNOSTICOSGENERALES.DIGE_ID', '=', 'CASOSMEDICOS.DIGE_ID')
							->join('ESTADOSRESTRICCION', 'ESTADOSRESTRICCION.ESRE_ID', '=', 'CASOSMEDICOS.ESRE_ID')
							->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES,EstadoContrato::RETIRADO])
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'CASOSMEDICOS.CAME_FECHARESTRICCION AS FECHA_RESTRICCION',
								'ESTADOSRESTRICCION.ESRE_DESCRIPCION AS ESTADO_RESTRICCION',
								'DIAGNOSTICOSGENERALES.DIGE_DESCRIPCION AS DIAGNOSTICO_GENERAL',
								'CASOSMEDICOS.CAME_DIAGESPECIFICO AS DIAGNOSTICO_ESPECIFICO',
								'CASOSMEDICOS.CAME_PCL AS P.C.L',
								'CASOSMEDICOS.CAME_CONTINGENCIA AS CONTINGENCIA',
								'CASOSMEDICOS.CAME_LUGARREUBICACION AS LUGAR_REUBICACION',
								'CASOSMEDICOS.CAME_LABOR AS LABOR',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',				
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								//'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								//'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								//'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								//'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								//'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								//'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								//'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								/*
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								*/
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								//'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['estadorestriccion']))
			$queryCollect->where('CASOSMEDICOS.ESRE_ID', '=', $this->data['estadorestriccion']);
		if(isset($this->data['estadocontrato']))
			$queryCollect->where('CONTRATOS.ESCO_ID', '=', $this->data['estadocontrato']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function novedadesRm()
	{
		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
							->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->join('CASOSMEDICOS', 'CASOSMEDICOS.CONT_ID', '=', 'CONTRATOS.CONT_ID')
							->join('DIAGNOSTICOSGENERALES', 'DIAGNOSTICOSGENERALES.DIGE_ID', '=', 'CASOSMEDICOS.DIGE_ID')
							->join('ESTADOSRESTRICCION', 'ESTADOSRESTRICCION.ESRE_ID', '=', 'CASOSMEDICOS.ESRE_ID')
							->join('NOVEDADESMEDICAS', 'NOVEDADESMEDICAS.CAME_ID', '=', 'CASOSMEDICOS.CAME_ID')
							->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES,EstadoContrato::RETIRADO])
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'NOVEDADESMEDICAS.NOME_FECHANOVEDAD AS FECHA_NOVEDAD',
								'NOVEDADESMEDICAS.NOME_DESCRIPCION AS DESCRIPCION',
								'NOVEDADESMEDICAS.NOME_OBSERVACIONES AS OBSERVACIONES',
								'CASOSMEDICOS.CAME_FECHARESTRICCION AS FECHA_RESTRICCION',
								'ESTADOSRESTRICCION.ESRE_DESCRIPCION AS ESTADO_RESTRICCION',
								'DIAGNOSTICOSGENERALES.DIGE_DESCRIPCION AS DIAGNOSTICO_GENERAL',
								'CASOSMEDICOS.CAME_DIAGESPECIFICO AS DIAGNOSTICO_ESPECIFICO',
								'CASOSMEDICOS.CAME_PCL AS P.C.L',
								'CASOSMEDICOS.CAME_CONTINGENCIA AS CONTINGENCIA',
								'CASOSMEDICOS.CAME_LUGARREUBICACION AS LUGAR_REUBICACION',
								'CASOSMEDICOS.CAME_LABOR AS LABOR',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',				
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								//'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								//'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								//'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								//'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								//'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								//'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								//'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'JEFE_INMEDIATO', 'JEFES'),
								/*
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'REMPLAZA_A', 'REMPLAZOS'),
								*/
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								//'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIngresoDesde']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$queryCollect->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$queryCollect->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$queryCollect->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$queryCollect->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['estadorestriccion']))
			$queryCollect->where('CASOSMEDICOS.ESRE_ID', '=', $this->data['estadorestriccion']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function hojasDeVida()
	{
		$queryCollect = Prospecto::select([
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_FECHAEXPEDICION as FECHA_EXPEDICION',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'PROSPECTOS.PROS_DIRECCION as DIRECCION',
								'PROSPECTOS.PROS_TELEFONO as TELEFONO',
								'PROSPECTOS.PROS_CELULAR as CELULAR',
								'PROSPECTOS.PROS_CORREO as EMAIL',
							]);

		if(isset($this->data['prospecto']))
			$queryCollect->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function hojasDeVidaDescartadas()
	{
		$queryCollect = Prospecto::where('PROSPECTOS.PROS_MARCA', '=', 'SI')
								->select([
							    'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'PROSPECTOS.PROS_MARCA as ¿DESCARTADA?',
								'PROSPECTOS.PROS_MARCAOBSERVACIONES as OBSERVACIONES',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_FECHAEXPEDICION as FECHA_EXPEDICION',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'PROSPECTOS.PROS_DIRECCION as DIRECCION',
								'PROSPECTOS.PROS_TELEFONO as TELEFONO',
								'PROSPECTOS.PROS_CELULAR as CELULAR',
								'PROSPECTOS.PROS_CORREO as EMAIL',
							]);

		if(isset($this->data['prospecto']))
			$queryCollect->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($queryCollect);
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function plantasAutorizadas()
	{
		$queryCollect = PlantaLaboral::join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'PLANTASLABORALES.EMPL_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'PLANTASLABORALES.GERE_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'PLANTASLABORALES.CARG_ID')
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'PLANTASLABORALES.PALA_CANTIDAD AS CANTIDAD',
							]);

		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);


		//dd($queryCollect);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function movimientosPlantas()
	{
		$queryCollect = PlantaLaboral::join('MOVIMIENTOS_PLANTAS', 'MOVIMIENTOS_PLANTAS.PALA_ID', '=','PLANTASLABORALES.PALA_ID')
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'PLANTASLABORALES.EMPL_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'PLANTASLABORALES.GERE_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'PLANTASLABORALES.CARG_ID')
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'PLANTASLABORALES.PALA_CANTIDAD AS CANTIDAD_INICIAL',
								'MOVIMIENTOS_PLANTAS.MOPL_CANTIDAD AS MOVIMIENTO',
								'MOVIMIENTOS_PLANTAS.MOPL_FECHAMOVIMIENTO AS FECHA_MOVIMIENTO',
								'MOVIMIENTOS_PLANTAS.MOPL_MOTIVO AS MOTIVO_MOVIMIENTO',
								'MOVIMIENTOS_PLANTAS.MOPL_OBSERVACIONES AS OBSERVACIONES',
							]);

		if(isset($this->data['empresa']))
			$queryCollect->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$queryCollect->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['cargo']))
			$queryCollect->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);


		//dd($queryCollect);

		return $this->buildJson($queryCollect);
	}

}
