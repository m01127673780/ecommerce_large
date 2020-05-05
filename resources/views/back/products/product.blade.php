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
                                            <aside class="content_buttons_save_continue_copy ">@include('back.products.btn.buttons_save_continue_copy')</aside><br> <br>

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












 

                                    <!-- Modal -->
                                    <div class="modal fade" id="del_products{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.delete')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                {!! Form::open(['route'=>['products.destroy',$products->id],'method'=>'delete']) !!}
                                                <div class="modal-body">
                                                    <p> {{trans('admin.delete_this',['name'=>session('lang')== 'ar'?$products->product_name_ar:$products->product_name_en])}}</p>
                                                    @if(empty($products->photo))
                                                        <img src="{{url('')}}/default/product.png" class="img_120px">
                                                    @endif
                                                    @if(!empty($products->photo))
                                                        <div> <img src="{{url('public/storage').Storage::url($products->photo)}}" class="img_100px  "></div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('admin.close')}}</button>
                                                    {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-primary']) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>




























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