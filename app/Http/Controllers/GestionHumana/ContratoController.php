<?php

namespace SGH\Http\Controllers\GestionHumana;

use SGH\Http\Requests;
use Validator;
use SGH\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Contrato;
use SGH\Cargo;
use SGH\Riesgo;

class ContratoController extends Controller
{
    //

    public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($request)
	{
		$validator = Validator::make($request->all(), [
			'PROS_ID' => ['numeric', 'required'],
			'CONT_CASOMEDICO' => ['required', 'max:2'],
			'CARG_ID' => ['numeric', 'required'],
			'CONT_FECHAINGRESO' => ['required'],
			'CONT_SALARIO' => ['numeric','required'],
			'CONT_VARIABLE' => ['numeric'],
			'CONT_RODAJE' => ['numeric'],
			'ESCO_ID' => ['numeric', 'required'],
			'MORE_ID' => ['numeric'],
			'TICO_ID' => ['numeric', 'required'],
			'CLCO_ID' => ['numeric', 'required'],
			'EMPL_ID' => ['numeric', 'required'],
			'RIES_ID' => ['numeric', 'required'],
			'TIEM_ID' => ['numeric', 'required'],
			'CECO_ID' => ['numeric', 'required'],
			'CONT_OBSERVACIONES', ['max:300'],
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

		//Se crea un array con los prospectos disponibles
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
				'PROS_PRIMERNOMBRE',
				'PROS_SEGUNDONOMBRE',
				'PROS_PRIMERAPELLIDO',
				'PROS_SEGUNDOAPELLIDO',
			], 'PROS_NOMBRESAPELLIDOS'));

		//Se crea un array con los cargos disponibles
		$arrCargos = model_to_array(Cargo::class, 'CARG_DESCRIPCION');

		//Se crea un array con los motivos de retiro
		$arrMotivosretiro = model_to_array(MotivoRetiro::class, 'MORE_DESCRIPCION');


		return view('gestion-humana/contratos/create' , compact('arrEmpleadores','arrTiposempleadores','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Datos recibidos desde la vista.
		$request = request();

		if(!$request->has('MORE_ID')){	$request['MORE_ID'] = null; }
		if(!$request->has('CONT_FECHARETIRO')){	$request['CONT_FECHARETIRO'] = null; }
		if(!$request->has('CONT_VARIABLE')){	$request['CONT_VARIABLE'] = null; }
		if(!$request->has('CONT_RODAJE')){	$request['CONT_RODAJE'] = null; }
		if(!$request->has('CONT_OBSERVACIONES')){	$request['CONT_OBSERVACIONES'] = null; }

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		//Se crea el registro.
		$contrato = Contrato::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Contrato '.$contrato->CONT_ID.' creado exitosamente.', 'success' );
		return redirect()->route('gestion-humana.contratos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($PROS_ID)
	{
		// Se obtiene el registro
		$contrato = Contrato::findOrFail($PROS_ID);

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

		//Se crea un array con los motivos de retiro
		$arrMotivosretiro = model_to_array(MotivoRetiro::class, 'MORE_DESCRIPCION');

		//Se crea un array con los riesgos existentes
		$arrRiesgos = model_to_array(Riesgo::class, 'RIES_DESCRIPCION');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('gestion-humana/contratos/edit', compact('contrato','arrEmpleadores','arrTiposempleadores','arrCentroscostos','arrEstadoscontrato','arrTiposcontrato','arrClasescontrato','arrProspectos','arrCargos','arrMotivosretiro', 'arrRiesgos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($CONT_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();

		if(!$request->has('MORE_ID')){	$request['MORE_ID'] = null; }
		if(!$request->has('CONT_FECHARETIRO')){	$request['CONT_FECHARETIRO'] = null; }
		if(!$request->has('CONT_VARIABLE')){	$request['CONT_VARIABLE'] = null; }
		if(!$request->has('CONT_RODAJE')){	$request['CONT_RODAJE'] = null; }
		if(!$request->has('CONT_OBSERVACIONES')){	$request['CONT_OBSERVACIONES'] = null; }

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$contrato = Contrato::findOrFail($CONT_ID);
		//y se actualiza con los datos recibidos.
		$contrato->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Contrato '.$contrato->CONT_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('gestion-humana.contratos.index');
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
	
}
