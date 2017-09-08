<?php

namespace SGH\Http\Controllers\CnfgGeograficos;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Ciudad;
use SGH\Models\Departamento;

class CiudadController extends Controller
{
	protected $route = 'cnfg-geograficos.ciudades';
	protected $class = Ciudad::class;

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
		return validator::make($data, [
			'CIUD_CODIGO' => ['required', 'numeric', 'unique:CIUDADES,CIUD_CODIGO,'.$id.',CIUD_CODIGO'],
			'CIUD_NOMBRE' => ['required', 'max:300', 'unique:CIUDADES,CIUD_NOMBRE,'.$id.',CIUD_CODIGO'],
			'DEPA_ID'     => ['required', 'numeric']
		]);

	}
	

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view($this->route.'.index');
	}

	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		$model = Ciudad::join('DEPARTAMENTOS', 'DEPARTAMENTOS.DEPA_ID', '=', 'CIUDADES.DEPA_ID')
						->select([
							'CIUD_ID',
							'CIUD_CODIGO',
							'CIUD_NOMBRE',
							'DEPA_CODIGO',
							'DEPA_NOMBRE',
							'CIUD_CREADOPOR',
						])->get();

		return Datatables::collection($model)
			->addColumn('action', function($model){
				$ruta = route($this->route.'.edit', [ 'CIUD_ID'=>$model->CIUD_ID ]);
				return parent::buttonEdit($ruta).
					parent::buttonDelete($model, 'CIUD_ID', 'CIUD_NOMBRE', 'ciudades');
			})->make(true);
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los departamentos disponibles
		$arrDepartamentos = model_to_array(Departamento::class, 'DEPA_NOMBRE');

		return view($this->route.'.create', compact('arrDepartamentos'));
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
	 * @param  int  $CIUD_ID
	 * @return Response
	 */
	public function edit($CIUD_ID)
	{
		// Se obtiene el registro
		$ciudad = Ciudad::findOrFail($CIUD_ID);

		//Se crea un array con los departamentos disponibles
		$arrDepartamentos = model_to_array(Departamento::class, 'DEPA_NOMBRE');

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('ciudad', 'arrDepartamentos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $CIUD_ID
	 * @return Response
	 */
	public function update($CIUD_ID)
	{
		parent::updateModel($CIUD_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $CIUD_ID
	 * @return Response
	 */
	public function destroy($CIUD_ID)
	{
		parent::destroyModel($CIUD_ID);
	}

}

