<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Tiposcontrato extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'TIPOSCONTRATOS';
	protected $primaryKey = 'TICO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TICO_FECHACREADO';
	const UPDATED_AT = 'TICO_FECHAMODIFICADO';
	const DELETED_AT = 'TICO_FECHAELIMINADO';
	protected $dates = ['TICO_FECHACREADO', 'TICO_FECHAMODIFICADO', 'TICO_FECHAELIMINADO'];

	protected $fillable = [
		'TICO_DESCRIPCION',
		'TICO_OBSERVACIONES',
	];

	public $sortable = [
		'TICO_DESCRIPCION',
	];

}
