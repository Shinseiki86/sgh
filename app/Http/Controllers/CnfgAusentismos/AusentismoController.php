<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

use Illuminate\Http\Request;
use SGH\Http\Controllers\Controller;
use SGH\Models\Ausentismo;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;

class AusentismoController extends Controller
{


	protected $route='cnfg-ausentismos.ausentismos';
	protected $class = Ausentismo::class;
	public function __construct()
	{
		parent::__construct();
	}

	
	/**
	 * Display a listing of the Ausentismo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ausentismos = findAll("Ausentismo", ['contrato.prospecto']);
		return view($this->route.'.index', compact('ausentismos'));
		
	}

	public function buscaEntRes(Request $request){
		$concepto = findId("ConceptoAusencia",$request->COAU_ID);
		 $data=modelo("Entidad")->select('ENTI_RAZONSOCIAL','ENTI_ID')->where('TIEN_ID',$concepto->TIEN_ID)->take(100)->get();
	    return response()->json($data);
	}

	   
	/**
	 * Show the form for creating a new Ausentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$repProspecto = repositorio("Prospecto");
		$prospectosActivos = (new $repProspecto)->prospectoContratoActivo();

		//Se crea un array con los prospectos disponibles
		$arrContratos = model_to_array($prospectosActivos, 'CONT_PROSPECTOS');
		//dd($arrContratos);
		
		//Se crea un array con los conceptos de Ausentismos
		$arrConceptoAusentismo= model_to_array(ConceptoAusencia::class, 'COAU_DESCRIPCION');
		
		//Se crea un array con las Entidades Responsables
		$arrEntidad= model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL');
		

		return view($this->route.'.create',compact('arrContratos','arrConceptoAusentismo','arrEntidad'));
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
		parent::storeModel();
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
		$prospectosActivos = repositorio("Prospecto")->prospectoContratoActivo();

		//Se crea un array con los prospectos disponibles
		$arrContratos = model_to_array($prospectosActivos, 'CONT_PROSPECTOS');

		//Se crea un array con los conceptos de Ausentismos
		$arrConceptoAusentismo= model_to_array(ConceptoAusencia::class, 'COAU_DESCRIPCION');
		
		//Se crea un array con las Entidades Responsables
		$arrEntidad= model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL');
		$diagnostico=null;
		if ($ausentismos->DIAG_ID!=0) {
			$diagnostico= findBy('Diagnostico','DIAG_ID',$ausentismos->DIAG_ID);
		}	
		

		return view($this->route.'.edit',['ausentismo'=>$ausentismos,'diagnostico'=>$diagnostico],compact('arrContratos','arrConceptoAusentismo','arrEntidad'));
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
		parent::updateModel($ID);
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
		parent::destroyModel($ID);
	}
}
