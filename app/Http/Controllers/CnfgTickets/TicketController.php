<?php
namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
use SGH\Models\Empleador;
use SGH\Models\Contrato;

use Carbon\Carbon;

class TicketController extends Controller
{
	protected $route = 'cnfg-tickets.tickets';
	protected $class = Ticket::class;

	public function __construct()
	{
		parent::__construct();
	}

	protected function validator($data, $GERE_ID = 0)
	{
		return Validator::make($data, [
			'TICK_DESCRIPCION' => ['required','max:3000'],
			'CONT_ID' => ['required'],
			'ESTI_ID' => ['required'],
			'ESAP_ID' => ['required'],
			'PRIO_ID' => ['required'],
			'GRUP_ID' => ['required'],
			'TURN_ID' => ['required'],
			'CATE_ID' => ['required'],
			'TIIN_ID' => ['required'],
			'TICK_ARCHIVO' => ['mimes:rar|max:5120'],
			'TICK_FECHAEVENTO' => ['required'],
			'TICK_OBSERVACIONES' => ['max:3000'],
		]);
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se carga la vista 
		return view($this->route.'.index');
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
		if(\Auth::user()->hasRole('admin')) //si es un administrador...
			//Se obtienen todos los registros.
			$tickets = Ticket::all();
		else {
			//obtiene los empleadores sobre los cuales el usuario tiene permiso
			$empleadores = get_permisosempresas_user(\Auth::user()->USER_id);
			//obtiene la confirmación de si es un administrador
			$tickets = Ticket::TicketsPorEmpleador()->whereIn('EMPLEADORES.EMPL_ID', $empleadores)->get();
		}

		$PROS_NOMBRESAPELLIDOS = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
		], 'PROS_NOMBRESAPELLIDOS');

		$model = Ticket::leftJoin('CONTRATOS', 'CONTRATOS.CONT_ID', '=', 'TICKETS.CONT_ID')
			->leftJoin('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
			->leftJoin('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
			->leftJoin('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
			->leftJoin('TIPOSINCIDENTES', 'TIPOSINCIDENTES.TIIN_ID', '=', 'TICKETS.TIIN_ID')
			->leftJoin('PRIORIDADES', 'PRIORIDADES.PRIO_ID', '=', 'TICKETS.PRIO_ID')
			->leftJoin('CATEGORIAS', 'CATEGORIAS.CATE_ID', '=', 'TICKETS.CATE_ID')
			->leftJoin('ESTADOSAPROBACIONES', 'ESTADOSAPROBACIONES.ESAP_ID', '=', 'TICKETS.ESAP_ID')
			->leftJoin('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'TICKETS.GRUP_ID')
			->leftJoin('TURNOS', 'TURNOS.TURN_ID', '=', 'TICKETS.TURN_ID')
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
				'TICK_FECHAAPROBACION',
				'TICK_MOTIVORECHAZO',
				'TICK_CONCLUSION',
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

		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		return view($this->route.'.create', compact('arrContratos','arrEstados','arrPrioridad','arrCategorias','arrTiposIncidentes','arrEstadosAprobacion','arrGrupos','arrTurnos','arrEmpleadores'));
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

			//dd($ticket);

			//se actualiza el nombre del archivo concatenando el ID del registro para garantizar su unicidad
			//en caso de que en el request venga un archivo
			if($filename != null && $ticket != null){
				$data['TICK_ARCHIVO'] = $filename[0]. "-" . $ticket->TICK_ID . "." . $filename[1];
				$ticket->TICK_ARCHIVO = $data["TICK_ARCHIVO"];
				$ticket->save();
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

		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('ticket','arrContratos','arrEstados','arrPrioridad','arrCategorias','arrTiposIncidentes','arrEstadosAprobacion','arrGrupos','arrTurnos','arrEmpleadores'));
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

	public function getTicketsAbiertosPorEmpresa()
	{
		$data = Ticket::join('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
						->join('CONTRATOS', 'CONTRATOS.CONT_ID', '=', 'TICKETS.CONT_ID')
						->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
								->select(
									'EMPL_NOMBRECOMERCIAL',
									\DB::raw('COUNT("TICK_ID") as count')
								)
								->where('TICKETS.ESTI_ID', 1) //ABIERTO
								->groupBy(
									'EMPL_NOMBRECOMERCIAL'
								)
								->get();
		return $data->toJson();
	}
	
	public function autorizarTicket($TICK_ID){

		//fecha actual
		$currentDate = Carbon::now();

		//encuentra el ticket
		$ticket = Ticket::findOrFail($TICK_ID);

		if($ticket->TICK_CREADOPOR == \Auth::user()->username){
			flash_modal( 'El Ticket no puede ser autorizado por el mismo usuario que lo creó', 'danger' );
			return redirect()->back();
		}else{

			 //prospecto que creó el Ticket
			 $prospecto = Prospecto::getJefe($ticket->usuario->cedula);  
			 //jefe del prospecto que creo el Ticket
             $prosJefe = Prospecto::findOrFail($prospecto->JEFE_ID);
             $prosJefeId = $prosJefe->PROS_ID;
             
             //usuario actual del sistema (validar si es el jefe)
             $prosUser = Prospecto::getJefe(\Auth::user()->cedula);
             if(isset($prosUser)){
             	$prosUserId = $prosUser->PROS_ID;
             }else{
             	$prosUserId = null;
             }
             	

             if($prosUserId == $prosJefeId or $prosUserId == null){
             	flash_modal( 'El Ticket solo puede ser autorizado por el jefe inmediato de quien lo creó', 'danger' );
				return redirect()->back();
             }else{

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

		}

	}

	public function rechazarTicket($TICK_ID){

		$data = request()->all();

    	//fecha actual
		$currentDate = Carbon::now();

		//encuentra el ticket
		$ticket = Ticket::findOrFail($TICK_ID);

		if($ticket->TICK_CREADOPOR == \Auth::user()->username){
			flash_modal( 'El Ticket no puede ser rechazado por el mismo usuario que lo creó', 'danger' );
			return redirect()->back();
		}else{

			 //prospecto que creó el Ticket
			 $prospecto = Prospecto::getJefe($ticket->usuario->cedula);  
			 //jefe del prospecto que creo el Ticket
             $prosJefe = Prospecto::findOrFail($prospecto->JEFE_ID);
             $prosJefeId = $prosJefe->PROS_ID;
             
             //usuario actual del sistema (validar si es el jefe)
             $prosUser = Prospecto::getJefe(\Auth::user()->cedula);
             if(isset($prosUser)){
             	$prosUserId = $prosUser->PROS_ID;
             }else{
             	$prosUserId = null;
             }            	

             if($prosUserId == $prosJefeId){

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
             	
             }else{

				flash_modal( 'El Ticket solo puede ser rechazado por el jefe inmediato de quien lo creó', 'danger' );
				return redirect()->back();

             }

			

		}

		
	}


	public function cerrarTicket($TICK_ID){

    	//Datos recibidos desde la vista.
		$data = request()->all();

		$ticket = Ticket::findOrFail($TICK_ID);

		if($ticket->TICK_CREADOPOR == \Auth::user()->username){
			flash_modal( 'El Ticket no puede ser cerrado por el mismo usuario que lo creó', 'danger' );
			return redirect()->back();
		}else{

			//id de prospecto responsable de gestión humana del Empleador
			$prosIdEmpleador = $ticket->contrato->empleador->responsable->PROS_ID;
			//prospecto responsable de gestión humana del Empleador
			$prosResponEmple = Prospecto::find($prosIdEmpleador);
			
			//encuentra el contrato que tiene asociado el ticket
			$contratoTicket = Contrato::findOrFail($ticket->contrato->CONT_ID);

			//variable para almacenar el reponsable de gestión humana (directo o temporal)
			$responsableGh = $prosResponEmple;

			if(isset($contratoTicket->TEMP_ID)){
				//id de prospecto responsable de gestión humana de la Temporal
				$prosIdTemporal = $ticket->contrato->temporal->prospecto->PROS_ID;
				//prospecto responsable de gestión humana de la Temporal
				$prosResponTempo = Prospecto::find($prosIdTemporal);

				$responsableGh = $prosResponTempo;
			}

			$prosUser = Prospecto::getProspectoPorCedula(\Auth::user()->cedula);

			
			
			if(isset($prosUser)){
				if($responsableGh->PROS_ID == $prosUser->PROS_ID){

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

				}else{

					flash_modal( 'El Ticket solo puede ser cerrado por el rresponsable de gestión humana o de la temporal', 'danger' );
					return redirect()->back();
				}
			}else{

				flash_modal( 'El rresponsable de gestión humana no tiene hoja de vida en el sistema', 'danger' );
					return redirect()->back();
			}
			

			

		}

		

	}

	public function buscaGrupo(){
		$empleador = findId("Empleador",request()->get('EMPL_ID'));
		
		$data=modelo("Grupo")->select('GRUPOS.GRUP_DESCRIPCION','GRUPOS.GRUP_ID')
		->join('EMPLEADORES_GRUPOS','GRUPOS.GRUP_ID','=','EMPLEADORES_GRUPOS.GRUP_ID')
		->join('EMPLEADORES','EMPLEADORES_GRUPOS.EMPL_ID','=','EMPLEADORES.EMPL_ID')
		->where('EMPLEADORES.EMPL_ID', $empleador->EMPL_ID)->get();
		return response()->json($data);
	}	

	public function buscaTurno(){
		$empleador = findId("Empleador",request()->get('EMPL_ID'));
		
		$data=modelo("Turno")->select('TURNOS.TURN_DESCRIPCION','TURNOS.TURN_ID')
		->join('EMPLEADORES_TURNOS','TURNOS.TURN_ID','=','EMPLEADORES_TURNOS.TURN_ID')
		->join('EMPLEADORES','EMPLEADORES_TURNOS.EMPL_ID','=','EMPLEADORES.EMPL_ID')
		->where('EMPLEADORES.EMPL_ID', $empleador->EMPL_ID)->get();
		return response()->json($data);
	}

}
