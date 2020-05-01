<div id="product_size_weight" class="container tab-pane fade row"><br>
<aside class="content_tab_info  tab_product_size_weight">
    <h3 class="col-md-12 ">{{ trans('admin.product_size_weight') }}</h3>

    <div id="" class="size_weight form-group col-md-12 "><center><h4> {{ trans('admin.please_choose_a_section') }}</h4> <br><br><br></center> </div>
    <div id="" class="color_data hidden">
{{--        <center><h4> {{ trans('admin.color_data') }}</h4> <br><br><br></center>--}}
        <div class="form-group col-md-12">
            <label form="color_id"  >{{trans('admin.color_id')}}</label>
            <div class="" >
                {!! Form::select('color_id',App\Model\Color::pluck('name_'.lang(),'id'),$products->color_id,['class'=>' select2 form-control','placeholder'=>trans('admin.color_id')])!!}
            </div>
        </div><!--form-group-->
    </div>
</aside><!--content_tab_info product_size_weight-->
</div>
