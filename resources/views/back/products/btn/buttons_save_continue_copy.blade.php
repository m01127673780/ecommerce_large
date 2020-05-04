<aside class="  content_buttons_save_continue_copy ">
        <a class="btn btn-primary save" href="">{{ trans('admin.save') }} <i class="fa fa-save "></i></a>
        <a class="btn btn-info save_continue save_and_continue" href="">{{ trans('admin.save_continue') }} <i class="fa fa-save "></i> <i class="fa fa-spinner fa-spin hidden loading_save_c "> </i></a>
        <a class="btn btn-success copy_products" href="">   {{ trans('admin.copy_products') }} <i class="fa fa-window-restore"></i></a>
        <a class="btn btn-danger delete" href="">        {{ trans('admin.delete') }}      <i class="fa fa-trash"></i></a>

        <hr>

        <div class="erorr_message hidden btn btn-danger message_error  text-left message content_alert_eroor pos_r" >
                <img class="w_28px_h_28px_custom  "src="{{url('default')}}/sad7.png"   >
                {{--                                                       <div class="w_28px_h_28px_custom button_close_alert_eroor btn-danger  "   > <i class="fa fa-times"></i> </div>--}}
                <ol  class="validate_message">

                </ol><!--validate_message-->
        </div><!--erorr_message-->

        <hr>

</aside>  <!--content_buttons_save_continue_copy-->
