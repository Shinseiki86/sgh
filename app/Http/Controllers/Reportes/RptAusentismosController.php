<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\TipoContrato;
use SGH\Models\ClaseContrato;
use SGH\Models\ParametroGeneral;

class RptAusentismosController extends ReporteController
{

	public function __construct()
	{
		parent::__construct();
	}


	private function getQuery()
	{
		$query = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
			->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
			->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
			->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
			->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
			->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
			->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
			->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
			->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
			->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
			->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
			->join('AUSENTISMOS','AUSENTISMOS.CONT_ID', '=', 'CONTRATOS.CONT_ID')
			->join('ENTIDADES','ENTIDADES.ENTI_ID', '=', 'AUSENTISMOS.ENTI_ID')
			->join('CONCEPTOAUSENCIAS','CONCEPTOAUSENCIAS.COAU_ID', '=', 'AUSENTISMOS.COAU_ID')
			->join('TIPOAUSENTISMOS','TIPOAUSENTISMOS.TIAU_ID', '=', 'CONCEPTOAUSENCIAS.TIAU_ID')
			->join('TIPOENTIDADES','TIPOENTIDADES.TIEN_ID', '=', 'CONCEPTOAUSENCIAS.TIEN_ID')
			->leftJoin('DIAGNOSTICOS','DIAGNOSTICOS.DIAG_ID', '=', 'AUSENTISMOS.DIAG_ID')
			->select([
				'AUSENTISMOS.AUSE_ID as CODIGO',
				'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
				'PROSPECTOS.PROS_CEDULA as CEDULA',
				expression_concat([
					'PROS_PRIMERNOMBRE',
					'PROS_SEGUNDONOMBRE',
					'PROS_PRIMERAPELLIDO',
					'PROS_SEGUNDOAPELLIDO'
				], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
				'DIAGNOSTICOS.DIAG_CODIGO AS DX',
				'DIAGNOSTICOS.DIAG_DESCRIPCION AS DX_DESCRIPCION',
				'AUSENTISMOS.AUSE_FECHAINICIO AS FECHA_INICIAL',
				'AUSENTISMOS.AUSE_DIAS AS NUM_DIAS',
				'AUSENTISMOS.AUSE_FECHAFINAL AS FECHA_FINAL',
				'TIPOAUSENTISMOS.TIAU_DESCRIPCION AS TIPO_AUSENTISMOS',
				'AUSENTISMOS.AUSE_FECHAACCIDENTE AS FECHA_ACCIDENTE',
				'AUSENTISMOS.AUSE_PERIODO AS PERIODO',
				'CONCEPTOAUSENCIAS.COAU_DESCRIPCION AS CONCEPTO_AUSENCIA',
				'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
				'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
				'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
				'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
				'CARGOS.CARG_DESCRIPCION AS CARGO',
				'TIPOAUSENTISMOS.TIAU_DESCRIPCION AS TIPO_AUSENTISMO',
				'TIPOENTIDADES.TIEN_DESCRIPCION AS TIPO_ENTIDAD',
				'ENTIDADES.ENTI_RAZONSOCIAL AS ENTIDAD_RESPONSABLE'
			]);

		return $query;
	}

	private function getQueryProrrogas()
	{
		$query = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
			->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
			->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
			->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
			->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
			->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
			->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
			->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
			->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
			->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
			->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
			->join('AUSENTISMOS','AUSENTISMOS.CONT_ID', '=', 'CONTRATOS.CONT_ID')
			->join('ENTIDADES','ENTIDADES.ENTI_ID', '=', 'AUSENTISMOS.ENTI_ID')
			->join('CONCEPTOAUSENCIAS','CONCEPTOAUSENCIAS.COAU_ID', '=', 'AUSENTISMOS.COAU_ID')
			->join('TIPOAUSENTISMOS','TIPOAUSENTISMOS.TIAU_ID', '=', 'CONCEPTOAUSENCIAS.TIAU_ID')
			->join('TIPOENTIDADES','TIPOENTIDADES.TIEN_ID', '=', 'CONCEPTOAUSENCIAS.TIEN_ID')
			->join('PRORROGAAUSENTISMOS', 'PRORROGAAUSENTISMOS.AUSE_ID', '=', 'AUSENTISMOS.AUSE_ID')
			->leftJoin('DIAGNOSTICOS','DIAGNOSTICOS.DIAG_ID', '=', 'PRORROGAAUSENTISMOS.DIAG_ID')
			->select([
				'AUSENTISMOS.AUSE_ID as CODIGO_AUS_INICIAL',
				'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
				'PROSPECTOS.PROS_CEDULA as CEDULA',
				expression_concat([
					'PROS_PRIMERNOMBRE',
					'PROS_SEGUNDONOMBRE',
					'PROS_PRIMERAPELLIDO',
					'PROS_SEGUNDOAPELLIDO'
				], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
				'DIAGNOSTICOS.DIAG_CODIGO AS DX',
				'DIAGNOSTICOS.DIAG_DESCRIPCION AS DX_DESCRIPCION',
				'PRORROGAAUSENTISMOS.PROR_FECHAINICIO AS FECHA_INICIAL',
				'PRORROGAAUSENTISMOS.PROR_DIAS AS NUM_DIAS',
				'PRORROGAAUSENTISMOS.PROR_FECHAFINAL AS FECHA_FINAL',
				'TIPOAUSENTISMOS.TIAU_DESCRIPCION AS TIPO_AUSENTISMOS',
				'PRORROGAAUSENTISMOS.PROR_PERIODO AS PERIODO',
				'CONCEPTOAUSENCIAS.COAU_DESCRIPCION AS CONCEPTO_AUSENCIA',
				'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
				'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
				'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
				'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
				'CARGOS.CARG_DESCRIPCION AS CARGO',
				'TIPOAUSENTISMOS.TIAU_DESCRIPCION AS TIPO_AUSENTISMO',
				'TIPOENTIDADES.TIEN_DESCRIPCION AS TIPO_ENTIDAD',
				'ENTIDADES.ENTI_RAZONSOCIAL AS ENTIDAD_RESPONSABLE'
			]);

		return $query;
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function listadoAusentismos()
	{
		$query = $this->getQuery()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES,EstadoContrato::RETIRADO]);

		if(isset($this->data['fchaGrabacionDesde']))
			$query->whereDate('AUSENTISMOS.AUSE_FECHACREADO', '>=', Carbon::parse($this->data['fchaGrabacionDesde']));
		if(isset($this->data['fchaGrabacionHasta']))
			$query->whereDate('AUSENTISMOS.AUSE_FECHACREADO', '<=', Carbon::parse($this->data['fchaGrabacionHasta']));
		if(isset($this->data['empresa']))
			$query->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$query->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$query->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$query->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$query->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['periodo']))
			$query->where('AUSENTISMOS.AUSE_PERIODO', '=', $this->data['periodo']);
		if(isset($this->data['tipo']))
			$query->where('TIPOAUSENTISMOS.TIAU_ID', '=', $this->data['tipo']);
		if(isset($this->data['concepto']))
			$query->where('CONCEPTOAUSENCIAS.COAU_ID', '=', $this->data['concepto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function listadoAusentismosProrrogas()
	{
		$query = $this->getQueryProrrogas()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES,EstadoContrato::RETIRADO]);

		if(isset($this->data['fchaGrabacionDesde']))
			$query->whereDate('PRORROGAAUSENTISMOS.PROR_FECHACREADO', '>=', Carbon::parse($this->data['fchaGrabacionDesde']));
		if(isset($this->data['fchaGrabacionHasta']))
			$query->whereDate('PRORROGAAUSENTISMOS.PROR_FECHACREADO', '<=', Carbon::parse($this->data['fchaGrabacionHasta']));
		if(isset($this->data['empresa']))
			$query->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$query->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$query->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['temporal']))
			$query->where('CONTRATOS.TEMP_ID', '=', $this->data['temporal']);
		if(isset($this->data['cargo']))
			$query->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['periodo']))
			$query->where('PRORROGAAUSENTISMOS.PROR_PERIODO', '=', $this->data['periodo']);
		if(isset($this->data['tipo']))
			$query->where('TIPOAUSENTISMOS.TIAU_ID', '=', $this->data['tipo']);
		if(isset($this->data['concepto']))
			$query->where('CONCEPTOAUSENCIAS.COAU_ID', '=', $this->data['concepto']);

		return $this->buildJson($query);
	}

}