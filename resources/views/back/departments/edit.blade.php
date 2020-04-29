@extends('back.index')
@section('content')
    @push('js')
        <script>
            $(document).ready(function () {
                $('#jstree').jstree({
                    'core' : {
                        'data' : {!! load_dep($department->parent,$department->id) !!},
                        "themes": {
                            "name": "default-dark",
                            "dots": true,
                            "variant": "large",
                            "icons": true,
                            "multiple" : true,
                            "animation" : 1000,
                        }
                    },
                    "checkbox" : {
                        "keep_selected_style" : false
                    },
                    "plugins" : [  "wholerow","radio","/*checkbox*/" ]
                });//#jstree
            });//document

            //-----------------------get id
            $('#jstree').on('changed.jstree',function(e,data){
                var  i , j , r =[];//=  var  i[]; var  j[];var  r[];
                for(i=0,j = data.selected.length;i < j;i++ )
                {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }//for
                $('.parent_id').val(r.join(','));
                //1,2,3,4,5,6
            });/*changed*/

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
                                    {!! Form::open(['url'=>aurl('departments/'.$department->id),'method'=>'put','files'=>true]) !!}
                                    <div class="form-group">
                                        {!! Form::label('dep_name_ar',trans('admin.dep_name_ar')) !!}
                                        {!! Form::text('dep_name_ar',$department->dep_name_ar,['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group dep_name_ar -->
                                    <div class="form-group">
                                        {!! Form::label('dep_name_en',trans('admin.dep_name_en')) !!}
                                        {!! Form::text('dep_name_en',$department->dep_name_en,['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group dep_name_en -->
                                    <!--  start js tree ----------------------------------- -->
                                    <div class="clearfix"></div>
                                    <div id="jstree"></div>
                                    <input type="hidden" name="parent" class="parent_id" value="{{$department->parent}}">
                                    <div class="clearfix"></div>
                                    <!--  start js tree ----------------------------------- -->
                                    <div class="form-group">
                                        {!! Form::label('description_ar',trans('admin.description_ar')) !!}
                                        {!! Form::textarea('description_ar',$department->description_ar,['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group description_ar -->
                                    <div class="form-group">
                                        {!! Form::label('description_en',trans('admin.description_en')) !!}
                                        {!! Form::textarea('description_en',$department->description_en,['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group description_en -->
                                    <div class="form-group">
                                        {!! Form::label('keyword_ar',trans('admin.keyword_ar')) !!}
                                        {!! Form::textarea('keyword_ar',$department->keyword_ar,['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group keyword_ar -->
                                    <div class="form-group">
                                        {!! Form::label('keyword_en',trans('admin.keyword_en')) !!}
                                        {!! Form::textarea('keyword_en',$department->keyword_en,['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group keyword_en -->

                                    <!----------------start  icon-->
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            {!! Form::label('icon',trans('admin.icon_departments'),['class'=>'custom-file-label']) !!}
                                            {!! Form::file('icon',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                        </div>
                                    </div>
                                    <div>
                                        @if(!empty($department->icon))
                                        <div class="text-center"> <img src="{{url('public/storage').Storage::url($department->icon)}}" class="img_100px  "></div>
                                        @else
                                        <div class="text-center">  <img   src="{{url('default')}}/deo.png" class="img_100px"></div>
                                        @endif

                                          </div>

                                    <!----------------End icon-->
                                    {{ Form::button('<i class="fa fa-location-arrow ">'
                                        . trans('admin.save').'
                                        </i> <i class="fas fa-th"> </i> ' ,
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