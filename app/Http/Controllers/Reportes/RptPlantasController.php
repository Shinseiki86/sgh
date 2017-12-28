<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use SGH\Models\PlantaLaboral;

class RptPlantasController extends ReporteController
{

	public function __construct()
	{
		parent::__construct();
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