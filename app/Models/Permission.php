<?php

namespace SGH\Models;

use Zizaco\Entrust\EntrustPermission;
use SGH\Traits\ModelRulesTrait;
//use SGH\Traits\SoftDeletesTrait;
use SGH\Traits\RelationshipsTrait;

class Permission extends EntrustPermission
{
    use RelationshipsTrait, ModelRulesTrait;

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

	public static function rules($id = 0){
		return [
			'name' => 'required|max:15|'.static::unique($id,'name'),
			'display_name' => 'required|max:50|'.static::unique($id,'display_name'),
			'description'  => ['required','max:100'],
		];
	}

	//establecemos las relacion de muchos a muchos con el modelo Role, ya que un permiso
	//lo pueden tener varios roles y un rol puede tener varios permisos
	public function roles(){
		return $this->belongsToMany(Role::class);
	}

	public function menu()
	{
		$foreingKey = 'PERM_ID';
		return $this->hasOne(Menu::class, $foreingKey);
	}

}