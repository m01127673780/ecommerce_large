
<!--  
            'lat'                     =>'sometimes|nullable',
            'lng'                     =>'sometimes|nullable',
  -->
        <!-- /.----------------------------------------------------------------- -->
        <div class="box-body">
             <div class="row">
                {{ Form::button('<i class="fa fa-location-arrow "> '
                    . trans('admin.create_new_product').'
                    </i> <i class="fas fa-cube"> </i> ' ,
                    ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                }}
                <div class="col-md-6 content_form_ar" >
                    <div class="form-group">
                        {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                        {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group owner -->
                    <div class="form-group">
                        {!! Form::label('user_id',trans('admin.owner')) !!}
                        {!! Form::select('user_id',App\User::where('level','company')->pluck('name','id'),old('user_id'),['class'=>'form-control','placeholder'=>'........................']) !!}
                    </div><!-- /.form-group owner -->
                    <div class="form-group">
                        {!! Form::label('mob',trans('admin.mob')) !!}
                        {!! Form::text('mob',old('mob'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group mob -->
                    <div class="form-group">
                        {!! Form::label('facebook',trans('admin.facebook')) !!}
                        {!! Form::email('facebook',old('facebook'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group facebook -->

                    <div class="form-group">
                        {!! Form::label('insta',trans('admin.insta')) !!}
                        {!! Form::email('insta',old('insta'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group insta -->
                        <!----------------start  logo-->

                </div><!--col-md-6 content_form_ar-->

                <div class="col-md-6 content_form_en" >
                    <div class="form-group">
                        {!! Form::label('name_en',trans('admin.name_en')) !!}
                        {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group name_en -->
                    <div class="form-group">
                        {!! Form::label('contact_name',trans('admin.contact_name')) !!}
                        {!! Form::text('contact_name',old('contact_name'),['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.contact_name')]) !!}
                    </div><!-- /.form-group contact_name -->
                    <div class="form-group">
                        {!! Form::label('code',trans('admin.code')) !!}
                        {!! Form::number('code',old('code'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group code -->

                    <div class="form-group">
                        {!! Form::label('twitter',trans('admin.twitter')) !!}
                        {!! Form::text('twitter',old('twitter'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group twitter -->
            
                    <div class="form-group">
                        {!! Form::label('email',trans('admin.email')) !!}
                        {!! Form::text('email',old('email'),['class'=>'form-control']) !!}
                    </div><!-- /.form-group email -->

                </div><!--col-md-6 content_form_en-->
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('address',trans('admin.address')) !!}
                        {!! Form::textarea('address',old('address'),['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
                    </div><!-- /.form-group contact_name -->
                </div>
                 <div class="col-md-12">

                     <div class="input-group ">
                         <div class="custom-file">
                             {!! Form::label('logo',trans('admin.logo_shipping'),['class'=>'custom-file-label']) !!}
                             {!! Form::file('logo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                         </div>
                     </div>
                     <div>
                         <img   src="{{url('')}}/default/manufacts.png" class="img_100px"></div>
                 </div>
                 <!----------------End logo-->
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
            </div><!--row-->
            {{ Form::button('<i class="fa fa-location-arrow "> '
                                                 . trans('admin.create_new_product').'
                                                 </i> <i class="fas fa-cube"> </i> ' ,
                                                 ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                             }}
        </div><!-- box-body-->
        <!-- /.----------------------------------------------------------------- -->


