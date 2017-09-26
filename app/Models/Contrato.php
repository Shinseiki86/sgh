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

	public static function rules($id = 0){
		return [
			'EMPL_ID' => ['numeric', 'required'],
			'TEMP_ID' => ['numeric',],
			'TIEM_ID' => ['numeric', 'required'],
			'CECO_ID' => ['numeric', 'required'],
			'ESCO_ID' => ['numeric', 'required'],
			'TICO_ID' => ['numeric', 'required'],
			'CLCO_ID' => ['numeric', 'required'],
			'RIES_ID' => ['numeric', 'required'],
			'PROS_ID' => ['numeric', 'required'],
			'GRUP_ID' => ['numeric', 'required'],
			'TURN_ID' => ['numeric', 'required'],
			'CIUD_CONTRATA' => ['numeric', 'required'],
			'CIUD_SERVICIO' => ['numeric', 'required'],
			'JEFE_ID' => ['numeric'],
			'CARG_ID' => ['numeric', 'required'],
			'CONT_FECHAINGRESO' => ['date', 'required'],
			'CONT_FECHARETIRO' => ['date'],
			'MORE_ID' => ['numeric'],
			'CONT_SALARIO'      => ['numeric','required'],
			'CONT_VARIABLE'     => ['numeric'],
			'CONT_RODAJE'       => ['numeric'],
			'CONT_CASOMEDICO'   => ['required', 'max:2'],
			'CONT_OBSERVACIONES'=> ['max:300'],
			'ENTI_ID_eps' => ['required'],
			'ENTI_ID_arl' => ['required'],
			'ENTI_ID_ccf' => ['required'],
		];
	}

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

	public function entidades(){
		$foreingKey = 'CONT_ID';
		$otherKey   = 'ENTI_ID';
		return $this->belongsToMany(Entidad::class, 'CONTRATO_ENTIDAD', $foreingKey, $otherKey);
	}

	public function getEntidad($TIEN_ID){
		$entidad = $this->entidades()->where('TIEN_ID', $TIEN_ID)->get()->first();
		return isset($entidad->ENTI_ID) ? $entidad->ENTI_ID : '';
	}

}
