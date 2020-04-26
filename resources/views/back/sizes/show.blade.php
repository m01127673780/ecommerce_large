@extends('back.index')
@section('content')
    @push('js')
        <!-- Trigger the modal with a button -->
        <script type="text/javascript">
            $(document).ready(function(){

                $('#jstree').jstree({
                    "core" : {
                        'data' : {!! load_dep($size->department_id) !!},
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
                                    {!! Form::open(['url'=>aurl('sizes/'.$size->id),'method'=>'put','files'=>true]) !!}


                                    <section class="all_fildes_page_edit">
                                        <!--start inputs  ---------------------------------------------- -->
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6 content_form_ar" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                                                        {!! Form::text('name_ar',$size->name_ar,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_ar -->
                                                     <div class="form-group">
                                                        {!! Form::label('color',trans('admin.color')) !!}
                                                        {!! Form::color('color',$size->color,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group color -->
                                                </div><!--col-md-6 content_form_ar-->
                                                <div class="col-md-6 content_form_en" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_en',trans('admin.name_en')) !!}
                                                        {!! Form::text('name_en',$size->name_en,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_en -->
                                                    <!----------------start  icon-->
                                                    <div class="input-group  icon_colo">
                                                        <div class="custom-file">
                                                            {!! Form::label('icon',trans('admin.icon'),['class'=>'custom-file-label']) !!}
                                                            {!! Form::file('icon',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                                        </div>
                                                    </div>
                                                    @if(!empty($size->icon))
                                                        <div> <img src="{{url('public/storage').Storage::url($size->icon)}}" class="img_100px "></div>
                                                    @else
                                                        <img src="{{url('')}}/default/size.png" class="img_120px">
                                                @endif
                                                <!----------------End icon-->
                                                </div><!--col-md-6 content_form_en-->
                                                    <div class="col-md-12" >

                                                        <div class="form-group">
                                                            {!! Form::label('dep',trans('admin.select_dep')) !!}
                                                            <input type="hidden" name="department_id" class="department_id" value="{{ $size->department_id }}">
                                                            <div id="jstree"></div>                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('is_public',trans('admin.is_public')) !!}
                                                            {!! Form::select('is_public',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],$size->is_public,['class'=>'form-control']) !!}
                                                        </div>
                                            </div><!--col-md-12 -->
                                            </div><!--row-->
                                        </div><!-- box-body-->
                                        <!-- /.----------------------------------------------------------------- -->
                                        <!--End   inputs  ---------------------------------------------- -->

                                    </section>
                                    <!----------------buttons -->
                                    <aside class="row model_actions">

                                        <div class="col-md-12 content_btn-actions_model">
                                            <!-- /.---------- -->
                                            <a href="{{ aurl('sizes/'.$size->id.'/edit') }}" class="btn btn-success "><i class="fa fa-edit"></i> {{trans('admin.edit_page')}}</a>
                                            <span>
                         {!! Form::open(['route'=>['sizes.destroy',$size->id],'method'=>'delete' ,'class'=>'d-inline-block']) !!}
                                                {{  Form::button(' <i class="fa fa-trash">  </i>'.trans('admin.delete_fast').'<img src="'.asset('/default/alert.gif').'" class="w_h_20px">', ['type' => 'submit', 'class' => 'btn btn-danger   btn_alert_delete_htis  '] )  }}
                                                {!! Form::close() !!}
                       </span>

                                            <button type="button" class="btn btn-warning" data-dismiss="modal">{{ trans('admin.close') }}  <i class="fas fa-times"> </i></button>
                                            <!-- /.----------------------------------------------------------------- -->
                                        </div><!--col-md-12-->

                                    </aside><!--model_actions row-->
                                    <!-- /.---------- -->
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
