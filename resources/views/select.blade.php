@extends('layouts.menu')

@section('page_heading', 'Nueva ')

@section('section')
	 {!! Form::select('departamentos',$departamentos,null,['id'=>'departamentos','class'=>' productcategory js-example-responsive form-control selectpicker','style'=>'width: 30%']) !!}


		{!! Form::select('ciudad',['placeholder'=>'Selecciona'],null,['id'=>'ciudad','class'=>'ciudades','style'=>'width: 30%']) !!}		
		
@endsection

@section('select2')
	<script>  
      $("#departamentos").select2({
      theme: "classic",
      // templateSelection: formatState
      });
       $("#ciudad").select2({
      theme: "classic",
      // templateSelection: formatState
      });
	</script>
	@include('select-dinamico', ['url'=>'buscaCiudad', 'selectPadre'=>'productcategory', 'selectHijo'=>'ciudades'])
	
@endsection
