<?php
namespace SGH\Http\Controllers\GestionHumana;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\PlantaLaboral;
use SGH\Models\CentroCosto;
use SGH\Models\Prospecto;
use SGH\Models\Jefe;
use SGH\Models\Cargo;
use SGH\Models\Riesgo;
use SGH\Models\Empleador;
use SGH\Models\TipoEntidad;
use SGH\Models\Negocio;

use Carbon\Carbon;

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
		if(\Auth::user()->hasRole('admin')) //si es un administrador...
			$contratos = Contrato::all();
		else {
			//obtiene los empleadores sobre los cuales el usuario tiene permiso
			$empleadores = get_permisosempresas_user(\Auth::user()->USER_id);
			//Se obtienen los registros con los empleadores a los cuales tiene permiso
			$contratos = Contrato::whereIn('EMPL_ID', $empleadores)->get();
		}
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
		$PROS_NOMBRESAPELLIDOS = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
		], 'PROS_NOMBRESAPELLIDOS', 'PROS');

		$JEFE_NOMBRESAPELLIDOS = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO'
		], 'JEFE_NOMBRESAPELLIDOS', 'JEFE');

		$REMP_NOMBRESAPELLIDOS = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO'
		], 'REMP_NOMBRESAPELLIDOS', 'REMP');

		$model = Contrato::leftJoin('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
			->leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
			->leftJoin('PROSPECTOS as PROS', 'PROS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
			->leftJoin('PROSPECTOS as JEFE', 'JEFE.PROS_ID', '=', 'CONTRATOS.JEFE_ID')
			->leftJoin('PROSPECTOS as REMP', 'REMP.PROS_ID', '=', 'CONTRATOS.REMP_ID')
			->leftJoin('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
			->leftJoin('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
			->leftJoin('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
			->leftJoin('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
			->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
			->leftJoin('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
			->leftJoin('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
			->leftJoin('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
			->leftJoin('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
			->leftJoin('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
			->leftJoin('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
			->leftJoin('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
			->leftJoin('CIUDADES as CIUD_CONT', 'CIUD_CONT.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
			->leftJoin('CIUDADES as CIUD_SERV', 'CIUD_SERV.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
			->select([
				'CONT_ID',
				'EMPL_NOMBRECOMERCIAL',
				'TEMP_NOMBRECOMERCIAL',
				'TICO_DESCRIPCION',
				'CLCO_DESCRIPCION',
				'PROS.PROS_CEDULA',
				$PROS_NOMBRESAPELLIDOS,
				'CONT_SALARIO',
				'CARG_DESCRIPCION',
				'CONTRATOS.ESCO_ID', //No se tabula, pero define el color de la fila.
				'ESCO_DESCRIPCION',
				'CONT_FECHAINGRESO',
				'CONT_FECHATERMINACION',
				'CONT_FECHAGRABARETIRO',
				'MORE_DESCRIPCION',
				'CONT_VARIABLE',
				'CONT_RODAJE',
				'TIEM_DESCRIPCION',
				'RIES_DESCRIPCION',
				'GERE_DESCRIPCION',
				'NEGO_DESCRIPCION',
				'CECO_DESCRIPCION',
				'GRUP_DESCRIPCION',
				'TURN_DESCRIPCION',
				'CONT_CASOMEDICO',
				$JEFE_NOMBRESAPELLIDOS,
				$REMP_NOMBRESAPELLIDOS,
				'CIUD_CONT.CIUD_NOMBRE as CIUD_CONTRATO',
				'CIUD_SERV.CIUD_NOMBRE as CIUD_SERVICIO',
				'CONT_OBSERVACIONES',
				'CONT_MOREOBSERVACIONES',
				'CONT_CREADOPOR',
			])->get();

		return Datatables::collection($model)
		->addColumn('action', function($model){
			return $this->buttonEdit($model).
			$this->buttonCambiarEstado($model).
			$this->buttonDelete($model, 'PROS_CEDULA');
		})
		->setRowClass(function ($model) {
			$class = '';
			switch ($model->ESCO_ID) {
				case EstadoContrato::ACTIVO:
					$class = 'success';
					break;
				case EstadoContrato::VACACIONES:
					$class = 'warning';
					break;
				case EstadoContrato::RETIRADO:
					$class = 'danger';
					break;
			}
			return $class;
		})
		->make(true);
	}

	/**
	 * Contruye el botón para editar un registro.
	 *
	 * @return Html|string
	 */
	protected function buttonEdit($model)
	{
		if($model->ESCO_ID == EstadoContrato::ACTIVO || $model->ESCO_ID == EstadoContrato::VACACIONES)
			return parent::buttonEdit($model);
		return '';
	}

	/**
	 * Contruye el botón para cambiar el estado de un registro.
	 *
	 * @return Html|string
	 */
	protected function buttonCambiarEstado($model)
	{
		if($model->ESCO_ID == EstadoContrato::ACTIVO || $model->ESCO_ID == EstadoContrato::VACACIONES)
			return parent::button($model,
				'gestion-humana.contratos.retirarContrato',
				'Cambiar Estado', 'warning', 'flag');
		return '';
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
		//Se crea un array con los negocios
		$arrNegocios = model_to_array(Negocio::class, 'NEGO_DESCRIPCION');
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
		//Se crea un array con los prospectos disponibles (no descartados)
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
			'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';
		$arrJefes = Prospecto::activos()
		->orderBy('CONTRATOS.'.$primaryKey)
		->select([ 'PROSPECTOS.'.$primaryKey , $column ])
		->get();
		$arrJefes = model_to_array($arrJefes, $columnName, $primaryKey);

		$arrRetirados = Prospecto::retirados()
		->orderBy('CONTRATOS.'.$primaryKey)
		->select([ 'PROSPECTOS.'.$primaryKey , $column ])
		->get();
		$arrRetirados = model_to_array($arrRetirados, $columnName, $primaryKey);

		return view($this->route.'.create' , compact('arrEmpleadores','arrNegocios','arrTiposempleadores','arrGerencias','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrRetirados','arrTemporales','arrCiudades','arrEPS','arrARL','arrCCF'));
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

		if($this->validarPlanta($empleador, $gerencia, $cargo, 'new')){

			$prospecto = Prospecto::findOrFail(request()->get('PROS_ID'));
			if($prospecto->PROS_MARCA == 'SI'){

				flash_modal('No se puede crear contrato: la hoja de vida se encuentra descartada. \n consulte a gestión humana sobre este candidato', 'danger' );
				return redirect()->back()->send();

			} else {

				$pros_id  = request()->get('PROS_ID');
				$jefe_id  = request()->get('JEFE_ID');

				if($pros_id == $jefe_id){
					flash_modal('El Jefe inmediato no puede ser el mismo empleado', 'danger' );
					return redirect()->back()->send();
				} else {
					parent::storeModel(['entidades'=>$entidades_id]);
				}
			}
		} else {
			flash_alert('No se puede crear contrato: La planta autorizada se encuentra completa o no se ha definido para el cargo', 'danger' );
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

		//Se crea un array con los negocios
		$arrNegocios = model_to_array(Negocio::class, 'NEGO_DESCRIPCION');

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
			'PROS_CEDULA'
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
			'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';
		$arrJefes = Prospecto::activos()
		->orderBy('CONTRATOS.'.$primaryKey)
		->select([ 'PROSPECTOS.'.$primaryKey , $column ])
		->get();
		$arrJefes = model_to_array($arrJefes, $columnName, $primaryKey);

		$arrRetirados = Prospecto::retirados()
		->orderBy('CONTRATOS.'.$primaryKey)
		->select([ 'PROSPECTOS.'.$primaryKey , $column ])
		->get();
		$arrRetirados = model_to_array($arrRetirados, $columnName, $primaryKey);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('contrato','arrEmpleadores','arrNegocios','arrTiposempleadores','arrGerencias','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos','arrGrupos','arrTurnos','arrJefes','arrRetirados','arrTemporales','arrCiudades','arrEPS','arrARL','arrCCF', 'ENTI_ID_eps', 'ENTI_ID_arl', 'ENTI_ID_ccf'));
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

		//dd($this->validarPlanta($empleador, $gerencia, $cargo));

		if($this->validarPlanta($empleador, $gerencia, $cargo, 'update')){

			$pros_id  = request()->get('PROS_ID');
			$jefe_id  = request()->get('JEFE_ID');

			if($pros_id == $jefe_id){
				flash_modal('El Jefe inmediato no puede ser el mismo empleado', 'danger' );
				return redirect()->back()->send();
			}else{
				parent::updateModel($CONT_ID, ['entidades'=>$entidades_id]);
			}


		}else{
			flash_alert('No se puede actualizar contrato: La planta autorizada se encuentra completa o no se ha definido', 'info' );
			return redirect()->back();
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
		->whereIn('CONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
		->groupBy(
			'EMPLEADORES.EMPL_RAZONSOCIAL',
			'EMPLEADORES.EMPL_NOMBRECOMERCIAL'
			)
		->get();
		return $data->toJson();
	}


	/**
	 * Participación en contratos
	 *
	 * @return json
	 */
	public function getContratosParticipacion()
	{
		$data = Empleador::join('CONTRATOS', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
		->leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
		->select(
									//'EMPLEADORES.EMPL_RAZONSOCIAL',
			'EMPLEADORES.EMPL_NOMBRECOMERCIAL',
			\DB::raw('COUNT("CONT_ID") as count')
			)
		->whereIn('CONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
		->groupBy(
			'EMPLEADORES.EMPL_RAZONSOCIAL',
			'EMPLEADORES.EMPL_NOMBRECOMERCIAL'
			)
		->get();
		return $data->toJson();
	}

	public function getPlantaLaboral($empleador, $gerencia, $cargo){

		$plantasautorizada = PlantaLaboral::select('PALA_CANTIDAD')
			->where('EMPL_ID', $empleador)
			->where('GERE_ID', $gerencia)
			->where('CARG_ID', $cargo)
			->get();

		$plantaaux = PlantaLaboral::select('PALA_ID')
			->where('EMPL_ID', $empleador)
			->where('GERE_ID', $gerencia)
			->where('CARG_ID', $cargo)
			->get();

		if(isset($plantaaux)){
			$movplanta = \DB::table("MOVIMIENTOS_PLANTAS")
				->join('PLANTASLABORALES','PLANTASLABORALES.PALA_ID','=','MOVIMIENTOS_PLANTAS.PALA_ID')
				->where('MOVIMIENTOS_PLANTAS.PALA_ID', $plantaaux[0]['PALA_ID'])
				->sum('MOPL_CANTIDAD');

			$movplanta2 = \DB::table("MOVIMIENTOS_PLANTAS")
				->join('PLANTASLABORALES','PLANTASLABORALES.PALA_ID','=','MOVIMIENTOS_PLANTAS.PALA_ID')
				->select('MOVIMIENTOS_PLANTAS.MOPL_MOTIVO')
				->where('MOVIMIENTOS_PLANTAS.PALA_ID', $plantaaux[0]['PALA_ID']);		

			$movintplanta = intval($movplanta);
			$plantasautorizada[0]['PALA_CANTIDAD']+=$movplanta;
		}

		if(count($plantasautorizada)==0)
			return 0;
		else
			return $plantasautorizada[0]['PALA_CANTIDAD'];
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

	
	public function validarPlanta($empleador, $gerencia, $cargo, $opcion){

		if($empleador!=null && $gerencia!=null && $cargo!=null){

			//se extrae la planta laboral autorizada
			$plantalaboral = $this->getPlantaLaboral($empleador, $gerencia, $cargo);

			//contar los contratos activos con la misma estructura
			$contratos = $this->getContratosPorEstructura($empleador, $gerencia, $cargo);

			if($opcion == 'new'){

				// 2<=1
				if($contratos<$plantalaboral){
					return true;
				}else{
					return false;
				}

			}else if($opcion == 'update'){

				if($contratos<=$plantalaboral){
					return true;
				}else{
					return false;
				}

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

	public function buscaNegocio(){
		$empleador = findId("Empleador",request()->get('EMPL_ID'));
		
		$data=modelo("Negocio")->select('NEGOCIOS.NEGO_DESCRIPCION','NEGOCIOS.NEGO_ID')
		->where('NEGOCIOS.EMPL_ID', $empleador->EMPL_ID)->get();
		
		return response()->json($data);
	}

	public function retirarContrato()
	{
		//variables para llamar al metodo que extrae la planta autorizada y el conteo de contratos
		$CONT_ID = request()->get('CONT_ID');

		// Se obtiene el registro
		$contrato = Contrato::findOrFail($CONT_ID);

		//Se crea un array con los empleadores
		$arrEmpleadores = model_to_array(Empleador::class, 'EMPL_RAZONSOCIAL');

		//Se crea un array con las gerencias
		$arrGerencias = model_to_array(Gerencia::class, 'GERE_DESCRIPCION');

		//Se crea un array con los cargos disponibles
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		//Se crea un array con los motivos de retiro
		$arrMotivosretiro = model_to_array(MotivoRetiro::class, 'MORE_DESCRIPCION');

		//Se crea un array con los prospectos disponibles
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA'
			], 'PROS_NOMBRESAPELLIDOS'));

		return view($this->route.'.retirar', compact('contrato','arrEmpleadores','arrGerencias','arrCargos','arrMotivosretiro','arrProspectos'));
	}	

	public function cambiarEstado()
	{
		// Se obtiene el registro
		$contrato = Contrato::findOrFail(request()->get('CONT_ID'));

		//variables para llamar al metodo que extrae la planta autorizada y el conteo de contratos
		$empleador = $contrato->EMPL_ID;
		$gerencia  = $contrato->GERE_ID;
		$cargo 	   = $contrato->CARG_ID;
		
		$contrato->MORE_ID = request()->get('MORE_ID');
		$contrato->CONT_FECHARETIRO = request()->get('CONT_FECHARETIRO');

		//si la fecha de retiro es menor que la fecha de ingreso es un error de capa 8
		if(convert_to_date(request()->get('CONT_FECHARETIRO')) < convert_to_date($contrato->CONT_FECHAINGRESO)){

			flash_alert('Error: La fecha de retiro no puede ser menor que la fecha de ingreso', 'danger' );
			return redirect()->back()->send();

			
		}else{

			$contrato->CONT_MOREOBSERVACIONES = request()->get('CONT_MOREOBSERVACIONES');
			$contrato->ESCO_ID = EstadoContrato::RETIRADO;
			$contrato->CONT_FECHAGRABARETIRO = Carbon::now();
			$contrato->save();

			if(request()->get('PROS_MARCA') == 'SI'){

				$prospecto = Prospecto::findOrFail($contrato->PROS_ID);

				$prospecto->PROS_MARCA = request()->get('PROS_MARCA');
				$prospecto->PROS_MARCAOBSERVACIONES = 'HV descartada desde el modulo de retiros.';

				$prospecto->save();

			}

			flash_alert('Contrato retirado exitosamente', 'success' );
			return redirect()->route($this->route.'.index')->send();

		}

		


	}	



}
