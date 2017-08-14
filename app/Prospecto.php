<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Prospecto extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'PROSPECTOS';
	protected $primaryKey = 'PROS_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'PROS_FECHACREADO';
	const UPDATED_AT = 'PROS_FECHAMODIFICADO';
	const DELETED_AT = 'PROS_FECHAELIMINADO';
	protected $dates = ['PROS_FECHACREADO', 'PROS_FECHAMODIFICADO', 'PROS_FECHAELIMINADO'];

	const CONT_ACTIVO   = 1;

	protected $fillable = [
		'PROS_CEDULA',
		'PROS_FECHAEXPEDICION',
		'PROS_PRIMERNOMBRE',
		'PROS_SEGUNDONOMBRE',
		'PROS_PRIMERAPELLIDO',
		'PROS_SEGUNDOAPELLIDO',
		'PROS_SEXO',
		'PROS_DIRECCION',
		'PROS_TELEFONO',
		'PROS_CELULAR',
		'PROS_CORREO',
		'PROS_MARCA',
		'PROS_MARCAOBSERVACIONES',
	];

	public function scopeActivos($query)
	{

		$query = $query 
			->join('CONTRATOS', 'CONTRATOS.PROS_ID', '=', 'PROSPECTOS.PROS_ID')
			->where('ESCO_ID',1);


		return $query;

	}

	public function contratos()
	{
		$foreingKey = 'PROS_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

}
