<?php

namespace SGH\Http\Controllers\GestionHumana;

use Validator;
use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Prospecto;

class ProspectoController extends Controller
{
	protected $route = 'gestion-humana.prospectos';
	protected $class = Prospecto::class;

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
		return view($this->route.'.index', compact('prospectos'));
	}

	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		$model = Prospecto::select([
			'PROS_ID',
			'PROS_CEDULA',
			'PROS_FECHANACIMIENTO',
			'PROS_FECHAEXPEDICION',
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_SEXO',
			'PROS_DIRECCION',
			'PROS_TELEFONO',
			'PROS_CELULAR',
			'PROS_CORREO',
			'PROS_MARCA',
		])->get();

		return Datatables::collection($model)
			->addColumn('action', function($model){
				return parent::buttonEdit($model).
					parent::buttonDelete($model, 'PROS_CEDULA');
			})->make(true);
	}


	/**
	 * Retorna prospectos que han tenido contratos
	 *
	 * @return json
	 */
	public function getArrProspectosRetirados()
	{
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS');

		$arrProspectos = Prospecto::retirados()->select(['PROSPECTOS.PROS_ID', $column])->get();

		$arrProspectos = model_to_array($arrProspectos, 'PROS_NOMBRESAPELLIDOS');
		
		return response()->json($arrProspectos);
	}
	

	/**
	 * Retorna prospectos
	 *
	 * @return json
	 */
	public function getArrProspectos()
	{
		$column = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS');
		$arrProspectos = model_to_array(Prospecto::class, $column);
		
		return response()->json($arrProspectos);
	}


	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
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
	 * @param  int  $PROS_ID
	 * @return Response
	 */
	public function edit($PROS_ID)
	{
		// Se obtiene el registro
		$prospecto = Prospecto::findOrFail($PROS_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('prospecto'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PROS_ID
	 * @return Response
	 */
	public function update($PROS_ID)
	{
		parent::updateModel($PROS_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PROS_ID
	 * @return Response
	 */
	public function destroy($PROS_ID)
	{
		parent::destroyModel($PROS_ID);
	}

}
