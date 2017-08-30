<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.{{$selectPadre}}',function(){
			var cat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to($url)!!}',
				data:{'id':cat_id},
				success:function(data){;
					op+='<option value="0" selected disabled>Seleccione La Ciudad</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].CIUD_ID+'">'+data[i].CIUD_NOMBRE+'</option>';
				   }
				   div.find('.{{$selectHijo}}').html(" ");
				   div.find('.{{$selectHijo}}').append(op);
				},
				error:function(){
				}
			});
		});	
	});
</script>