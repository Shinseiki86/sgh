@extends('layouts.menu')
@section('title', '/ Tipos de Incidentes')
@include('datepicker')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Reportes
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
		</div>
	</div>
@endsection

@section('section')

	@include('widgets.forms.input', ['type'=>'select', 'column'=>4, 'name'=>'REPO_ID', 'label'=>'Seleccionar reporte', 'data'=>$arrReportes])
	
	<div class="row">
		<div class="col-sm-12">
			@rinclude('formRepContratosActivosPorFecha')
			@rinclude('formRepTicketsPorFecha')
		</div>
	</div>

	<code id="query">
	</code>



@endsection


@push('scripts')
<script type="text/javascript">

	$(function () {
		var forms = $('form');

		//¿Utilizar plantilla?
		$('#REPO_ID').change(function() {
			var id = $(this).val();
			forms.addClass('hide');
			$('#form_'+id).removeClass('hide');
		});

		$("form").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.
			var thisForm = $(this);
		    var url = thisForm.attr('action');

		    $.ajax({
				type: "POST",
				url: url,
				data: thisForm.serialize() // serializes the form's elements.
		    }).done(function( data, textStatus, jqXHR ) {
				//console.log('Response: '+JSON.stringify(textStatus));
				//$('#response').html(JSON.stringify(response));
				$('#query').html(data);
			})
			.fail(function( jqXHR, textStatus, errorThrown ) {
				//console.log('Err: '+JSON.stringify(jqXHR));
				$('#query').html(event.responseText);
			})
			.always(function( data, textStatus, jqXHR ) {
				//console.log('proc: '+i+' de '+cantRows+'('+porcent+'%)');
				if (jqXHR === 'Forbidden') {
					console.log('Error en la conexión con el servidor. Presione F5.');
				}
				if (typeof jqXHR.responseJSON === 'undefined')
					console.log('NetworkError: 500 Internal Server Error.');
				else
					console.log(jqXHR.responseJSON);

				thisForm.find("button[type=submit]").attr('disabled', false);
				$('body').css('cursor', 'auto');
				$('#msgModalLoading').modal('hide');

			});

		});


	});
</script>
@endpush
