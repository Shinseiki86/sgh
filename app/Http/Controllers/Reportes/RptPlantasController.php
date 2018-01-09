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


	private function getQuery()
	{
		$query = PlantaLaboral::join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'PLANTASLABORALES.EMPL_ID')
					->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'PLANTASLABORALES.GERE_ID')
					->join('CARGOS', 'CARGOS.CARG_ID', '=', 'PLANTASLABORALES.CARG_ID')
					->select([
						'EMPLEADORES.EMPL_NOMBRECOMERCIAL AS EMPRESA',
						'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
						'CARGOS.CARG_DESCRIPCION AS CARGO',
						'PLANTASLABORALES.PALA_CANTIDAD AS CANTIDAD',
					]);
		return $query;
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function plantasAutorizadas()
	{
		$query = $this->getQuery();

		if(isset($this->data['empresa']))
			$query->where('EMPLEADORES.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$query->where('GERENCIAS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['cargo']))
			$query->where('CARGOS.CARG_ID', '=', $this->data['cargo']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function movimientosPlantas()
	{
		$query = $this->getQuery()
			->join('MOVIMIENTOS_PLANTAS', 'MOVIMIENTOS_PLANTAS.PALA_ID', '=','PLANTASLABORALES.PALA_ID')
			->addSelect([
				'MOVIMIENTOS_PLANTAS.MOPL_CANTIDAD AS MOVIMIENTO',
				'MOVIMIENTOS_PLANTAS.MOPL_FECHAMOVIMIENTO AS FECHA_MOVIMIENTO',
				'MOVIMIENTOS_PLANTAS.MOPL_MOTIVO AS MOTIVO_MOVIMIENTO',
				'MOVIMIENTOS_PLANTAS.MOPL_OBSERVACIONES AS OBSERVACIONES',
			]);

		if(isset($this->data['empresa']))
			$query->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$query->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['cargo']))
			$query->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);

		return $this->buildJson($query);
	}

}