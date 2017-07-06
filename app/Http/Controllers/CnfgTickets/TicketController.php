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
use SGH\Prospecto;

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
			'TICK_FECHASOLICITUD' => ['required'],
			'TICK_FECHACUMPLIMIENTO' => [],
			'TICK_IMAGEN' => [],
			'TICK_ARCHIVO' => [],
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
			], 'PROS_NOMBRESAPELLIDOS');
        $columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::activos()->orderBy('CONTRATOS.'.$primaryKey)->select([ 'CONTRATOS.'.$primaryKey , $column ])->get();
		$arrContratos = $prospecto->pluck($columnName, $primaryKey)->toArray();
		//dd($arrContratos);

		$arrEstados = model_to_array(EstadoTicket::class, 'ESTI_DESCRIPCION');

		$arrPrioridad = model_to_array(Prioridad::class, 'PRIO_DESCRIPCION');

		$arrCategorias = model_to_array(Categoria::class, 'CATE_DESCRIPCION');

		return view('cnfg-tickets/tickets/create', compact('arrContratos','arrEstados','arrPrioridad','arrCategorias'));
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
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($data);

		//Se crea el registro.
		$categoria = Categoria::create($data);

		// redirecciona al index de controlador
		flash_alert( 'Categoria '.$categoria->TICK_ID.' creada exitosamente.', 'success' );
		return redirect()->route('cnfg-tickets.tickets.index');
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
		$categoria = Categoria::findOrFail($TICK_ID);

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/tickets/edit', compact('categoria', 'arrProcesos'));
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
		$categoria = Categoria::findOrFail($TICK_ID);
		//y se actualiza con los datos recibidos.
		$categoria->update($data);

		// redirecciona al index de controlador
		flash_alert( 'Categoria '.$categoria->TICK_ID.' modificada exitosamente.', 'success' );
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
		$tickets = Categoria::findOrFail($TICK_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($tickets->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Categoria '.$tickets->TICK_ID.' no se puede borrar.', 'danger' );
		} else {
			$tickets->delete();
				flash_alert( 'Categoria '.$tickets->TICK_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.tickets.index');
	}
	
}
