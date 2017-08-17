<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class EstadoTicket extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'ESTADOSTICKETS';
	protected $primaryKey = 'ESTI_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ESTI_FECHACREADO';
	const UPDATED_AT = 'ESTI_FECHAMODIFICADO';
	const DELETED_AT = 'ESTI_FECHAELIMINADO';
	protected $dates = ['ESTI_FECHACREADO', 'ESTI_FECHAMODIFICADO', 'ESTI_FECHAELIMINADO'];

	protected $fillable = [
		'ESTI_DESCRIPCION',
		'ESTI_COLOR',
		'ESTI_OBSERVACIONES',
	];

}
