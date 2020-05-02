@extends('back.index')
@section('content')
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
            //------------------start save And continue
                $(document).on('click','.save_and_continue',function(){
                    var form_data = $('#product_form').serialize();
                    $.ajax({
                        url:'{{aurl('products/.$products->id')}}',
                        dataType:'json',
                        type:'post',
                        data:form_data,
                        beforeSend:function () {
                            $('.loading_save_c').removeClass('hidden');
                        },success:function () {
                            $('.loading_save_c').addClass('hidden');

                        },error(){
                            $('.loading_save_c').addClass('hidden');

                        }
                     }); //ajax
                    return false;
                });//document on  save_and_continue
                    //------------------End   save And continue

            });//document ready
        </script>

    @endpush
    <style>
        .select2-container--default .select2-selection--single {
            width: 100%!important;
            height: 40px!important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #000 !important;

        }
    </style>
{{--    ===================================================--}}
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper content_wrapper_datatable">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card_dark">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}</h3>
                            </div>
                                <section class="page_create_message">@include('back.message')</section>
                        <!-- /.card-header -->
                            <div class="card-body form_dark">
                            <!-- /.----------------------------------------------------------------- -->
                             <div class="box-body">
                                     {!! Form::open(['url'=>aurl('products'),'files'=>true,'id'=>'product_form','method'=>'put']) !!}
                                   <div class="row ">
                                       <!--container-->
                                       <div class="col-md-12" >
                                         <h4>{{$title}}</h4> <br>
{{--                          <aside class="content_buttons_save_continue_copy ">@include('back.products.btn.buttons_save_continue_copy')</aside><br> <br>--}}
                                           <aside class="  content_buttons_save_continue_copy ">
                                               <a class="btn btn-primary save" href="">{{ trans('admin.save') }} <i class="fa fa-save "></i></a>
                                               <a class="btn btn-info save_continue save_and_continue" href="">{{ trans('admin.save_continue') }} <i class="fa fa-save "></i> <i class="fa fa-spinner fa-spin hidden loading_save_c "> </i></a>
                                               <a class="btn btn-success copy_products" href="">   {{ trans('admin.copy_products') }} <i class="fa fa-window-restore"></i></a>
                                               <a class="btn btn-danger delete" href="">        {{ trans('admin.delete') }}      <i class="fa fa-trash"></i></a>
                                           </aside>  <!--content_buttons_save_continue_copy-->
                                            <div class="container_contect_tabs">
                                               <!-- Nav tabs -->
                                       <ul class="nav nav-tabs" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link " data-toggle="tab" href="#department">{{ trans('admin.department') }}
                                       <i class="fa fa-align-right"></i>  </a>
                                 </li>

                                   <li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#product_info">{{ trans('admin.product_info') }}
                                           <i class="fas fa-info-circle"></i>  </a>
                                   </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_setting">{{ trans('admin.product_setting') }}
                                     <i class="fas fa-cogs  "></i> </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link active" data-toggle="tab" href="#product_media">{{ trans('admin.product_media') }}
                                   <i class="fas fa-photo-video"></i>    </a>
                                 </li>

                                <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_colors_flavors">
                                         <i class="fas fa-paint-brush"></i>
                                         {{ trans('admin.product_colors_flavors') }}
                                    <i class="fab fa-pagelines"></i>
                                     </a>
                                 </li>

                                           <li class="nav-item">
                                               <a class="nav-link" data-toggle="tab" href="#product_malls_trademarks">
                                                   <i class="fas fa-hospital "></i>
                                                   {{ trans('admin.product_malls_trademarks') }}
                                                   <i class="fab fa-free-code-camp"></i>
                                               </a>
                                           </li>

                                <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_size_weight">{{ trans('admin.product_size_weight') }}
                                    <i class="fas fa-shipping-fast"></i>  </a>
                                 </li>

                                     <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_other_data">{{ trans('admin.product_other_data') }}
                                    <i class="fas fa-folder-plus"></i>  </a>
                                 </li>
                                       </ul>
                                               <!-- Tab content start  -->
                                               <div class="tab-content">


@include('back.products.tabs.department')
@include('back.products.tabs.product_setting')
@include('back.products.tabs.product_media')
@include('back.products.tabs.product_info')
@include('back.products.tabs.product_size_weight')
@include('back.products.tabs.product_colors_flavors')
@include('back.products.tabs.product_malls_trademarks')
@include('back.products.tabs.product_other_data')

                                               </div> <!-- Tab content start  -->
                                           </div><br>
                                            <aside class="content_buttons_save_continue_copy ">@include('back.products.btn.buttons_save_continue_copy')</aside><br> <br>
                                        </div><!--col-md-12-->
                                   <div class="d-none col-md-6 content_form_ar" >
                                    <div class="form-group">
                                        {!! Form::label('product_name_ar',trans('admin.product_name_ar')) !!}
                                        {!! Form::text('product_name_ar',old('product_name_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group product_name_en -->
                                    <div class="form-group">
                                        {!! Form::label('price',trans('admin.price')) !!}
                                        {!! Form::text('price',old('price'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group price -->
                                     <div class="form-group">
                                        {!! Form::label('description_ar',trans('admin.description_ar')) !!}
                                        {!! Form::textarea('description_ar',old('description_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group description_ar -->
                                     <!----------------start  photo-->
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            {!! Form::label('photo',trans('admin.photo_products'),['class'=>'custom-file-label']) !!}
                                            {!! Form::file('photo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                        </div>
                                    </div>
                                    <div class="text-center"> <img   src="{{url('default')}}/product.png" class="img_100px"></div>
                                   <!----------------End photo-->
                                   <div class="form-group">
                                        {!! Form::label('price_offer',trans('admin.price_offer')) !!}
                                        {!! Form::text('price_offer',old('price_offer'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group price_offer -->
                                    <div class="form-group">
                                        {!! Form::label('add_by_ar',trans('admin.add_by_ar')) !!}
                                        {!! Form::text('add_by_ar',old('add_by_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group add_by_ar -->

                                   </div><!--col-md-6 content_form_ar-->
                                   <div class="d-none col-md-6 content_form_en" >
                                   <div class="form-group">
                                        {!! Form::label('product_name_en',trans('admin.product_name_en')) !!}
                                        {!! Form::text('product_name_en',old('product_name_en'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group product_name_en -->
                                   <div class="form-group">
                                        {!! Form::label('price_old',trans('admin.price_old')) !!}
                                        {!! Form::text('price_old',old('price_old'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group price_old -->

                                      <div class="form-group">
                                        {!! Form::label('description_en',trans('admin.description_en')) !!}
                                        {!! Form::textarea('description_en',old('description_en'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group description_en -->
                                   <!----------------start  add_by_photo-->
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            {!! Form::label('add_by_photo',trans('admin.add_by_photo_products'),['class'=>'custom-file-label']) !!}
                                            {!! Form::file('add_by_photo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                        </div>
                                    </div>
                                    <div class="text-center">  <img   src="{{url('default')}}/product.png" class="img_100px"></div>
                                  <!----------------End add_by_photo-->
                                   <div class="form-group">
                                        {!! Form::label('discount',trans('admin.discount')) !!}
                                        {!! Form::text('discount',old('discount'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group discount -->
                                    <div class="form-group">
                                        {!! Form::label('add_by_en',trans('admin.add_by_en')) !!}
                                        {!! Form::text('add_by_en',old('add_by_en'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group add_by_en -->
                                   </div><!--col-md-6 content_form_en-->
                                </div><!--row-->



   {{ Form::button('<i class="fa fa-location-arrow "> '
                                        . trans('admin.create_new_product').'
                                        </i> <i class="fas fa-cube"> </i> ' ,
                                        ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                    }}





                                    {!! Form::close() !!}









































                                </div><!-- box-body-->
                                <!-- /.----------------------------------------------------------------- -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@endsection