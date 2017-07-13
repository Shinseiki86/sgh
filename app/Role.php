<?php

namespace SGH;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    use SoftDeletes;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'display_name',
		'description',
	];


	//establecemos las relacion de muchos a muchos con el modelo User, ya que un rol 
	//lo pueden tener varios usuarios y un usuario puede tener varios roles
	public function users(){
		return $this->belongsToMany(User::class);
	}

	//establecemos las relaciones con el modelo Permission, ya que un permiso puede tener varios roles
	//y un rol lo pueden tener varios permisos
	public function permissions(){
		return $this->belongsToMany(Permission::class);
	}

}