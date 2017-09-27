<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class CentroCosto extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CENTROSCOSTOS';
	protected $primaryKey = 'CECO_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CECO_FECHACREADO';
	const UPDATED_AT = 'CECO_FECHAMODIFICADO';
	const DELETED_AT = 'CECO_FECHAELIMINADO';
	protected $dates = ['CECO_FECHACREADO', 'CECO_FECHAMODIFICADO', 'CECO_FECHAELIMINADO'];

	protected $fillable = [
		'CECO_CODIGO',
		'CECO_DESCRIPCION',
		'GERE_ID',
		'CECO_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'CECO_CODIGO' => 'numeric|required|'.static::unique($id,'CECO_CODIGO'),
			'CECO_DESCRIPCION'   => ['required', 'max:100'],
			'GERE_ID'            => ['required'],
			'CECO_OBSERVACIONES' => ['max:300'],
		];
	}

	public function gerencia()
	{
		$foreingKey = 'GERE_ID';
		return $this->belongsTo(Gerencia::class, $foreingKey);
	}

	public function contratos()
	{
		$foreingKey = 'CECO_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	/*
	 * Relación CENTROSCOSTOS-GERENCIAS (muchos a muchos). 
	 */
	public function gerencias()
	{
		$foreingKey = 'CECO_ID';
		$otherKey   = 'GERE_ID';
		return $this->belongsToMany(Gerencia::class, 'GERENCIAS_CENTROCOSTOS', $foreingKey,  $otherKey);
	}

}
