<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Temporal extends ModelWithSoftDeletes
{
	//Nombre de la tabla en la base de datos
	protected $table = 'TEMPORALES';
	protected $primaryKey = 'TEMP_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TEMP_FECHACREADO';
	const UPDATED_AT = 'TEMP_FECHAMODIFICADO';
	const DELETED_AT = 'TEMP_FECHAELIMINADO';
	protected $dates = ['TEMP_FECHACREADO', 'TEMP_FECHAMODIFICADO', 'TEMP_FECHAELIMINADO'];

	protected $fillable = [
		'TEMP_RAZONSOCIAL',
		'TEMP_NOMBRECOMERCIAL',
		'TEMP_DIRECCION',
		'TEMP_OBSERVACIONES',
		'PROS_ID',
	];

	public static function rules($id = 0){
		return [
			'TEMP_RAZONSOCIAL' => ['required', 'max:100'],
			'TEMP_NOMBRECOMERCIAL' => ['required', 'max:100'],
			'TEMP_DIRECCION' => ['required', 'max:100'],
			'TEMP_OBSERVACIONES' => ['max:300'],
			'PROS_ID' => ['required'],
		];
	}

	public function contratos()
	{
		$foreingKey = 'TEMP_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	public function prospecto()
	{
		$foreingKey = 'PROS_ID';
		return $this->belongsTo(Prospecto::class, $foreingKey);
	}

}
