<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

use Validator;
use SGH\Http\Requests;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Response;
use SGH\Models\ConceptoAusencia;
use Yajra\Datatables\Facades\Datatables;

class ConceptoAusenciaController extends Controller
{

	protected $view='cnfg-ausentismos';
	protected $route='conceptoausencias';
	protected $class = ConceptoAusencia::class;
	
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
		return validator::make($data, ConceptoAusencia::$rules);

	}

	
	/**
	 * Display a listing of the conceptoausencia.
	 *
	 * @return Response
	 */
	public function index()
	{
		$conceptoausencias = ConceptoAusencia::join('TIPOAUSENTISMOS', 'TIPOAUSENTISMOS.TIAU_ID', '=', 'CONCEPTOAUSENCIAS.TIAU_ID')
						->join('TIPOENTIDADES', 'TIPOENTIDADES.TIEN_ID', '=', 'CONCEPTOAUSENCIAS.TIEN_ID')
						->select(['COAU_ID',
							'COAU_CODIGO',
							'COAU_DESCRIPCION',
							'COAU_OBSERVACIONES',
							'TIPOAUSENTISMOS.TIAU_DESCRIPCION',
							'TIPOENTIDADES.TIEN_DESCRIPCION',
						])->get();
		//$conceptoausencias = ConceptoAusencia::all();
		return view($this->view.'.'.$this->route.'.index', compact('conceptoausencias'));
	}

	
	/**
	 * Show the form for creating a new conceptoausencia.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los tipos de Ausentismos
		$arrTipoAusentismo= model_to_array(TipoAusentismo::class, 'TIAU_DESCRIPCION');

		//Se crea un array con los tipos de Entidades
		$arrTipoEntidad= model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');

		return view($this->view.'.'.$this->route.'.create', compact('arrTipoAusentismo','arrTipoEntidad'));
	}

	/**
	 * Store a newly created conceptoausencia in storage.
	 *
	 * @param CreateconceptoausenciaRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}

	/**
	 * Display the specified conceptoausencia.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(ConceptoAusencia $conceptoausencias){
	}

	/**
	 * Show the form for editing the specified conceptoausencia.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(ConceptoAusencia $conceptoausencias)
	{
		//Se crea un array con los tipos de Ausentismos
		$arrTipoAusentismo= model_to_array(TipoAusentismo::class, 'TIAU_DESCRIPCION');

		//Se crea un array con los tipos de Entidades
		$arrTipoEntidad= model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');
		return view($this->view.'.'.$this->route.'.edit',['conceptoausencia'=>$conceptoausencias],compact('arrTipoAusentismo','arrTipoEntidad'));
	}

	/**
	 * Update the specified conceptoausencia in storage.
	 *
	 * @param  int              $id
	 * @param UpdateconceptoausenciaRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID);
	}

	/**
	 * Remove the specified conceptoausencia from storage.
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
