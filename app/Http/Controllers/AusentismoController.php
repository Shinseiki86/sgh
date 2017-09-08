<?php namespace SGH\Http\Controllers;

use Validator;
use SGH\Http\Requests;
use Illuminate\Http\Request;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Response;
use SGH\Models\Ausentismo;
use SGH\Models\Diagnostico;
use Yajra\Datatables\Facades\Datatables;

class AusentismoController extends Controller
{

	private $groupUrl='';
	private $routeIndex = 'ausentismos.index';
	public function __construct()
	{
		$this->routeIndex=$this->groupUrl .'ausentismos.index';
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
		return validator::make($data, Ausentismo::$rules);

	}

	
	/**
	 * Display a listing of the Ausentismo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ausentismos = Ausentismo::all();
		return view('ausentismos/index', compact('ausentismos'));
		
	}

	public function buscaDx(Request $request)
	{
		$data=Diagnostico::select('DIAG_ID','DIAG_DESCRIPCION')->where('DIAG_CODIGO',$request->CIE10)->get();
		return response()->json($data);
	}

	public function autocomplete(Request $request)
	{
		$term=$request->term;
		$data=Diagnostico::where('DIAG_DESCRIPCION','LIKE','%'.$term.'%')
		->take(10)
		->get();
		$results=array();
		foreach ($data as $key => $v) {
			$results[]=['id'=>$v->DIAG_ID,'value'=>$v->DIAG_DESCRIPCION,'cod'=>$v->DIAG_CODIGO];
		}
		return response()->json($results);
	}

	

	/**
	 * Show the form for creating a new Ausentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ausentismos.create');
	}

	/**
	 * Store a newly created Ausentismo in storage.
	 *
	 * @param CreateAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Ausentismo::class,  $this->routeIndex);
	}

	/**
	 * Display the specified Ausentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(Ausentismo $ausentismos){
	}

	/**
	 * Show the form for editing the specified Ausentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(Ausentismo $ausentismos)
	{
		return view('ausentismos.edit',['ausentismo'=>$ausentismos]);
	}

	/**
	 * Update the specified Ausentismo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID, Ausentismo::class,  $this->routeIndex);
	}

	/**
	 * Remove the specified Ausentismo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($ID)
	{
		parent::destroyModel($ID, Ausentismo::class, $this->routeIndex);
	}
}
