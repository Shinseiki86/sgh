<?php

namespace SGH;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

	//Nombre de la tabla en la base de datos
	protected $table = 'USERS';
    protected $primaryKey = 'USER_id';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'USER_fechacreado';
	const UPDATED_AT = 'USER_fechamodificado';
	use SoftDeletes;
	const DELETED_AT = 'USER_fechaeliminado';
	protected $dates = ['USER_fechacreado', 'USER_fechamodificado', 'USER_fechaeliminado'];


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'username',
		'email',
		'password',
		'ROLE_id',
		'USER_creadopor'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public function rol()
	{
		$foreingKey = 'ROLE_id';
		return $this->belongsTo(Rol::class, $foreingKey);
	}


	/*
	 * Docentes que tiene asignado un usuario
	 */
	public function docentes()
	{
		$foreingKey = 'USER_id_estudiante';
		$otherKey   = 'USER_id_docente';
		return $this->belongsToMany(User::class, 'ESTUDIANTESDOCENTES', $foreingKey,  $otherKey);
	}
	
	/*
	 * Estudiantes que un usuario docente tiene easignados
	 */
	public function estudiantes()
	{
		$foreingKey = 'USER_id_docente';
		$otherKey   = 'USER_id_estudiante';
		return $this->belongsToMany(User::class, 'ESTUDIANTESDOCENTES', $foreingKey,  $otherKey);
	}

	public function personaGeneral()
	{
		$foreingKey = 'USER_id';
		return $this->hasOne(Academusoft\PersonaGeneral::class, $foreingKey);
	}
	
	//Scope Retorna sólo los usuarios con rol docente
	public function scopeAllDocentes($query)
	{
		$query = $query->where('ROLE_id', Rol::DOCENTE);
		return $query;
	}
}
