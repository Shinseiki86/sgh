<?php

namespace SGH\Http\Controllers\GestionHumana;

use SGH\Http\Requests;
use Validator;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Models\Contrato;
use SGH\Models\Prospecto;
use SGH\Models\Jefe;
use SGH\Models\Cargo;
use SGH\Models\Riesgo;
use SGH\Models\Empleador;

class ContratoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:contrato-index', ['only' => ['index']]);
		$this->middleware('permission:contrato-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:contrato-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:contrato-delete',   ['only' => ['destroy']]);
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
			'EMPL_ID' => ['numeric', 'required'],
			'TEMP_ID' => ['numeric', 'required'],
			'TIEM_ID' => ['numeric', 'required'],
			'CECO_ID' => ['numeric', 'required'],
			'ESCO_ID' => ['numeric', 'required'],
			'TICO_ID' => ['numeric', 'required'],
			'CLCO_ID' => ['numeric', 'required'],
			'RIES_ID' => ['numeric', 'required'],
			'PROS_ID' => ['numeric', 'required'],
			'GRUP_ID' => ['numeric', 'required'],
			'TURN_ID' => ['numeric', 'required'],
			'CIUD_CONTRATA' => ['numeric', 'required'],
			'CIUD_SERVICIO' => ['numeric', 'required'],
			//'JEFE_ID' => ['numeric'],
			'CARG_ID' => ['numeric', 'required'],
			'CONT_FECHAINGRESO' => ['date', 'required'],
			'CONT_SALARIO'      => ['numeric','required'],
			'CONT_VARIABLE'     => ['numeric'],
			'CONT_RODAJE'       => ['numeric'],
			'CONT_CASOMEDICO'   => ['required', 'max:2'],
			'CONT_OBSERVACIONES'=> ['max:300'],
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
		$contratos = Contrato::all();
		//Se carga la vista y se pasan los registros
		return view('gestion-humana/contratos/index', compact('contratos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		//Se crea un array con los tipos de empleadores
		$arrTiposempleadores = model_to_array(TipoEmpleador::class, 'TIEM_DESCRIPCION');

		//Se crea un array con los centros de costos
		$arrCentroscostos = model_to_array(CentroCosto::class, 'CECO_DESCRIPCION');

		//Se crea un array con los estados de contrato
		$arrEstadoscontrato = model_to_array(EstadoContrato::class, 'ESCO_DESCRIPCION');

		//Se crea un array con los tipos de contrato
		$arrTiposcontrato = model_to_array(TipoContrato::class, 'TICO_DESCRIPCION');

		//Se crea un array con las clases de contrato
		$arrClasescontrato = model_to_array(ClaseContrato::class, 'CLCO_DESCRIPCION');

		//Se crea un array con los riesgos existentes
		$arrRiesgos = model_to_array(Riesgo::class, 'RIES_DESCRIPCION');

		//Se crea un array con los grupos existentes
		$arrGrupos = model_to_array(Grupo::class, 'GRUP_DESCRIPCION');

		//Se crea un array con los turnos existentes
		$arrTurnos = model_to_array(Turno::class, 'TURN_DESCRIPCION');

		//Se crea un array con los prospectos disponibles
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
				'PROS_PRIMERNOMBRE',
				'PROS_SEGUNDONOMBRE',
				'PROS_PRIMERAPELLIDO',
				'PROS_SEGUNDOAPELLIDO',
				'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS'));

		//Se crea un array con los cargos disponibles
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		//Se crea un array con las temporales disponibles
		$arrTemporales = model_to_array(Temporal::class, 'TEMP_RAZONSOCIAL');

		//Se crea un array con los motivos de retiro
		$arrMotivosretiro = model_to_array(MotivoRetiro::class, 'MORE_DESCRIPCION');

		//Se crea un array con las ciudades disponibles
		$arrCiudades= model_to_array(Ciudad::class, 'CIUD_NOMBRE');

		$primaryKey = 'PROS_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$jefe = Prospecto::activos()->orderBy('CONTRATOS.'.$primaryKey)->select([ 'PROSPECTOS.'.$primaryKey , $column ])->get();
		$arrJefes = $jefe->pluck($columnName, $primaryKey)->toArray();


		return view('gestion-humana/contratos/create' , compact('arrEmpleadores','arrTiposempleadores','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrTemporales','arrCiudades'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Contrato::class, 'gestion-humana.contratos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($CONT_ID)
	{
		// Se obtiene el registro
		$contrato = Contrato::findOrFail($CONT_ID);

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		//Se crea un array con los tipos de empleadores
		$arrTiposempleadores = model_to_array(TipoEmpleador::class, 'TIEM_DESCRIPCION');

		//Se crea un array con los centros de costos
		$arrCentroscostos = model_to_array(CentroCosto::class, 'CECO_DESCRIPCION');

		//Se crea un array con los estados de contrato
		$arrEstadoscontrato = model_to_array(EstadoContrato::class, 'ESCO_DESCRIPCION');

		//Se crea un array con los tipos de contrato
		$arrTiposcontrato = model_to_array(TipoContrato::class, 'TICO_DESCRIPCION');

		//Se crea un array con las clases de contrato
		$arrClasescontrato = model_to_array(ClaseContrato::class, 'CLCO_DESCRIPCION');

		//Se crea un array con los prospectos disponibles
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
				'PROS_PRIMERNOMBRE',
				'PROS_SEGUNDONOMBRE',
				'PROS_PRIMERAPELLIDO',
				'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS'));

		//Se crea un array con los cargos disponibles
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		//Se crea un array con las temporales disponibles
		$arrTemporales = model_to_array(Temporal::class, 'TEMP_RAZONSOCIAL');

		//Se crea un array con los motivos de retiro
		$arrMotivosretiro = model_to_array(MotivoRetiro::class, 'MORE_DESCRIPCION');

		//Se crea un array con los riesgos existentes
		$arrRiesgos = model_to_array(Riesgo::class, 'RIES_DESCRIPCION');

		//Se crea un array con los grupos existentes
		$arrGrupos = model_to_array(Grupo::class, 'GRUP_DESCRIPCION');

		//Se crea un array con los turnos existentes
		$arrTurnos = model_to_array(Turno::class, 'TURN_DESCRIPCION');

		//Se crea un array con las ciudades disponibles
		$arrCiudades= model_to_array(Ciudad::class, 'CIUD_NOMBRE');

		$primaryKey = 'PROS_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$jefe = Prospecto::activos()->orderBy('CONTRATOS.'.$primaryKey)->select([ 'PROSPECTOS.'.$primaryKey , $column ])->get();
		$arrJefes = $jefe->pluck($columnName, $primaryKey)->toArray();

		// Muestra el formulario de edición y pasa el registro a editar
		return view('gestion-humana/contratos/edit', compact('contrato','arrEmpleadores','arrTiposempleadores','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrTemporales','arrCiudades'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($CONT_ID)
	{
		parent::updateModel($CONT_ID, Contrato::class, 'gestion-humana.contratos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($EMPL_ID, $showMsg=True)
	{
		$prospecto = Contrato::findOrFail($EMPL_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($prospecto->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$prospecto->EMPL_ID.' no se puede borrar.', 'danger' );
		} else {
			$prospecto->delete();
				flash_alert( 'Contrato '.$prospecto->EMPL_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('gestion-humana.contratos.index');
	}

	/**
	 * Contratos activos por empleador.
	 *
	 * @return json
	 */
	public function getContratosEmpleador()
	{
		$data = Empleador::join('CONTRATOS', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
								->select(
									//'EMPLEADORES.EMPL_RAZONSOCIAL',
									'EMPLEADORES.EMPL_NOMBRECOMERCIAL',
									\DB::raw('COUNT("CONT_ID") as count')
								)
								->groupBy(
									'EMPLEADORES.EMPL_RAZONSOCIAL',
									'EMPLEADORES.EMPL_NOMBRECOMERCIAL'
								)
								->get();
		return $data->toJson();
	}

	
}
