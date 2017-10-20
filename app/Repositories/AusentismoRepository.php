<?php
namespace SGH\Repositories;



class AusentismoRepository
{
     protected $modelo;
     
     public function __construct()
     {
             $this->modelo =  modelo("Ausentismo");
     }

}
?>