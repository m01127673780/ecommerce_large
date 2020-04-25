@extends('back.index')
@section('content')
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
                        @include('back.message')
                        <!-- /.card-header -->
                            <div class="card-body form_dark">
                                <!-- /.----------------------------------------------------------------- -->
                                <div class="box-body">
                                    {!! Form::open(['url'=>aurl('weights/'.$weight->id),'method'=>'put','files'=>true]) !!}
                                    {{ Form::button('<i class="fa fa-location-arrow ">'
                                    . trans('admin.save').'
                                    </i> <i class="fa fa-flag-usa"> </i> ' ,
                                    ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                    }}

                                    <section class="all_fildes_page_edit">
                                        <!--start inputs  ---------------------------------------------- -->
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6 content_form_ar" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                                                        {!! Form::text('name_ar',$weight->name_ar,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_ar -->
                                                     <div class="form-group">
                                                        {!! Form::label('color',trans('admin.color')) !!}
                                                        {!! Form::color('color',$weight->color,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group color -->
                                                </div><!--col-md-6 content_form_ar-->
                                                <div class="col-md-6 content_form_en" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_en',trans('admin.name_en')) !!}
                                                        {!! Form::text('name_en',$weight->name_en,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_en -->
                                                    <!----------------start  icon-->
                                                    <div class="input-group  icon_colo">
                                                        <div class="custom-file">
                                                            {!! Form::label('icon',trans('admin.icon'),['class'=>'custom-file-label']) !!}
                                                            {!! Form::file('icon',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                                        </div>
                                                    </div>
                                                    @if(!empty($weight->icon))
                                                        <div> <img src="{{url('public/storage').Storage::url($weight->icon)}}" class="img_100px "></div>
                                                    @else
                                                        <img src="{{url('')}}/default/weight.png" class="img_120px">
                                                @endif
                                                <!----------------End icon-->
                                                </div><!--col-md-6 content_form_en-->



                                            </div><!--row-->
                                        </div><!-- box-body-->
                                        <!-- /.----------------------------------------------------------------- -->
                                        <!--End   inputs  ---------------------------------------------- -->

                                    </section>
                     {{ Form::button('<i class="fa fa-location-arrow ">'
                                    . trans('admin.save').'
                                    </i> <i class="fa fa-flag-usa"> </i> ' ,
                                    ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                    }}
                                    {!! Form::close() !!}
                                </div><!-- box-body-->
                                <!-- /.----------------------------------------------------------------- -->
                            </div> <!-- /.card-body -->
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
