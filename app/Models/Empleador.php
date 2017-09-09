<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Empleador extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'EMPLEADORES';
	protected $primaryKey = 'EMPL_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'EMPL_FECHACREADO';
	const UPDATED_AT = 'EMPL_FECHAMODIFICADO';
	const DELETED_AT = 'EMPL_FECHAELIMINADO';
	protected $dates = ['EMPL_FECHACREADO', 'EMPL_FECHAMODIFICADO', 'EMPL_FECHAELIMINADO'];

	protected $fillable = [
		'EMPL_RAZONSOCIAL',
		'EMPL_NOMBRECOMERCIAL',
		'EMPL_DIRECCION',
		'EMPL_OBSERVACIONES',
		'EMPL_NIT',
		'EMPL_CORREO',
		'EMPL_NOMBREREPRESENTANTE',
		'EMPL_CEDULAREPRESENTANTE',
		'CIUD_CEDULA',
		'CIUD_DOMICILIO',
	];

	public function ciudad_expedicion()
	{
		$foreingKey = 'CIUD_CEDULA';
		return $this->belongsTo(Ciudad::class, $foreingKey);
	}

	public function ciudad_domicilio()
	{
		$foreingKey = 'CIUD_DOMICILIO';
		return $this->belongsTo(Ciudad::class, $foreingKey);
	}

	public function turnos()
	{
		$foreingKey = 'EMPL_ID';
		return $this->hasMany(Turno::class, $foreingKey);
	}

	public function grupos()
	{
		$foreingKey = 'EMPL_ID';
		return $this->hasMany(Grupo::class, $foreingKey);
	}

	public function contratos()
	{
		$foreingKey = 'EMPL_ID';
		return $this->hasMany(Contrato::class, $foreingKey);
	}

	public function plantaslaborales()
	{
		$foreingKey = 'EMPL_ID';
		return $this->hasMany(PlantaLaboral::class, $foreingKey);
	}

}
