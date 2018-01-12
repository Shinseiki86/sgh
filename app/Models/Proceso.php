<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Proceso extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'PROCESOS';
	protected $primaryKey = 'PROC_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'PROC_FECHACREADO';
	const UPDATED_AT = 'PROC_FECHAMODIFICADO';
	const DELETED_AT = 'PROC_FECHAELIMINADO';
	protected $dates = ['PROC_FECHACREADO', 'PROC_FECHAMODIFICADO', 'PROC_FECHAELIMINADO'];

	protected $fillable = [
		'PROC_DESCRIPCION',
		'PROC_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'PROC_DESCRIPCION' => ['required','max:100','unique:PROCESOS,PROC_DESCRIPCION,'.$id.',PROC_ID'],
			'PROC_OBSERVACIONES' => ['max:300'],
			'GERE_ids' => ['array'],
		
		];
	}

	/*
	 * Relación PROCESOS-GERENCIAS (muchos a muchos). 
	 */
	public function gerencias()
	{
		$foreingKey = 'PROC_ID';
		$otherKey   = 'GERE_ID';
		return $this->belongsToMany(Gerencia::class, 'GERENCIAS_PROCESOS', $foreingKey,  $otherKey);
	}

}
