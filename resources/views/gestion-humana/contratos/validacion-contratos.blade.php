@push('head')
	{!! Html::style('assets/stylesheets/toastr.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/scripts/toastr.min.js') !!}
	<script type="text/javascript">
		
			$(document).ready(function(){

				var $clco_indefinido = 1;
				var $clco_fijo = 2;
				var $clco_obralabor = 3;
				var $clco_aprendizaje = 4;
				var $tiem_directo = 1;
				var $tiem_temporal = 2;
				var $tico_directo = 1;
				var $tico_indirecto = 2;

				//==================================================================================
				//Bloque 1
				$('#TIEM_ID').change(function() {

					var $directo = 1;
					var $temporal = 2;

					var $val = $('#TIEM_ID').val();
					if($val!=null && $val==$directo){		
						$('#TEMP_ID').attr('disabled', 'disabled');

					}else if ($val!=null && $val==$temporal){
						
						$('#TEMP_ID').removeAttr('disabled');	
						
					}

				});
				//==================================================================================
				//Fin Bloque 1

				//==================================================================================
				//Bloque 2
				$('#MORE_ID').change(function() {

					var $more_id = $('#MORE_ID').val();
					
					if($more_id != null && $more_id == 9){

						toastr.error('¿Descartar Hoja de Vida?','Recordatorio',{"hideMethod": "fadeOut","timeOut": "15000","progressBar": true,"closeButton": true,"positionClass": "toast-top-right",});

					}


				});
				//==================================================================================
				//Fin Bloque 2

				//==================================================================================
				//Bloque 3
				var $clco_id = null;

				$('#DIVFECHAFIN').hide();

				$('#CLCO_ID').change(function() {

					var $terminofijo = 2;

					var $val = $('#CLCO_ID').val();
					if($val!=null && $val==$terminofijo){		
						$('#DIVFECHAFIN').show();
					}else{
						$('#DIVFECHAFIN').hide();
						$('#CONT_FECHAINGRESO').val('');
					}


				});
				//==================================================================================
				//Fin Bloque 3

				//==================================================================================
				//Bloque 4
				$('#TICO_ID').change(function() {

					var $tico_directo = 1;
					var $tico_indirecto = 2;

					var $tico_selected = $('#TICO_ID').val();

					var $tiem_selected = $('#TIEM_ID').val();

					if($tiem_selected==$tiem_directo && $tico_selected==$tico_indirecto){

						toastr.warning('El Tipo de Contrato no es coherente con el Tipo de Empleador','Alerta',{"hideMethod": "fadeOut","timeOut": "10000","progressBar": true,"closeButton": true,"positionClass": "toast-top-right",});
						
					}

					if($tiem_selected==$tiem_temporal && $tico_selected==$tico_directo){

						toastr.warning('El Tipo de Contrato no es coherente con el Tipo de Empleador','Alerta',{"hideMethod": "fadeOut","timeOut": "10000","progressBar": true,"closeButton": true,"positionClass": "toast-top-right",});
						
					}
						
				});
				//==================================================================================
				//Fin Bloque 4

				//==================================================================================
				//Bloque 5
				$('#CLCO_ID').change(function() {

					var $tico_selected = $('#TICO_ID').val();
					var $clco_selected = $('#CLCO_ID').val();
					
					if($tico_selected==$tico_directo && $clco_selected==$clco_obralabor){

						toastr.warning('El Tipo de Contrato no es coherente con la Clase de Contrato','Alerta',{"hideMethod": "fadeOut","timeOut": "10000","progressBar": true,"closeButton": true,"positionClass": "toast-top-right",});	
					}

					if($tico_selected==$tico_indirecto && $clco_selected!=$clco_obralabor){

						toastr.warning('El Tipo de Contrato no es coherente con la Clase de Contrato','Alerta',{"hideMethod": "fadeOut","timeOut": "10000","progressBar": true,"closeButton": true,"positionClass": "toast-top-right",});	
					}

					
						
				});
				//==================================================================================
				//Fin Bloque 5
					

			});

	</script>
@endpush