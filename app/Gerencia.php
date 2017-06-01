<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Gerencia extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'GERENCIAS';
	protected $primaryKey = 'GERE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'GERE_FECHACREADO';
	const UPDATED_AT = 'GERE_FECHAMODIFICADO';
	const DELETED_AT = 'GERE_FECHAELIMINADO';
	protected $dates = ['GERE_FECHACREADO', 'GERE_FECHAMODIFICADO', 'GERE_FECHAELIMINADO'];

	protected $fillable = [
		'GERE_DESCRIPCION',
		'EMPL_ID',
		'GERE_OBSERVACIONES',
	];

	public $sortable = [
		'GERE_ID',
		'GERE_DESCRIPCION',
	];

	public function empleador()
	{
		$foreingKey = 'EMPL_ID';
		return $this->belongsTo(Empleadore::class, $foreingKey);
	}

}
