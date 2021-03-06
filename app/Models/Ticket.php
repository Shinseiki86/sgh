<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

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
		'TICK_FECHAAPROBACION',
		'TICK_FECHACIERRE',
		'TICK_FECHACUMPLIMIENTO',
		'TICK_ARCHIVO',
		'TICK_CONCLUSION',
		'TICK_MOTIVORECHAZO',
		'CONT_ID',
		'ESTI_ID',
		'ESAP_ID',
		'PRIO_ID',
		'CATE_ID',
		'TIIN_ID',
		'TURN_ID',
		'GRUP_ID',
		'SANC_ID',
		'USER_id',
		'TICK_CREADOPOR',
	];

	public static function rules($id = 0){
		return [
			'TICK_DESCRIPCION' => ['required','max:3000'],
			'CONT_ID' => ['required'],
			'ESTI_ID' => ['required'],
			'ESAP_ID' => ['required'],
			'PRIO_ID' => ['required'],
			'GRUP_ID' => ['required'],
			'TURN_ID' => ['required'],
			'CATE_ID' => ['required'],
			'TIIN_ID' => ['required'],
			'TICK_FECHAEVENTO' => ['required'],
			'TICK_OBSERVACIONES' => ['max:3000'],
		];
	}

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

	public function sancion()
	{
		$foreingKey = 'SANC_ID';
		return $this->belongsTo(Sancion::class, $foreingKey);
	}

	public function grupo()
	{
		$foreingKey = 'GRUP_ID';
		return $this->belongsTo(Grupo::class, $foreingKey);
	}

	public function turno()
	{
		$foreingKey = 'TURN_ID';
		return $this->belongsTo(Turno::class, $foreingKey);
	}

	public function usuario()
	{
		$foreingKey = 'USER_id';
		return $this->belongsTo(User::class, $foreingKey);
	}

	public function scopeTicketsPorEmpleador($query)
	{
		$query = $query 
			->join('CONTRATOS', 'CONTRATOS.CONT_ID', '=', 'TICKETS.CONT_ID')
			->join('USERS', 'USERS.USER_id', '=', 'TICKETS.USER_id')
			->join('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
			->join('ESTADOSAPROBACIONES', 'ESTADOSAPROBACIONES.ESAP_ID', '=', 'TICKETS.ESAP_ID')
			->join('PRIORIDADES', 'PRIORIDADES.PRIO_ID', '=', 'TICKETS.PRIO_ID')
			->join('CATEGORIAS', 'CATEGORIAS.CATE_ID', '=', 'TICKETS.CATE_ID')
			->join('TIPOSINCIDENTES', 'TIPOSINCIDENTES.TIIN_ID', '=', 'TICKETS.TIIN_ID')
			->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID');

		return $query;
	}


}
