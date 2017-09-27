<?php 
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\TipoEntidad;

class TipoEntidadController extends Controller
{
	protected $route = 'cnfg-organizacionales.tipoentidades';
	protected $class = TipoEntidad::class;

	public function __construct()
	{
		parent::__construct();
	}

	
	/**
	 * Display a listing of the TipoEntidad.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipoentidades = TipoEntidad::all();
		return view($this->route.'.index', compact('tipoentidades'));
	}

	
	/**
	 * Show the form for creating a new TipoEntidad.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
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
		parent::storeModel();
	}

	/**
	 * Display the specified TipoEntidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(TipoEntidad $tipoentidades){
	}

	/**
	 * Show the form for editing the specified TipoEntidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(TipoEntidad $tipoentidades)
	{
		return view($this->route.'.edit',['tipoEntidad'=>$tipoentidades]);
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
		parent::updateModel($ID);
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
		parent::destroyModel($ID);
	}
}
