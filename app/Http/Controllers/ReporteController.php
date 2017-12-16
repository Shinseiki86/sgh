<?php
namespace SGH\Http\Controllers;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\Ticket;
use SGH\Models\EstadoTicket;

class ReporteController extends Controller
{
	private $data = null;

	private $reportes = [
		'ContratosActPorFecha' => 'Contratos activos por fecha',
		'TicketsActPorFecha' => 'Tickets abiertos por fecha',
	];

	public function __construct()
	{
		//Datos recibidos desde la vista.
		$this->data = parent::getRequest();
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arrReportes = $this->reportes;
		//Se carga la vista y se pasan los registros
		return view('reportes.index', compact('arrReportes'));
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function contratosActPorFecha()
	{
		$queryCollect = Contrato::leftJoin('PROSPECTOS as JEFE', 'JEFE.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS as PROSPECTO', 'PROSPECTO.PROS_ID', '=', 'CONTRATOS.PROS_ID')
							->where('ESCO_ID', EstadoContrato::ACTIVO)
							->select([
								'JEFE.PROS_CEDULA as Jefe_Ced',
								'PROSPECTO.PROS_CEDULA as Prospecto_Ced',
								'CONT_FECHAINGRESO as Fecha_Ingreso',
								'CONT_FECHATERMINACION as Fecha_Terminación',
							]);

		if(isset($this->data['fchaIniContrato']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIniContrato']));
		if(isset($this->data['fchaFinContrato']))
			$queryCollect->whereDate('CONT_FECHATERMINACION', '<=', Carbon::parse($this->data['fchaFinContrato']));

		return response()->json($queryCollect->get());
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function ticketsActPorFecha()
	{
		$queryCollect = Ticket::leftJoin('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
							->whereIn('TICKETS.ESTI_ID', [EstadoTicket::ABIERTO, EstadoTicket::REASIGNADO])
							->select([
								'TICK_ID as ID',
								'TICK_DESCRIPCION as Descripción',
								'TICK_FECHASOLICITUD as Fecha_Solicitud',
								'TICK_FECHAAPROBACION as Fecha_Aprobación',
								'ESTI_DESCRIPCION as Estado',
							]);

		if(isset($this->data['fchaIniSolicitud']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '>=', Carbon::parse($this->data['fchaIniSolicitud']));
		if(isset($this->data['fchaFinSolicitud']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '<=', Carbon::parse($this->data['fchaFinSolicitud']));

		return response()->json($queryCollect->get());
	}

}
