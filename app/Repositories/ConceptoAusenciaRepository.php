<?php
namespace SGH\Repositories;

class ConceptoAusenciaRepository
{
	protected $modelo;

	public function __construct()
	{
	    $this->modelo =  modelo("ConceptoAusencia");
	}

	public function conceptosAusencias()
	{
		$conceptoausencias = $this->modelo->join('TIPOAUSENTISMOS', 'TIPOAUSENTISMOS.TIAU_ID', '=', 'CONCEPTOAUSENCIAS.TIAU_ID')
					->join('TIPOENTIDADES', 'TIPOENTIDADES.TIEN_ID', '=', 'CONCEPTOAUSENCIAS.TIEN_ID')
					->select(['COAU_ID',
						'COAU_CODIGO',
						'COAU_DESCRIPCION',
						'COAU_OBSERVACIONES',
						'TIPOAUSENTISMOS.TIAU_DESCRIPCION',
						'TIPOENTIDADES.TIEN_DESCRIPCION',
					])->get();
		return $conceptoausencias;
	}
}