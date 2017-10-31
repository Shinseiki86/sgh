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
      $dato= modelo("Ausentismo")->join('CONTRATOS', 'CONTRATOS.CONT_ID', '=', 'AUSENTISMOS.CONT_ID')
    			->join('PROSPECTOS','PROSPECTOS.PROS_ID','=','CONTRATOS.PROS_ID')
    			->select(['AUSENTISMOS.CONT_ID', repositorio("Prospecto")->cont_prospectos(['PROS_CEDULA',
               'CONT_FECHAINGRESO'])])
    			->get();
      dd($dato);
      return $dato;

    }

}