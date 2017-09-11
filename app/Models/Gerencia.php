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
		'EMPL_ID',
		'GERE_OBSERVACIONES',
	];


	public function empleador()
	{
		$foreingKey = 'EMPL_ID';
		return $this->belongsTo(Empleador::class, $foreingKey);
	}

	public function plantaslaborales()
	{
		$foreingKey = 'GERE_ID';
		return $this->hasMany(PlantaLaboral::class, $foreingKey);
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

}
