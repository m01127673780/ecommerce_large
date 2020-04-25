{{--<a href="{{ aurl('weights/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>--}}


 <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_weight{{ $id }}"><i class="fa fa-edit"></i></button>
<!-- Modal -->
<div id="edit_weight{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><apan class="btn btn-danger">&times;</apan></button>
                {{--                <h4 class="modal-title">{{ trans('admin.close') }}</h4>--}}
            </div>
            <div class="modal-body">
                <!-- /.----------------------------------------------------------------- -->
                 {!! Form::open(['route'=>['weights.update',$id],'method'=>'put','class'=>'form_save_in_modal','files'=>true]) !!}
                  <section class="all_fildes_modal_edit">
                             <!--start inputs  ---------------------------------------------- -->
                            <div class="box-body">
                                 <div class="row">
                                                <div class="col-md-6 content_form_ar" >
                                        <div class="form-group">
                                            {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                                            {!! Form::text('name_ar',$name_ar,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group name_ar -->
                                        <div class="form-group">
                                            {!! Form::label('color',trans('admin.color')) !!}
                                            {!! Form::color('color',$color,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group color -->


                                    </div><!--col-md-6 content_form_ar-->
                                    <div class="col-md-6 content_form_en" >
                                        <div class="form-group">
                                            {!! Form::label('name_en',trans('admin.name_en')) !!}
                                            {!! Form::text('name_en',$name_en,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group name_en -->
                                        <!----------------start  icon-->
                                        <div class="input-group icon_colo ">
                                            <div class="custom-file">
                                                {!! Form::label('icon',trans('admin.icon'),['class'=>'custom-file-label']) !!}
                                                {!! Form::file('icon',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                            </div>
                                        </div>
                                        @if(!empty($icon))
                                            <div> <img src="{{url('public/storage').Storage::url($icon)}}" class="img_100px "></div>
                                        @else
                                            <img src="{{url('')}}/default/weight.png" class="img_120px">
                                    @endif
                                    <!----------------End icon-->
                                </div><!--row-->
                            </div><!-- box-body-->
                            <!-- /.----------------------------------------------------------------- -->
                                            <!--End   inputs  ---------------------------------------------- -->
                                         </section>
                        <!----------------End icon-->
                        <!-- /.---------- -->
                   {{ Form::button('<i class="fa fa-location-arrow ">'
                    . trans('admin.save').'
                     </i> <i class="fa fa-flag-usa"> </i> ' ,
                    ['type' => 'submit', 'class' => '  btn btn-info form-control m_b_10     '] )
                    }}
                   {!! Form::close() !!}
                <!-- /.---------- -->
             		  <a href="{{ aurl('weights/'.$id.'/edit') }}" class="btn btn-success  "><i class="fa fa-edit"></i> {{trans('admin.edit_page')}}</a>
                       <span>
                         {!! Form::open(['route'=>['weights.destroy',$id],'method'=>'delete' ,'class'=>'d-inline-block']) !!}
                         {{  Form::button(' <i class="fa fa-trash">  </i>'.trans('admin.delete_fast').'<img src="'.asset('/default/alert.gif').'" class="w_h_20px">', ['type' => 'submit', 'class' => 'btn btn-danger   btn_alert_delete_htis  '] )  }}
                         {!! Form::close() !!}
                       </span>
					<button type="button" class="btn btn-warning" data-dismiss="modal">{{ trans('admin.close') }}  <i class="fas fa-times"> </i></button>
               <!-- /.----------------------------------------------------------------- -->
            </div>
        </div>
    </div>
</div>
