
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','#{{$selectPadre}}',function(){
			var cat_id=$(this).val();
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to($url)!!}',
				data:{'{{$selectPadre}}':cat_id},
				success:function(data){;
					op+='<option value="0" selected disabled>{{isset($placeholder)?$placeholder:''}}</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].{{$idBusqueda}}+'">'+data[i].{{$nombreBusqueda}}+'</option>';
				   }
				   $('#{{$selectHijo}}').html(" ");
				   $('#{{$selectHijo}}').append(op);
				   $('#{{$selectHijo}}').selectpicker('refresh');
				},
				error:function(){
					alert('ha ocurrido un error');
				}
			});			
		});	
	});
</script>

{{-- Ejemplo de como incluirlo
 @section('selectDinamico')
	@include('select-dinamico', ['url'=>'buscaCiudad', 'selectPadre'=>'departamentos', 'selectHijo'=>'ciudades', 'idBusqueda'=>'CIUD_ID', 'nombreBusqueda'=>'CIUD_NOMBRE', 'prepend'=>'Seleccione una Ciudad'])
@endsection 

public function llenaSelectPadre()
{
     $departamentos = Departamento::lists('DEPA_NOMBRE','DEPA_ID')->prepend('Seleccione')->toArray();
    return view('select',compact('departamentos'));
}

public function buscaCiudad(Request $request)
{ 
    $data=Ciudad::select('CIUD_NOMBRE','CIUD_ID')->where('DEPA_ID',$request->DEPA_ID)->take(100)->get();
    return response()->json($data);
}
--}}