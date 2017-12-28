<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\TipoContrato;
use SGH\Models\ClaseContrato;

class RptContratosController extends ReporteController
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

}