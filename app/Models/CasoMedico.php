<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class CasoMedico extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CASOSMEDICOS';
	protected $primaryKey = 'CAME_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CAME_FECHACREADO';
	const UPDATED_AT = 'CAME_FECHAMODIFICADO';
	const DELETED_AT = 'CAME_FECHAELIMINADO';
	protected $dates = ['CAME_FECHACREADO', 'CAME_FECHAMODIFICADO', 'CAME_FECHAELIMINADO'];

	protected $fillable = [
		'CAME_FECHARESTRICCION',
		'CAME_LUGARREUBICACION',
		'CAME_DIAGESPECIFICO',
		'CAME_LABOR',
		'CAME_PCL',
		'CAME_NIVELPRODUCTIVIDAD',
		'CAME_CONTINGENCIA',
		'CAME_OBSERVACIONES',
		'CONT_ID',
		'DIGE_ID',
		'ESRE_ID'
	];

	public static function rules($id = 0){
		return [
			'CAME_FECHARESTRICCION' => ['required'],
			'CAME_DIAGESPECIFICO' =>   ['required', 'max:100'],
			'CAME_CONTINGENCIA' =>   ['required', 'max:100'],
			'CAME_LUGARREUBICACION' => ['max:100'],
			'CAME_LABOR' => ['max:100'],
			'CAME_PCL' =>   ['required', 'numeric'],
			'CAME_NIVELPRODUCTIVIDAD' =>   ['required', 'numeric'],
			'CAME_OBSERVACIONES' => ['max:300'],
			'CONT_ID' => ['required'],
			'DIGE_ID' => ['required'],
			'ESRE_ID' => ['required'],
		];
	}

	public function contrato()
	{
		$foreingKey = 'CONT_ID';
		return $this->belongsTo(Contrato::class, $foreingKey);
	}

	public function diagnosticogeneral()
	{
		$foreingKey = 'DIGE_ID';
		return $this->belongsTo(DiagnosticoGeneral::class, $foreingKey);
	}

	public function estadorestriccion()
	{
		$foreingKey = 'ESRE_ID';
		return $this->belongsTo(EstadoRestriccion::class, $foreingKey);
	}

	public function novedadesmedicas()
	{
		$foreingKey = 'CAME_ID';
		return $this->hasMany(NovedadMedica::class, $foreingKey);
	}

}
