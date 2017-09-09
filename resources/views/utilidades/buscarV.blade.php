@push('scripts')
	<script>
		$(document).ready(function(){
			$(document).on('blur','#CIE10',function(){
				var cat_id=$(this).val();
				$.ajax({
					type:'get',
					url:'{!!URL::to('buscaDx')!!}',		
					data:{'CIE10':cat_id},
					success:function(data){
						if (data.length==1) {
							$('#DX_DESCRIPCION').val(data[0].DIAG_DESCRIPCION);
							$('#DIAG_ID').val(data[0].DIAG_ID);
						} else {
							$('#DX_DESCRIPCION').val('');
							alert('No se encontraron datos');
						}
						
					},			
					error:function(){
						alert('ha ocurrido un error');
					}
				});	
			});	
			});
	</script>
@endpush