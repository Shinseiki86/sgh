<?php
namespace SGH\Repositories;

class ProrrogaAusentismoRepository
{
	protected $modelo;

	public function __construct()
	{
	    $this->modelo = modelo("ProrrogaAusentismo");
	}
}