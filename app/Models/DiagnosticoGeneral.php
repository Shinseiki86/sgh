<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class DiagnosticoGeneral extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'DIAGNOSTICOSGENERALES';
	protected $primaryKey = 'DIGE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'DIGE_FECHACREADO';
	const UPDATED_AT = 'DIGE_FECHAMODIFICADO';
	const DELETED_AT = 'DIGE_FECHAELIMINADO';
	protected $dates = ['DIGE_FECHACREADO', 'DIGE_FECHAMODIFICADO', 'DIGE_FECHAELIMINADO'];

	//Constantes para referenciar los tipos de empleador
	const  DIRECTO	 = 1;
	const  TEMPORAL   = 2;

	protected $fillable = [
		'DIGE_DESCRIPCION',
		'DIGE_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'DIGE_DESCRIPCION' => ['required', 'max:300', 'unique:DIAGNOSTICOSGENERALES,DIGE_DESCRIPCION,'.$id.',DIGE_ID'],
			'DIGE_OBSERVACIONES' => ['max:300'],
		
		];
	}

	

}
