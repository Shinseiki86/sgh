<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Proceso;

class ProcesoController extends Controller
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
			'PROC_DESCRIPCION' => ['required','max:100'],
			'PROC_OBSERVACIONES' => ['max:300'],
			'GERE_ids' => ['array'],
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
		$procesos = Proceso::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-organizacionales/procesos/index', compact('procesos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		return view('cnfg-organizacionales/procesos/create', compact('arrGerencias'));
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
		$proceso = Proceso::create($data);
		//Relación con procesos
		$GERE_ids = isset($data['GERE_ids']) ? $data['GERE_ids'] : [];
		$proceso->gerencias()->sync($GERE_ids, true);

		// redirecciona al index de controlador
		flash_alert( 'Proceso '.$proceso->GERE_ID.' creada exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.procesos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $PROC_ID
	 * @return Response
	 */
	public function edit($PROC_ID)
	{
		// Se obtiene el registro
		$proceso = Proceso::findOrFail($PROC_ID);

		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		$GERE_ids = $proceso->gerencias->pluck('GERE_ID')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-organizacionales/procesos/edit', compact('proceso', 'arrGerencias', 'GERE_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PROC_ID
	 * @return Response
	 */
	public function update($PROC_ID)
	{
		//Datos recibidos desde la vista.
		$data = request()->all();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($data, $PROC_ID);

		// Se obtiene el registro
		$proceso = Proceso::findOrFail($PROC_ID);
		//y se actualiza con los datos recibidos.
		$proceso->update($data);

		//Relación con procesos
		$GERE_ids = isset($data['GERE_ids']) ? $data['GERE_ids'] : [];
		$proceso->gerencias()->sync($GERE_ids, true);

		// redirecciona al index de controlador
		flash_alert( 'Proceso '.$proceso->GERE_ID.' modificada exitosamente.', 'success' );
		return redirect()->route('cnfg-organizacionales.procesos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PROC_ID
	 * @return Response
	 */
	public function destroy($PROC_ID, $showMsg=True)
	{
		$proceso = Proceso::findOrFail($PROC_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($proceso->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Proceso '.$proceso->GERE_ID.' no se puede borrar.', 'danger' );
		} else {
			$proceso->delete();
				flash_alert( 'Proceso '.$proceso->GERE_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-organizacionales.procesos.index');
	}
	
}
