@push('head')
	{!! Html::style('assets/toast/toastr.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/toast/toastr.min.js') !!}
	<script>
		var f = new Date();
		var now=f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();
		$("#{{$FechaI}}").val(now);
		$("#{{$FechaF}}").val(now);

		$(document).on('blur','#{{$FechaF}}',function(){	
			validaF("{{$FechaF}}");;
		});	

		$(document).on('blur','#{{$FechaI}}',function(){	
			validaF("{{$FechaI}}");
		});	

		function validaF(fecha){
			var fi=new Date($("#{{$FechaI}}").val());
			var ff=new Date($("#{{$FechaF}}").val());
			if (fi>ff) {
				$('#'+ fecha).val("");
				toastr.warning('La fecha inicial no puede ser mayor a la fecha final','Error en la fecha',{"hideMethod": "fadeOut","timeOut": "2000","progressBar": true,"closeButton": true,"positionClass": "toast-top-left",});					
			}
		};
	</script>
@endpush