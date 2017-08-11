<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Pais extends ModelWithSoftDeletes
{

	//Nombre de la tabla en la base de datos
	protected $table = 'PAISES';
    protected $primaryKey = 'PAIS_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'PAIS_FECHACREADO';
	const UPDATED_AT = 'PAIS_FECHAMODIFICADO';
	const DELETED_AT = 'PAIS_FECHAELIMINADO';
	protected $dates = ['PAIS_FECHACREADO', 'PAIS_FECHAMODIFICADO', 'PAIS_FECHAELIMINADO'];

	protected $fillable = [
		'PAIS_CODIGO',
		'PAIS_NOMBRE',
	];
	
	public function departamentos()
	{
		$foreingKey = 'PAIS_ID';
		return $this->hasMany(Departamento::class, $foreingKey);
	}

}
