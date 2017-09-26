<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\TipoAusentismo;

class TipoAusentismoController extends Controller
{
	protected $route='cnfg-ausentismos.tipoausentismos';
	protected $class = TipoAusentismo::class;
	public function __construct()
	{	
		parent::__construct();
	}
	
	/**
	 * Display a listing of the TipoAusentismo.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$tipoausentismos = TipoAusentismo::all();
		return view($this->route.'.index', compact('tipoausentismos'));
	}


	/**
	 * Show the form for creating a new TipoAusentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
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
		return view($this->route.'.edit',['tipoAusentismo'=>$tipoausentismos]);
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
		parent::updateModel($ID);
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
		parent::destroyModel($ID);
	}
}
