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
use SGH\Mail;
use SGH\Prospecto;

use Carbon\Carbon;

class TicketController extends Controller
{

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
        // Muestra la vista y pasa el registro
        return view('cnfg-tickets/tickets/show', compact('ticket'));
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
		if($filename != null){
			$ticket->TICK_ARCHIVO = $filename[0]. "-" . $ticket->TICK_ID . "." . $filename[1];
			$ticket->save();
			//mueve el archivo a la ruta indicada
			$file->move($destinationPath, $ticket->TICK_ARCHIVO);
		}
		

		$ticket->TICK_FECHASOLICITUD = $fecactual;
		$ticket->save();

		$TICK_ID = $ticket->TICK_ID;
		$tickets = Ticket::findOrFail($TICK_ID);

		//dd($tickets);
		$subject = "Nuevo Ticket";
		$this->sendEmail($tickets, 'emails.info_ticket_creado', $subject);

		// redirecciona al index de controlador
		flash_alert( 'Ticket '.$ticket->TICK_ID.' creado exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.tickets.index');
	}

	protected function sendEmail($tickets, $view, $asunto)
    {
    	try{
    		\Mail::send($view, compact('tickets'), function($message) use ($asunto){
	            //Se obtiene el usuario que creó la encuesta
	            $user = auth()->user();
	            //remitente
	            $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
	            //asunto
	            $message->subject($asunto);

	            $emails = $user->email .",". "coordinadornomina@aseoregional.com";

	            //receptor
	            $message->to( explode(',', $emails), $user->name);
        	});
    	}
    	catch(\Exception $e){
    		flash_modal( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué creado pero no se envió notificación', 'danger' );
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
		flash_alert( 'Ticket '.$ticket->TICK_ID.' modificada exitosamente.', 'success' );
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
