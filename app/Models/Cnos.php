<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Cnos extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CNOS';
	protected $primaryKey = 'CNOS_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CNOS_FECHACREADO';
	const UPDATED_AT = 'CNOS_FECHAMODIFICADO';
	const DELETED_AT = 'CNOS_FECHAELIMINADO';
	protected $dates = ['CNOS_FECHACREADO', 'CNOS_FECHAMODIFICADO', 'CNOS_FECHAELIMINADO'];

	protected $fillable = [
		'CNOS_CODIGO',
		'CNOS_DESCRIPCION',
		'CNOS_OBSERVACIONES',
	];

	public function countCargosSortable($query, $direction)
    {
        return $query->withCount('cargos')
                    ->orderBy('cargos_count', $direction);
    }

	public function cargos()
	{
		$foreingKey = 'CNOS_ID';
		return $this->hasMany(Cargo::class, $foreingKey);
	}

}
