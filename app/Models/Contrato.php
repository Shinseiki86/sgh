<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Contrato extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CONTRATOS';
	protected $primaryKey = 'CONT_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CONT_FECHACREADO';
	const UPDATED_AT = 'CONT_FECHAMODIFICADO';
	const DELETED_AT = 'CONT_FECHAELIMINADO';
	protected $dates = ['CONT_FECHACREADO', 'CONT_FECHAMODIFICADO', 'CONT_FECHAELIMINADO'];

	protected $fillable = [
		'PROS_ID',
		'CONT_CASOMEDICO',
		'CARG_ID',
		'CONT_FECHAINGRESO',
		'CONT_FECHARETIRO',
		'CONT_SALARIO',
		'CONT_VARIABLE',
		'CONT_RODAJE',
		'ESCO_ID',
		'MORE_ID',
		'TICO_ID',
		'CLCO_ID',
		'EMPL_ID',
		'RIES_ID',
		'TIEM_ID',
		'CECO_ID',
		'TURN_ID',
		'GRUP_ID',
		'JEFE_ID',
		'TEMP_ID',
		'CIUD_CONTRATA',
		'CIUD_SERVICIO',
		'CONT_OBSERVACIONES',
	];

	public function prospecto()
	{
		$foreingKey = 'PROS_ID';
		return $this->belongsTo(Prospecto::class, $foreingKey);
	}

	public function jefe()
	{
		$foreingKey = 'JEFE_ID';
		return $this->belongsTo(Jefe::class, $foreingKey);
	}

	public function cargo()
	{
		$foreingKey = 'CARG_ID';
		return $this->belongsTo(Cargo::class, $foreingKey);
	}

	public function estadocontrato()
	{
		$foreingKey = 'ESCO_ID';
		return $this->belongsTo(EstadoContrato::class, $foreingKey);
	}

	public function motivoretiro()
	{
		$foreingKey = 'MORE_ID';
		return $this->belongsTo(MotivoRetiro::class, $foreingKey);
	}

	public function tipocontrato()
	{
		$foreingKey = 'TICO_ID';
		return $this->belongsTo(TipoContrato::class, $foreingKey);
	}

	public function clasecontrato()
	{
		$foreingKey = 'CLCO_ID';
		return $this->belongsTo(ClaseContrato::class, $foreingKey);
	}

	public function empleador()
	{
		$foreingKey = 'EMPL_ID';
		return $this->belongsTo(Empleador::class, $foreingKey);
	}

	public function riesgo()
	{
		$foreingKey = 'RIES_ID';
		return $this->belongsTo(Riesgo::class, $foreingKey);
	}

	public function tipoempleador()
	{
		$foreingKey = 'TIEM_ID';
		return $this->belongsTo(TipoEmpleador::class, $foreingKey);
	}

	public function centrocosto()
	{
		$foreingKey = 'CECO_ID';
		return $this->belongsTo(CentroCosto::class, $foreingKey);
	}

	public function grupo()
	{
		$foreingKey = 'GRUP_ID';
		return $this->belongsTo(Grupo::class, $foreingKey);
	}

	public function turno()
	{
		$foreingKey = 'TURN_ID';
		return $this->belongsTo(Turno::class, $foreingKey);
	}

	public function temporal()
	{
		$foreingKey = 'TEMP_ID';
		return $this->belongsTo(Temporal::class, $foreingKey);
	}

	public function ciudad_contrata()
	{
		$foreingKey = 'CIUD_CONTRATA';
		return $this->belongsTo(Ciudad::class, $foreingKey);
	}

	public function ciudad_servicio()
	{
		$foreingKey = 'CIUD_SERVICIO';
		return $this->belongsTo(Ciudad::class, $foreingKey);
	}

}