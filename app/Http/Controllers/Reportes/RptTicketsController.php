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

	/**
	 * 
	 *
	 * @return Json
	 */
	public function ticketsActPorFecha()
	{
		$queryCollect = Ticket::leftJoin('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
							//->whereIn('TICKETS.ESTI_ID', [EstadoTicket::ABIERTO, EstadoTicket::REASIGNADO])
							->select([
								'TICK_ID as ID',
								'TICK_DESCRIPCION as Descripción',
								'TICK_FECHASOLICITUD as Fecha_Solicitud',
								'TICK_FECHAAPROBACION as Fecha_Aprobación',
								'ESTI_DESCRIPCION as Estado',
							]);

		if(isset($this->data['fchaSolicitudDesde']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '>=', Carbon::parse($this->data['fchaSolicitudDesde']));
		if(isset($this->data['fchaSolicitudHasta']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '<=', Carbon::parse($this->data['fchaSolicitudHasta']));

		if(isset($this->data['fchaAprobDesde']))
			$queryCollect->whereDate('TICK_FECHAAPROBACION', '>=', Carbon::parse($this->data['fchaAprobDesde']));
		if(isset($this->data['fchaAprobHasta']))
			$queryCollect->whereDate('TICK_FECHAAPROBACION', '<=', Carbon::parse($this->data['fchaAprobHasta']));

		if(isset($this->data['estado']))
			$queryCollect->where('TICKETS.ESTI_ID', '=', $this->data['estado']);

		return $this->buildJson($queryCollect, 'Estado');
	}




}