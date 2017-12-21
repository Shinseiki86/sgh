<?php
namespace SGH\Repositories;



class AusentismoRepository
{
    protected $modelo;

    public function __construct()
    {
        $this->modelo =  modelo("Ausentismo");
    }


    public function prospectoConAusentismo()
    {
      //dd(repositorio("Prospecto")->cont_prospectos(['PROS_CEDULA','CONT_FECHAINGRESO']));
      $ausentismo = modelo("Ausentismo");
      return $ausentismo::join('CONTRATOS', 'CONTRATOS.CONT_ID', '=', 'AUSENTISMOS.CONT_ID')
        ->join('PROSPECTOS','PROSPECTOS.PROS_ID','=','CONTRATOS.PROS_ID')
        ->select([
          'AUSE_ID',
          repositorio("Prospecto")->cont_prospectos(['PROS_CEDULA','AUSE_FECHAINICIO'])
        ])
        ->where('AUSE_ESTADO', '=', 'Abierto')
        ->get();   

      // $dato= modelo("Ausentismo")->join('CONTRATOS', 'CONTRATOS.CONT_ID', '=', 'AUSENTISMOS.CONT_ID')
    		// 	->join('PROSPECTOS','PROSPECTOS.PROS_ID','=','CONTRATOS.PROS_ID')
    		// 	->select(['AUSENTISMOS.CONT_ID', repositorio("Prospecto")->cont_prospectos(['PROS_CEDULA','CONT_FECHAINGRESO'])])
    		// 	->get();
      // return $dato;

    }

  //   public function prospectoContratoActivo()
  // {
  //   $contrato = modelo("Contrato");
  //   return $contrato::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
  //         ->select(['CONT_ID', $this->cont_prospectos()])
  //         ->where('CONTRATOS.ESCO_ID', '=', '1')
  //         ->get();    
  // }

}