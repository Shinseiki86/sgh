<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Ticket;
use SGH\Models\EstadoTicket;

class RptTicketsController extends ReporteController
{

	public function __construct()
	{
		parent::__construct();
	}


	private function getQuery()
	{
		$query = Ticket::leftJoin('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
			->select([
				'TICK_ID as ID',
				'TICK_DESCRIPCION as Descripción',
				'TICK_FECHASOLICITUD as Fecha_Solicitud',
				'TICK_FECHAAPROBACION as Fecha_Aprobación',
				'ESTI_DESCRIPCION as Estado',
			]);
		return $query;
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function ticketsPorFecha()
	{
		$query = $this->getQuery();
			//->whereIn('TICKETS.ESTI_ID', [EstadoTicket::ABIERTO, EstadoTicket::REASIGNADO]);

		if(isset($this->data['fchaSolicitudDesde']))
			$query->whereDate('TICK_FECHASOLICITUD', '>=', Carbon::parse($this->data['fchaSolicitudDesde']));
		if(isset($this->data['fchaSolicitudHasta']))
			$query->whereDate('TICK_FECHASOLICITUD', '<=', Carbon::parse($this->data['fchaSolicitudHasta']));

		if(isset($this->data['fchaAprobDesde']))
			$query->whereDate('TICK_FECHAAPROBACION', '>=', Carbon::parse($this->data['fchaAprobDesde']));
		if(isset($this->data['fchaAprobHasta']))
			$query->whereDate('TICK_FECHAAPROBACION', '<=', Carbon::parse($this->data['fchaAprobHasta']));

		if(isset($this->data['estado']))
			$query->where('TICKETS.ESTI_ID', '=', $this->data['estado']);

		return $this->buildJson($query, $columnChart='Estado');
	}




}