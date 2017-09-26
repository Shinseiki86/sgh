<?php
namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Jobs\SendEmailNewTicket;
use SGH\Jobs\SendEmailAuthorizedTicket;
use SGH\Jobs\SendEmailRejectedTicket;
use SGH\Jobs\SendEmailClosedTicket;

use SGH\Models\Ticket;
use SGH\Models\EstadoTicket;
use SGH\Models\EstadoAprobacion;
use SGH\Models\User;
use SGH\Models\Mail;
use SGH\Models\Prospecto;

use Carbon\Carbon;

class TicketController extends Controller
{
	protected $route = 'cnfg-tickets.tickets';
	protected $class = Ticket::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		//$tickets = Ticket::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('tickets'));
	}

	public function show($TICK_ID)
	{
        // Se obtiene el registro
		$ticket = Ticket::findOrFail($TICK_ID);

		$arrSanciones = model_to_array(Sancion::class, 'SANC_DESCRIPCION');

        // Muestra la vista y pasa el registro
		return view($this->route.'.show', compact('ticket','arrSanciones'));
	}


	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		$PROS_NOMBRESAPELLIDOS = expression_concat([
				'PROS_PRIMERNOMBRE',
				'PROS_SEGUNDONOMBRE',
				'PROS_PRIMERAPELLIDO',
				'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS');

		$model = Ticket::join('CONTRATOS', 'CONTRATOS.CONT_ID', '=', 'TICKETS.CONT_ID')
			->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
			->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
			->join('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
			->join('TIPOSINCIDENTES', 'TIPOSINCIDENTES.TIIN_ID', '=', 'TICKETS.TIIN_ID')
			->join('PRIORIDADES', 'PRIORIDADES.PRIO_ID', '=', 'TICKETS.PRIO_ID')
			->join('CATEGORIAS', 'CATEGORIAS.CATE_ID', '=', 'TICKETS.CATE_ID')
			->join('ESTADOSAPROBACIONES', 'ESTADOSAPROBACIONES.ESAP_ID', '=', 'TICKETS.ESAP_ID')
			->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'TICKETS.GRUP_ID')
			->join('TURNOS', 'TURNOS.TURN_ID', '=', 'TICKETS.TURN_ID')
			->select([
				'TICK_ID',
				'EMPL_NOMBRECOMERCIAL',
				$PROS_NOMBRESAPELLIDOS,
				'ESTI_DESCRIPCION',
				'TIIN_DESCRIPCION',
				'PRIO_DESCRIPCION',
				'CATE_DESCRIPCION',
				'TICK_FECHAEVENTO',
				'TICK_FECHASOLICITUD',
				'TICK_FECHACIERRE',
				'ESAP_DESCRIPCION',
				'GRUP_DESCRIPCION',
				'TURN_DESCRIPCION',
				'TICK_CREADOPOR',
			])->get();

		return Datatables::collection($model)
			->addColumn('action', function($model){
				return parent::buttonShow($model).parent::buttonEdit($model).
					parent::buttonDelete($model, 'TICK_ID');
			})->make(true);
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$primaryKey = 'CONT_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA'
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::activos()->orderBy('CONTRATOS.'.$primaryKey)->select([ 'CONTRATOS.'.$primaryKey , $column ])->get();
		$arrContratos = $prospecto->pluck($columnName, $primaryKey)->toArray();
		//dd($arrContratos);

		$arrEstados = model_to_array(EstadoTicket::class, 'ESTI_DESCRIPCION');

		$arrEstadosAprobacion = model_to_array(EstadoAprobacion::class, 'ESAP_DESCRIPCION');

		$arrPrioridad = model_to_array(Prioridad::class, 'PRIO_DESCRIPCION');

		$arrCategorias = model_to_array(Categoria::class, 'CATE_DESCRIPCION');

		$arrTiposIncidentes = model_to_array(TipoIncidente::class, 'TIIN_DESCRIPCION');

		$arrGrupos = model_to_array(Grupo::class, 'GRUP_DESCRIPCION');

		$arrTurnos = model_to_array(Turno::class, 'TURN_DESCRIPCION');

		return view($this->route.'.create', compact('arrContratos','arrEstados','arrPrioridad','arrCategorias','arrTiposIncidentes','arrEstadosAprobacion','arrGrupos','arrTurnos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Datos recibidos desde la vista.
		$data = request()->all();

		$filename = null;

		//si viene un archivo en el request
		if(Input::hasFile('TICK_ARCHIVO')){
			//lee el archivo
			$file = Input::file('TICK_ARCHIVO');
			//define el path donde lo guardará
			$destinationPath = public_path(). '/storages/';
			//obtiene el nombre del archivo
			$filename = explode(".", $file->getClientOriginalName());
			
		}

		if(!request()->has('TICK_FECHACUMPLIMIENTO')){	$data['TICK_FECHACUMPLIMIENTO'] = null; }

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$validator = $this->validator($data);

		if($validator->passes()){

			$data['TICK_FECHASOLICITUD'] = Carbon::now();
			
			//determinar cual es el usuario que realizó la creación del ticket
			$data['USER_id'] = \Auth::user()->USER_id;

			//Se crea el registro.
			$ticket = Ticket::create($data);

			//se actualiza el nombre del archivo concatenando el ID del registro para garantizar su unicidad
			//en caso de que en el request venga un archivo
			if($filename != null && $ticket != null){
				$data['TICK_ARCHIVO'] = $filename[0]. "-" . $ticket->TICK_ID . "." . $filename[1];
				//mueve el archivo a la ruta indicada
				$file->move($destinationPath, $data['TICK_ARCHIVO']);
			}

			//===================================================================================
			//Job para envío de notificación al correo
			$job = (new SendEmailNewTicket($ticket))->onQueue('emails');
			$this->dispatch($job);
			//===================================================================================

			// redirecciona al index de controlador
			flash_alert( 'Ticket '.$ticket->TICK_ID.' creado exitosamente.', 'success' );
			return redirect()->route($this->route.'.index');
		} else {
			return redirect()->back()->withErrors($validator)->withInput()->send();
		}
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TICK_ID
	 * @return Response
	 */
	public function edit($TICK_ID)
	{
		// Se obtiene el registro
		$ticket = Ticket::findOrFail($TICK_ID);

		$primaryKey = 'CONT_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA'
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::activos()->orderBy('CONTRATOS.'.$primaryKey)->select([ 'CONTRATOS.'.$primaryKey , $column ])->get();
		$arrContratos = $prospecto->pluck($columnName, $primaryKey)->toArray();
		//dd($arrContratos);

		$arrEstados = model_to_array(EstadoTicket::class, 'ESTI_DESCRIPCION');

		$arrEstadosAprobacion = model_to_array(EstadoAprobacion::class, 'ESAP_DESCRIPCION');

		$arrPrioridad = model_to_array(Prioridad::class, 'PRIO_DESCRIPCION');

		$arrCategorias = model_to_array(Categoria::class, 'CATE_DESCRIPCION');

		$arrTiposIncidentes = model_to_array(TipoIncidente::class, 'TIIN_DESCRIPCION');

		$arrGrupos = model_to_array(Grupo::class, 'GRUP_DESCRIPCION');

		$arrTurnos = model_to_array(Turno::class, 'TURN_DESCRIPCION');

		$arrTiposIncidentes = model_to_array(TipoIncidente::class, 'TIIN_DESCRIPCION');

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('ticket','arrContratos','arrEstados','arrPrioridad','arrCategorias','arrTiposIncidentes','arrEstadosAprobacion','arrGrupos','arrTurnos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TICK_ID
	 * @return Response
	 */
	public function update($TICK_ID)
	{
		parent::updateModel($TICK_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TICK_ID
	 * @return Response
	 */
	public function destroy($TICK_ID)
	{
		parent::destroyModel($TICK_ID);
	}

	/**
	 * Tickets por estado.
	 *
	 * @return json
	 */
	public function getTicketsPorEstado()
	{
		$data = Ticket::join('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
								->select(
									'ESTI_DESCRIPCION',
									'ESTI_COLOR as COLOR',
									\DB::raw('COUNT("TICK_ID") as count')
								)
								->groupBy(
									'ESTI_DESCRIPCION',
									'ESTI_COLOR'
								)
								->get();
		return $data->toJson();
	}
	
	public function autorizarTicket($TICK_ID){

		//fecha actual
		$currentDate = Carbon::now();

		//encuentra el ticket
		$ticket = Ticket::findOrFail($TICK_ID);

		$ticket->update([
			'ESAP_ID' => EstadoAprobacion::ENVIADO, //estado ENVIADO A GESTIÓN HUMANA
			'TICK_FECHAAPROBACION' => $currentDate
		]);

		//===================================================================================
		//Job para envío de notificación al correo
		$job = (new SendEmailAuthorizedTicket($ticket, \Auth::user()))->onQueue('emails');
		$this->dispatch($job);
		//===================================================================================

		flash_alert( 'Ticket '.$ticket->TICK_ID.' ha sido enviado a G.H exitosamente.', 'success' );
		return redirect()->route($this->route.'.index');
	}

	public function rechazarTicket($TICK_ID){

		$data = request()->all();

    	//fecha actual
		$currentDate = Carbon::now();

		//encuentra el ticket
		$ticket = Ticket::findOrFail($TICK_ID);
		$ticket->update([
			'ESAP_ID' => EstadoAprobacion::RECHAZADO,
			'ESTI_ID' => EstadoTicket::CERRADO,
			'TICK_FECHAAPROBACION' => $currentDate,
			'TICK_FECHACIERRE' => $currentDate,
			'TICK_MOTIVORECHAZO' => $data['TICK_MOTIVORECHAZO']
		]);

		//===================================================================================
		//Job para envío de notificación al correo
		$job = (new SendEmailRejectedTicket($ticket, \Auth::user()))->onQueue('emails');
		$this->dispatch($job);
		//===================================================================================

		flash_alert( 'Ticket '.$ticket->TICK_ID.' ha sido rechazado exitosamente.', 'success' );
		return redirect()->route($this->route.'.index');
	}


	public function cerrarTicket($TICK_ID){

    	//Datos recibidos desde la vista.
		$data = request()->all();

		$ticket = Ticket::findOrFail($TICK_ID);
		$ticket->update([
			'ESTI_ID' => EstadoTicket::CERRADO,
			'ESAP_ID' => EstadoAprobacion::FINALIZADO,
			'TICK_FECHACIERRE' =>  Carbon::now(),
			'SANC_ID' => $data['SANC_ID'],
			'TICK_CONCLUSION' => $data['TICK_CONCLUSION']
		]);

		//===================================================================================
		$job = (new SendEmailClosedTicket($ticket, \Auth::user()))->onQueue('emails');
		$this->dispatch($job);
		//===================================================================================

		flash_alert( 'Ticket '.$ticket->TICK_ID.' ha sido cerrado exitosamente.', 'success' );
		return redirect()->route($this->route.'.index');

	}

}
