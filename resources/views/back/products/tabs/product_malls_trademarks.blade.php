<div id="product_malls_trademarks" class="container tab-pane fade row"> <br>
<aside class="content_tab_info  tab_product_malls_trademarks">
    <center> <h3 class="col-md-12 ">{{ trans('admin.product_malls_trademarks_title') }}</h3></center>
    <div id="" class="message_malls_trademarks form-group col-md-12 hidden "><center><h4> {{ trans('admin.please_choose_a_section') }}</h4> <br><br><br></center> </div>

    <div id="" class="malls_trademarks_data   ">
{{--        <h4> {{ trans('admin.color_data') }}</h4> <br><br><br>--}}
        <div class="form-group col-md-12">
            <label form="trade_id"  >{{trans('admin.trademarks')}}</label>
            <div class="" >
               <style>
                   .select2{
                   width: 100%!important;
                   }
                   .select2-container {
                       box-sizing: border-box;
                       display: inline-block;
                       margin: 0;
                       position: relative;
                       vertical-align: middle;
                       width: 100%!important;
                       height: 40px!important;
                   }
                   .tab_product_malls_trademarks
                   {
                       margin: 0 2px;
                       padding: 0;
                   }
                   .container_contect_tabs
                   {
                       width: 96.9%!important;
                   }


               </style>
                {!! Form::select('trade_id',App\Model\Trademark::pluck('name_'.lang(),'id'),$products->trade_id,['class'=>'form-control select2','placeholder'=>trans('admin.trademarks')])!!}

            </div>
        </div><!--form-group-->

        <div class="form-group col-md-12">
            <label form="trade_id"  >{{trans('admin.mall')}}</label>
            <select name="mall[]" class="select2 select_2 "multiple="multiple" placeholder ="{{trans('admin.choose_mall')}}"  style="width: 100%!important; height: 40px!important;" >
                @foreach(App\Countreis::all() as $country)
                    <optgroup label="{{ $country->{'country_name_'.lang() } }}">
                        @foreach($country->malls()->get() as  $mall)
                            <option value="{{$mall->id}}">{{$mall->{'name_'.lang()} }}</option>
                        @endforeach
                    </optgroup>
                @endforeach>
             </select>
    </div><!--form-group-->

                <div class="form-group col-md-12">
        <label form="manu_id"  >{{trans('admin.manufacts')}}</label>
        <div class="" >
            {!! Form::select('manu_id',App\Model\Manufact::pluck('name_'.lang(),'id'),$products->mall_id,['class'=>'select2 form-control','placeholder'=>trans('admin.manufacts')])!!}
        </div>
    </div><!--form-group-->
        {{--start select to  malls --}}
        @push('css')
            <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
            <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />

        @endpush
        @push('js')
            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
            <script src="vendor/select2/dist/js/select2.min.js"></script>
            // In your Javascript (external .js resource or  tag)
            <script>
                $(document).ready(function() {
                    $('.select2').select2();
                    $('.select2_multiple').select2();

                });
            </script>
            <style>
                .select2-container--default .select2-selection--single {
                     width: 100%!important;
                    height: 40px!important;
                 }
                .select2-container--default .select2-selection--multiple .select2-selection__choice {
                    background-color: #000 !important;

                }
            </style>
        @endpush



{{--        {!! Form::select('mall_id',App\Model\Mall::pluck('name_'.lang(),'id'),$products->mall_id,[ 'multiple'=>'multiple','class'=>'select2_multiple form-control','placeholder'=>trans('admin.mall')])!!}--}}

        {{--End   select to  malls --}}
    </div>
</aside><!--content_tab_info product_size_weight-->

</div>