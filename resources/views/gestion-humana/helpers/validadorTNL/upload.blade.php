@extends('layouts.menu')
@section('page_heading', 'Validador de TNL Vs. INCAPACIDADES')

@section('section')
	{{ Form::open(['route' => 'tnl.store', 'id'=>'frmTnl', 'class' => 'form-vertical', 'files'=>true]) }}

		<div class="text-right">
			<a class='btn btn-info' role='button' href="{{ asset('templates/TemplateCargaTNL_INCAP.xlsx') }}" download>
				<i class="fa fa-download" aria-hidden="true"></i> Descargar plantilla
			</a>
		</div>

		<div class="form-group">
		<div class="col-md-7">
			{{ Form::label('archivo', 'Archivo TNL') }}
			{{ Form::file('archivotnl', [ 'class' => 'form-control', 'required' ]) }}
			</div>
		</div>

		<div class="form-group">
		<div class="col-md-7">
			{{ Form::label('archivo', 'Archivo Incapacidades') }}
			{{ Form::file('archivoincap', [ 'class' => 'form-control', 'required' ]) }}
			</div>
		</div>

		<br>	
		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ route('tnl.index') }}" data-tooltip="tooltip" title="Regresar">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
				</a>
				{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', [
					'class'=>'btn btn-primary',
					'type'=>'submit',
					'data-tooltip'=>'tooltip',
					'title'=>'Procesar',
				]) }}
			</div>
		</div>

	{{ Form::close() }}
@endsection

{{--@push('scripts')
	<script type="text/javascript">
		//Carga de datos a mensajes modales para eliminar y clonar registros
		$(document).ready(function () {

			$('#frmTnl').on('submit', function (e) {
				e.preventDefault();
				var form = this;
				var data = new FormData(form);
				var modal = $('#msgModalLoading');
				var button = $(':submit');

			$.ajax({
				url: '{{route('tnl.store')}}',
				type: "POST",
        		enctype: 'multipart/form-data',
				data: data,
				processData: false,  // Important!,  it prevent jQuery form transforming the data into a query string
	            contentType: false,
	            cache: false,
				dataType: 'binary',
				success: function(result) {
					var url = URL.createObjectURL(result);
					var $a = $('<a />', {
						'href': url,
						'download': 'Depuracion_IncapVsTNL.xlsx',
						'text': "click"
					}).hide().appendTo("body")[0].click();
					setTimeout(function() {
						URL.revokeObjectURL(url);
					}, 10000);
					modal.modal('hide');
					button.prop('disabled', false);
					console.log('Fin: '+new Date());
				},
				error: function(event){
					modal.modal('hide');
					button.prop('disabled', false);
					if(event.status == 404)
						msgErr = 'No hay datos para generar el reporte.';
					else
						msgErr = 'No fue posible generar el reporte. Contacte con el administrador. Error '+event.status+'.';
					alert('Error: '+msgErr);
				}
			});




			});





		});



	</script>
@endpush
--}}