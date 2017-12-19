<?php
namespace SGH\Http\Controllers\CnfgAusentismos;

use Illuminate\Http\Request;
use SGH\Http\Controllers\Controller;
use SGH\Models\Diagnostico;
use Yajra\Datatables\Facades\Datatables;

class DiagnosticoController extends Controller
{

	protected $route='cnfg-ausentismos.diagnosticos';
	protected $class = Diagnostico::class;
	public function __construct()
	{	
		parent::__construct();
	}

		
	/**
	 * Display a listing of the Diagnostico.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view($this->route.'.index');
	}

	public function buscaDx(Request $request)
	{
		$data=repositorio("Diagnostico")->buscaDx($request->CIE10);
		return response()->json($data);
	}

	public function autoComplete(Request $request) {
	    $term = $request->term;
	    $data=repositorio("Diagnostico")->autoComplete($term);
	    $results=array();
	    foreach ($data as $v) {
	            $results[]=['id'=>$v->DIAG_ID,'value'=>$v->DIAG_DESCRIPCION,'cod'=>$v->DIAG_CODIGO];
	    }
	    if(count($results))
	         return $results;
	    else
	        return ['value'=>'No se encontró ningun Resultado','id'=>''];
	}


	/**
	 * Retorna json para Datatable.
	 *
	 * @return json
	 */
	public function getData()
	{
		//$model = repositorio("Diagnostico")->getData();
		$model = Diagnostico::select([
							'DIAG_ID','DIAG_CODIGO','DIAG_DESCRIPCION'])->get();

		return Datatables::collection($model)
			->addColumn('action', function($model){
				return parent::buttonEdit($model).
					parent::buttonDelete($model, 'DIAG_DESCRIPCION');
			})->make(true);
	}


	/**
	 * Show the form for creating a new Diagnostico.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
	}

	/**
	 * Store a newly created Diagnostico in storage.
	 *
	 * @param CreateDiagnosticoRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		dd($request);
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
	 * Show the form for editing the specified Diagnostico.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(Diagnostico $diagnosticos)
	{
		return view($this->route.'.edit',['diagnostico'=>$diagnosticos]);
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
