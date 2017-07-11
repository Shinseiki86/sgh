<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Ticket extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'TICKETS';
	protected $primaryKey = 'TICK_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'TICK_FECHACREADO';
	const UPDATED_AT = 'TICK_FECHAMODIFICADO';
	const DELETED_AT = 'TICK_FECHAELIMINADO';
	protected $dates = ['TICK_FECHACREADO', 'TICK_FECHAMODIFICADO', 'TICK_FECHAELIMINADO'];

	protected $fillable = [
		'TICK_DESCRIPCION',
		'TICK_OBSERVACIONES',
		'TICK_FECHASOLICITUD',
		'TICK_FECHAEVENTO',
		'TICK_FECHACUMPLIMIENTO',
		'TICK_ARCHIVO',
		'CONT_ID',
		'ESTI_ID',
		'ESAP_ID',
		'PRIO_ID',
		'CATE_ID',
		'TIIN_ID',
	];

	public function contrato()
	{
		$foreingKey = 'CONT_ID';
		return $this->belongsTo(Contrato::class, $foreingKey);
	}

	public function estadoticket()
	{
		$foreingKey = 'ESTI_ID';
		return $this->belongsTo(EstadoTicket::class, $foreingKey);
	}

	public function prioridad()
	{
		$foreingKey = 'PRIO_ID';
		return $this->belongsTo(Prioridad::class, $foreingKey);
	}

	public function categoria()
	{
		$foreingKey = 'CATE_ID';
		return $this->belongsTo(Categoria::class, $foreingKey);
	}

	public function tipoincidente()
	{
		$foreingKey = 'TIIN_ID';
		return $this->belongsTo(TipoIncidente::class, $foreingKey);
	}

	public function estadoaprobacion()
	{
		$foreingKey = 'ESAP_ID';
		return $this->belongsTo(EstadoAprobacion::class, $foreingKey);
	}

}
