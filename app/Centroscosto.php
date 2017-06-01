<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Centroscosto extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CENTROSCOSTOS';
	protected $primaryKey = 'CECO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CECO_FECHACREADO';
	const UPDATED_AT = 'CECO_FECHAMODIFICADO';
	const DELETED_AT = 'CECO_FECHAELIMINADO';
	protected $dates = ['CECO_FECHACREADO', 'CECO_FECHAMODIFICADO', 'CECO_FECHAELIMINADO'];

	protected $fillable = [
		'CECO_CODIGO',
		'CECO_DESCRIPCION',
		'GERE_ID',
		'CECO_OBSERVACIONES',
	];

	public $sortable = [
		'CECO_ID',
		'CECO_DESCRIPCION',
	];

	public function gerencia()
	{
		$foreingKey = 'GERE_ID';
		return $this->belongsTo(Gerencia::class, $foreingKey);
	}

}
