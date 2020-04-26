


        <!-- /.----------------------------------------------------------------- -->
        <div class="box-body">
             <div class="row">
                {{ Form::button('<i class="fa fa-location-arrow "> '
                    . trans('admin.create_new_size').'
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
                  <input type="hidden" name="department_id" class="department_id" value="{{ old('department_id') }}">
                      <div class="form-group">
                          {!! Form::label('department_id',trans('admin.department_id')) !!}
                          {!! Form::select('department_id',App\Model\Department::pluck('dep_name_'.session('lang'),'id'),old('department_id'),['class'=>'form-control','placeholder'=>'........................']) !!}
                      </div><!-- /.form-group owner -->
                  <div class="form-group">
                     {!! Form::label('is_public',trans('admin.is_public')) !!}
                     {!! Form::select('is_public',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],old('is_public'),['class'=>'form-control']) !!}
                 </div>
                </div><!--col-md-12 -->

            </div><!--row-->
            {{ Form::button('<i class="fa fa-location-arrow "> '
                                                 . trans('admin.create_new_size').'
                                                 </i> <i class="fas fa-cube"> </i> ' ,
                                                 ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                             }}
        </div><!-- box-body-->
        <!-- /.----------------------------------------------------------------- -->


