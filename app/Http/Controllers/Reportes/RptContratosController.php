<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\TipoContrato;
use SGH\Models\ClaseContrato;
use SGH\Models\ParametroGeneral;

class RptContratosController extends ReporteController
{

	public function __construct()
	{
		parent::__construct();
	}


	private function getQuery()
	{
		$query = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
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

		return $query;
	}

	private function getQueryAtributos()
	{
		$query = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
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
			->join('EMPLEADOATRIBUTO', 'EMPLEADOATRIBUTO.CONT_ID', '=', 'CONTRATOS.CONT_ID')
			->join('ATRIBUTOS', 'ATRIBUTOS.ATRI_ID', '=', 'EMPLEADOATRIBUTO.ATRI_ID')
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
				'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
				'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
				'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
				'ATRIBUTOS.ATRI_DESCRIPCION AS ATRIBUTO',
				'EMPLEADOATRIBUTO.EMAT_FECHA AS FECHA_ATRIBUTO',
				'EMPLEADOATRIBUTO.EMAT_OBSERVACIONES AS OBSERVACIONES_ATRIBUTO',
			]);

		return $query;
	}

	private function getQueryRm()
	{
		//Subquery para Postgres para cruzar contratos con Plantas
		$sqlCantContratos = '(SELECT COUNT(*) FROM "CONTRATOS"
			WHERE "CONTRATOS"."PROS_ID" = "PROSPECTOS"."PROS_ID"
		) AS "CANTIDAD_CONTRATOS"';
		//En Mysql, el query no debe tener comillas dobles.
        if(config('database.default') == 'mysql'){
    		$sqlCantContratos = str_replace('"', '', $sqlCantContratos);
        }


		$query = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
			->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
			->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
			->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
			->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
			->join('CASOSMEDICOS', 'CASOSMEDICOS.CONT_ID', '=', 'CONTRATOS.CONT_ID')
			->join('DIAGNOSTICOSGENERALES', 'DIAGNOSTICOSGENERALES.DIGE_ID', '=', 'CASOSMEDICOS.DIGE_ID')
			->join('ESTADOSRESTRICCION', 'ESTADOSRESTRICCION.ESRE_ID', '=', 'CASOSMEDICOS.ESRE_ID')
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
				'CARGOS.CARG_DESCRIPCION AS CARGO',
				'DIGE_DESCRIPCION AS DIAGNOSTICO_GENERAL',
				'CAME_DIAGESPECIFICO AS DIAGNOSTICO_ESPECIFICO',
				'CAME_CONTINGENCIA AS CONTINGENCIA',
				'CAME_FECHARESTRICCION AS FECHA_RESTRICCION',
				'ESRE_DESCRIPCION AS ESTADO_RESTRICCION',
				'CAME_LUGARREUBICACION AS LUGAR_REUBICACION',
				'CAME_LABOR AS LABOR',
				'TURN_DESCRIPCION AS TURNO',
				'CAME_PCL AS PCL',
				'CAME_NIVELPRODUCTIVIDAD AS NIVEL_PRODUCTIVIDAD',
				\DB::raw($sqlCantContratos),
				'PROSPECTOS.PROS_FECHANACIMIENTO AS FECHA_NACIMIENTO',
				'CONTRATOS.CONT_SALARIO AS SALARIO',
				'CAME_OBSERVACIONES AS OBSERVACIONES',
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
				'PROSPECTOS.PROS_SEXO as SEXO',
				'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
				'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
				'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
				'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES_CONTRATO',
				'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',
			]);

		return $query;
	}

	private function getQueryNovedadesRm()
	{
		
		$query = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
			->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
			->leftJoin('PROSPECTOS AS JEFES', 'JEFES.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
			->leftJoin('PROSPECTOS AS REMPLAZOS', 'REMPLAZOS.PROS_ID', '=', 'CONTRATOS.REMP_ID')
			->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
			->join('CASOSMEDICOS', 'CASOSMEDICOS.CONT_ID', '=', 'CONTRATOS.CONT_ID')
			->join('DIAGNOSTICOSGENERALES', 'DIAGNOSTICOSGENERALES.DIGE_ID', '=', 'CASOSMEDICOS.DIGE_ID')
			->join('ESTADOSRESTRICCION', 'ESTADOSRESTRICCION.ESRE_ID', '=', 'CASOSMEDICOS.ESRE_ID')
			->join('NOVEDADESMEDICAS', 'NOVEDADESMEDICAS.CAME_ID', '=', 'CASOSMEDICOS.CAME_ID')
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
				'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
				'CAME_FECHARESTRICCION AS FECHA_RESTRICCION',
				'ESRE_DESCRIPCION AS ESTADO_RESTRICCION',
				'NOME_FECHANOVEDAD AS FECHA_NOVEDAD',
				'NOME_DESCRIPCION AS DESCRIPCION_NOVEDAD',
				'NOME_OBSERVACIONES AS OBSERVACIONES_NOVEDAD'
				
			]);

		return $query;
	}

	private function getQueryActivosPlantilla()
	{
		$query = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
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
				'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
				'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
				'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
				'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
				expression_concat([
					'PROS_PRIMERAPELLIDO',
					'PROS_SEGUNDOAPELLIDO',
					'PROS_PRIMERNOMBRE',
					'PROS_SEGUNDONOMBRE'
				], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
				'CARGOS.CARG_DESCRIPCION AS CARGO',
				'PROSPECTOS.PROS_CEDULA as CEDULA',
				'CONTRATOS.CONT_ID AS CODIGO',
				'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
				'CONTRATOS.CONT_SALARIO AS SALARIO'
			]);

		return $query;
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function contratosActivos()
	{
		$query = $this->getQuery()
					->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES]);

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);
		if(isset($this->data['negocio']))
			$query->where('CONTRATOS.NEGO_ID', '=', $this->data['negocio']);

		return $this->buildJson($query);
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function historicoContratos()
	{
		$query = $this->getQuery();

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['estado']))
			$query->where('CONTRATOS.ESCO_ID', '=', $this->data['estado']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function activosPorPeriodo()
	{
		$query = $this->getQuery()
			//Solución #1 cuando el empleado se encuentra retirado (fecha de retiro diferente de nulo):
			//(CONT_FECHAINGRESO <= fchaIngresoDesde) AND (CONT_FECHARETIRO >= fchaIngresoDesde) AND (CONT_FECHARETIRO >= fchaIngresoHasta)
			->orWhere(function($query){
				$query->where('ESTADOSCONTRATOS.ESCO_ID', EstadoContrato::RETIRADO)
					->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoDesde']))
					->whereDate('CONT_FECHARETIRO', '>=', Carbon::parse($this->data['fchaIngresoDesde']))
					->whereDate('CONT_FECHARETIRO', '>=', Carbon::parse($this->data['fchaIngresoHasta']));
			})
			//Solución #2 cuando el empleado se encuentra retirado (fecha de retiro diferente de nulo):
			//(CONT_FECHAINGRESO >= fchaIngresoDesde) AND (CONT_FECHAINGRESO <= fchaIngresoHasta) AND (CONT_FECHARETIRO >= fchaIngresoHasta)
			->orwhere(function($query){
				$query->where('ESTADOSCONTRATOS.ESCO_ID', EstadoContrato::RETIRADO)
					->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']))
					->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']))
					->whereDate('CONT_FECHARETIRO', '>=', Carbon::parse($this->data['fchaIngresoHasta']));
			})
			//Solución #3 cuando el empleado se encuentra activo (fecha de retiro es nula):
			//((CONT_FECHAINGRESO <= fchaIngresoDesde) OR (CONT_FECHAINGRESO == fchaIngresoDesde)) AND (CONT_FECHAINGRESO <= fchaIngresoHasta)
			->orwhere(function($query){
				$query->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO,EstadoContrato::VACACIONES])
					->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']))
					->where(function($query){
						$query->orWhereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoDesde']))
							->orWhereDate('CONT_FECHAINGRESO', '=', Carbon::parse($this->data['fchaIngresoDesde']));
					});
			});

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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['estado']))
			$query->where('CONTRATOS.ESCO_ID', '=', $this->data['estado']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['negocio']))
			$query->where('CONTRATOS.NEGO_ID', '=', $this->data['negocio']);


		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function ingresosPorFecha()
	{
		$query = $this->getQuery()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO,EstadoContrato::RETIRADO,EstadoContrato::VACACIONES]);

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);
		if(isset($this->data['negocio']))
			$query->where('CONTRATOS.NEGO_ID', '=', $this->data['negocio']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function retirosPorFecha()
	{
		$query = $this->getQuery()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::RETIRADO]);

		if(isset($this->data['fchaRetiroDesde']))
			$query->whereDate('CONT_FECHARETIRO', '>=', Carbon::parse($this->data['fchaRetiroDesde']));
		if(isset($this->data['fchaRetiroHasta']))
			$query->whereDate('CONT_FECHARETIRO', '<=', Carbon::parse($this->data['fchaRetiroHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);
		if(isset($this->data['negocio']))
			$query->where('CONTRATOS.NEGO_ID', '=', $this->data['negocio']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function historiaPorCedula()
	{
		$query = $this->getQuery();

		if(isset($this->data['prospecto']))
			$query->where('CONTRATOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function proximosTemporalidad()
	{
		$days = $this->data['dias']; //Se debe leer desde la parametrización del sistema
		$filterDate = Carbon::now()->subDays($days);

		$query = $this->getQuery()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
			->where('CONTRATOS.TICO_ID', TipoContrato::INDIRECTO)
			->where('CONTRATOS.CLCO_ID', ClaseContrato::OBRALABOR)
			->whereDate('CONT_FECHAINGRESO', '<=', $filterDate);

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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);

		return $this->buildJson($query, $columnChart='E.S.T');
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function proximosFinalizar()
	{
		$days = $this->data['dias']; 
		$filterDate = Carbon::now()->addDays($days);

		$query = $this->getQuery()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
			->where('CONTRATOS.TICO_ID', TipoContrato::DIRECTO)
			->where('CONTRATOS.CLCO_ID', ClaseContrato::FIJO)
			->whereDate('CONT_FECHATERMINACION', '<=', $filterDate);

		if(isset($this->data['empresa']))
			$query->where('CONTRATOS.EMPL_ID', '=', $this->data['empresa']);
		if(isset($this->data['gerencia']))
			$query->where('CONTRATOS.GERE_ID', '=', $this->data['gerencia']);
		if(isset($this->data['centrocosto']))
			$query->where('CONTRATOS.CECO_ID', '=', $this->data['centrocosto']);
		if(isset($this->data['cargo']))
			$query->where('CONTRATOS.CARG_ID', '=', $this->data['cargo']);
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);

		return $this->buildJson($query, $columnChart='E.S.T');
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function headcountRm()
	{
		$query = $this->getQueryRm()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES]);

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['estadorestriccion']))
			$query->where('CASOSMEDICOS.ESRE_ID', '=', $this->data['estadorestriccion']);
		if(isset($this->data['diagnostico']))
			$query->where('CASOSMEDICOS.DIGE_ID', '=', $this->data['diagnostico']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function historicoRm()
	{
		$query = $this->getQueryRm()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES,EstadoContrato::RETIRADO]);

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['estadorestriccion']))
			$query->where('CASOSMEDICOS.ESRE_ID', '=', $this->data['estadorestriccion']);
		if(isset($this->data['estadocontrato']))
			$query->where('CONTRATOS.ESCO_ID', '=', $this->data['estadocontrato']);
		if(isset($this->data['porspecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function novedadesRm()
	{
		$query = $this->getQueryNovedadesRm()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES,EstadoContrato::RETIRADO]);

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['estadorestriccion']))
			$query->where('CASOSMEDICOS.ESRE_ID', '=', $this->data['estadorestriccion']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function atributosPorEmpleado()
	{
		$query = $this->getQueryAtributos()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES,EstadoContrato::RETIRADO]);

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['atributo']))
			$query->where('ATRIBUTOS.ATRI_ID', '=', $this->data['atributo']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function activosPlantillaNovedades()
	{
		$query = $this->getQueryActivosPlantilla()
			->whereIn('ESTADOSCONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES]);

		if(isset($this->data['fchaIngresoDesde']))
			$query->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIngresoDesde']));
		if(isset($this->data['fchaIngresoHasta']))
			$query->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaIngresoHasta']));
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
		if(isset($this->data['grupo']))
			$query->where('CONTRATOS.GRUP_ID', '=', $this->data['grupo']);
		if(isset($this->data['turno']))
			$query->where('CONTRATOS.TURN_ID', '=', $this->data['turno']);
		if(isset($this->data['atributo']))
			$query->where('ATRIBUTOS.ATRI_ID', '=', $this->data['atributo']);
		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

}