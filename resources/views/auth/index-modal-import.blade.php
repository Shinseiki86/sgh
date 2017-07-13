{{ Form::button('<i class="fa fa-file-excel-o" aria-hidden="true"></i>',[
		'class'=>'btn btn-primary',
		'data-toggle'=>'modal',
		'data-target'=>'#pregModalImport',
		'data-tooltip'=>'tooltip',
		'title'=>'Importar desde Excel',
]) }}

	<!-- Mensaje Modal. -->
	<div class="modal fade" id="pregModalImport" role="dialog" tabindex="-1" >
		<div class="modal-dialog">

			{{ Form::open( [ 'url'=>'usuarios/importXLS', 'class'=>'form-vertical', 'files'=>true ]) }}

			<!-- Modal content-->
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Importar XLS con usuarios</h4>
				</div>

				<div class="modal-body">

				{{-- Inicialmente se iba a generar la plantilla con los datos del modelo, pero por facilidad y poca disponibilidad de tiempo, se optó por un archivo ya creado y guardado en public.
					<a class='btn btn-primary' role='button' href="{{ URL::to('usuarios/plantilla/xlsx') }}">
						<i class="fa fa-download" aria-hidden="true"></i> Descargar plantilla
					</a>
				--}}
					<a class='btn btn-info' role='button' href="{{ asset('templates/TemplateImportUsers.xlsx') }}" download>
						<i class="fa fa-download" aria-hidden="true"></i> Descargar plantilla
					</a>


					<div class="form-group">
						{{ Form::label('archivo', 'Archivo') }}
						{{ Form::file('archivo', [ 
							'class' => 'form-control',
							'accept' => '.xls*',
							'required',
						]) }}
					</div>

				</div>

				<div class="modal-footer">
					{{ Form::button('<i class="fa fa-times" aria-hidden="true"></i> Cancelar', [ 'class'=>'btn btn-default', 'data-dismiss'=>'modal', 'type'=>'button' ]) }}
					{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar', [ 'class'=>'btn btn-primary', 'type'=>'submit' ]) }}
				</div>

			</div>

			{{ Form::close() }}
		</div>
	</div>