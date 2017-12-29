<!-- Botones -->
<div class="text-right" style="position: absolute; right: 20px; z-index: 100">
	{{ Form::button('<i class="fa fa-undo" aria-hidden="true"></i> Reset', [
		'class'=>'btn btn-warning',
		'type'=>'reset',
	]) }}
	{{ Form::button('<i class="fa fa-cog" aria-hidden="true"></i> Procesar', [
		'class'=>'btn btn-primary',
		'type'=>'submit',
	]) }}
</div>