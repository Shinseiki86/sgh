<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Riesgo extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'RIESGOS';
	protected $primaryKey = 'RIES_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'RIES_FECHACREADO';
	const UPDATED_AT = 'RIES_FECHAMODIFICADO';
	const DELETED_AT = 'RIES_FECHAELIMINADO';
	protected $dates = ['RIES_FECHACREADO', 'RIES_FECHAMODIFICADO', 'RIES_FECHAELIMINADO'];

	protected $fillable = [
		'RIES_DESCRIPCION',
		'RIES_FACTOR',
		'RIES_OBSERVACIONES',
	];

}
