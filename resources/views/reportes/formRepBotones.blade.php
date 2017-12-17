<!-- Botones -->
<div class="form-group">
	<div class="col-xs-8 col-xs-offset-4 text-right">
		{{ Form::button('<i class="fa fa-undo" aria-hidden="true"></i> Reset', [
			'class'=>'btn btn-warning',
			'type'=>'reset',
		]) }}
		{{ Form::button('<i class="fa fa-cog" aria-hidden="true"></i> Procesar', [
			'class'=>'btn btn-primary',
			'type'=>'submit',
		]) }}
	</div>
</div>