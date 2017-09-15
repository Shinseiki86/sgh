<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

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
	protected $view='cnfg-ausentismos';
	protected $route='tipoausentismos';
	protected $class = TipoAusentismo::class;
	
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
		return validator::make($data, TipoAusentismo::rules($id));

	}

	
	/**
	 * Display a listing of the TipoAusentismo.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$tipoausentismos = TipoAusentismo::all();
		return view($this->view.'.'.$this->route.'.index', compact('tipoausentismos'));
	}


	/**
	 * Show the form for creating a new TipoAusentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->view.'.'.$this->route.'.create');
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
		parent::storeModel();
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
		return view($this->view.'.'.$this->route.'.edit',['tipoAusentismo'=>$tipoausentismos]);
	}

	/**
	 * Update the specified TipoAusentismo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTipoAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id);
	}

	/**
	 * Remove the specified TipoAusentismo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		parent::destroyModel($id);
	}
}
