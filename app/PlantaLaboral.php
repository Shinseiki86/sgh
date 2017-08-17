<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

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
		'CARG_ID',
		'PALA_CANTIDAD',
	];

	public function empleador()
	{
		$foreingKey = 'EMPL_ID';
		return $this->belongsTo(Empleador::class, $foreingKey);
	}

	public function cargos()
	{
		$foreingKey = 'CARG_ID';
		return $this->hasMany(Cargo::class, $foreingKey);
	}

}
