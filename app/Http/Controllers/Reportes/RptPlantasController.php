<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use SGH\Models\PlantaLaboral;
use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\TipoContrato;

class RptPlantasController extends ReporteController
{
	public function __construct()
	{
		parent::__construct();
	}


	private function getQuery()
	{

		//subquery para Postgrest ára obtener la variacion total de una planta laboral
		$sqlCantVarPlanta = '(SELECT SUM("MOV"."MOPL_CANTIDAD") FROM "PLANTASLABORALES" AS "PLA"
			LEFT JOIN "MOVIMIENTOS_PLANTAS" AS "MOV"
				ON "PLA"."PALA_ID" = "MOV"."PALA_ID"
		    AND "PLA"."EMPL_ID" = "EMPLEADORES"."EMPL_ID"
		    AND "PLA"."GERE_ID" = "GERENCIAS"."GERE_ID"
		    AND "PLA"."CARG_ID" = "CARGOS"."CARG_ID"

		) AS "TOTAL_VARIACIONES"';
		//En Mysql, el query no debe tener comillas dobles.
        if(config('database.default') == 'mysql'){
    		$sqlCantVarPlanta = str_replace('"', '', $sqlCantVarPlanta);
        }

		$query = PlantaLaboral::join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'PLANTASLABORALES.EMPL_ID')
					->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'PLANTASLABORALES.GERE_ID')
					->join('CARGOS', 'CARGOS.CARG_ID', '=', 'PLANTASLABORALES.CARG_ID')
					->select([
						'EMPLEADORES.EMPL_NOMBRECOMERCIAL AS EMPRESA',
						'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
						'CARGOS.CARG_DESCRIPCION AS CARGO',
						'PLANTASLABORALES.PALA_CANTIDAD AS CANTIDAD_AUTORIZADA',
						\DB::raw($sqlCantVarPlanta)
					]);
		return $query;
	}

	private function getQueryVariaciones()
	{
		$query = PlantaLaboral::join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'PLANTASLABORALES.EMPL_ID')
					->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'PLANTASLABORALES.GERE_ID')
					->join('CARGOS', 'CARGOS.CARG_ID', '=', 'PLANTASLABORALES.CARG_ID')
					->select([
						'EMPLEADORES.EMPL_NOMBRECOMERCIAL AS EMPRESA',
						'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
						'CARGOS.CARG_DESCRIPCION AS CARGO',
						'PLANTASLABORALES.PALA_CANTIDAD AS CANTIDAD_AUTORIZADA',
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
		$query = $this->getQueryVariaciones()
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


	/**
	 * 
	 *
	 * @return Json
	 */
	public function plantasVrsActivos()
	{
		//https://laracasts.com/discuss/channels/eloquent/add-a-left-join-in-laravel-querysubquery-builder
		/*$subQuery = \DB::table('CONTRATOS')
					->select(\DB::raw('COUNT(*)'))
					->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
					->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
					->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
					->whereIn('ESCO_ID', [EstadoContrato::ACTIVO,EstadoContrato::VACACIONES]);
		$subQuerySQL = $subQuery->toSql();

		$query = $this->getQuery()
			->addselect(\DB::raw("({$subQuerySQL}) as CANTIDAD_CONTRATOS"))
        	->mergeBindings($subQuery->getBindings());*/
        	

       	//Subquery para Postgres para cruzar contratos con Plantas
		$sqlCantContratosDirectos = '(SELECT COUNT(*) FROM "CONTRATOS"
			WHERE "CONTRATOS"."EMPL_ID" = "EMPLEADORES"."EMPL_ID"
			AND "CONTRATOS"."GERE_ID" = "GERENCIAS"."GERE_ID"
			AND "CONTRATOS"."CARG_ID" = "CARGOS"."CARG_ID"
			AND "CONTRATOS"."ESCO_ID" IN ('.EstadoContrato::ACTIVO.','.EstadoContrato::VACACIONES.'.)
			AND "CONTRATOS"."TICO_ID" = '.TipoContrato::DIRECTO.'.
		) AS "ACTIVOS_DIRECTOS"';

		//Subquery para Postgres para cruzar contratos con Plantas
		$sqlCantContratosTemporales = '(SELECT COUNT(*) FROM "CONTRATOS"
			WHERE "CONTRATOS"."EMPL_ID" = "EMPLEADORES"."EMPL_ID"
			AND "CONTRATOS"."GERE_ID" = "GERENCIAS"."GERE_ID"
			AND "CONTRATOS"."CARG_ID" = "CARGOS"."CARG_ID"
			AND "CONTRATOS"."ESCO_ID" IN ('.EstadoContrato::ACTIVO.','.EstadoContrato::VACACIONES.'.)
			AND "CONTRATOS"."TICO_ID" = '.TipoContrato::INDIRECTO.'.
		) AS "ACTIVOS_TEMPORALES"';

		//En Mysql, el query no debe tener comillas dobles.
        if(config('database.default') == 'mysql'){
    		$sqlCantContratosDirectos = str_replace('"', '', $sqlCantContratosDirectos);
    		$sqlCantContratosTemporales = str_replace('"', '', $sqlCantContratosTemporales);
        }

		$query = $this->getQuery()
		->addSelect([
					\DB::raw($sqlCantContratosDirectos),
					\DB::raw($sqlCantContratosTemporales)
				   ]);

		if(isset($this->data['empresa']))
			$query->where('EMPLEADORES.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$query->where('GERENCIAS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['cargo']))
			$query->where('CARGOS.CARG_ID', '=', $this->data['cargo']);

		return $this->buildJson($query);
	}
}