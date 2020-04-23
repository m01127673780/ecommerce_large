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
                                    {!! Form::open(['url'=>aurl('manufacts/'.$manufacts->id),'method'=>'put','files'=>true]) !!}
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
                                                        {!! Form::text('name_ar',$manufacts->name_ar,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_ar -->
                                                    <div class="form-group">
                                                        {!! Form::label('mob',trans('admin.mob')) !!}
                                                        {!! Form::email('mob',$manufacts->mob,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group mob -->
                                                    <div class="form-group">
                                                        {!! Form::label('facebook',trans('admin.facebook')) !!}
                                                        {!! Form::email('facebook',$manufacts->facebook,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group facebook -->

                                                    <div class="form-group">
                                                        {!! Form::label('insta',trans('admin.insta')) !!}
                                                        {!! Form::email('insta',$manufacts->insta,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group insta -->
                                                    <!----------------start  logo-->
                                                    <div class="input-group ">
                                                        <div class="custom-file">
                                                            {!! Form::label('logo',trans('admin.logo'),['class'=>'custom-file-label']) !!}
                                                            {!! Form::file('logo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                                        </div>
                                                    </div>
                                                    @if(!empty($manufacts->logo))
                                                        <div> <img src="{{url('public/storage').Storage::url($manufacts->logo)}}" class="img_100px "></div>
                                                    @else
                                                        <img src="{{url('')}}/default/manufacts.png" class="img_120px">
                                                @endif
                                                <!----------------End logo-->
                                                </div><!--col-md-6 content_form_ar-->
                                                <div class="col-md-6 content_form_en" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_en',trans('admin.name_en')) !!}
                                                        {!! Form::text('name_en',$manufacts->name_en,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group name_en -->
                                                    <div class="form-group">
                                                        {!! Form::label('code',trans('admin.code')) !!}
                                                        {!! Form::number('code',$manufacts->code,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group code -->

                                                    <div class="form-group">
                                                        {!! Form::label('twitter',trans('admin.twitter')) !!}
                                                        {!! Form::text('twitter',$manufacts->twitter,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group twitter -->

                                                    <div class="form-group">
                                                        {!! Form::label('email',trans('admin.email')) !!}
                                                        {!! Form::text('email',$manufacts->email,['class'=>'form-control']) !!}
                                                    </div><!-- /.form-group email -->
                                                    <div class="form-group">
                                                        {!! Form::text('contact_name',$manufacts->contact_name,['class'=>'form-control','disabled','placeholder'=>trans('admin.contact_name')]) !!}
                                                    </div><!-- /.form-group contact_name -->
                                                </div><!--col-md-6 content_form_en-->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {!! Form::label('address',trans('admin.address')) !!}
                                                        {!! Form::textarea('address',$manufacts->address,['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
                                                    </div><!-- /.form-group contact_name -->
                                                </div>
                                            </div><!--row-->
                                        </div><!-- box-body-->
                                        <!-- /.----------------------------------------------------------------- -->
                                        <!--End   inputs  ---------------------------------------------- -->

                                    </section>
                                    {{----------------------------------------------------------------}}
                                    <div class="form-horizontal" style="width: 100%">
                                        <div class="clearfix"></div><br>

                                        {{--                           <aside class="d-none">--}}
                                        {{--                               <div class="form-group">--}}
                                        {{--                                   <label class="col-sm-2 control-label">Location:</label>--}}

                                        {{--                                   <div class="col-sm-10">--}}
                                        {{--                                       <input type="text" class="form-control" id="us3-address" />--}}
                                        {{--                                   </div>--}}
                                        {{--                               </div>--}}
                                        {{--                               <div class="form-group">--}}
                                        {{--                                   <label class="col-sm-2 control-label">Radius:</label>--}}

                                        {{--                                   <div class="col-sm-5">--}}
                                        {{--                                       <input type="text" class="form-control" id="us3-radius" />--}}
                                        {{--                                   </div>--}}
                                        {{--                               </div>--}}
                                        {{--                           </aside>--}}
                                        <div id="us3" style="width: 100%; height: 400px;"></div>
                                        <div class="clearfix">&nbsp;</div>

                                        <div class="clearfix"></div>
                                        @push('js')

                                            <script>
                                                $('#us3').locationpicker({
                                                    location: {
                                                        latitude: 46.15242437752303,
                                                        longitude: 2.7470703125
                                                    },
                                                    radius: 300,
                                                    inputBinding: {
                                                        latitudeInput: $('#lat'),
                                                        longitudeInput: $('#lng'),
                                                        // radiusInput: $('#us3-radius'),
                                                        // locationNameInput: $('#us3-address')
                                                    },
                                                    enableAutocomplete: true,
                                                    onchanged: function (currentLocation, radius, isMarkerDropped) {
                                                        // Uncomment line below to show alert on each Location Changed event
                                                        //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                                                    }
                                                });
                                            </script>

                                        @endpush
                                    </div>
                                    {{----------------------------------------------------------------}}
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
