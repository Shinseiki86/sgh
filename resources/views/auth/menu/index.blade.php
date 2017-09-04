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


	<!-- Create new item Modal -->
	 <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 <div class="modal-dialog">
			 <div class="modal-content">
				{{ Form::open(['url'=>'admin/menu/new','class'=>'form-horizontal','role'=>'form'])}}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Provide details of the new menu item</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
								<label for="title" class="col-lg-2 control-label">Title</label>
								<div class="col-lg-10">
									{{ Form::text('title',null,['class'=>'form-control'])}}
								</div>
						</div>
						<div class="form-group">
								<label for="label" class="col-lg-2 control-label">Label</label>
								<div class="col-lg-10">
									{{ Form::text('label',null,array('class'=>'form-control'))}}
								</div>
						</div>
						<div class="form-group">
								<label for="url" class="col-lg-2 control-label">URL</label>
								<div class="col-lg-10">
									{{ Form::text('url',null,array('class'=>'form-control'))}}
								</div>
						</div>
				 </div>
				 <div class="modal-footer">
					 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					 <button type="submit" class="btn btn-primary">Create</button>
				 </div>
				 {{ Form::close()}}
			 </div><!-- /.modal-content -->
		 </div><!-- /.modal-dialog -->
	 </div><!-- /.modal -->
	
	<!-- Delete item Modal -->
	 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 <div class="modal-dialog">
			 <div class="modal-content">
					{{ Form::open(array('url'=>'admin/menu/delete')) }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Provide details of the new menu item</h4>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this menu item?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<input type="hidden" name="delete_id" id="postvalue" value="" />
						<input type="submit" class="btn btn-danger" value="Delete Item" />
					</div>
					{{ Form::close() }}
			 </div><!-- /.modal-content -->
		 </div><!-- /.modal-dialog -->
	 </div><!-- /.modal -->


	@include('widgets/modal-delete')
@endsection