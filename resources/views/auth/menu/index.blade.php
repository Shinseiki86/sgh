@extends('layouts.menu')
@section('title', '/ Menú')
@include('nestable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Menú
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ URL::to('auth/menu/create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<div class="dd" id="nestable">
		<ol class="dd-list">
			@if(isset($menusEdit))
			@foreach ($menusEdit as $key => $item)
					@if ($item['MENU_PARENT'] != 0)
						@break
					@endif
					@include('auth.menu.menu-list', ['item' => $item])
			@endforeach
			@endif
		</ol>

		<p id="success-indicator" style="display:none; margin-right: 10px;">
			<span class="glyphicon glyphicon-ok"></span> Orden del menú guardado.
		</p>

	</div>

	@include('widgets/modal-delete')
@endsection