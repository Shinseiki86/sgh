<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Negocio extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'NEGOCIOS';
	protected $primaryKey = 'NEGO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'NEGO_FECHACREADO';
	const UPDATED_AT = 'NEGO_FECHAMODIFICADO';
	const DELETED_AT = 'NEGO_FECHAELIMINADO';
	protected $dates = ['NEGO_FECHACREADO', 'NEGO_FECHAMODIFICADO', 'NEGO_FECHAELIMINADO'];

	protected $fillable = [
		'NEGO_DESCRIPCION',
		'EMPL_ID',
		'PROS_ID',
		'NEGO_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'NEGO_DESCRIPCION' => 'required|max:100|'.static::unique($id,'NEGO_DESCRIPCION'),
			'EMPL_ID' => 'required',
			'PROS_ID' => 'required',
			'NEGO_OBSERVACIONES' => 'max:300',
		];
	}

	public function empleador()
	{
		$foreingKey = 'EMPL_ID';
		return $this->belongsTo(Empleador::class, $foreingKey);
	}

	public function prospecto()
	{
		$foreingKey = 'PROS_ID';
		return $this->belongsTo(Prospecto::class, $foreingKey);
	}

	public function contratos()
	{
		$foreingKey = 'NEGO_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}


}
