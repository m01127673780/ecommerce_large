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
                                    {!! Form::open(['url'=>aurl('sizes'),'files'=>true]) !!}

                                    {{--start form --}}
                                    <section class="form_page_create">@include('back.sizes.form.create')</section>

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