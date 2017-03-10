<?php

namespace SGH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
	//Nombre de la tabla en la base de datos
	protected $table = 'ROLES';
    protected $primaryKey = 'ROLE_id';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ROLE_fechacreado';
	const UPDATED_AT = 'ROLE_fechamodificado';
	use SoftDeletes;
	const DELETED_AT = 'ROLE_fechaeliminado';
	protected $dates = ['ROLE_fechacreado', 'ROLE_fechamodificado', 'ROLE_fechaeliminado'];

	protected $fillable = ['ROLE_rol','ROLE_descripcion','ROLE_creadopor'];


	//Constantes para referenciar los roles creados por SYSTEM
	const ADMIN      = 1;
	const EDITOR     = 2;
	const DOCENTE    = 3;
	const ESTUDIANTE = 4;
	const ADMON      = 5;
	
	//public static $ENCU_estados = Config::get('enums.estados_encuesta');

	public function usuarios()
	{
		$foreingKey = 'ROLE_id';
		return $this->hasMany(User::class, $foreingKey);
	}

	/*
	 * Las encuestas que tienen asociado el rol.
	 */
	public function encuestas()
	{
		$foreingKey = 'ROLE_id';
		$otherKey   = 'ENCU_id';
		return $this->belongsToMany(Encuesta::class, 'AMBITOENCUESTAS', $foreingKey,  $otherKey);
	}

}
