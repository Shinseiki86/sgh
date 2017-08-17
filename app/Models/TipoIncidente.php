<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class TipoIncidente extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'TIPOSINCIDENTES';
	protected $primaryKey = 'TIIN_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TIIN_FECHACREADO';
	const UPDATED_AT = 'TIIN_FECHAMODIFICADO';
	const DELETED_AT = 'TIIN_FECHAELIMINADO';
	protected $dates = ['TIIN_FECHACREADO', 'TIIN_FECHAMODIFICADO', 'TIIN_FECHAELIMINADO'];

	protected $fillable = [
		'TIIN_DESCRIPCION',
		'TIIN_OBSERVACIONES',
	];

}
