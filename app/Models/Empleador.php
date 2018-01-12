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
		'PROS_ID'
	];

	public static function rules($id = 0){
		return [
			'EMPL_RAZONSOCIAL' => ['required', 'max:300', 'unique:EMPLEADORES,EMPL_RAZONSOCIAL,'.$id.',EMPL_ID'],
			'EMPL_NOMBRECOMERCIAL' => ['required', 'max:300', 'unique:EMPLEADORES,EMPL_NOMBRECOMERCIAL,'.$id.',EMPL_ID'],
			'EMPL_NIT' => ['required', 'max:15', 'unique:EMPLEADORES,EMPL_NIT,'.$id.',EMPL_ID'],
			'EMPL_DIRECCION' => ['required', 'max:300'],
			'EMPL_OBSERVACIONES' => ['max:300'],
			'EMPL_NOMBREREPRESENTANTE' => ['required','max:300'],
			'EMPL_CEDULAREPRESENTANTE' => ['required'],
			'CIUD_CEDULA' => ['required'],
			'PROS_ID' => ['required'],
			'CIUD_DOMICILIO' => ['required'],
			'GERE_ids' => ['array'],
			'TURN_ids' => ['array'],
			'GRUP_ids' => ['array'],
		
		];
	}

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

	public function prospecto()
	{
		$foreingKey = 'PROS_ID';
		return $this->belongsTo(Prospecto::class, $foreingKey);
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

	/*
	 * Relación GERENCIAS-EMPLEADORES (muchos a muchos). 
	 */
	public function gerencias()
	{
		$foreingKey = 'EMPL_ID';
		$otherKey   = 'GERE_ID';
		return $this->belongsToMany(Gerencia::class, 'EMPLEADORES_GERENCIAS', $foreingKey,  $otherKey);
	}

	/*
	 * Relación TURNOS-EMPLEADORES (muchos a muchos). 
	 */
	public function turnos()
	{
		$foreingKey = 'EMPL_ID';
		$otherKey   = 'TURN_ID';
		return $this->belongsToMany(Turno::class, 'EMPLEADORES_TURNOS', $foreingKey,  $otherKey);
	}

	/*
	 * Relación GRUPOS-EMPLEADORES (muchos a muchos). 
	 */
	public function grupos()
	{
		$foreingKey = 'EMPL_ID';
		$otherKey   = 'GRUP_ID';
		return $this->belongsToMany(Grupo::class, 'EMPLEADORES_GRUPOS', $foreingKey,  $otherKey);
	}

	public function negocios()
	{
		$foreingKey = 'NEGO_ID';
		return $this->hasMany(Negocio::class, $foreingKey);
	}

	/*
	 * Relación USERS-EMPLEADORES (muchos a muchos). 
	 */
	public function users()
	{
		$foreingKey = 'EMPL_ID';
		$otherKey   = 'USER_id';
		return $this->belongsToMany(User::class, 'USUARIOS_EMPLEADORES', $foreingKey,  $otherKey);
	}

}
