<?php
namespace SGH\Http\Controllers\CnfgAusentismos;

use Validator;
use SGH\Http\Requests;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Response;
use SGH\Models\Diagnostico;
use Yajra\Datatables\Facades\Datatables;

class DiagnosticoController extends Controller
{

	protected $view='cnfg-ausentismos';
	protected $route='diagnosticos';
	protected $class = Diagnostico::class;
	
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
	protected function validator($data)
	{
		return validator::make($data, Diagnostico::$rules);

	}

	
	/**
	 * Display a listing of the Diagnostico.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view($this->view.'.'.$this->route.'.index');
	}

	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		$model = Diagnostico::select(['DIAG_ID','DIAG_CODIGO','DIAG_DESCRIPCION'])
						->get();
		return Datatables::collection($model)
			->addColumn('action', function($model){
				$ruta = route('diagnosticos.edit', [ 'DIAG_ID'=>$model->DIAG_ID ]);
				return parent::buttonEdit($ruta).
					parent::buttonDelete($model, 'DIAG_ID', 'DIAG_DESCRIPCION', 'diagnosticos');
			})->make(true);
	}


	/**
	 * Show the form for creating a new Diagnostico.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->view.'.'.$this->route.'.create');
	}

	/**
	 * Store a newly created Diagnostico in storage.
	 *
	 * @param CreateDiagnosticoRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}

	/**
	 * Display the specified Diagnostico.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(Diagnostico $diagnosticos){
	}

	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $ID
	 * @return Response
	 */
	public function edit($ID)
	{
		$diagnostico = Diagnostico::findOrFail($ID);
		return view($this->view.'.'.$this->route.'.edit',compact('diagnostico'));
	}

	/**
	 * Update the specified Diagnostico in storage.
	 *
	 * @param  int              $id
	 * @param UpdateDiagnosticoRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID);
	}

	/**
	 * Remove the specified Diagnostico from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($ID)
	{
		parent::destroyModel($ID);
	}
}
