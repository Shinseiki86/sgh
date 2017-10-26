<?php 


	function modelo($modelo){ 	
		switch ($modelo) {
		    case "Ausentismo":
		        return new SGH\Models\Ausentismo;
		        break;
		    case "Diagnostico":
		        return new SGH\Models\Diagnostico;
		        break;
		    case "Prospecto":
		        return new SGH\Models\Prospecto;
		        break;
		   	case "Contrato":
		        return new SGH\Models\Contrato;
		        break;
		    case "ConceptoAusencia":
		        return new SGH\Models\ConceptoAusencia;
		        break;
		    case "Entidad":
		        return new SGH\Models\Entidad;
		        break;
		    case "TipoAusentismo":
		        return new SGH\Models\TipoAusentismo;
		        break;
		    case "ProrrogaAusentismo":
		        return new SGH\Models\ProrrogaAusentismo;
		        break;
		    default:
		    	return false;
		} 		 
	}

	function modeloClass($modelo){ 	
		switch ($modelo) {
		    case "Ausentismo":
		        return SGH\Models\Ausentismo::class;
		        break;
		    case "Diagnostico":
		        return SGH\Models\Diagnostico::class;
		        break;
		    case "Prospecto":
		        return SGH\Models\Prospecto::class;
		        break;
		   	case "Contrato":
		        return SGH\Models\Contrato::class;
		        break;
		    case "ConceptoAusencia":
		        return SGH\Models\ConceptoAusencia::class;
		        break;
		    case "Entidad":
		        return SGH\Models\Entidad::class;
		        break;
		} 		 
	}

	function repositorio($modelo){ 
		$repositori=$modelo."Repository"	;
		switch ($repositori) {
		    case "AusentismoRepository":
		        return new SGH\Repositories\AusentismoRepository;
		        break;
		    case "DiagnosticoRepository":
		        return new SGH\Repositories\DiagnosticoRepository;
		        break;
		    case "ProspectoRepository":
		        return new SGH\Repositories\ProspectoRepository;
		        break;
		   	case "ContratoRepository":
		        return new SGH\Repositories\ContratoRepository;
		        break;
		    case "ConceptoAusenciaRepository":
		        return new SGH\Repositories\ConceptoAusenciaRepository;
		        break;
		    case "EntidadRepository":
		        return new SGH\Repositories\EntidadRepository;
		        break;
		} 		 
	}

	function findAll($modelo,$relacion=[]){
		if (count($relacion)>0 ) {
			if($modelo = modelo($modelo))
				return $modelo::with($relacion)->get();
		}
		return modelo($modelo)->all();
	}  

	function findId($modelo,$id)
    {
      return modelo($modelo)->find($id)->get();
    }

    
    function findBy($modelo,$column, $value)
    {
      return modelo($modelo)->where($column, $value)->get();
    }
?>