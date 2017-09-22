<?php

namespace SGH\Http\Controllers\GestionHumana;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
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
use SGH\Models\TipoEntidad;

class ContratoController extends Controller
{
	protected $route = 'gestion-humana.contratos';
	protected $class = Contrato::class;

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
			'EMPL_ID' => ['numeric', 'required'],
			'TEMP_ID' => ['numeric',],
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
			'JEFE_ID' => ['numeric'],
			'CARG_ID' => ['numeric', 'required'],
			'CONT_FECHAINGRESO' => ['date', 'required'],
			'CONT_FECHARETIRO' => ['date'],
			'MORE_ID' => ['numeric'],
			'CONT_SALARIO'      => ['numeric','required'],
			'CONT_VARIABLE'     => ['numeric'],
			'CONT_RODAJE'       => ['numeric'],
			'CONT_CASOMEDICO'   => ['required', 'max:2'],
			'CONT_OBSERVACIONES'=> ['max:300'],
			'ENTI_ID_eps' => ['required'],
			'ENTI_ID_arl' => ['required'],
			'ENTI_ID_ccf' => ['required'],
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
		return view($this->route.'.index', compact('contratos'));
	}


	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		$model = Contrato::select([
							'CONT_ID',
						])->get();

		return Datatables::collection($model)
			->addColumn('action', function($model){
				return parent::buttonEdit($model).
					parent::buttonDelete($model, 'PROS_CEDULA');
			})->make(true);
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

		//Se crea un array con las Entidades EPS
		$arrEPS = model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL',[['TIEN_ID','=',2]]);

		//Se crea un array con las Entidades ARL
		$arrARL = model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL',[['TIEN_ID','=',1]]);

		//Se crea un array con las Entidades CCF
		$arrCCF = model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL',[['TIEN_ID','=',3]]);

		//Se crea un array con los jefes activos
		$primaryKey = 'PROS_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';
		$arrJefes = Prospecto::activos()
							->orderBy('CONTRATOS.'.$primaryKey)
							->select([ 'PROSPECTOS.'.$primaryKey , $column ])
							->get();
		$arrJefes = model_to_array($arrJefes, $columnName, $primaryKey);

		return view($this->route.'.create' , compact('arrEmpleadores','arrTiposempleadores','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrTemporales','arrCiudades','arrEPS','arrARL','arrCCF'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		$entidades_id = [];
		foreach (['eps','arl','ccf'] as $entidad) {
			if(request()->get('ENTI_ID_'.$entidad)!=null)
				$entidades_id[] = request()->get('ENTI_ID_'.$entidad);
		}

		parent::storeModel(['entidades'=>$entidades_id]);		
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $CONT_ID
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
		//Se crea un array con las Entidades EPS
		$arrEPS = model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL',[['TIEN_ID','=',TipoEntidad::EPS]]);
		$ENTI_ID_eps = $contrato->getEntidad(TipoEntidad::EPS);

		//Se crea un array con las Entidades ARL
		$arrARL = model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL',[['TIEN_ID','=',TipoEntidad::ARL]]);
		$ENTI_ID_arl = $contrato->getEntidad(TipoEntidad::ARL);

		//Se crea un array con las Entidades CCF
		$arrCCF = model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL',[['TIEN_ID','=',TipoEntidad::CCF]]);
		$ENTI_ID_ccf = $contrato->getEntidad(TipoEntidad::CCF);

		$primaryKey = 'PROS_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';
		$arrJefes = Prospecto::activos()
							->orderBy('CONTRATOS.'.$primaryKey)
							->select([ 'PROSPECTOS.'.$primaryKey , $column ])
							->get();
		$arrJefes = model_to_array($arrJefes, $columnName, $primaryKey);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('contrato','arrEmpleadores','arrTiposempleadores','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrTemporales','arrCiudades','arrEPS','arrARL','arrCCF', 'ENTI_ID_eps', 'ENTI_ID_arl', 'ENTI_ID_ccf'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CONT_ID
	 * @return Response
	 */
	public function update($CONT_ID)
	{
		$entidades_id = [];
		foreach (['eps','arl','ccf'] as $entidad) {
			if(request()->get('ENTI_ID_'.$entidad)!=null)
				$entidades_id[] = request()->get('ENTI_ID_'.$entidad);
		}
		parent::updateModel($CONT_ID, ['entidades'=>$entidades_id]);	

	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CONT_ID
	 * @return Response
	 */
	public function destroy($CONT_ID)
	{
		parent::destroyModel($CONT_ID);
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
