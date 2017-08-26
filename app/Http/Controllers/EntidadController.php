<?php namespace SGH\Http\Controllers;

use Validator;
use SGH\Http\Requests;
use SGH\Http\Requests\CreateEntidadRequest;
use SGH\Http\Requests\UpdateEntidadRequest;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use SGH\Models\Entidad;
use Yajra\Datatables\Facades\Datatables;

class EntidadController extends Controller
{

	private $groupUrl='';
	private $routeIndex = 'entidads.index';
	public function __construct()
	{
		$this->routeIndex=$this->groupUrl .'.entidads.index';
		$this->middleware('auth');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data)
	{
		return validator::make($data, Entidad::$rules);

	}

	
	/**
	 * Display a listing of the Entidad.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entidades = Entidad::with('tipoentidad')->get();
		return view('entidads/index2', compact('entidades'));
		//return view('entidads/index');
	}

	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		//$model = Departamento::with('pais','ciudades')->get();
		$model = Entidad::with('tipoentidad')->get();
		return Datatables::collection($model)
			->addColumn('action', function($model){
				$ruta = route('entidads.edit', [ 'ENTI_ID'=>$model->ENTI_ID ]);
				return parent::buttonEdit($ruta).
					parent::buttonDelete($model, 'ENTI_ID', 'ENTI_RAZONSOCIAL', 'entidads');
			})->make(true);
	}


	/**
	 * Show the form for creating a new Entidad.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrTipoEntidad = model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');

		return view('entidads.create', compact('arrTipoEntidad'));
	}

	/**
	 * Store a newly created Entidad in storage.
	 *
	 * @param CreateEntidadRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Entidad::class,  $this->routeIndex);
	}

	/**
	 * Display the specified Entidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(Entidad $entidads){
	}

	/**
	 * Show the form for editing the specified Entidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(Entidad $entidads)
	{		
		$arrTipoEntidad = model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');
		return view('entidads.edit',['entidad'=>$entidads,'arrTipoEntidad'=>$arrTipoEntidad]);
	}

	/**
	 * Update the specified Entidad in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEntidadRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID, Entidad::class,  $this->routeIndex);
	}

	/**
	 * Remove the specified Entidad from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($ID)
	{
		parent::destroyModel($ID, Entidad::class, $this->routeIndex);
	}
}
