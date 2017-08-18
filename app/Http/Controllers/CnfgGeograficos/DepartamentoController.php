<?php

namespace SGH\Http\Controllers\CnfgGeograficos;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Departamento;

class DepartamentoController extends Controller
{

	private $routeIndex = 'cnfg-geograficos.departamentos.index';

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:depart-index', ['only' => ['index']]);
		$this->middleware('permission:depart-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:depart-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:depart-delete',   ['only' => ['destroy']]);
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
			'DEPA_CODIGO' => ['required', 'numeric', 'unique:DEPARTAMENTOS,DEPA_CODIGO,'.$id.',DEPA_ID'],
			'DEPA_NOMBRE' => ['required', 'max:300', 'unique:DEPARTAMENTOS,DEPA_NOMBRE,'.$id.',DEPA_ID'],
		]);

	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('cnfg-geograficos/departamentos/index');
	}


	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		//$model = Departamento::with('pais','ciudades')->get();
		$model = Departamento::join('PAISES', 'PAISES.PAIS_ID', '=', 'DEPARTAMENTOS.PAIS_ID')
						->select(['DEPA_ID','DEPA_CODIGO','DEPA_NOMBRE','PAIS_NOMBRE','DEPA_CREADOPOR'])
						->get();

		return Datatables::collection($model)
			->addColumn('CIUDADES_COUNT', function($model){
				return $model->ciudades->count();
			})
			->addColumn('action', function($model){
				$ruta = route('cnfg-geograficos.departamentos.edit', [ 'DEPA_ID'=>$model->DEPA_ID ]);
				return parent::buttonEdit($ruta).
					parent::buttonDelete($model, 'DEPA_ID', 'DEPA_NOMBRE', 'departamentos');
			})->make(true);
	}


	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los países disponibles
		$arrPaises = model_to_array(Pais::class, 'PAIS_NOMBRE');

		return view('cnfg-geograficos/departamentos/create', compact('arrPaises'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Departamento::class, $this->routeIndex);
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function edit($DEPA_ID)
	{
		// Se obtiene el registro
		$departamento = Departamento::findOrFail($DEPA_ID);

		//Se crea un array con los países disponibles
		$arrPaises = model_to_array(Pais::class, 'PAIS_NOMBRE');

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-geograficos/departamentos/edit', compact('departamento', 'arrPaises'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function update($DEPA_ID)
	{
		parent::updateModel($DEPA_ID, Departamento::class, $this->routeIndex);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $DEPA_ID
	 * @return Response
	 */
	public function destroy($DEPA_ID, $showMsg=True)
	{
		parent::destroyModel($DEPA_ID, Departamento::class, $this->routeIndex);
	}


}

