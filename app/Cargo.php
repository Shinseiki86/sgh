<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Cargo extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CARGOS';
	protected $primaryKey = 'CARG_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CARG_FECHACREADO';
	const UPDATED_AT = 'CARG_FECHAMODIFICADO';
	const DELETED_AT = 'CARG_FECHAELIMINADO';
	protected $dates = ['CARG_FECHACREADO', 'CARG_FECHAMODIFICADO', 'CARG_FECHAELIMINADO'];

	protected $fillable = [
		'CARG_DESCRIPCION',
		'CNOS_ID',
		'CARG_OBSERVACIONES',
	];

	public $sortable = [
		'CARG_ID',
		'CARG_DESCRIPCION',
	];

	public function cno()
	{
		$foreingKey = 'CNOS_ID';
		return $this->belongsTo(Cno::class, $foreingKey);
	}

}
