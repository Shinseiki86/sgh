<?php 


	function modelo($modelo){ 	
		 return class_exists($modelo) ? $modelo : '\\SGH\\Models\\'.basename($modelo);
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
		return modelo($modelo)::all();
	}  

	function findId($modelo,$id,$relacion=[])
    {
    	if (count($relacion)>0 ) {
			if($modelo = modelo($modelo))
				return $modelo::with($relacion)->find($id);
		}
      	return modelo($modelo)::find($id);
    }

    
    function findBy($modelo,$column, $value)
    {
      return modelo($modelo)::where($column, $value);
    }
?>