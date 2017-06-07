<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Motivosretiro extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'MOTIVOSRETIROS';
	protected $primaryKey = 'MORE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'MORE_FECHACREADO';
	const UPDATED_AT = 'MORE_FECHAMODIFICADO';
	const DELETED_AT = 'MORE_FECHAELIMINADO';
	protected $dates = ['MORE_FECHACREADO', 'MORE_FECHAMODIFICADO', 'MORE_FECHAELIMINADO'];

	protected $fillable = [
		'MORE_DESCRIPCION',
		'MORE_OBSERVACIONES',
	];
}
