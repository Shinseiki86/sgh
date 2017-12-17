@push('head')
	{!! Html::style('assets/toast/toastr.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/toast/toastr.min.js') !!}
	{!! Html::script('assets/scripts/metodosVarios.js') !!}
	<script>		
		var fecha = new Fecha();
		fecha.elementoFechaActual('{{$fecha1}}');
		fecha.elementoFechaActual('{{$fecha2}}');
		var adicionoal="{{isset($fecha3) ? $fechaAdicional=$fecha3 : $fechaAdicional='NO_APLICA'}}";
		var fechaIniAuse="{{isset($fechaIn) ? $fechaIniAuse=$fechaIn : $fechaIniAuse='NO_APLICA'}}";

		$(document).on('blur','#{{$fecha1}}',function(){			
			if (fecha.validaFecha("{{$fecha1}}","{{$fecha2}}")) {
				fecha.mensaje("La fecha inicial no puede ser mayor a la fecha final");
				fecha.limpiaElemento('{{$fecha1}}');
			}
			if (fechaIniAuse!='NO_APLICA') {				
				if (fecha.validaFecha("{{$fecha1}}","<?php echo $fechaIniAuse; ?>")) {			
				}else{
					fecha.mensaje("La fecha inicial no puede ser menor a la fecha final del ausentismo");
					fecha.limpiaElemento('{{$fecha1}}');
				}
				
			};
		});	

		$(document).on('blur','#{{$fecha2}}',function(){
			if (fecha.validaFecha("{{$fecha1}}","{{$fecha2}}")) {
				fecha.mensaje("La fecha inicial no puede ser mayor a la fecha final");
				fecha.limpiaElemento('{{$fecha2}}');
			} 
		});	

		$(document).on('blur',"#<?php echo $fechaAdicional; ?>",function(){	
			if (fecha.validaFecha('<?php echo $fechaAdicional; ?>',"{{$fecha1}}")) {
				fecha.mensaje("La fecha del Accidente no puede ser mayor a la fecha final");
				fecha.limpiaElemento('<?php echo $fechaAdicional; ?>');
			} 
		});	
		
		
	</script>
@endpush