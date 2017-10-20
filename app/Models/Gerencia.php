<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Gerencia extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'GERENCIAS';
	protected $primaryKey = 'GERE_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'GERE_FECHACREADO';
	const UPDATED_AT = 'GERE_FECHAMODIFICADO';
	const DELETED_AT = 'GERE_FECHAELIMINADO';
	protected $dates = ['GERE_FECHACREADO', 'GERE_FECHAMODIFICADO', 'GERE_FECHAELIMINADO'];

	protected $fillable = [
		'GERE_DESCRIPCION',
		'GERE_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			//'CARG_DESCRIPCION' => 'required|max:100|'.static::unique($id,'CARG_DESCRIPCION'),
		
		];
	}

	public function plantaslaborales()
	{
		$foreingKey = 'GERE_ID';
		return $this->hasMany(PlantaLaboral::class, $foreingKey);
	}

	public function contratos()
	{
		$foreingKey = 'GERE_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	/*
	 * Relación PROCESOS-GERENCIAS (muchos a muchos). 
	 */
	public function procesos()
	{
		$foreingKey = 'GERE_ID';
		$otherKey   = 'PROC_ID';
		return $this->belongsToMany(Proceso::class, 'GERENCIAS_PROCESOS', $foreingKey,  $otherKey);
	}

	/*
	 * Relación CENTROSCOSTOS-GERENCIAS (muchos a muchos). 
	 */
	public function centroscostos()
	{
		$foreingKey = 'GERE_ID';
		$otherKey   = 'CECO_ID';
		return $this->belongsToMany(CentroCosto::class, 'GERENCIAS_CENTROCOSTOS', $foreingKey,  $otherKey);
	}

	/*
	 * Relación EMPLEADORES-GERENCIAS (muchos a muchos). 
	 */
	public function empleadores()
	{
		$foreingKey = 'GERE_ID';
		$otherKey   = 'EMPL_ID';
		return $this->belongsToMany(Empleador::class, 'EMPLEADORES_GERENCIAS', $foreingKey,  $otherKey);
	}


}
