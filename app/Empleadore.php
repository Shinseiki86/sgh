<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Empleadore extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'EMPLEADORES';
	protected $primaryKey = 'EMPL_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'EMPL_FECHACREADO';
	const UPDATED_AT = 'EMPL_FECHAMODIFICADO';
	const DELETED_AT = 'EMPL_FECHAELIMINADO';
	protected $dates = ['EMPL_FECHACREADO', 'EMPL_FECHAMODIFICADO', 'EMPL_FECHAELIMINADO'];

	protected $fillable = [
		'EMPL_RAZONSOCIAL',
		'EMPL_NOMBRECOMERCIAL',
		'EMPL_DIRECCION',
		'EMPL_OBSERVACIONES',
	];

	public $sortable = [
		'EMPL_RAZONSOCIAL',
	];

}
