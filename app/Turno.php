<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

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
	];

}
