<?php
namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Sancion extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'SANCIONES';
	protected $primaryKey = 'SANC_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'SANC_FECHACREADO';
	const UPDATED_AT = 'SANC_FECHAMODIFICADO';
	const DELETED_AT = 'SANC_FECHAELIMINADO';
	protected $dates = ['SANC_FECHACREADO', 'SANC_FECHAMODIFICADO', 'SANC_FECHAELIMINADO'];

	protected $fillable = [
		'SANC_DESCRIPCION',
		'SANC_OBSERVACIONES',
	];

	public static function rules($id = 0){
		return [
			'SANC_DESCRIPCION' => 'required|max:100|'.static::unique($id,'SANC_DESCRIPCION'),
			'SANC_OBSERVACIONES' => ['max:300'],
		];
	}

	public function tickets()
	{
		$foreingKey = 'SANC_ID';
		return $this->hasMany(Ticket::class, $foreingKey);
	}

}
