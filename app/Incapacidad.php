<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Incapacidad extends ModelWithSoftDeletes
{

	//Nombre de la tabla en la base de datos
	protected $table = 'INCAPACIDADES';
    protected $primaryKey = 'INCA_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'INCA_FECHACREADO';
	const UPDATED_AT = 'INCA_FECHAMODIFICADO';
	const DELETED_AT = 'INCA_FECHAELIMINADO';
	protected $dates = ['INCA_FECHACREADO', 'INCA_FECHAMODIFICADO', 'INCA_FECHAELIMINADO'];

	protected $fillable = [
		'INCA_EMPRESA',
		'INCA_IDENTIFICACION',
		'INCA_NOMBREEMPLEADO',
		'INCA_DX',
		'INCA_DXDESCRIPCION',
		'INCA_FECHAINICIO',
		'INCA_TOTALDIAS',
		'INCA_FECHAFINAL',
		'INCA_CONTINGENCIA',
		'INCA_INIPRO',
		'INCA_FECHAENVIO',
		'INCA_OBSERVACIONES',
		'INCA_PRIMERDIAAT',
		'INCA_DOCUMENTO'
	];

}
