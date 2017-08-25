<?php namespace SGH\Http\Controllers;

use Validator;
use SGH\Http\Requests;
use SGH\Http\Requests\CreateTipoEntidadRequest;
use SGH\Http\Requests\UpdateTipoEntidadRequest;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use SGH\Models\TipoEntidad;
use Yajra\Datatables\Facades\Datatables;

class TipoEntidadController extends Controller
{

	private $groupUrl='';
	private $routeIndex = 'tipoEntidads.index';
	public function __construct()
	{
		$this->routeIndex=$this->groupUrl .'.tipoEntidads.index';
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
		return validator::make($data, TipoEntidad::$rules);

	}

	
	/**
	 * Display a listing of the TipoEntidad.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$tipoEntidads = TipoEntidad::all();
		//return view('tipoEntidads/index2', compact('tipoEntidads'));
		return view('tipoEntidads/index');
	}

	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		$model = TipoEntidad::select('TIEN_ID','TIEN_CODIGO','TIEN_DESCRIPCION','TIEN_OBSERVACIONES')
						->get();
		return Datatables::collection($model)
			->addColumn('action', function($model){
				$ruta = route('tipoEntidads.edit', [ 'TIEN_ID'=>$model->TIEN_ID ]);
				return parent::buttonEdit($ruta).
					parent::buttonDelete($model, 'TIEN_ID', 'TIEN_DESCRIPCION', 'tipoEntidads');
			})->make(true);
	}


	/**
	 * Show the form for creating a new TipoEntidad.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipoEntidads.create');
	}

	/**
	 * Store a newly created TipoEntidad in storage.
	 *
	 * @param CreateTipoEntidadRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(TipoEntidad::class,  $this->routeIndex);
	}

	/**
	 * Display the specified TipoEntidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(TipoEntidad $tipoEntidads){
	}

	/**
	 * Show the form for editing the specified TipoEntidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(TipoEntidad $tipoEntidads)
	{
		return view('tipoEntidads.edit',['tipoEntidad'=>$tipoEntidads]);
	}

	/**
	 * Update the specified TipoEntidad in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTipoEntidadRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID, TipoEntidad::class,  $this->routeIndex);
	}

	/**
	 * Remove the specified TipoEntidad from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($ID)
	{
		parent::destroyModel($ID, TipoEntidad::class, $this->routeIndex);
	}
}
