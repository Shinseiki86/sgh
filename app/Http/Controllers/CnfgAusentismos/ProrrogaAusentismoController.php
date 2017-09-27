<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

use SGH\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;     

use SGH\Models\Ausentismo;
use SGH\Models\Diagnostico;
use SGH\Models\Contrato;
use SGH\Models\ConceptoAusencia;
use SGH\Models\Entidad;               
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
		$CONT_PROSPECTOS = expression_concat([
		'PROS_PRIMERNOMBRE',
		'PROS_SEGUNDONOMBRE',
		'PROS_PRIMERAPELLIDO',
		'PROS_SEGUNDOAPELLIDO',
		'PROS_CEDULA',
		'CONT_FECHAINGRESO',
		], 'CONT_PROSPECTOS');

		$contratos = Contrato::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
					->join('AUSENTISMOS', 'AUSENTISMOS.CONT_ID', '=', 'CONTRATOS.PROS_ID')
					->select(['AUSENTISMOS.CONT_ID', $CONT_PROSPECTOS])
					->where('CONTRATOS.ESCO_ID', '=', '1')
					->get();

		//Se crea un array con los prospectos disponibles
		$arrContratos = model_to_array($contratos, 'CONT_PROSPECTOS');
				$contratos = Contrato::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')->get();
		//Se crea un array con los conceptos de Ausentismos
		$arrConceptoAusentismo= model_to_array(ConceptoAusencia::class, 'COAU_DESCRIPCION');
		
		//Se crea un array con las Entidades Responsables
		$arrEntidad= model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL');


		return view($this->route.'.create',compact('arrContratos','arrConceptoAusentismo','arrEntidad'));

		
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
