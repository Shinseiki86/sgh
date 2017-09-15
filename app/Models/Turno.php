<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Turno extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'TURNOS';
	protected $primaryKey = 'TURN_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TURN_FECHACREADO';
	const UPDATED_AT = 'TURN_FECHAMODIFICADO';
	const DELETED_AT = 'TURN_FECHAELIMINADO';
	protected $dates = ['TURN_FECHACREADO', 'TURN_FECHAMODIFICADO', 'TURN_FECHAELIMINADO'];

	protected $fillable = [
		'TURN_DESCRIPCION',
		'TURN_OBSERVACIONES',
		'TURN_CODIGO',
		'TURN_HORAINICIOPI',
		'TURN_HORAFINALPI',
		'TURN_HORAINICIOSI',
		'TURN_HORAFINALSI',
	];

	public function contratos()
	{
		$foreingKey = 'TURN_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	/*
	 * Relación EMPLEADORES-TURNOS (muchos a muchos). 
	 */
	public function empleadores()
	{
		$foreingKey = 'TURN_ID';
		$otherKey   = 'EMPL_ID';
		return $this->belongsToMany(Empleador::class, 'EMPLEADORES_TURNOS', $foreingKey,  $otherKey);
	}

}
