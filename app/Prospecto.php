<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Prospecto extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'PROSPECTOS';
	protected $primaryKey = 'PROS_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'PROS_FECHACREADO';
	const UPDATED_AT = 'PROS_FECHAMODIFICADO';
	const DELETED_AT = 'PROS_FECHAELIMINADO';
	protected $dates = ['PROS_FECHACREADO', 'PROS_FECHAMODIFICADO', 'PROS_FECHAELIMINADO'];

	protected $fillable = [
		'PROS_CEDULA',
		'PROS_FECHAEXPEDICION',
		'PROS_PRIMERNOMBRE',
		'PROS_SEGUNDONOMBRE',
		'PROS_PRIMERAPELLIDO',
		'PROS_SEGUNDOAPELLIDO',
		'PROS_SEXO',
		'PROS_DIRECCION',
		'PROS_TELEFONO',
		'PROS_CELULAR',
		'PROS_COREO',
	];

	public $sortable = [
		'PROS_CEDULA'
	];

}
