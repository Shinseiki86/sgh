<?php 
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use Validator;
use SGH\Http\Requests;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use SGH\Models\TipoEntidad;
use Yajra\Datatables\Facades\Datatables;

class TipoEntidadController extends Controller
{

	private $groupUrl='cnfg-organizacionales.';
	private $routeIndex = 'cnfg-organizacionales.tipoentidades.index';
	public function __construct()
	{
		$this->routeIndex=$this->groupUrl .'tipoentidades.index';
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
		$tipoentidades = TipoEntidad::all();
		return view($this->routeIndex, compact('tipoentidades'));
	}

	
	/**
	 * Show the form for creating a new TipoEntidad.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-organizacionales.tipoentidades.create');
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
		return view('cnfg-organizacionales.tipoentidades.edit',['tipoEntidad'=>$tipoentidades]);
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
