<?php
namespace SGH\Http\Controllers\GestionHumana;

use SGH\Http\Controllers\Controller;

use SGH\Models\Contrato;
use SGH\Models\PlantaLaboral;
use SGH\Models\CentroCosto;
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

		//Se crea un array con las gerencias
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

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

		return view($this->route.'.create' , compact('arrEmpleadores','arrTiposempleadores','arrGerencias','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrTemporales','arrCiudades','arrEPS','arrARL','arrCCF'));
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

		//variables para llamar al metodo que extrae la planta autorizada y el conteo de contratos
		$empleador = request()->get('EMPL_ID');
		$gerencia  = request()->get('GERE_ID');
		$cargo 	   = request()->get('CARG_ID');

		if($this->validarPlanta($empleador, $gerencia, $cargo)){
			parent::storeModel(['entidades'=>$entidades_id]);
		}else{
			flash_modal('No se puede crear contrato: La planta autorizada se encuentra completa', 'info' );
			return redirect()->route($this->route.'.create')->send();
		}				
		
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

		//Se crea un array con las gerencias
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

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
		return view($this->route.'.edit', compact('contrato','arrEmpleadores','arrTiposempleadores','arrGerencias','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrTemporales','arrCiudades','arrEPS','arrARL','arrCCF', 'ENTI_ID_eps', 'ENTI_ID_arl', 'ENTI_ID_ccf'));
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

		//variables para llamar al metodo que extrae la planta autorizada y el conteo de contratos
		$empleador = request()->get('EMPL_ID');
		$gerencia  = request()->get('GERE_ID');
		$cargo 	   = request()->get('CARG_ID');

		if($this->validarPlanta($empleador, $gerencia, $cargo)){
			parent::updateModel($CONT_ID, ['entidades'=>$entidades_id]);	
		}else{
			flash_modal('No se puede crear contrato: La planta autorizada se encuentra completa', 'info' );
			return redirect()->route($this->route.'.edit')->send();
		}				
		

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

	public function getPlantaLaboral($empleador, $gerencia, $cargo){

		$data = PlantaLaboral::select('PALA_CANTIDAD')
		->where('EMPL_ID', $empleador)
		->where('GERE_ID', $gerencia)
		->where('CARG_ID', $cargo)
		->get();

		if(count($data)==0){
			return 0;
		}else{
			return $data[0]['PALA_CANTIDAD'];
		}

		

	}

	public function getContratosPorEstructura($empleador, $gerencia, $cargo)
	{
		$data = Contrato::select('CONT_ID')
		->where('EMPL_ID', $empleador)
		->where('GERE_ID', $gerencia)
		->where('CARG_ID', $cargo)
		->count();

		return $data;
	}

	
	public function validarPlanta($empleador, $gerencia, $cargo){

		if($empleador!=null && $gerencia!=null && $cargo!=null){

			//se extrae la planta laboral autorizada
			$plantalaboral = $this->getPlantaLaboral($empleador, $gerencia, $cargo);

			//contar los contratos activos con la misma estructura
			$contratos = $this->getContratosPorEstructura($empleador, $gerencia, $cargo);

			//dd($plantalaboral);

			// 2<=1
			if($contratos<$plantalaboral){
				return true;
			}else{
				return false;
			}

		}

	}

	public function buscaGerencia(){
		$empleador = findId("Empleador",request()->get('EMPL_ID'));
		 $data=modelo("Gerencia")->select('GERENCIAS.GERE_DESCRIPCION','GERENCIAS.GERE_ID')
		 ->join('EMPLEADORES_GERENCIAS','GERENCIAS.GERE_ID','=','EMPLEADORES_GERENCIAS.GERE_ID')
		 ->join('EMPLEADORES','EMPLEADORES_GERENCIAS.EMPL_ID','=','EMPLEADORES.EMPL_ID')
		 ->where('EMPLEADORES.EMPL_ID', $empleador->EMPL_ID)->get();
		 //dd($data);
	    return response()->json($data);
	}

	public function buscaCentroCosto(){
		$gerencia = findId("Gerencia",request()->get('GERE_ID'));
		
		 $data=modelo("CentroCosto")->select('CENTROSCOSTOS.CECO_DESCRIPCION','CENTROSCOSTOS.CECO_ID')
		 ->join('GERENCIAS_CENTROCOSTOS','CENTROSCOSTOS.CECO_ID','=','GERENCIAS_CENTROCOSTOS.CECO_ID')
		 ->join('GERENCIAS','GERENCIAS_CENTROCOSTOS.GERE_ID','=','GERENCIAS.GERE_ID')
		 ->where('GERENCIAS.GERE_ID', $gerencia->GERE_ID)->get();
	    return response()->json($data);
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
