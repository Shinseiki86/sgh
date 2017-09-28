<?php
namespace SGH\Repositories;



class ContratoRepository
{
     protected $modelo;
     
     public function __construct()
     {
             $this->modelo =  modelo("Contrato");
     }
     
     
}
?>