<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Grupo extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'GRUPOS';
	protected $primaryKey = 'GRUP_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'GRUP_FECHACREADO';
	const UPDATED_AT = 'GRUP_FECHAMODIFICADO';
	const DELETED_AT = 'GRUP_FECHAELIMINADO';
	protected $dates = ['GRUP_FECHACREADO', 'GRUP_FECHAMODIFICADO', 'GRUP_FECHAELIMINADO'];

	protected $fillable = [
		'GRUP_DESCRIPCION',
		'GRUP_OBSERVACIONES',
		'EMPL_ID',
	];

	public function contratos()
	{
		$foreingKey = 'GRUP_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	/*
	 * Relación EMPLEADORES-GRUPOS (muchos a muchos). 
	 */
	public function empleadores()
	{
		$foreingKey = 'GRUP_ID';
		$otherKey   = 'EMPL_ID';
		return $this->belongsToMany(Empleador::class, 'EMPLEADORES_GRUPOS', $foreingKey,  $otherKey);
	}

}
