<?php

namespace SGH;

use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
	use EntrustUserTrait;
	//use SoftDeletes;

	//Nombre de la tabla en la base de datos
	protected $table = 'USERS';
    protected $primaryKey = 'USER_id';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'modified_at';
	const DELETED_AT = 'deleted_at';
	protected $dates = ['created_at', 'modified_at', 'deleted_at'];


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

	//establecemos las relaciones con el modelo Role, ya que un usuario puede tener varios roles
	//y un rol lo pueden tener varios usuarios
	public function roles(){
		return $this->belongsToMany(Role::class);
	}

    /**
     * Perform the actual delete query on this model instance.
     * 
     * @return void
     */
    protected function runSoftDelete()
    {
        $query = $this->newQuery()->where($this->getKeyName(), $this->getKey());

        $this->{$this->getDeletedAtColumn()} = $time = $this->freshTimestamp();

        $query->update([
           $this->getDeletedAtColumn() => $this->fromDateTime($time),
           'deleted_by' => auth()->user()->username
        	//'deleted_by' => (\Auth::id()) ?: null
        ]);
    }

}
