@extends('back.index')
@section('content')
    @push('js')
        <!-- Trigger the modal with a button -->
        <script type="text/javascript">
            $(document).ready(function(){

                $('#jstree').jstree({
                    "core" : {
                        'data' : {!! load_dep($flavor->department_id) !!},
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
                    "plugins" : [ "wholerow" ]//checkbox
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
                        @include('back.message')
                        <!-- /.card-header -->
                            <div class="card-body form_dark">
                                <!-- /.----------------------------------------------------------------- -->
                                <div class="box-body">
                                    {!! Form::open(['url'=>aurl('flavors/'.$flavor->id),'method'=>'put','files'=>true]) !!}
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
                                                        {!! Form::text('name_ar',$flavor->name_ar,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_ar -->
                                                     <div class="form-group">
                                                        {!! Form::label('color',trans('admin.color')) !!}
                                                        {!! Form::color('color',$flavor->color,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group color -->
                                                </div><!--col-md-6 content_form_ar-->
                                                <div class="col-md-6 content_form_en" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_en',trans('admin.name_en')) !!}
                                                        {!! Form::text('name_en',$flavor->name_en,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_en -->
                                                    <!----------------start  icon-->
                                                    <div class="input-group  icon_colo">
                                                        <div class="custom-file">
                                                            {!! Form::label('icon',trans('admin.icon'),['class'=>'custom-file-label']) !!}
                                                            {!! Form::file('icon',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                                        </div>
                                                    </div>
                                                    @if(!empty($flavor->icon))
                                                        <div> <img src="{{url('public/storage').Storage::url($flavor->icon)}}" class="img_100px "></div>
                                                    @else
                                                        <img src="{{url('')}}/default/flavor.png" class="img_120px">
                                                @endif
                                                <!----------------End icon-->
                                                </div><!--col-md-6 content_form_en-->
                                                    <div class="col-md-12" >

                                                        <div class="form-group">
                                                            {!! Form::label('dep',trans('admin.select_dep')) !!}
                                                            <input type="hidden" name="department_id" class="department_id" value="{{ $flavor->department_id }}">
                                                            <div id="jstree"></div>                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('is_public',trans('admin.is_public')) !!}
                                                            {!! Form::select('is_public',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],$flavor->is_public,['class'=>'form-control']) !!}
                                                        </div>
                                            </div><!--col-md-12 -->
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
