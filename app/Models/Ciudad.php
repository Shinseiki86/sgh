<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Ciudad extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CIUDADES';
	protected $primaryKey = 'CIUD_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CIUD_FECHACREADO';
	const UPDATED_AT = 'CIUD_FECHAMODIFICADO';
	const DELETED_AT = 'CIUD_FECHAELIMINADO';
	protected $dates = ['CIUD_FECHACREADO', 'CIUD_FECHAMODIFICADO', 'CIUD_FECHAELIMINADO'];

	protected $fillable = [
		'CIUD_CODIGO',
		'CIUD_NOMBRE',
		'DEPA_ID',
	];

	public function departamento()
	{
		$foreingKey = 'DEPA_ID';
		return $this->belongsTo(Departamento::class, $foreingKey);
	}

	public function ciudad_contratos()
	{
		$foreingKey = 'CIUD_CONTRATA';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	public function ciudad_servicios()
	{
		$foreingKey = 'CIUD_SERVICIO';
		return $this->hasMany(Contrato::class, $foreingKey);
	}


}
