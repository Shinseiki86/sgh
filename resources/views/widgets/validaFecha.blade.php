@push('head')
	{!! Html::style('assets/toast/toastr.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/toast/toastr.min.js') !!}
	<script>
		var f = new Date();
		var now=f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();
		$("#{{$fecha1}}").val(now);
		$("#{{$fecha2}}").val(now);

		$(document).on('blur','#{{$fecha1}}',function(){	
			validaF("{{$fecha1}}");
		});	

		$(document).on('blur','#{{$fecha2}}',function(){	
			validaF("{{$fecha2}}");;
		});	
		
		function validaF(fecha){
			var fi=new Date($("#{{$fecha1}}").val());
			var ff=new Date($("#{{$fecha2}}").val());
			if (fi>ff) {
				$('#'+ fecha).val("");
				toastr.error('{{ $mensaje }}','Error en la fecha',{"hideMethod": "fadeOut","timeOut": "2000","progressBar": true,"closeButton": true,"positionClass": "toast-top-left",});					
			}
		};
	</script>
@endpush