<div class="col-xs-8 col-xs-offset-4 text-right">
	<a class="btn btn-warning" role="button" href="{{ URL::to($url) }}" data-tooltip="tooltip" title="Regresar">
		<i class="fa fa-arrow-left" aria-hidden="true"></i>
	</a>
	{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', [
		'class'=>'btn btn-primary',
		'type'=>'submit',
		'data-tooltip'=>'tooltip',
		'title'=>'Guardar',
	]) }}
</div>