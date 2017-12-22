<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

use Illuminate\Http\Request;
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

	public function buscaAuse($id){
		$ausentismo=findId("Ausentismo",$id,['entidad','contrato','conceptoausencia','diagnostico','prorrogaausentismos']);	
		$prorroga=findBy("ProrrogaAusentismo",'AUSE_ID',$id,['diagnostico']);	
		return compact('ausentismo','prorroga');	
	}
		
	/**
	 * Display a listing of the ProrrogaAusentismo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$prorrogaAusentismos = findAll("ProrrogaAusentismo");
		return view($this->route.'.index', compact('prorrogaAusentismos'));
	}

	


	/**
	 * Show the form for creating a new ProrrogaAusentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		$prospectosActivos = repositorio("Ausentismo")->prospectoConAusentismo();
	//dd($prospectosActivos);
		//Se crea un array con los prospectos disponibles
		$arrContratos = model_to_array($prospectosActivos, 'CONT_PROSPECTOS');
		//dd($arrContratos);
		//Se crea un array con los conceptos de Ausentismos
		$arrConceptoAusentismo= model_to_array(ConceptoAusencia::class, 'COAU_DESCRIPCION');
		
		//Se crea un array con las Entidades Responsables
		//$arrEntidad= model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL');


		return view($this->route.'.create',compact('arrContratos','arrConceptoAusentismo'));

		
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
	public function edit(ProrrogaAusentismo $prorrogaausentismos)
	{
		//Se crea un array con los conceptos de Ausentismos
		$arrConceptoAusentismo= model_to_array(ConceptoAusencia::class, 'COAU_DESCRIPCION');
		$diagnostico= findBy('Diagnostico','DIAG_ID',$prorrogaausentismos->DIAG_ID);
		$diagnostico=null;
		if ($prorrogaausentismos->DIAG_ID!=0) {
			$diagnostico= findBy('Diagnostico','DIAG_ID',$prorrogaausentismos->DIAG_ID);
			//dd($diagnostico);
		}	
		return view($this->route.'.edit',['prorrogaausentismos'=>$prorrogaausentismos,'diagnostico'=>$diagnostico],compact('arrConceptoAusentismo'));
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
