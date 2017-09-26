<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class TipoContrato extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'TIPOSCONTRATOS';
	protected $primaryKey = 'TICO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TICO_FECHACREADO';
	const UPDATED_AT = 'TICO_FECHAMODIFICADO';
	const DELETED_AT = 'TICO_FECHAELIMINADO';
	protected $dates = ['TICO_FECHACREADO', 'TICO_FECHAMODIFICADO', 'TICO_FECHAELIMINADO'];

	protected $fillable = [
		'TICO_DESCRIPCION',
		'TICO_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'TICO_DESCRIPCION' => 'required|max:100|'.static::unique($id,'TICO_DESCRIPCION'),
			'TICO_OBSERVACIONES' => ['max:300'],
		];
	}

	public function contratos()
	{
		$foreingKey = 'TICO_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

}
