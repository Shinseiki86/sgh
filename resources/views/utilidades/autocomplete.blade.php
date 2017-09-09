@push('head')
    {!! Html::style('http://demo.expertphp.in/css/jquery.ui.autocomplete.css') !!}
@endpush

@push('scripts')

   {{--  {!! Html::script('http://demo.expertphp.in/js/jquery.js') !!} --}}
    {!! Html::script('http://demo.expertphp.in/js/jquery-ui.min.js') !!}   
    <script>
   $(document).ready(function() {
     $("#DX_DESCRIPCION").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{!! URL::route('autocomplete') !!}',
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);                   
                }
            });
        },
        minLength:1,
        select:function(e,ui){
            $('#CIE10').val(ui.item.cod);
            $('#DX_DESCRIPCION').val(ui.item.value);
            $('#DIAG_ID').val(ui.item.id);
        },
        autofocus:true,
    });
    });
</script>
@endpush