<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Gerencia;
use SGH\Empleador;

class GerenciaController extends Controller
{

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $GERE_ID = 0)
	{
		$validator = Validator::make($data, [
			'GERE_DESCRIPCION' => ['required','max:100','unique:GERENCIAS,GERE_DESCRIPCION,'.$GERE_ID.',GERE_ID'],
			'EMPL_ID' => ['required'],
			'GERE_OBSERVACIONES' => ['max:300'],
			'PROC_ids' => ['array'],
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
		$gerencias = Gerencia::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/gerencias/index', compact('gerencias'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los CNOS disponibles
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		return view('cnfg-organizacionales/gerencias/create', compact('arrEmpleadores', 'arrProcesos'));
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
		$gerencia = Gerencia::create($data);
		
		//Relación con procesos
		$PROC_ids = isset($data['PROC_ids']) ? $data['PROC_ids'] : [];
		$gerencia->procesos()->sync($PROC_ids, true);

		// redirecciona al index de controlador
		flash_alert( 'Gerencia '.$gerencia->GERE_ID.' creada exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.gerencias.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function edit($GERE_ID)
	{
		// Se obtiene el registro
		$gerencia = Gerencia::findOrFail($GERE_ID);

		//Se crea un array con los CNOS disponibles
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		$arrProcesos = model_to_array(Proceso::class, 'PROC_DESCRIPCION');

		$PROC_ids = $gerencia->procesos->pluck('PROC_ID')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/gerencias/edit', compact('gerencia', 'arrEmpleadores', 'arrProcesos', 'PROC_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function update($GERE_ID)
	{
		//Datos recibidos desde la vista.
		$data = request()->all();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($data, $GERE_ID);

		// Se obtiene el registro
		$gerencia = Gerencia::findOrFail($GERE_ID);
		//y se actualiza con los datos recibidos.
		$gerencia->update($data);

		//Relación con procesos
		$PROC_ids = isset($data['PROC_ids']) ? $data['PROC_ids'] : [];
		$gerencia->procesos()->sync($PROC_ids, true);

		// redirecciona al index de controlador
		flash_alert( 'Gerencia '.$gerencia->GERE_ID.' modificada exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.gerencias.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $GERE_ID
	 * @return Response
	 */
	public function destroy($GERE_ID, $showMsg=True)
	{
		$gerencia = Gerencia::findOrFail($GERE_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($gerencia->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Gerencia '.$gerencia->GERE_ID.' no se puede borrar.', 'danger' );
		} else {
			$gerencia->delete();
				flash_alert( 'Gerencia '.$gerencia->GERE_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.gerencias.index');
	}
	
}