@push('head')
	{!! Html::style('assets/toast/toastr.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/toast/toastr.min.js') !!}
	<script type="text/javascript">
		
			$(document).ready(function(){

				$('#TIEM_ID').change(function() {

					var $directo = 1;
					var $temporal = 2;

					var $val = $('#TIEM_ID').val();
					if($val!=null && $val==$directo){		
						$('#TEMP_ID').attr('disabled', 'disabled');
					}else{
						$('#TEMP_ID').removeAttr('disabled');
					}


				});

				$('#MORE_ID').change(function() {

					var $more_id = $('#MORE_ID').val();
					
					if($more_id != null && $more_id == 9){

						toastr.error('¿Descartar Hoja de Vida?','Recordatorio',{"hideMethod": "fadeOut","timeOut": "15000","progressBar": true,"closeButton": true,"positionClass": "toast-top-right",});

					}


				});
					

			});

	</script>
@endpush