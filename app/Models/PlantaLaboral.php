<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class PlantaLaboral extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'PLANTASLABORALES';
	protected $primaryKey = 'PALA_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'PALA_FECHACREADO';
	const UPDATED_AT = 'PALA_FECHAMODIFICADO';
	const DELETED_AT = 'PALA_FECHAELIMINADO';
	protected $dates = ['PALA_FECHACREADO', 'PALA_FECHAMODIFICADO', 'PALA_FECHAELIMINADO'];

	protected $fillable = [
		'EMPL_ID',
		'GERE_ID',
		'CARG_ID',
		'PALA_CANTIDAD',
	];

	public static function rules($id = 0){
		$rules = [
			'CARG_ID' => ['numeric', 'required'],
			'GERE_ID' => ['numeric', 'required'],
			'EMPL_ID' => 'required|unique_with:PLANTASLABORALES,CARG_ID,GERE_ID',
			'PALA_CANTIDAD' => ['numeric','required'],
		];
		return $rules;
	}

	public function scopePlantas($query)
	{
		$query = $query 
			->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'PLANTASLABORALES.EMPL_ID')
			->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'PLANTASLABORALES.GERE_ID')
			->join('CARGOS', 'CARGOS.CARG_ID', '=', 'PLANTASLABORALES.CARG_ID');

		return $query;
	}

	public function empleador()
	{
		$foreingKey = 'EMPL_ID';
		return $this->belongsTo(Empleador::class, $foreingKey);
	}

	public function cargo()
	{
		$foreingKey = 'CARG_ID';
		return $this->belongsTo(Cargo::class, $foreingKey);
	}

	public function gerencia()
	{
		$foreingKey = 'GERE_ID';
		return $this->belongsTo(Gerencia::class, $foreingKey);
	}

	public function movimientosplantas()
	{
		$foreingKey = 'PALA_ID';
		return $this->hasMany(MovimientoPlanta::class, $foreingKey);
	}

}
