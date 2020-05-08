@push('js')
    <script>
        $(document).ready(function() {
        $(document).on('click','.do_search',function () {
                var search = $('.search').val();
                if(search !='' || search !== null){
                $.ajax({
                    url:'{{ aurl('products/search') }}',
                    dataType:'json',
                    type:'post',
                    data:{_token:'{{ csrf_token() }}',search:search,id:'{{$products->id}}'},
                    beforeSend:function () {
                        $('.loading_data').removeClass('hidden');
                    },success:function (data) {
                        if(data.status == true) {
                            if(data.count > 0 ){
                                var itmes = '';
                                $.each(data.result,function (index,value) {

                                    itmes += '<li> <label> <input type="checkbox" name="related[]" value="'+value.id+'"/>' +value . {{'product_name_'.session('lang')}} + ' </label> </li>';

                                });
                                $('.itmes').html(itmes);
                        }
                            $('.loading_data').addClass('hidden',1000);
                        }
                    },error: function (data)  {
                        $('.loading_data').addClass('hidden',1000);

                    }
                   }); //ajax
                 } //null
               });//do_search
            });//document

    </script>
@endpush
<div id="product_related" class="container tab-pane fade "><br>
<h4 class="text-center">{{ trans('admin.product_related') }}</h4><div class='clearfix'>....</div>
<aside class="content_tab_info  tab_product_related">
{{-------------------------------------------------------------------------}}
    <div class='div_content_inputs '>

   </div><!--div_content_inputs-->

    <div class='clearfix'>....</div>
{{-- ---------------------------------------------}}
    <form >
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="btn btn-dark ">  <i class="fas fa-search do_search   "></i> <i class="fas fa-spinner fa-spin hidden loading_data  "></i> </div>


            </div>
            <input type="text" class="form-control   search" placeholder="" aria-label="" aria-describedby="basic-addon1">
        </div>
    </form>
    <hr/>
    <div class="col-md-12 col-lg12 ">
        <ul class="itmes">


        </ul>
    </div>
{{-- ---------------------------------------------}}
     <div class='clearfix'>....</div>

    {{-------------------------------------------------------------------------}}
</aside><!--content_tab_info product_related-->
</div>
