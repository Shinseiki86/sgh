<?php 
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use SGH\Models\Entidad;

class EntidadController extends Controller
{
	protected $route='cnfg-organizacionales.entidades';
	protected $class = Entidad::class;

	public function __construct()
	{	
		parent::__construct();
	}
	
	/**
	 * Display a listing of the Entidad.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entidades = Entidad::with('tipoentidad')->get();
		return view($this->route.'.index', compact('entidades'));
	}

	
	/**
	 * Show the form for creating a new Entidad.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrTipoEntidad = model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');

		return view($this->route.'.create', compact('arrTipoEntidad'));
	}

	/**
	 * Store a newly created Entidad in storage.
	 *
	 * @param CreateEntidadRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}

	/**
	 * Display the specified Entidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(Entidad $entidades){
	}

	/**
	 * Show the form for editing the specified Entidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(Entidad $entidades)
	{		
		$arrTipoEntidad = model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');
		return view($this->route.'.edit',['entidad'=>$entidades,'arrTipoEntidad'=>$arrTipoEntidad]);
	}

	/**
	 * Update the specified Entidad in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEntidadRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID);
	}

	/**
	 * Remove the specified Entidad from storage.
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
