<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class EstadoRestriccion extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'ESTADOSRESTRICCION';
	protected $primaryKey = 'ESRE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ESRE_FECHACREADO';
	const UPDATED_AT = 'ESRE_FECHAMODIFICADO';
	const DELETED_AT = 'ESRE_FECHAELIMINADO';
	protected $dates = ['ESRE_FECHACREADO', 'ESRE_FECHAMODIFICADO', 'ESRE_FECHAELIMINADO'];

	//Constantes para referenciar los tipos de empleador
	const  DIRECTO	 = 1;
	const  TEMPORAL   = 2;

	protected $fillable = [
		'ESRE_DESCRIPCION',
		'ESRE_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'ESRE_DESCRIPCION' => ['required', 'max:300', 'unique:ESTADOSRESTRICCION,ESRE_DESCRIPCION,'.$id.',ESRE_ID'],
			'ESRE_OBSERVACIONES' => ['max:300'],
		
		];
	}

	

}
