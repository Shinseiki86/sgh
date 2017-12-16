<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Atributo extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'ATRIBUTOS';
	protected $primaryKey = 'ATRI_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ATRI_FECHACREADO';
	const UPDATED_AT = 'ATRI_FECHAMODIFICADO';
	const DELETED_AT = 'ATRI_FECHAELIMINADO';
	protected $dates = ['ATRI_FECHACREADO', 'ATRI_FECHAMODIFICADO', 'ATRI_FECHAELIMINADO'];

	protected $fillable = [
		'ATRI_DESCRIPCION',
		'ATRI_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'ATRI_DESCRIPCION' => 'required|max:300|'.static::unique($id,'ATRI_DESCRIPCION'),
			'ATRI_OBSERVACIONES' => ['max:300'],
		];
	}

	public function empleadoatributos()
	{
		$foreingKey = 'ATRI_ID';
		return $this->hasMany(EmpleadoAtributo::class, $foreingKey);
	}

}
