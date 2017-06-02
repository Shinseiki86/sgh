<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Estadoscontrato extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'ESTADOSCONTRATOS';
	protected $primaryKey = 'ESCO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ESCO_FECHACREADO';
	const UPDATED_AT = 'ESCO_FECHAMODIFICADO';
	const DELETED_AT = 'ESCO_FECHAELIMINADO';
	protected $dates = ['ESCO_FECHACREADO', 'ESCO_FECHAMODIFICADO', 'ESCO_FECHAELIMINADO'];

	protected $fillable = [
		'ESCO_DESCRIPCION',
		'ESCO_OBSERVACIONES',
	];

	public $sortable = [
		'ESCO_DESCRIPCION',
	];

}
