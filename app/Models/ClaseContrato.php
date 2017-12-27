<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class ClaseContrato extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CLASESCONTRATOS';
	protected $primaryKey = 'CLCO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CLCO_FECHACREADO';
	const UPDATED_AT = 'CLCO_FECHAMODIFICADO';
	const DELETED_AT = 'CLCO_FECHAELIMINADO';
	protected $dates = ['CLCO_FECHACREADO', 'CLCO_FECHAMODIFICADO', 'CLCO_FECHAELIMINADO'];

	protected $fillable = [
		'CLCO_DESCRIPCION',
		'CLCO_OBSERVACIONES',
	];

	//Constantes para referenciar las clases de un contrato
	const INDEFINIDO	= 1;
	const FIJO = 2;
	const OBRALABOR = 3;
	const APRENDIZAJE = 4;
	const COOPERATIVA = 5;

	public static function rules($id = 0){
		return [
			'CLCO_DESCRIPCION' => 'required|max:100|'.static::unique($id,'CLCO_DESCRIPCION'),
			'CLCO_OBSERVACIONES' => ['max:300'],
		];
	}

	public function contratos()
	{
		$foreingKey = 'CLCO_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

}
