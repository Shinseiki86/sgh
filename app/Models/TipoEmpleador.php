<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class TipoEmpleador extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'TIPOSEMPLEADORES';
	protected $primaryKey = 'TIEM_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TIEM_FECHACREADO';
	const UPDATED_AT = 'TIEM_FECHAMODIFICADO';
	const DELETED_AT = 'TIEM_FECHAELIMINADO';
	protected $dates = ['TIEM_FECHACREADO', 'TIEM_FECHAMODIFICADO', 'TIEM_FECHAELIMINADO'];

	//Constantes para referenciar los tipos de empleador
	const  DIRECTO	 = 1;
	const  TEMPORAL   = 2;

	protected $fillable = [
		'TIEM_DESCRIPCION',
		'TIEM_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			//'CARG_DESCRIPCION' => 'required|max:100|'.static::unique($id,'CARG_DESCRIPCION'),
		
		];
	}

	public function contratos()
	{
		$foreingKey = 'TIEM_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

}
