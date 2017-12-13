<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class MovimientoPlanta extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'MOVIMIENTOS_PLANTAS';
	protected $primaryKey = 'MOPL_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'MOPL_FECHACREADO';
	const UPDATED_AT = 'MOPL_FECHAMODIFICADO';
	const DELETED_AT = 'MOPL_FECHAELIMINADO';
	protected $dates = ['MOPL_FECHACREADO', 'MOPL_FECHAMODIFICADO', 'MOPL_FECHAELIMINADO'];

	protected $fillable = [
		'PALA_ID',
		'MOPL_MOTIVO',
		'MOPL_FECHAMOVIMIENTO',
		'MOPL_CANTIDAD',
		'MOPL_OBSERVACIONES',
	];

	public static function rules($id = 0){
		$rules = [
			'PALA_ID' => ['numeric', 'required'],
			'MOPL_MOTIVO' => ['max:300', 'required'],
			'MOPL_CANTIDAD' => ['numeric', 'required'],
			'MOPL_OBSERVACIONES' => ['max:300'],
		];
		return $rules;
	}

	public function plantalaboral()
	{
		$foreingKey = 'PALA_ID';
		return $this->belongsTo(PlantaLaboral::class, $foreingKey);
	}

}
