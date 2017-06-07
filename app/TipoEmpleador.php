<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Tiposempleadore extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'TIPOSEMPLEADORES';
	protected $primaryKey = 'TIEM_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TIEM_FECHACREADO';
	const UPDATED_AT = 'TIEM_FECHAMODIFICADO';
	const DELETED_AT = 'TIEM_FECHAELIMINADO';
	protected $dates = ['TIEM_FECHACREADO', 'TIEM_FECHAMODIFICADO', 'TIEM_FECHAELIMINADO'];

	protected $fillable = [
		'TIEM_DESCRIPCION',
		'TIEM_OBSERVACIONES',
	];

}
