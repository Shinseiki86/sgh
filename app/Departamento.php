<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Departamento extends ModelWithSoftDeletes
{

	//Nombre de la tabla en la base de datos
	protected $table = 'DEPARTAMENTOS';
    protected $primaryKey = 'DEPA_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'DEPA_FECHACREADO';
	const UPDATED_AT = 'DEPA_FECHAMODIFICADO';
	const DELETED_AT = 'DEPA_FECHAELIMINADO';
	protected $dates = ['DEPA_FECHACREADO', 'DEPA_FECHAMODIFICADO', 'DEPA_FECHAELIMINADO'];

	protected $fillable = [
		'DEPA_CODIGO',
		'DEPA_DESCRIPCION',
	];

    public function countCiudadesSortable($query, $direction)
    {
        return $query->withCount('ciudades')
                    ->orderBy('ciudades_count', $direction);
    }

	public function ciudades()
	{
		$foreingKey = 'DEPA_ID';
		return $this->hasMany(Ciudad::class, $foreingKey);
	}

}
