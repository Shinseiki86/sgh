<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Ticket;
use SGH\User;
use SGH\Mail;
use SGH\Prospecto;

use Carbon\Carbon;

class TicketController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:ticket-index', ['only' => ['index']]);
		$this->middleware('permission:ticket-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:ticket-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:ticket-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data)
	{
		$validator = Validator::make($data, [
			'TICK_DESCRIPCION' => ['required','max:3000'],
			'CONT_ID' => ['required'],
			'ESTI_ID' => ['required'],
			'ESAP_ID' => ['required'],
			'PRIO_ID' => ['required'],
			'CATE_ID' => ['required'],
			'TIIN_ID' => ['required'],
			'TICK_FECHAEVENTO' => ['required'],
			'TICK_OBSERVACIONES' => ['max:3000'],
			]);

		if ($validator->fails())
			return redirect()->back()
		->withErrors($validator)
		->withInput()->send();
	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$tickets = Ticket::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-tickets/tickets/index', compact('tickets'));
	}

	public function show($TICK_ID)
	{
        // Se obtiene el registro
		$ticket = Ticket::findOrFail($TICK_ID);

		$arrSanciones = model_to_array(Sancion::class, 'SANC_DESCRIPCION');

        // Muestra la vista y pasa el registro
		return view('cnfg-tickets/tickets/show', compact('ticket','arrSanciones'));
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

		return view('cnfg-tickets/tickets/create', compact('arrContratos','arrEstados','arrPrioridad','arrCategorias','arrTiposIncidentes','arrEstadosAprobacion'));
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

		//dd($data);

		//fecha actual
		$fecactual = Carbon::now();

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
		$this->validator($data);
		//Se crea el registro.
		$ticket = Ticket::create($data);

		//se actualiza el nombre del archivo concatenando el ID del registro para garantizar su unicidad
		//en caso de que en el request venga un archivo
		if($filename != null){
			$ticket->TICK_ARCHIVO = $filename[0]. "-" . $ticket->TICK_ID . "." . $filename[1];
			$ticket->save();
			//mueve el archivo a la ruta indicada
			$file->move($destinationPath, $ticket->TICK_ARCHIVO);
		}
		
		//determinar cual es el usuario que realizó la creación del ticket
		$usuario = \Auth::user()->USER_id;
		$ticket->USER_id = $usuario;

		$ticket->TICK_FECHASOLICITUD = $fecactual;
		$ticket->save();

		$TICK_ID = $ticket->TICK_ID;
		$tickets = Ticket::findOrFail($TICK_ID);

		//===================================================================================
		//Bloque para envío de email
		$subject = "Nuevo Ticket";
		$this->sendEmail($tickets, 'emails.info_ticket_creado', $subject);
		//===================================================================================

		// redirecciona al index de controlador
		flash_alert( 'Ticket '.$ticket->TICK_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.tickets.index');
	}

	protected function sendEmail($tickets, $view, $asunto)
	{

		try{
			\Mail::send($view, compact('tickets'), function($message) use ($asunto){

				//============================================================================
				//bloque para determinar los correos a donde se despachara el email
				
    			//obtiene la cedula del usuario
				$cedula = \Auth::user()->cedula;
				//obtiene el id del prospecto que se encuentra como jefe en el contrato
				$jefe = get_jefe_prospecto($cedula);
				//obtiene el email del jefe
				$jefe_email = get_email_jefe($jefe);
				//============================================================================

	            //Se obtiene el usuario que creó el ticket
				$user = auth()->user();
	            //remitente
				$message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
	            //asunto
				$message->subject($asunto);
	            //email del creador del ticket
				$copiaa = $user->email;
	            //setea copia a
				$message->cc($copiaa, $name = null);
	            //receptor
	            //$message->to( explode(',', $para), $name = null);
				$message->to($jefe_email, $name = null);
			});
		}
		catch(\Exception $e){
			flash_alert( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué creado pero no se envió notificación', 'danger' );
		}

	}


	public function autorizarTicket($TICK_ID){

		//fecha actual
		$fecactual = Carbon::now();

		//encuentra el ticket
		$ticket = Ticket::findOrFail($TICK_ID);

		$ticket->ESAP_ID = 2; //estado ENVIADO A GESTIÓN HUMANA
		$ticket->TICK_FECHAAPROBACION = $fecactual;
		$ticket->save();

		//===================================================================================
		$empl_id = $ticket->contrato->empleador->EMPL_ID;
		$user_id = $ticket->USER_id;
		//Bloque para envío de email
		$subject = "Ticket Autorizado";
		$this->sendEmailAutorizacion($ticket, 'emails.info_ticket_autorizado', $subject, $empl_id, $user_id);
		//===================================================================================

		flash_alert( 'Ticket '.$ticket->TICK_ID.' ha sido enviado a G.H exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.tickets.index');

	}

	protected function sendEmailAutorizacion($tickets, $view, $asunto, $empl_id, $user_id)
	{

		try{
			\Mail::send($view, compact('tickets'), function($message) use ($asunto, $empl_id, $user_id){

				//============================================================================
				//bloque para determinar los correos a donde se despachara el email
				
				//usuario que lo autoriza
    			$email_user_auto = \Auth::user()->email;
				//email de la persona encargada del empleador
				$empl_email = get_email_empleador($empl_id);
				//email del usuario que creo el ticket
				$email_user_creo = get_email_user($user_id);
		
				//============================================================================

				$copiaa = [$email_user_auto, $email_user_creo];

	            //remitente
				$message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
	            //asunto
				$message->subject($asunto);
	            //setea copia a
				$message->cc($copiaa, $name = null);
	            //receptor
	            //$message->to( explode(',', $para), $name = null);
				$message->to($empl_email, $name = null);

				
			});
		}
		catch(\Exception $e){
			flash_alert( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué enviado a G.H pero no se envió notificación', 'danger' );
		}

	}

	public function rechazarTicket($TICK_ID){

		$data = request()->all();

    	//fecha actual
		$fecactual = Carbon::now();

		//encuentra el ticket
		$ticket = Ticket::findOrFail($TICK_ID);

		$ticket->ESAP_ID = 3; //estado RECHAZADO
		$ticket->ESTI_ID = 3; //estado ticket CERADO
		$ticket->TICK_FECHAAPROBACION = $fecactual;
		$ticket->TICK_FECHACIERE = $fecactual;
		$ticket->TICK_MOTIVORECHAZO = $data['TICK_MOTIVORECHAZO'];
		$ticket->save();

		//===================================================================================
		$user_id = $ticket->USER_id;
		//Bloque para envío de email
		$subject = "Ticket Rechazado";
		$this->sendEmailRechazo($ticket, 'emails.info_ticket_rechazado', $subject, $user_id);
		//===================================================================================

		flash_alert( 'Ticket '.$ticket->TICK_ID.' ha sido rechazado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.tickets.index');

	}

	protected function sendEmailRechazo($tickets, $view, $asunto, $user_id)
	{

		try{
			\Mail::send($view, compact('tickets'), function($message) use ($asunto, $user_id){

				//============================================================================
				//bloque para determinar los correos a donde se despachara el email
				
				//usuario que lo autoriza
    			$email_user_auto = \Auth::user()->email;
				//email del usuario que creo el ticket
				$email_user_creo = get_email_user($user_id);
		
				//============================================================================

				$copiaa = [$email_user_auto];

	            //remitente
				$message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
	            //asunto
				$message->subject($asunto);
	            //setea copia a
				$message->cc($copiaa, $name = null);
	            //receptor
	            //$message->to( explode(',', $para), $name = null);
				$message->to($email_user_creo, $name = null);

				
			});
		}
		catch(\Exception $e){
			flash_alert( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué enviado a G.H pero no se envió notificación', 'danger' );
		}

	}

	public function cerrarTicket($TICK_ID){

    	//Datos recibidos desde la vista.
		$data = request()->all();

		//dd($data);

    	//fecha actual
		$fecactual = Carbon::now();

		//encuentra el ticket
		$ticket = Ticket::findOrFail($TICK_ID);

		$ticket->ESTI_ID = 3; //estado CERRADO
		$ticket->ESAP_ID = 4; //estado FINALIZADO POR GESTIÓN HUMANA
		$ticket->TICK_FECHACIERE = $fecactual;

		//SE ACTUALIZAN LOS CAMPOS DEL CIERRE DEL TICKET
		$ticket->SANC_ID = $data['SANC_ID'];
		$ticket->TICK_CONCLUSION = $data['TICK_CONCLUSION'];
		$ticket->save();

		//===================================================================================
		$user_id = $ticket->USER_id;
		//Bloque para envío de email
		$subject = "Ticket Cerrado por G.H";
		$this->sendEmailCerrar($ticket, 'emails.info_ticket_cerrado', $subject, $user_id);
		//===================================================================================

		flash_alert( 'Ticket '.$ticket->TICK_ID.' ha sido cerrado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.tickets.index');

	}

	protected function sendEmailCerrar($tickets, $view, $asunto, $user_id)
	{

		try{
			\Mail::send($view, compact('tickets'), function($message) use ($asunto, $user_id){

				//============================================================================
				//bloque para determinar los correos a donde se despachara el email
				
				//usuario que lo autoriza
    			$email_user_cierra = \Auth::user()->email;
				//email del usuario que creo el ticket
				$email_user_creo = get_email_user($user_id);
				//se obtiene el model con el usuario (user_id)
				$user = User::findOrFail($user_id);
				//se extrae la cedula del usuario y se determina quien es el jefe por un helper
				$jefe = get_jefe_prospecto($user->cedula);
				//se obtiene el email del jefe por un helper
				$email_jefe = get_email_jefe($jefe);
				//============================================================================

				//se envía copia al usuario que cierra el ticket y al que lo creo inicialmente. el mensaje se dirije al jefe que es quien autorizó el ticket
				$copiaa = [$email_user_cierra, $email_user_creo];
	            //remitente
				$message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
	            //asunto
				$message->subject($asunto);
	            //setea copia a
				$message->cc($copiaa, $name = null);
	            //receptor
	            //$message->to( explode(',', $para), $name = null);
				$message->to($email_jefe, $name = null);

				
			});
		}
		catch(\Exception $e){
			flash_alert( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué enviado a G.H pero no se envió notificación', 'danger' );
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

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/tickets/edit', compact('ticket', 'arrProcesos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TICK_ID
	 * @return Response
	 */
	public function update($TICK_ID)
	{
		//Datos recibidos desde la vista.
		$data = request()->all();

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($data, $TICK_ID);

		// Se obtiene el registro
		$ticket = Ticket::findOrFail($TICK_ID);
		//y se actualiza con los datos recibidos.
		$ticket->update($data);

		// redirecciona al index de controlador
		flash_alert( 'Ticket '.$ticket->TICK_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.tickets.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TICK_ID
	 * @return Response
	 */
	public function destroy($TICK_ID, $showMsg=True)
	{
		$tickets = Ticket::findOrFail($TICK_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($tickets->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Ticket '.$tickets->TICK_ID.' no se puede borrar.', 'danger' );
		} else {
			$tickets->delete();
			flash_alert( 'Ticket '.$tickets->TICK_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.tickets.index');
	}

	
	
}
