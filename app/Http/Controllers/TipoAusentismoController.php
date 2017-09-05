<?php namespace SGH\Http\Controllers;

use Validator;
use SGH\Http\Requests;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Response;
use SGH\Models\TipoAusentismo;
use Yajra\Datatables\Facades\Datatables;

class TipoAusentismoController extends Controller
{

	private $groupUrl='';
	private $routeIndex = 'tipoausentismos.index';
	public function __construct()
	{
		$this->routeIndex=$this->groupUrl .'tipoausentismos.index';
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
		return validator::make($data, TipoAusentismo::$rules);

	}

	
	/**
	 * Display a listing of the TipoAusentismo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipoausentismos = TipoAusentismo::all();
		return view('tipoausentismos/index', compact('tipoausentismos'));
	}


	/**
	 * Show the form for creating a new TipoAusentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipoausentismos.create');
	}

	/**
	 * Store a newly created TipoAusentismo in storage.
	 *
	 * @param CreateTipoAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(TipoAusentismo::class,  $this->routeIndex);
	}

	/**
	 * Display the specified TipoAusentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(TipoAusentismo $tipoausentismos){
	}

	/**
	 * Show the form for editing the specified TipoAusentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(TipoAusentismo $tipoausentismos)
	{
		return view('tipoausentismos.edit',['tipoAusentismo'=>$tipoausentismos]);
	}

	/**
	 * Update the specified TipoAusentismo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTipoAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID, TipoAusentismo::class,  $this->routeIndex);
	}

	/**
	 * Remove the specified TipoAusentismo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($ID)
	{
		parent::destroyModel($ID, TipoAusentismo::class, $this->routeIndex);
	}
}
