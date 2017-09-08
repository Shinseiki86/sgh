<div class='col-md-8 col-md-offset-2'>
	<!-- Diag Id Field -->
	
	
	   
	
	{{ Form::hidden('DIAG_ID', 'secret', array('id' => 'invisible_id')) }}
	
	
	<div class="col-md-13 ">
		@include('widgets.forms.input', ['type'=>'text', 'column'=>2, 'name'=>'CIE10', 'label'=>'CIE10','onblur'=>"myFunction()"])
		@include('widgets.forms.input', ['type'=>'text', 'column'=>10, 'name'=>'DX_DESCRIPCION', 'label'=>'Descripcion Dx'])
	</div>
	@push('scripts')
		<link rel="stylesheet"  href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">/>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
			$('#DX_DESCRIPCION').autocomplete({
				source:'{!! URL::route('autocomplete') !!}',
				minlenght:1,
				autofocus:true,
				select:function(e,ui){
					$('#CIE10').val(ui.item.cod);
					$('#DX_DESCRIPCION').val(ui.item.value);
					$('#DIAG_ID').val(ui.item.ID);
				}
			});
		</script>
	@endpush

	<!-- Coau Id Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('COAU_ID') ? ' has-error' : '' }}">
		    {!! Form::label('COAU_ID', 'Id Concepto Ausentismo:', ['class' => 'control-label Coau Id']) !!}
		{!! Form::number('COAU_ID', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'COAU_ID'])
		</div>
	</div>

	<!-- Cont Id Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('CONT_ID') ? ' has-error' : '' }}">
		    {!! Form::label('CONT_ID', 'Id Contrato:', ['class' => 'control-label Cont Id']) !!}
		{!! Form::number('CONT_ID', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'CONT_ID'])
		</div>
	</div>

	<!-- Ause Fechainicio Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('AUSE_FECHAINICIO') ? ' has-error' : '' }}">
		    {!! Form::label('AUSE_FECHAINICIO', 'Fecha Inicio:', ['class' => 'control-label Ause Fechainicio']) !!}
		{!! Form::date('AUSE_FECHAINICIO', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'AUSE_FECHAINICIO'])
		</div>
	</div>

	<!-- Ause Fechafinal Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('AUSE_FECHAFINAL') ? ' has-error' : '' }}">
		    {!! Form::label('AUSE_FECHAFINAL', 'Fecha Final:', ['class' => 'control-label Ause Fechafinal']) !!}
		{!! Form::date('AUSE_FECHAFINAL', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'AUSE_FECHAFINAL'])
		</div>
	</div>

	<!-- Ause Dias Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('AUSE_DIAS') ? ' has-error' : '' }}">
		    {!! Form::label('AUSE_DIAS', 'Total Dias:', ['class' => 'control-label Ause Dias']) !!}
		{!! Form::number('AUSE_DIAS', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'AUSE_DIAS'])
		</div>
	</div>

	<!-- Ause Fechaaccidente Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('AUSE_FECHAACCIDENTE') ? ' has-error' : '' }}">
		    {!! Form::label('AUSE_FECHAACCIDENTE', 'Fecha Accidente:', ['class' => 'control-label Ause Fechaaccidente']) !!}
		{!! Form::date('AUSE_FECHAACCIDENTE', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'AUSE_FECHAACCIDENTE'])
		</div>
	</div>

	<!-- Enti Id Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('ENTI_ID') ? ' has-error' : '' }}">
		    {!! Form::label('ENTI_ID', 'Entidad Responsable:', ['class' => 'control-label Enti Id']) !!}
		{!! Form::number('ENTI_ID', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'ENTI_ID'])
		</div>
	</div>

	<!-- Ause Ibc Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('AUSE_IBC') ? ' has-error' : '' }}">
		    {!! Form::label('AUSE_IBC', 'IBC:', ['class' => 'control-label Ause Ibc']) !!}
		{!! Form::number('AUSE_IBC', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'AUSE_IBC'])
		</div>
	</div>

	<!-- Ause Valor Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('AUSE_VALOR') ? ' has-error' : '' }}">
		    {!! Form::label('AUSE_VALOR', 'Valor Total:', ['class' => 'control-label Ause Valor']) !!}
		{!! Form::number('AUSE_VALOR', null, ['class' => 'form-control']) !!}
			@include('widgets.forms.alerta',['name'=>'AUSE_VALOR'])
		</div>
	</div>

	<!-- Ause Observaciones Field -->
	<div class="col-xs-12"> 
		<div class="form-group  {{ $errors->has('AUSE_OBSERVACIONES') ? ' has-error' : '' }}">
		    {!! Form::label('AUSE_OBSERVACIONES', 'Observaciones:', ['class' => 'control-label']) !!}
		{!! Form::textarea('AUSE_OBSERVACIONES', null, ['class' => 'form-control ','size' => '20x3','style' => 'resize: vertical']) !!}
			@include('widgets.forms.alerta',['name'=>'AUSE_OBSERVACIONES'])
		</div>
	</div>


</div>
<!-- Submit Field 
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
</div>-->
