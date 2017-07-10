<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Jefe extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'JEFES';
	protected $primaryKey = 'JEFE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'JEFE_FECHACREADO';
	const UPDATED_AT = 'JEFE_FECHAMODIFICADO';
	const DELETED_AT = 'JEFE_FECHAELIMINADO';
	protected $dates = ['JEFE_FECHACREADO', 'JEFE_FECHAMODIFICADO', 'JEFE_FECHAELIMINADO'];

	protected $fillable = [
		'PROS_ID',
		'JEFE_OBSERVACIONES',
	];

	public function prospecto()
	{
		$foreingKey = 'PROS_ID';
		return $this->belongsTo(Prospecto::class, $foreingKey);
	}

	public function scopeActivos($query)
	{

		$query = $query 
			->join('CONTRATOS', 'CONTRATOS.PROS_ID', '=', 'JEFES.PROS_ID')
			->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
			->where('ESCO_ID',1);


		return $query;

	}

}
