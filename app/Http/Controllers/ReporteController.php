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
		'Contratos activos por fecha',
		'Tickets por fecha',
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
	public function contratoActPorFecha()
	{
		$queryCollect = Contrato::leftJoin('PROSPECTOS as JEFE', 'JEFE.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
							->leftJoin('PROSPECTOS as PROSPECTO', 'PROSPECTO.PROS_ID', '=', 'CONTRATOS.PROS_ID')
							->where('ESCO_ID', EstadoContrato::ACTIVO)
							->select([
								'JEFE.PROS_CEDULA',
								'PROSPECTO.PROS_CEDULA',
								'CONT_FECHAINGRESO',
								'CONT_FECHATERMINACION',
							]);

		if(isset($this->data['fchaIniContrato']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIniContrato']));
		if(isset($this->data['fchaFinContrato']))
			$queryCollect->whereDate('CONT_FECHATERMINACION', '<=', Carbon::parse($this->data['fchaFinContrato']));

		return $queryCollect->get()->toJson();
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function ticketsPorFecha()
	{
		$queryCollect = Ticket::whereIn('ESTI_ID', [EstadoTicket::ABIERTO, EstadoTicket::REASIGNADO]);

		if(isset($this->data['fchaIniSolicitud']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '>=', Carbon::parse($this->data['fchaIniSolicitud']));
		if(isset($this->data['fchaFinSolicitud']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '<=', Carbon::parse($this->data['fchaFinSolicitud']));

		return $queryCollect->get()->toJson();
	}

}
