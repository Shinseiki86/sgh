@extends('layouts.menu')
@section('title', '/ Dashboard')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Parametrizaciones
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			
		</div>
	</div>
@endsection

@section('section')
	<div class="media">
		<div class="media-body media-middle">
			@include('widgets.forms.input', ['type'=>'file', 'name'=>'image_logo', 'label'=>'Logo', 'options'=>['accept'=>'image/*']])
		</div>
		<div class="media-left">
			{{ Html::image( File::exists('assets/images/logo-user.png') ? asset('assets/images/logo-user.png') : asset('assets/images/logo-default.png'), 'Fondo', [
				'class'=>'media-object',
				'width'=>'250px',
			]) }}
		</div>
	</div>
@endsection
@push('scripts')
	<script type="text/javascript">
		$(function () {


			function changeParameter($parameter, $value){
				$.ajax({
					//async: false, 
					url: 'admin/changeParameter',
					dataType: "json",
					type: "GET",
					headers: {
						"X-CSRF-TOKEN": $('input[name="_token"]').val()
					},
					success: function($result) {
						var labels = [], data=[], colors=[];
						$result.forEach(function(packet) {
							labels.push(packet[$nameX]);
							data.push(parseInt(packet[$nameY]));
							if(typeof packet['COLOR'] == 'string'){ colors.push(packet['COLOR']); }
						});
						buildChart($title, labels, data, colors, $idCanvas, $type);
					},
					error: function($e){
						console.log('Error ajax: '+$e);
					}
				});
			}
		});
	</script>
@endpush
