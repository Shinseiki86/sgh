<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Tnl extends ModelWithSoftDeletes
{

	//Nombre de la tabla en la base de datos
	protected $table = 'TNLS';
    protected $primaryKey = 'TNLA_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TNLA_FECHACREADO';
	const UPDATED_AT = 'TNLA_FECHAMODIFICADO';
	const DELETED_AT = 'TNLA_FECHAELIMINADO';
	protected $dates = ['TNLA_FECHACREADO', 'TNLA_FECHAMODIFICADO', 'TNLA_FECHAELIMINADO'];

	protected $fillable = [
		'TNLA_EMPRESA',
		'TNLA_IDENTIFICACION',
		'TNLA_NOMBREEMPLEADO',
		'TNLA_NOVEDAD',
		'TNLA_FECHAINICIO',
		'TNLA_FECHAFINAL',
		'TNLA_TOTALDIAS',
		'TNLA_OBSERVACIONES',
		'TNLA_DOCUMENTO'
	];


}
