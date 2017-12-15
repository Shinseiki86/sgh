<?php

namespace SGH\Http\Controllers\CnfgCasosMedicos;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\NovedadMedica;
use SGH\Models\Contrato;
use SGH\Models\Prospecto;

class NovedadMedicaController extends Controller
{
	protected $route = 'cnfg-casosmedicos.novedadesmedicas';
	protected $class = NovedadMedica::class;

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
		$novedadesmedicas = NovedadMedica::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('novedadesmedicas'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{

		$primaryKey = 'CAME_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA'
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::casosmedicos()->orderBy('CASOSMEDICOS.'.$primaryKey)->select([ 'CASOSMEDICOS.'.$primaryKey , $column ])->get();
		$arrContratos = $prospecto->pluck($columnName, $primaryKey)->toArray();

		

		return view($this->route.'.create', compact('arrContratos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{

		parent::storeModel();
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $NOME_ID
	 * @return Response
	 */
	public function edit($NOME_ID)
	{
		// Se obtiene el registro
		$novedadmedica = NovedadMedica::findOrFail($NOME_ID);

		$primaryKey = 'CAME_ID';
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA'
			], 'PROS_NOMBRESAPELLIDOS');
		$columnName = 'PROS_NOMBRESAPELLIDOS';

		$prospecto = Prospecto::casosmedicos()->orderBy('CASOSMEDICOS.'.$primaryKey)->select([ 'CASOSMEDICOS.'.$primaryKey , $column ])->get();
		$arrContratos = $prospecto->pluck($columnName, $primaryKey)->toArray();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('novedadmedica','arrContratos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $NOME_ID
	 * @return Response
	 */
	public function update($NOME_ID)
	{
		parent::updateModel($NOME_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $NOME_ID
	 * @return Response
	 */
	public function destroy($NOME_ID)
	{
		parent::destroyModel($NOME_ID);
	}
	
}
