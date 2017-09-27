<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Prioridad extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'PRIORIDADES';
	protected $primaryKey = 'PRIO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'PRIO_FECHACREADO';
	const UPDATED_AT = 'PRIO_FECHAMODIFICADO';
	const DELETED_AT = 'PRIO_FECHAELIMINADO';
	protected $dates = ['PRIO_FECHACREADO', 'PRIO_FECHAMODIFICADO', 'PRIO_FECHAELIMINADO'];

	protected $fillable = [
		'PRIO_DESCRIPCION',
		'PRIO_COLOR',
		'PRIO_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			//'CARG_DESCRIPCION' => 'required|max:100|'.static::unique($id,'CARG_DESCRIPCION'),
		
		];
	}

}
