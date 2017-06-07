<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Temporale extends ModelWithSoftDeletes
{
	//Nombre de la tabla en la base de datos
	protected $table = 'TEMPORALES';
	protected $primaryKey = 'TEMP_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TEMP_FECHACREADO';
	const UPDATED_AT = 'TEMP_FECHAMODIFICADO';
	const DELETED_AT = 'TEMP_FECHAELIMINADO';
	protected $dates = ['TEMP_FECHACREADO', 'TEMP_FECHAMODIFICADO', 'TEMP_FECHAELIMINADO'];

	protected $fillable = [
		'TEMP_RAZONSOCIAL',
		'TEMP_NOMBRECOMERCIAL',
		'TEMP_DIRECCION',
		'TEMP_OBSERVACIONES',
	];

}
