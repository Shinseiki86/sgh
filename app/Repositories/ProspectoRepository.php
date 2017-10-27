<?php
namespace SGH\Repositories;

class ProspectoRepository
{
	protected $modelo;

	public function __construct()
	{
	    $this->modelo =  modelo("Prospecto");
	}

	public function cont_prospectos($complementos=null){
		$datos=array('PROS_PRIMERNOMBRE',
					'PROS_SEGUNDONOMBRE',
					'PROS_PRIMERAPELLIDO',
					'PROS_SEGUNDOAPELLIDO');
		if (isset($complementos))
		{
			for ($i=0; $i < count($complementos); $i++) { 
				$datos[$i+4]=$complementos[$i];
			}
		}
		return expression_concat($datos, 'CONT_PROSPECTOS');
	}

	public function prospectoContratoActivo()
	{
		$contrato = modelo("Contrato");
		return $contrato::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
					->select(['CONT_ID', $this->cont_prospectos()])
					->where('CONTRATOS.ESCO_ID', '=', '1')
					->get();		
	}

}