@push('head')
	{!! Html::style('assets/stylesheets/nestable.css') !!}
@endpush

@push('scripts')
	{{ Html::script('assets/scripts/jquery/jquery.nestable.js') }}
	<script type="text/javascript">
		$(function() {


			$('.dd').nestable({
				maxDepth: 2,
				dropCallback: function(details) {
					
					var order = new Array();
					$("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
						order[index] = $(elem).attr('data-id');
					});

					if (order.length === 0){
						var rootOrder = new Array();
						$("#nestable > ol > li").each(function(index,elem) {
							rootOrder[index] = $(elem).attr('data-id');
						});
					}

					console.log(JSON.stringify(order));
					console.log(JSON.stringify(rootOrder));

					$.post('{{url("auth/menu/reorder")}}',
						{
							source : details.sourceId, 
							destination: details.destId, 
							order:JSON.stringify(order),
							rootOrder:JSON.stringify(rootOrder) 
						}, 
						function(data) {
							//console.log('data '+data); 
					})
					.done(function() { 
						$( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
					})
					.fail(function() {  })
					.always(function() {  });
				}
			}).nestable('collapseAll');


			 $('.delete_toggle').each(function(index,elem) {
				 $(elem).click(function(e){
				e.preventDefault();
				$('#postvalue').attr('value',$(elem).attr('rel'));
				$('#deleteModal').modal('toggle');
				 });
			 });
		});
	</script>
@endpush
