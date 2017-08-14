@extends('layouts.menu')

@section('page_heading', 'Actualizar Turno')

@push('scripts')
	{!! Html::script('assets/scripts/momentjs/moment-with-locales.min.js') !!}
	{!! Html::script('assets/scripts/bootstrap/bootstrap-datetimepicker.min.js') !!}
	<script type="text/javascript">
		$(function () {
			$('#TURN_HORAINICIO').datetimepicker({
				locale: 'es',
				format: 'HH:mm:ss',
				icons: {
					date: "fa fa-calendar",
					up: "fa fa-arrow-up",
					down: "fa fa-arrow-down",
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'glyphicon glyphicon-screenshot',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				},
				tooltips: {
					selectMonth: 'Seleccione Mes',
					prevMonth: 'Mes Anterior',
					nextMonth: 'Mes Siguiente',
					selectYear: 'Seleccione Año',
					prevYear: 'Año Anterior',
					nextYear: 'Año Siguiente',
					selectDecade: 'Seleccione Década',
					prevDecade: 'Década Anterior',
					nextDecade: 'Década Siguiente',
					prevCentury: 'Siglo Anterior',
					nextCentury: 'Siglo Siguiente'
				}
			});

			$('#TURN_HORAFINAL').datetimepicker({
				locale: 'es',
				format: 'HH:mm:ss',
				icons: {
					date: "fa fa-calendar",
					up: "fa fa-arrow-up",
					down: "fa fa-arrow-down",
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'glyphicon glyphicon-screenshot',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				},
				tooltips: {
					selectMonth: 'Seleccione Mes',
					prevMonth: 'Mes Anterior',
					nextMonth: 'Mes Siguiente',
					selectYear: 'Seleccione Año',
					prevYear: 'Año Anterior',
					nextYear: 'Año Siguiente',
					selectDecade: 'Seleccione Década',
					prevDecade: 'Década Anterior',
					nextDecade: 'Década Siguiente',
					prevCentury: 'Siglo Anterior',
					nextCentury: 'Siglo Siguiente'
				}
			});

		});
	</script>	
@endpush

@section('section')

	{{ Form::model($turno, ['action' => ['CnfgOrganizacionales\TurnoController@update', $turno->TURN_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('TURN_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('TURN_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TURN_DESCRIPCION', old('TURN_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('TURN_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('TURN_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TURN_CODIGO') ? ' has-error' : '' }}">
			{{ Form::label('TURN_CODIGO', 'Codigo',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TURN_CODIGO', old('TURN_CODIGO'), [ 'class' => 'form-control', 'maxlength' => '10', 'required' ]) }}
				@if ($errors->has('TURN_CODIGO'))
					<span class="help-block">
						<strong>{{ $errors->first('TURN_CODIGO') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TURN_HORAINICIO') ? ' has-error' : '' }}">
			{{ Form::label('TURN_HORAINICIO', 'Hora Inicial',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TURN_HORAINICIO', old('TURN_HORAINICIO'), [ 'class' => 'form-control', 'required' , 'id' => 'TURN_HORAINICIO']) }}
				@if ($errors->has('TURN_HORAINICIO'))
					<span class="help-block">
						<strong>{{ $errors->first('TURN_HORAINICIO') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TURN_HORAFINAL') ? ' has-error' : '' }}">
			{{ Form::label('TURN_HORAFINAL', 'Hora Final',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('TURN_HORAFINAL', old('TURN_HORAFINAL'), [ 'class' => 'form-control', 'required' , 'id' => 'TURN_HORAFINAL']) }}
				@if ($errors->has('TURN_HORAFINAL'))
					<span class="help-block">
						<strong>{{ $errors->first('TURN_HORAFINAL') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('EMPL_ID') ? ' has-error' : '' }}">
			<label for="EMPL_ID" class="col-md-4 control-label">Empleador</label>
			<div class="col-md-6">
				{{ Form::select('EMPL_ID', [null => 'Seleccione un empleador'] + $arrEmpleadores , old('EMPL_ID'), [
				'class' => 'form-control',
				'required'
				]) }}

				@if ($errors->has('EMPL_ID'))
				<span class="help-block">
					<strong>{{ $errors->first('EMPL_ID') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('TURN_OBSERVACIONES') ? ' has-error' : '' }}">
			{{ Form::label('TURN_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('TURN_OBSERVACIONES', old('TURN_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('TURN_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('TURN_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-organizacionales/turnos/') }}" data-tooltip="tooltip" title="Regresar">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
				</a>
				{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', [
					'class'=>'btn btn-primary',
					'type'=>'submit',
					'data-tooltip'=>'tooltip',
					'title'=>'Guardar',
				]) }}
			</div>
		</div>
	{{ Form::close() }}
@endsection