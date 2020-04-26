@extends('back.index')
@section('content')

    @push('js')
        <!-- Trigger the modal with a button -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#jstree').jstree({
                    "core" : {
                        'data' : {!! load_dep(old('department_id')) !!},
                        "themes": {
                            "name": "default-dark",
                            "dots": false,
                            "variant": "large",
                            "icons": false,
                            "multiple" : false,
                            "animation" : 1000,
                        }
                    },
                    "checkbox" : {
                        "keep_selected_style" : true
                    },
                    "plugins" : [  "wholerow","radio","/*checkbox*/" ]
                });

            });

            $('#jstree').on('changed.jstree',function(e,data){
                var i , j , r = [];
                var  name = [];
                for(i=0,j = data.selected.length;i < j;i++)
                {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }

                if(r.join(', ') != '')
                {
                    $('.department_id').val(r.join(','));

                }
            });

        </script>
    @endpush
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
                                    {!! Form::open(['url'=>aurl('flavors'),'files'=>true]) !!}

                                    {{--start form --}}
                                    <section class="form_page_create">


                                        <!-- /.----------------------------------------------------------------- -->
                                        <div class="box-body">
                                            <div class="row">
                                                {{ Form::button('<i class="fa fa-location-arrow "> '
                                                    . trans('admin.create_new_flavor').'
                                                    </i> <i class="fas fa-cube"> </i> ' ,
                                                    ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                                }}
                                                <div class="col-md-6 content_form_ar" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                                                        {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group owner -->

                                                    <div class="form-group">
                                                        {!! Form::label('color',trans('admin.color')) !!}
                                                        {!! Form::color('color',old('color'),['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group color -->
                                                    <!----------------start  icon-->

                                                </div><!--col-md-6 content_form_ar-->

                                                <div class="col-md-6 content_form_en" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_en',trans('admin.name_en')) !!}
                                                        {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_en -->
                                                    <!----------------start icon-->
                                                    <div class="input-group icon_colo ">
                                                        <div class="custom-file">
                                                            {!! Form::label('icon',trans('admin.icon_color'),['class'=>'custom-file-label']) !!}
                                                            {!! Form::file('icon',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                                        </div>
                                                    </div>
                                                    <div><img   src="{{url('')}}/default/color.png" class="img_100px"></div>
                                                    <!----------------End icon-->

                                                </div><!--col-md-6 content_form_en-->
                                                <div class="col-md-12">

                                                    <!--  start js tree ----------------------------------- -->
                                                    <div class="clearfix"></div>
                                                    <input type="hidden" name="department_id" class="department_id" value="{{ old('department_id') }}">
                                                    {!! Form::label('select_dep',trans('admin.select_dep')) !!}
                                                    <div id="jstree"></div>                                                    <div class="form-group">
                                                        <div class="clearfix"></div>
                                                    </div><!-- /.form-group select_dep -->
                                                    <!--  start js tree ----------------------------------- -->
                                                    <div class="form-group">
                                                        {!! Form::label('is_public',trans('admin.is_public_flavor')) !!}
                                                        {!! Form::select('is_public',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],old('is_public'),['class'=>'form-control']) !!}
                                                    </div>
                                                </div><!--col-md-12 -->

                                            </div><!--row-->
                                            {{ Form::button('<i class="fa fa-location-arrow "> '
                                                                                 . trans('admin.create_new_flavor').'
                                                                                 </i> <i class="fas fa-cube"> </i> ' ,
                                                                                 ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                                                             }}
                                        </div><!-- box-body-->
                                        <!-- /.----------------------------------------------------------------- -->



                                    </section>
                                    {{--End form --}}
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