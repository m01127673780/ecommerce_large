
                                                   <div id="product_setting" class="container tab-pane fade"><br>
                                                       <h3>{{ trans('admin.product_setting') }}</h3>
                                                       <aside class="product_setting  tab_product_setting row">
                                                           @push('js')
                                                               <script type="text/javascript">
                                                                   $(document).on('change','.status', function(){
                                                                       var status = $('.status option:selected').val();
                                                                       if(status == 'refused')
                                                                       {
                                                                           $('.reason').removeClass('hidden');

                                                                       }else{
                                                                           $('.reason').addClass('hidden');
                                                                       }
                                                                   });
                                                                   $('.datepicker').datepicker({
                                                                       rtl:'{{ session('lang')=='ar'?true:false}}',
                                                                       language:'{{ session('lang')}}',
                                                                       format:'yyyy-mm-dd',
                                                                       autoclose:false,
                                                                       todayBtn:true,
                                                                        todayHighlight:true,
                                                                       clearBtn:true
                                                                   });
                                                               </script>
                                                           @endpush
                                                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                               {!! Form::label('price',trans('admin.price')) !!}
                                                               {!! Form::text('price',$products->price,['class'=>'form-control ','placeholder'=>trans('admin.price')]) !!}
                                                           </div> <!-- /price" -->


                                                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                               {!! Form::label('stock',trans('admin.stock')) !!}
                                                               {!! Form::text('stock',$products->stock,['class'=>'form-control  ','placeholder'=>trans('admin.stock')]) !!}
                                                           </div> <!-- /stock" -->

                                                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                               {!! Form::label('start_at',trans('admin.start_at')) !!}
                                                               {!! Form::text('start_at',$products->start_at,['autocomplete'=>'off','class'=>'form-control datepicker','placeholder'=>trans('admin.start_at')]) !!}
                                                           </div> <!-- /start_at" -->

                                                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                               {!! Form::label('end_at',trans('admin.end_at')) !!}
                                                               {!! Form::text('end_at',$products->end_at,['class'=>'form-control datepicker','autocomplete'=>'off','placeholder'=>trans('admin.end_at')]) !!}
                                                           </div> <!-- /end_at" -->

                                                           <div class="clearfix"></div>

                                                           <div class="form-group  col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                               {!! Form::label('price_offer',trans('admin.price_offer')) !!}
                                                               {!! Form::text('price_offer',$products->price_offer,['class'=>'form-control','placeholder'=>trans('admin.price_offer')]) !!}
                                                           </div> <!-- /price_offer" -->

                                                           <div class="form-group  col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                               {!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}
                                                               {!! Form::text('start_offer_at',$products->start_offer_at,['autocomplete'=>'off','class'=>'form-control datepicker','placeholder'=>trans('admin.start_offer_at')]) !!}
                                                           </div> <!-- /start_offer_at" -->

                                                            <div class="form-group  col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                               {!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}
                                                               {!! Form::text('end_offer_at',$products->end_offer_at,['autocomplete'=>'off','class'=>'form-control datepicker','placeholder'=>trans('admin.end_offer_at')]) !!}
                                                           </div> <!-- /end_offer_at" -->
                                                            <div class="clearfix"></div>
<div class="col-md-12">

    <div class="form-group  ">
        {!! Form::label('status',trans('admin.status')) !!}
        {!! Form::select('status',['pending'=>trans('admin.pending'),'refused'=>trans('admin.refused'),'active'=>trans('admin.active')],$products->status,['class'=>'form-control status ','placeholder'=>trans('admin.status')]) !!}
    </div> <!-- /status" -->

    <div class="form-group reason   {{ $products->status != 'refused'?'hidden':''}}">
        {!! Form::label('reason',trans('admin.refused_reason')) !!}
        {!! Form::textarea('reason',$products->reason,['class'=>'form-control reason ','placeholder'=>trans('admin.refused_reason')]) !!}
    </div> <!-- /reason" -->
</div>
                                                       </aside><!--content_tab_info product_setting-->                                                   </div>
{{--                                                    </div>--}}