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
                                <section class="page_create_message">@include('back.message')</section>
                        <!-- /.card-header -->
                            <div class="card-body form_dark">
                                <!-- /.----------------------------------------------------------------- -->
                                <div class="box-body">
                                    {!! Form::open(['url'=>aurl('mall'),'files'=>true]) !!}
                                    start form
                                    <section class="form_page_create">

                                        <!-- /.----------------------------------------------------------------- -->
                                        <div class="box-body">
                                            <div class="row">
                                                {{ Form::button('<i class="fa fa-location-arrow "> '
                                                    . trans('admin.create_new_manufact').'
                                                    </i> <i class="fas fa-cube"> </i> ' ,
                                                    ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                                }}
                                                <div class="col-md-6 content_form_ar" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                                                        {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group name_ar -->
                                                    <div class="form-group">
                                                        {!! Form::label('country_id',trans('admin.country_id')) !!}
                                                        {!! Form::select('country_id',App\Countreis::pluck('country_name_'.session('lang'),'id'),old('country_id'),['class'=>'form-control','placeholder'=>'........................']) !!}
                                                    </div><!-- /.form-group owner -->
                                                    <div class="form-group">
                                                        {!! Form::label('mob',trans('admin.mob')) !!}
                                                        {!! Form::email('mob',old('mob'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group mob -->
                                                    <div class="form-group">
                                                        {!! Form::label('facebook',trans('admin.facebook')) !!}
                                                        {!! Form::email('facebook',old('facebook'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group facebook -->

                                                    <div class="form-group">
                                                        {!! Form::label('insta',trans('admin.insta')) !!}
                                                        {!! Form::email('insta',old('insta'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group insta -->

                                                </div><!--col-md-6 content_form_ar-->
                                                <div class="col-md-6 content_form_en" >
                                                    <div class="form-group">
                                                        {!! Form::label('name_en',trans('admin.name_en')) !!}
                                                        {!! Form::text('name_en',old('name_en'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group name_en -->
                                                    <div class="form-group">
                                                        {!! Form::label('code',trans('admin.code')) !!}
                                                        {!! Form::number('code',old('code'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group code -->

                                                    <div class="form-group">
                                                        {!! Form::label('twitter',trans('admin.twitter')) !!}
                                                        {!! Form::text('twitter',old('twitter'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group twitter -->

                                                    <div class="form-group">
                                                        {!! Form::label('email',trans('admin.email')) !!}
                                                        {!! Form::text('email',old('email'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                                    </div><!-- /.form-group email -->
                                                    <div class="form-group">
                                                        {!! Form::label('contact_name',trans('admin.contact_name')) !!}
                                                        {!! Form::text('contact_name',old('contact_name'),['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.contact_name')]) !!}
                                                    </div><!-- /.form-group contact_name -->
                                                </div><!--col-md-6 content_form_en-->

                                                <!----------------start logo-->
                                                <div class="col-md-12">
                                                    <div class="input-group ">
                                                        <div class="custom-file">
                                                            {!! Form::label('logo',trans('admin.logo_mall'),['class'=>'custom-file-label']) !!}
                                                            {!! Form::file('logo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                                        </div>
                                                    </div>
                                                    <div><img   src="{{url('')}}/default/mall.png" class="img_100px"></div>
                                                </div><!-- col-md-12-->
                                                <!----------------End logo-->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {!! Form::label('address',trans('admin.address')) !!}
                                                        {!! Form::text('address',old('address'),['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
                                                    </div><!-- /.form-group contact_name -->
                                                </div><!---col-md-12-->
                                                {{----------------------------------------------------------------}}
                                                <div class="form-horizontal width_map" >
                                                    <div class="clearfix"></div><br>
                                                    <div id="us3" ></div>
                                                    <div class="clearfix">&nbsp;</div>
                                                    <input type="hidden" class="form-control" value="$lat" id="lat" name="lat"  />
                                                    <input type="hidden" class="form-control" value="$lng" id="lng" name="lng"  />
                                                    <div class="clearfix"></div>
                                                    <style>
                                                        .width_map{
                                                            width: 100%
                                                        }
                                                        #us3{
                                                            width: 100%; height: 400px;
                                                            /*             filter: invert(1);
                                                            filter: brightness(0.5); */
                                                            font-size: 100px!important;
                                                            filter: opacity(0.5);
                                                        }
                                                        /* #us3 img{
                                                             width: 500px!important;
                                                             height: 500px!important;

                                                         }
                                            */
                                                    </style>
                                                    @push('js')
                                                        <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyDIJ9XX2ZvRKCJcFRrl-lRanEtFUow4piM'></script>
                                                        <script type="text/javascript">
                                                            (() => {
                                                                "use strict";

                                                                const hackSetter = (value) => () => {
                                                                    window.name = value;
                                                                    history.go(0)
                                                                };

                                                                const startBtn = document.querySelector('.start-hack');
                                                                const stopBtn = document.querySelector('.stop-hack');

                                                                if(startBtn != null){
                                                                    startBtn.addEventListener('click', hackSetter(), false);
                                                                    stopBtn.addEventListener('click', hackSetter('nothacked'), false);

                                                                    if (name === 'nothacked') {
                                                                        stopBtn.disabled = true;
                                                                        return;
                                                                    }

                                                                    startBtn.disabled = true;

                                                                }

                                                                // Store old reference
                                                                const appendChild = Element.prototype.appendChild;

                                                                // All services to catch
                                                                const urlCatchers = [
                                                                    "/AuthenticationService.Authenticate?",
                                                                    "/QuotaService.RecordEvent?"
                                                                ];

                                                                // Google Map is using JSONP.
                                                                // So we only need to detect the services removing access and disabling them by not
                                                                // inserting them inside the DOM
                                                                Element.prototype.appendChild = function (element) {
                                                                    const isGMapScript = element.tagName === 'SCRIPT' && /maps\.googleapis\.com/i.test(element.src);
                                                                    const isGMapAccessScript = isGMapScript && urlCatchers.some(url => element.src.includes(url));

                                                                    if (!isGMapAccessScript) {
                                                                        return appendChild.call(this, element);
                                                                    }

                                                                    return element;
                                                                };
                                                            })();
                                                        </script>
                                                        <script type="text/javascript" src='{{ url('design/adminlte/dist/js/locationpicker.jquery.js') }}'></script>
                                                        <?php
                                                        $lat = !empty(old('lat'))?old('lat'):'30.034024628931657';
                                                        $lng = !empty(old('lng'))?old('lng'):'31.24238681793213';

                                                        ?>
                                                        <script>
                                                            $('#us3').locationpicker({
                                                                location: {
                                                                    latitude: {{ $lat }},
                                                                    longitude:{{ $lng }}
                                                                },
                                                                radius: 0,
                                                                markerIcon: '{{url('')}}/default/marker.png',
                                                                inputBinding: {
                                                                    latitudeInput: $('#lat'),
                                                                    longitudeInput: $('#lng'),
                                                                    radiusInput: $('#us2-radius'),
                                                                    locationNameInput: $('#address')
                                                                },
                                                                enableAutocomplete : true
                                                            });
                                                        </script>
                                                    @endpush

                                                </div>
                                                {{----------------------------------------------------------------}}

                                            </div><!--row-->
                                            {{ Form::button('<i class="fa fa-location-arrow "> '
                                                                                 . trans('admin.create_new_manufact').'
                                                                                 </i> <i class="fas fa-cube"> </i> ' ,
                                                                                 ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                                                             }}
                                        </div><!-- box-body-->
                                        <!-- /.----------------------------------------------------------------- -->



                                    </section>
                                    End form


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