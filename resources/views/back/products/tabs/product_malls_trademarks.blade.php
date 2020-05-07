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

                    @push('js')
                        <script type="text/javascript">
                            $('.select2').select2();

                            $(document).ready(function() {
                                var dataSelect = [
                                        @foreach(App\Countreis::all() as $country)
                                    {
                                        "text":"{{ $country->{'country_name_'.lang() } }}",
                                        "children":[
                                                @foreach($country->malls()->get() as  $mall)
                                            {
                                                "id":{{ $mall->id }},
                                                "text":"{{ $mall->{'name_'.lang() } }}",
                                                @if(check_mall($mall->id,$products->id))
                                                "selected":true
                                                @endif
                                            },
                                            @endforeach
                                        ],
                                    },
                                    @endforeach
                                ];
                                $('.select2_malls').select2({data:dataSelect});
                                // $('.select2').select2();

                            });
                        </script>
                    @endpush
                    {!! Form::select('trade_id',App\Model\Trademark::pluck('name_'.lang(),'id'),$products->trade_id,['class'=>'form-control select2 ','placeholder'=>trans('admin.trademarks')])!!}

                </div>
            </div><!--form-group-->

            <div class="form-group col-md-12">
                <label form="trade_id"  >{{trans('admin.mall')}}</label>
                <select name="mall[]" class=" select2_malls"multiple="multiple" placeholder ="{{trans('admin.choose_mall')}}"  style="width: 100%!important; height: 40px!important;" >

                </select>
            </div><!--form-group-->

            <div class="form-group col-md-12">
                <label form="manu_id"  >{{trans('admin.manufacts')}}</label>
                <div class="" >
                    {!! Form::select('manu_id',App\Model\Manufact::pluck('name_'.lang(),'id'),$products->manu_id,['class'=>'select2 form-control','placeholder'=>trans('admin.manufacts')])!!}
                </div>
            </div><!--form-group-->





            {{--End   select to  malls --}}
        </div>
    </aside><!--content_tab_info product_size_weight-->

</div>