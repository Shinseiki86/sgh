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
    return modelo("Contrato")::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
    			->join('AUSENTISMOS','AUSENTISMOS.CONT_ID','=','CONTRATOS.CONT_ID')
    			->select(['CONTRATOS.CONT_ID', repositorio("Prospecto")->cont_prospectos()])
    			->get();
    }

}