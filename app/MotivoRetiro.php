<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class MotivoRetiro extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'MOTIVOSRETIROS';
	protected $primaryKey = 'MORE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'MORE_FECHACREADO';
	const UPDATED_AT = 'MORE_FECHAMODIFICADO';
	const DELETED_AT = 'MORE_FECHAELIMINADO';
	protected $dates = ['MORE_FECHACREADO', 'MORE_FECHAMODIFICADO', 'MORE_FECHAELIMINADO'];

	protected $fillable = [
		'MORE_DESCRIPCION',
		'MORE_OBSERVACIONES',
	];

	public function contratos()
	{
		$foreingKey = 'MORE_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}
}
