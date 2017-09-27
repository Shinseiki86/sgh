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

	function findAll($modelo){
		return modelo($modelo)->all();
	}  

	function findId($modelo,$id)
    {
      return modelo($modelo)->find($id);
    }

    
    function findBy($modelo,$column, $value)
    {
      return modelo($modelo)->where($column, $value);
    }
?>