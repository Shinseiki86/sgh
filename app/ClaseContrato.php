<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class ClaseContrato extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CLASESCONTRATOS';
	protected $primaryKey = 'CLCO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CLCO_FECHACREADO';
	const UPDATED_AT = 'CLCO_FECHAMODIFICADO';
	const DELETED_AT = 'CLCO_FECHAELIMINADO';
	protected $dates = ['CLCO_FECHACREADO', 'CLCO_FECHAMODIFICADO', 'CLCO_FECHAELIMINADO'];

	protected $fillable = [
		'CLCO_DESCRIPCION',
		'CLCO_OBSERVACIONES',
	];

}
