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
                        url:'{{aurl('products/'.$products->id)}}',
                        dataType:'json',
                        type:'post',
                        data:form_data,
                        beforeSend:function () {
                            $('.loading_save_c').removeClass('hidden');
                            $('.validate_message').html('');
                            $('.erorr_message').addClass('hidden');
                            $('.success_message').addClass('hidden');

                        },success:function (data) {
                            if(data.status == true)
                            {
                                $('.loading_save_c').addClass('hidden');
                                $('.success_message').html('<div>'+data.message+'</div>').removeClass('hidden');
                            }
                        },error(response){
                            $('.loading_save_c').addClass('hidden');
                            var error_li ='';
                            $.each(response.responseJSON.errors,function(index,value){
                                error_li +='  <li class=""> <img class="w_18px_h_18px "src="{{url('default')}}/d_like6.png" > '+value+'</li>';
                            });
                            $('.validate_message').html(error_li);
                            $('.erorr_message').removeClass('hidden');
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
                                    {!! Form::open(['url'=>aurl('products'),'method'=>'put','files'=>true,'id'=>'product_form']) !!}
                                    <div class="row ">
                                        <!--container-->
                                        <div class="col-md-12" >
                                            <h4>{{$title}}</h4> <br>
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
                                                {{--                                               <div class="alert btn-success hidden  alert_success success_message message "> --}}
                                                {{--                                                   <img class="w_22px_h_22px "src="{{url('default')}}/like7.png" >--}}
                                                {{--                                                   .... <img class="w_25px_h_25px m_b_6px"src="{{url('default')}}/clap.png" >--}}
                                                {{--                                               </div>--}}
                                                <div  class="alert btn-success hidden    success_message"  ></div>
                                                <hr>

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