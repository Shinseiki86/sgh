<?php
namespace SGH\Repositories;



class ProspectoRepository
{
     protected $modelo;
     
     public function __construct()
     {
             $this->modelo =  modelo("Prospecto");
     }
     
     public function prospectoContratoActivo()
     {
         $CONT_PROSPECTOS = expression_concat([
							'PROS_PRIMERNOMBRE',
							'PROS_SEGUNDONOMBRE',
							'PROS_PRIMERAPELLIDO',
							'PROS_SEGUNDOAPELLIDO',
							'PROS_CEDULA',
							'CONT_FECHAINGRESO',
							], 'CONT_PROSPECTOS');

							$prospecto = modelo("Contrato")->join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
										->select(['CONT_ID', $CONT_PROSPECTOS])
										->where('CONTRATOS.ESCO_ID', '=', '1')
										->get();
		return $prospecto;
     }
}
?>