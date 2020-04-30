<div id="product_colors_flavors" class="container tab-pane fade row"><br>
<aside class="content_tab_info  tab_product_colors_flavors">
    <center> <h3 class="col-md-12 ">{{ trans('admin.product_colors_flavors') }}</h3></center>
    <div id="" class="message_colors_flavors form-group col-md-12 "><center><h4> {{ trans('admin.please_choose_a_section') }}</h4> <br><br><br></center> </div>

    <div id="" class="color_flavor_data hidden  ">
{{--        <h4> {{ trans('admin.color_data') }}</h4> <br><br><br>--}}
        <div class="form-group col-md-12">
            <label form="color_id"  >{{trans('admin.color_id')}}</label>
            <div class="" >
                {!! Form::select('color_id',App\Model\Color::pluck('name_'.lang(),'id'),$products->color_id,['class'=>'form-control','placeholder'=>trans('admin.color_id')])!!}
            </div>
        </div><!--form-group-->
        <div class="form-group col-md-12">
        <label form="color_id"  >{{trans('admin.flavor_id')}}</label>
        <div class="" >
            {!! Form::select('flavor_id',App\Model\Flavor::pluck('name_'.lang(),'id'),$products->flavor_id,['class'=>'form-control','placeholder'=>trans('admin.flavor_id')])!!}
        </div>
    </div><!--form-group-->

    </div>
</aside><!--content_tab_info product_size_weight-->
</div>