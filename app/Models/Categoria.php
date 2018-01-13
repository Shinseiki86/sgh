<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Categoria extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CATEGORIAS';
	protected $primaryKey = 'CATE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CATE_FECHACREADO';
	const UPDATED_AT = 'CATE_FECHAMODIFICADO';
	const DELETED_AT = 'CATE_FECHAELIMINADO';
	protected $dates = ['CATE_FECHACREADO', 'CATE_FECHAMODIFICADO', 'CATE_FECHAELIMINADO'];

	protected $fillable = [
		'CATE_DESCRIPCION',
		'CATE_COLOR',
		'PROC_ID',
		'CATE_OBSERVACIONES',
	];

	public static function rules($id = 0){
		$rules = [
			'CATE_DESCRIPCION' => ['required','max:100'],
			'CATE_OBSERVACIONES' => ['max:300'],
			'PROC_ID' => ['required'],
		];
		return $rules;
	}

	public function procesos()
	{
		$foreingKey = 'PROC_ID';
		return $this->belongsTo(Proceso::class, $foreingKey);
	}


}


