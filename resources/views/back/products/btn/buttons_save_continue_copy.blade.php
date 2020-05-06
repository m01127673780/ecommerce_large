<aside class="  content_buttons_save_continue_copy ">
        <a class="btn btn-primary save" href="">{{ trans('admin.save') }} <i class="fa fa-save "></i></a>
        <a class="btn btn-info save_continue save_and_continue" href="">{{ trans('admin.save_continue') }} <i class="fa fa-save "></i> <i class="fa fa-spinner fa-spin hidden loading_save_c "> </i></a>
        <a class="btn btn-success copy_product" href="">   {{ trans('admin.copy_products') }} <i class="fa fa-window-restore"></i> <i class="fa fa-spinner hidden fa-spin   loading_copy "> </i></a>

        <a class="btn btn-danger delete" href="#"  data-toggle="modal" data-target="#del_products{{$products->id}}" >        {{ trans('admin.delete') }}      <i class="fa fa-trash"></i></a>
        <a class="btn btn-warning delete" href="{{aurl('products')}}" " >  {{ trans('admin.product_home') }} <i class="fas fa-tv"></i> </a>
        <hr>
        <div class="erorr_message hidden btn btn-danger message_error  text-left message content_alert_eroor pos_r" >
                <img class="w_28px_h_28px_custom  "src="{{url('default')}}/sad7.png"   >
                {{--                                                       <div class="w_28px_h_28px_custom button_close_alert_eroor btn-danger  "   > <i class="fa fa-times"></i> </div>--}}
                <ol  class="validate_message">

                </ol><!--validate_message-->
        </div><!--erorr_message-->
        {{--                                               <div class="alert btn-success hidden  alert_success success_message message "> --}}
        {{--                                                   <img class="w_22px_h_22px "src="{{url('default')}}/like7.png" >--}}
        {{--                                                   .... <img class="w_25px_h_25px m_b_6px"src="{{url('default')}}/clap.png" >--}}
        {{--                                               </div>--}}
        <div  class="alert btn-success hidden    success_message"  ></div>
        <hr>

</aside>  <!--content_buttons_save_continue_copy-->
