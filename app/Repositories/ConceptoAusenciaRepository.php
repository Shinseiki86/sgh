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
		$conceptoausencias = $this->modelo::join('TIPOAUSENTISMOS', 'TIPOAUSENTISMOS.TIAU_ID', '=', 'CONCEPTOAUSENCIAS.TIAU_ID')
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


	public function conceptoAusenciaTipoEnt($concepto){
		$dato =array('INCAPACIDAD POR ENFERMEDAD GENERAL (EMPLEADOR)'=>'EMP',
					'INCAPACIDAD POR ENFERMEDAD GENERAL (EMPRESA)'=>'EPS',
					'LICENCIA DE MATERNIDAD'=>'EPS',
					'LICENCIA DE PATERNIDAD'=>'EPS',
					'INCAPACIDAD POR ACCIDENTE DE TRABAJO'=>'ARL',
					'DILIGENCIA PERSONAL REMUNERADA'=>'EMP',
					'PERMISO LABORAL'=>'EMP',
					'PERMISO MÉDICO'=>'EMP',
					'PERMISO POR CALAMIDAD'=>'EMP',
					'PERMISO REMUNERADO'=>'EMP',
					'LICENCIA DE LUTO'=>'EMP',
					'LICENCIA REMUNERADA'=>'EMP',
					'COMPENSATORIO'=>'EMP',
					'DILIGENCIA PERSONAL NO REMUNERADA'=>'EMP',
					'PERMISO NO REMUNERADO'=>'EMP',
					'LICENCIA NO REMUNERADA'=>'EMP',
					'INCAPACIDAD POR ACCIDENTE DE TRABAJO (EMPLEADOR)'=>'EMP',
					'INCAPACIDAD POR ENFERMEDAD GENERAL (EMPLEADOR)'=>'EMP',
					'AUSENCIA SIN JUSTIFICACIÓN'=>'EMP',
					'SANCIONADO'=>'EMP',
					'VACACIONES'=>'EMP',
					'NO PRESTA SERVICIO POR DOCUMENTOS'=>'EMP',
					'NO PRESTA SERVICIO POR DOTACIÓN'=>'EMP',
					'NO DEBÍA LABORAR'=>'EMP');
		return $dato[$concepto];
	}
}