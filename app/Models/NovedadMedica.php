<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class NovedadMedica extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'NOVEDADESMEDICAS';
	protected $primaryKey = 'NOME_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'NOME_FECHACREADO';
	const UPDATED_AT = 'NOME_FECHAMODIFICADO';
	const DELETED_AT = 'NOME_FECHAELIMINADO';
	protected $dates = ['NOME_FECHACREADO', 'NOME_FECHAMODIFICADO', 'NOME_FECHAELIMINADO'];

	protected $fillable = [
		'NOME_FECHANOVEDAD',
		'NOME_DESCRIPCION',
		'NOME_OBSERVACIONES',
		'CAME_ID'
	];

	public static function rules($id = 0){
		return [
			'NOME_FECHANOVEDAD' => ['required'],
			'NOME_DESCRIPCION' =>   ['required', 'max:300'],
			'NOME_OBSERVACIONES' => ['max:300'],
			'CAME_ID' => ['required']
		];
	}

	public function casomedico()
	{
		$foreingKey = 'CAME_ID';
		return $this->belongsTo(CasoMedico::class, $foreingKey);
	}
	

}
