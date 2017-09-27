<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Riesgo extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'RIESGOS';
	protected $primaryKey = 'RIES_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'RIES_FECHACREADO';
	const UPDATED_AT = 'RIES_FECHAMODIFICADO';
	const DELETED_AT = 'RIES_FECHAELIMINADO';
	protected $dates = ['RIES_FECHACREADO', 'RIES_FECHAMODIFICADO', 'RIES_FECHAELIMINADO'];

	protected $fillable = [
		'RIES_DESCRIPCION',
		'RIES_FACTOR',
		'RIES_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			//'CARG_DESCRIPCION' => 'required|max:100|'.static::unique($id,'CARG_DESCRIPCION'),
		
		];
	}

	public function contratos()
	{
		$foreingKey = 'RIES_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

}
