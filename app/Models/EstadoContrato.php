<?php
namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class EstadoContrato extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'ESTADOSCONTRATOS';
	protected $primaryKey = 'ESCO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ESCO_FECHACREADO';
	const UPDATED_AT = 'ESCO_FECHAMODIFICADO';
	const DELETED_AT = 'ESCO_FECHAELIMINADO';
	protected $dates = ['ESCO_FECHACREADO', 'ESCO_FECHAMODIFICADO', 'ESCO_FECHAELIMINADO'];

	protected $fillable = [
		'ESCO_DESCRIPCION',
		'ESCO_OBSERVACIONES',
	];

	//Constantes para referenciar los estados de un contrato
	const ACTIVO	= 1;
	const VACACIONES= 2;
	const RETIRADO	= 3;

	public static function rules($id = 0){
		return [
			'ESCO_DESCRIPCION' => 'required|max:100|'.static::unique($id,'ESCO_DESCRIPCION'),
			'ESCO_OBSERVACIONES' => ['max:300'],
		];
	}

	public function contratos()
	{
		$foreingKey = 'ESCO_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

}
