<?php

namespace SGH;

use Kyslik\ColumnSortable\Sortable;
use SGH\ModelWithSoftDeletes;

class Ciudad extends ModelWithSoftDeletes
{
	use Sortable;
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CIUDADES';
	protected $primaryKey = 'CIUD_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CIUD_FECHACREADO';
	const UPDATED_AT = 'CIUD_FECHAMODIFICADO';
	const DELETED_AT = 'CIUD_FECHAELIMINADO';
	protected $dates = ['CIUD_FECHACREADO', 'CIUD_FECHAMODIFICADO', 'CIUD_FECHAELIMINADO'];

	protected $fillable = [
		'CIUD_CODIGO',
		'CIUD_DESCRIPCION',
		'DEPA_ID',
	];

	public $sortable = [
		'DEPA_CODIGO',
		'DEPA_DESCRIPCION',
	];

	public function departamento()
	{
		$foreingKey = 'DEPA_ID';
		return $this->belongsTo(Departamento::class, $foreingKey);
	}


}
