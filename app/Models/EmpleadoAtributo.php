<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class EmpleadoAtributo extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'EMPLEADOATRIBUTO';
	protected $primaryKey = 'EMAT_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'EMAT_FECHACREADO';
	const UPDATED_AT = 'EMAT_FECHAMODIFICADO';
	const DELETED_AT = 'EMAT_FECHAELIMINADO';
	protected $dates = ['EMAT_FECHACREADO', 'EMAT_FECHAMODIFICADO', 'EMAT_FECHAELIMINADO'];

	protected $fillable = [
		'CONT_ID',
		'ATRI_ID',
		'EMAT_FECHA',
		'EMAT_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'CONT_ID' => 'required|unique_with:EMPLEADOATRIBUTO,ATRI_ID',
			'ATRI_ID' => ['required'],
			'EMAT_FECHA' => ['required'],
			'EMAT_OBSERVACIONES' => ['max:300'],
			//'EMPL_ID' => 'required|unique_with:PLANTASLABORALES,CARG_ID,GERE_ID',
		];
	}

	public function contrato()
	{
		$foreingKey = 'CONT_ID';
		return $this->belongsTo(Contrato::class, $foreingKey);
	}

	public function atributo()
	{
		$foreingKey = 'ATRI_ID';
		return $this->belongsTo(Atributo::class, $foreingKey);
	}

}
