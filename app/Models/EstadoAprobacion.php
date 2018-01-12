<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class EstadoAprobacion extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'ESTADOSAPROBACIONES';
	protected $primaryKey = 'ESAP_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ESAP_FECHACREADO';
	const UPDATED_AT = 'ESAP_FECHAMODIFICADO';
	const DELETED_AT = 'ESAP_FECHAELIMINADO';
	protected $dates = ['ESAP_FECHACREADO', 'ESAP_FECHAMODIFICADO', 'ESAP_FECHAELIMINADO'];

	protected $fillable = [
		'ESAP_DESCRIPCION',
		'ESAP_COLOR',
		'ESAP_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'ESAP_DESCRIPCION' => ['required', 'max:100', 'unique:ESTADOSAPROBACIONES,ESAP_DESCRIPCION,'.$id.',ESAP_ID'],
			'ESAP_COLOR' => ['required', 'max:100'],
			'ESAP_OBSERVACIONES' => ['max:300'],
		];
	}

	//Constantes para referenciar los estados de aprobación
	const REVISION	 = 1;
	const ENVIADO    = 2;
	const RECHAZADO  = 3;
	const FINALIZADO = 4;

}
