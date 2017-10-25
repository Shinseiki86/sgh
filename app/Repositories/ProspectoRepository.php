<?php
namespace SGH\Repositories;

class ProspectoRepository
{
	protected $modelo;

	public function __construct()
	{
	    $this->modelo =  modelo("Prospecto");
	}

	public function cont_prospectos(){
		return expression_concat([
				'PROS_PRIMERNOMBRE',
				'PROS_SEGUNDONOMBRE',
				'PROS_PRIMERAPELLIDO',
				'PROS_SEGUNDOAPELLIDO',
				'PROS_CEDULA',
				'CONT_FECHAINGRESO',
			], 'CONT_PROSPECTOS');
	}

	public function prospectoContratoActivo()
	{
		return modelo("Contrato")->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
					->select(['CONT_ID', $this->cont_prospectos()])
					->where([['CONTRATOS.ESCO_ID', '=', '1'],
					])->get();		
	}

}