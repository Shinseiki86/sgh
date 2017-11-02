@push('scripts')
	<script type="text/javascript">
		
			$(document).ready(function(){

				$('#TIEM_ID').change(function() {

					var $directo = 1;
					var $temporal = 2;

					var $val = $('#TIEM_ID').val();
					if($val!=null && $val==$directo){		
						$('#TEMP_ID').attr('disabled', 'disabled');
					}else{
						$('#TEMP_ID').removeAttr('disabled');
					}


				});
					

			});

	</script>
@endpush