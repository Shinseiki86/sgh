<?php

namespace SGH\Http\Controllers\CnfgGeograficos;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Pais;

class PaisController extends Controller
{
	protected $route = 'cnfg-geograficos.paises';
	protected $class = Pais::class;

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
			'PAIS_CODIGO' => ['required', 'numeric', 'unique:PAISES,PAIS_CODIGO,'.$id.',PAIS_ID'],
			'PAIS_NOMBRE' => ['required', 'max:300', 'unique:PAISES,PAIS_NOMBRE,'.$id.',PAIS_ID'],
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
		//$model = Pais::with('departamentos')->get();
		$model = Pais::select(['PAIS_ID','PAIS_CODIGO','PAIS_NOMBRE','PAIS_CREADOPOR'])
						->get();

		return Datatables::collection($model)
			->addColumn('DEPARTAMENTOS_COUNT', function($model){
				return $model->departamentos->count();
			})
			->addColumn('action', function($model){
				$ruta = route($this->route.'.edit', [ 'PAIS_ID'=>$model->PAIS_ID ]);
				return parent::buttonEdit($ruta).
					parent::buttonDelete($model, 'PAIS_ID', 'PAIS_NOMBRE', 'paises');
			})->make(true);
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
	 * @param  int  $PAIS_ID
	 * @return Response
	 */
	public function edit($PAIS_ID)
	{
		// Se obtiene el registro
		$pais = Pais::findOrFail($PAIS_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('pais'));
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $PAIS_ID
	 * @return Response
	 */
	public function update($PAIS_ID)
	{
		parent::updateModel($PAIS_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $PAIS_ID
	 * @return Response
	 */
	public function destroy($PAIS_ID)
	{
		parent::destroyModel($PAIS_ID);
	}


}

