<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Cargo extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CARGOS';
	protected $primaryKey = 'CARG_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CARG_FECHACREADO';
	const UPDATED_AT = 'CARG_FECHAMODIFICADO';
	const DELETED_AT = 'CARG_FECHAELIMINADO';
	protected $dates = ['CARG_FECHACREADO', 'CARG_FECHAMODIFICADO', 'CARG_FECHAELIMINADO'];

	protected $fillable = [
		'CARG_DESCRIPCION',
		'CNOS_ID',
		'CARG_OBSERVACIONES',
	];

	public function cno()
	{
		$foreingKey = 'CNOS_ID';
		return $this->belongsTo(Cnos::class, $foreingKey);
	}

	public function contratos()
	{
		$foreingKey = 'CARG_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	public function plantaslaborales()
	{
		$foreingKey = 'CARG_ID';
		return $this->hasMany(PlantaLaboral::class, $foreingKey);
	}

}
