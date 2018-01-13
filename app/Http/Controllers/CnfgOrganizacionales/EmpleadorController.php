<?php

namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\Empleador;

class EmpleadorController extends Controller
{
	protected $route = 'cnfg-organizacionales.empleadores';
	protected $class = Empleador::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'EMPL_RAZONSOCIAL' => ['required', 'max:300', 'unique:EMPLEADORES,EMPL_RAZONSOCIAL,'.$id.',EMPL_ID'],
			'EMPL_NOMBRECOMERCIAL' => ['required', 'max:300', 'unique:EMPLEADORES,EMPL_NOMBRECOMERCIAL,'.$id.',EMPL_ID'],
			'EMPL_NIT' => ['required', 'max:15', 'unique:EMPLEADORES,EMPL_NIT,'.$id.',EMPL_ID'],
			'EMPL_DIRECCION' => ['required', 'max:300'],
			'EMPL_OBSERVACIONES' => ['max:300'],
			'EMPL_NOMBREREPRESENTANTE' => ['required','max:300'],
			'EMPL_CEDULAREPRESENTANTE' => ['required'],
			'CIUD_CEDULA' => ['required'],
			'PROS_ID' => ['required'],
			'CIUD_DOMICILIO' => ['required'],
			'GERE_ids' => ['array'],
			'TURN_ids' => ['array'],
			'GRUP_ids' => ['array'],
		]);
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$empleadores = Empleador::with([
							'ciudad_expedicion',
							'ciudad_domicilio',
							'prospecto',
							'gerencias',
						])->get();

		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('empleadores'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrCiudades = model_to_array(Ciudad::class, 'CIUD_NOMBRE');
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');
		$arrTurnos = model_to_array(Turno::class, 'TURN_DESCRIPCION');
		$arrGrupos = model_to_array(Grupo::class, 'GRUP_DESCRIPCION');
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
		], 'PROS_NOMBRESAPELLIDOS'));

		$GERE_ids = json_encode([]);
		$TURN_ids = json_encode([]);
		$GRUP_ids = json_encode([]);

		return view($this->route.'.create', compact('arrCiudades','arrProspectos','arrGerencias','arrTurnos','arrGrupos','GERE_ids','TURN_ids','GRUP_ids'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(['gerencias'=>'GERE_ids', 'turnos'=>'TURN_ids' , 'grupos'=>'GRUP_ids']);
	}

	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($EMPL_ID)
	{
		$empleador = Empleador::findOrFail($EMPL_ID);
		$arrCiudades = model_to_array(Ciudad::class, 'CIUD_NOMBRE');
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');
		$arrTurnos = model_to_array(Turno::class, 'TURN_DESCRIPCION');
		$arrGrupos = model_to_array(Grupo::class, 'GRUP_DESCRIPCION');
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
		], 'PROS_NOMBRESAPELLIDOS'));

		//JSON con valores preseleccionados para el select múltiple
		$GERE_ids = $empleador->gerencias->pluck('GERE_ID')->toJson();
		$TURN_ids = $empleador->turnos->pluck('TURN_ID')->toJson();
		$GRUP_ids = $empleador->grupos->pluck('GRUP_ID')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('empleador','arrCiudades','arrProspectos','arrGerencias','arrTurnos','arrGrupos','GERE_ids','TURN_ids','GRUP_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($EMPL_ID)
	{
		parent::updateModel($EMPL_ID, ['gerencias'=>'GERE_ids' , 'turnos'=>'TURN_ids' , 'grupos'=>'GRUP_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($EMPL_ID)
	{
		parent::destroyModel($EMPL_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function getSignature($EMPL_ID)
	{
		return storage_path('public/signatures/'.$EMPL_ID.'jpg');
	}
	
}
