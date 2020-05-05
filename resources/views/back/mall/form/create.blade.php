
{{--        <!-- /.----------------------------------------------------------------- -->--}}
{{--        <div class="box-body">--}}
{{--             <div class="row">--}}
{{--                {{ Form::button('<i class="fa fa-location-arrow "> '--}}
{{--                    . trans('admin.create_new_manufact').'--}}
{{--                    </i> <i class="fas fa-cube"> </i> ' ,--}}
{{--                    ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )--}}
{{--                }}--}}
{{--                <div class="col-md-6 content_form_ar" >--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('name_ar',trans('admin.name_ar')) !!}--}}
{{--                        {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group name_ar -->--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('country_id',trans('admin.country_id')) !!}--}}
{{--                        {!! Form::select('country_id',App\Countreis::pluck('country_name_'.session('lang'),'id'),old('country_id'),['class'=>'form-control','placeholder'=>'........................']) !!}--}}
{{--                    </div><!-- /.form-group owner -->--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('mob',trans('admin.mob')) !!}--}}
{{--                        {!! Form::email('mob',old('mob'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group mob -->--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('facebook',trans('admin.facebook')) !!}--}}
{{--                        {!! Form::email('facebook',old('facebook'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group facebook -->--}}

{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('insta',trans('admin.insta')) !!}--}}
{{--                        {!! Form::email('insta',old('insta'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group insta -->--}}

{{--                </div><!--col-md-6 content_form_ar-->--}}
{{--                <div class="col-md-6 content_form_en" >--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('name_en',trans('admin.name_en')) !!}--}}
{{--                        {!! Form::text('name_en',old('name_en'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group name_en -->--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('code',trans('admin.code')) !!}--}}
{{--                        {!! Form::number('code',old('code'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group code -->--}}

{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('twitter',trans('admin.twitter')) !!}--}}
{{--                        {!! Form::text('twitter',old('twitter'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group twitter -->--}}

{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('email',trans('admin.email')) !!}--}}
{{--                        {!! Form::text('email',old('email'),['class'=>'form-control','class'=>'form-control' ]) !!}--}}
{{--                    </div><!-- /.form-group email -->--}}
{{--                    <div class="form-group">--}}
{{--                        {!! Form::label('contact_name',trans('admin.contact_name')) !!}--}}
{{--                        {!! Form::text('contact_name',old('contact_name'),['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.contact_name')]) !!}--}}
{{--                     </div><!-- /.form-group contact_name -->--}}
{{--                </div><!--col-md-6 content_form_en-->--}}

{{--                 <!----------------start logo-->--}}
{{--                 <div class="col-md-12">--}}
{{--                     <div class="input-group ">--}}
{{--                         <div class="custom-file">--}}
{{--                             {!! Form::label('logo',trans('admin.logo_mall'),['class'=>'custom-file-label']) !!}--}}
{{--                             {!! Form::file('logo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}--}}
{{--                         </div>--}}
{{--                     </div>--}}
{{--                     <div><img   src="{{url('')}}/default/mall.png" class="img_100px"></div>--}}
{{--                 </div><!-- col-md-12-->--}}
{{--                 <!----------------End logo-->--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                    {!! Form::label('address',trans('admin.address')) !!}--}}
{{--                    {!! Form::text('address',old('address'),['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.address')]) !!}--}}
{{--                    </div><!-- /.form-group contact_name -->--}}
{{--                </div><!---col-md-12-->--}}
{{--                 --}}{{----------------------------------------------------------------}}
{{--                 <div class="form-horizontal width_map" >--}}
{{--                     <div class="clearfix"></div><br>--}}
{{--                     <div id="us3" ></div>--}}
{{--                     <div class="clearfix">&nbsp;</div>--}}
{{--                     <input type="hidden" class="form-control" value="$lat" id="lat" name="lat"  />--}}
{{--                     <input type="hidden" class="form-control" value="$lng" id="lng" name="lng"  />--}}
{{--                     <div class="clearfix"></div>--}}
{{--                     <style>--}}
{{--                         .width_map{--}}
{{--                             width: 100%--}}
{{--                         }--}}
{{--                         #us3{--}}
{{--                             width: 100%; height: 400px;--}}
{{--                             /*             filter: invert(1);--}}
{{--                             filter: brightness(0.5); */--}}
{{--                             font-size: 100px!important;--}}
{{--                             filter: opacity(0.5);--}}
{{--                         }--}}
{{--                         /* #us3 img{--}}
{{--                              width: 500px!important;--}}
{{--                              height: 500px!important;--}}

{{--                          }--}}
{{--             */--}}
{{--                     </style>--}}

{{--                 </div>--}}
{{--                 --}}{{----------------------------------------------------------------}}

{{--             </div><!--row-->--}}
{{--            {{ Form::button('<i class="fa fa-location-arrow "> '--}}
{{--                                                 . trans('admin.create_new_manufact').'--}}
{{--                                                 </i> <i class="fas fa-cube"> </i> ' ,--}}
{{--                                                 ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )--}}
{{--                                             }}--}}
{{--        </div><!-- box-body-->--}}
{{--        <!-- /.----------------------------------------------------------------- -->--}}


