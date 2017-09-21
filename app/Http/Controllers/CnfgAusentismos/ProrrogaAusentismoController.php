<?php 

namespace SGH\Http\Controllers\CnfgAusentismos;

use Validator;
use SGH\Http\Requests;
use Flash;
use Illuminate\Support\Facades\Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Models\ProrrogaAusentismo;
use Yajra\Datatables\Facades\Datatables;                    


class ProrrogaAusentismoController extends Controller
{

	protected $route='cnfg-ausentismos.prorrogaausentismos';
	protected $class = ProrrogaAusentismo::class;
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
		return validator::make($data, ProrrogaAusentismo::$rules);

	}

	
	/**
	 * Display a listing of the ProrrogaAusentismo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$prorrogaAusentismos = ProrrogaAusentismo::all();
		return view($this->route.'.index', compact('prorrogaAusentismos'));
	}

	


	/**
	 * Show the form for creating a new ProrrogaAusentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
	}

	/**
	 * Store a newly created ProrrogaAusentismo in storage.
	 *
	 * @param CreateProrrogaAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}

	/**
	 * Display the specified ProrrogaAusentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(ProrrogaAusentismo $prorrogaAusentismos){
	}

	/**
	 * Show the form for editing the specified ProrrogaAusentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(ProrrogaAusentismo $prorrogaAusentismos)
	{
		return view($this->route.'.edit',['prorrogaAusentismo'=>$prorrogaAusentismos]);
	}

	/**
	 * Update the specified ProrrogaAusentismo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProrrogaAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID);
	}

	/**
	 * Remove the specified ProrrogaAusentismo from storage.
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
