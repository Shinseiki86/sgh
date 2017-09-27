<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\ProrrogaAusentismo;                  

class ProrrogaAusentismoController extends Controller
{
	protected $route='cnfg-ausentismos.prorrogaausentismos';
	protected $class = ProrrogaAusentismo::class;

	public function __construct()
	{
		parent::__construct();
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
