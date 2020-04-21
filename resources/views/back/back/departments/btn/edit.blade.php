



{{--<a href="{{ aurl('departments/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>--}}
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_departments{{ $id }}"><i class="fa fa-edit"></i></button>
<!-- Modal -->
<div id="edit_departments{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><apan class="btn btn-danger">&times;</apan></button>
                {{--                <h4 class="modal-title">{{ trans('admin.close') }}</h4>--}}
            </div>
             <div class="modal-body">
                      <!-- /.----------------------------------------------------------------- -->
                {!! Form::open(['route'=>['departments.update',$id],'method'=>'put','class'=>'form_save_in_modal','files'=>true]) !!} 
                <div class="row">
                <div class="col-md-6 content_form_ar" >
                <div class="form-group">
                    {!! Form::label('name',trans('admin.dep_name_ar')) !!}
                    {!! Form::text('dep_name_ar',$dep_name_ar,['class'=>'form-control','class'=>'form-control']) !!}
                </div><!-- /.form-group name -->
                 <div class="form-group">
                    {!! Form::label('name',trans('admin.description_ar')) !!}
                    {!! Form::textarea('description_ar',$description_ar,['class'=>'form-control','class'=>'form-control']) !!}
                </div><!-- /.form-group name -->
                <div class="form-group">
                    {!! Form::label('name',trans('admin.keyword_ar')) !!}
                    {!! Form::textarea('keyword_ar',$keyword_ar,['class'=>'form-control','class'=>'form-control']) !!}
                </div><!-- /.form-group keyword_ar -->
                <!--  start js tree ----------------------------------- -->
                <div class="clearfix"></div>
                <div id="jstree"></div>
                <input type="hidden" name="parent" class="parent_id" value="{{$parent}}">
                <div class="clearfix"></div>
                <!--  start js tree nfo -->
                </div><!--col-md-6 content_form_ar-->
                <div class="col-md-6 content_form_en" >
                   <div class="form-group">
                    {!! Form::label('dep_name_en',trans('admin.dep_name_en')) !!}
                    {!! Form::text('dep_name_en',$dep_name_en,['class'=>'form-control' ]) !!}
                </div><!-- /.form-group dep_name_en -->
                <div class="form-group">
                    {!! Form::label('description_en',trans('admin.description_en')) !!}
                    {!! Form::textarea('description_en',$description_en,['class'=>'form-control' ]) !!}
                </div><!-- /.form-group description_en -->
                <div class="form-group">
                    {!! Form::label('keyword_en',trans('admin.keyword_en')) !!}
                    {!! Form::textarea('keyword_en',$keyword_en,['class'=>'form-control' ]) !!}
                </div><!-- /.form-group keyword_en -->
              
            
                  </div><!--col-md-6 content_form_en-->
                </div><!--row-->

                <!-- /.---------- --> 
                  <!----------------start  icon-->
                    <div class="input-group ">
                        <div class="custom-file">
                            {!! Form::label('image','',['class'=>'custom-file-label']) !!}
                            {!! Form::file('icon',['class'=>'custom-file-input','id'=>' '] ) !!}
                        </div>
                    </div>
                    @if(empty($icon))
                     <img src="{{url('')}}/default/dep.png" class="img_120px">
                    @endif 
                     @if(!empty($icon))
                        <div> <img src="{{url('public/storage').Storage::url($icon)}}" class="img_100px "></div>
                    @endif
                <!----------------End icon-->
                         <!-- /.---------- -->
                   {{ Form::button('<i class="fa fa-location-arrow ">'
                    . trans('admin.save').'
                     </i> <i class="fa fa-th"> </i> ' ,
                    ['type' => 'submit', 'class' => '  btn btn-info   btn_save_form_in_modal r_29And_b_-37px'] )
                    }}
                   {!! Form::close() !!}
                <!-- /.---------- -->
                   {!! Form::close() !!}
                <!-- /.---------- -->
                      <a href="{{ aurl('departments/'.$id.'/edit') }}" class="btn btn-success "><i class="fa fa-edit"></i> {{trans('admin.edit_page')}}</a>
                       <span>
                         {!! Form::open(['route'=>['departments.destroy',$id],'method'=>'delete' ,'class'=>'d-inline-block']) !!}
                         {{  Form::button(' <i class="fa fa-trash">  </i>'.trans('admin.delete_fast').'<img src="'.asset('/default/alert.gif').'" class="w_h_20px">', ['type' => 'submit', 'class' => 'btn btn-danger d-none   btn_alert_delete_htis  '] )  }}
                         {!! Form::close() !!}
                       </span>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">{{ trans('admin.close') }}  <i class="fas fa-times"> </i></button>
               <!-- /.----------------------------------------------------------------- -->
            </div>
        </div>
    </div>
</div>
<style>
    .btn_save_form_in_modal.r_29And_b_-37px {
    position: absolute;
    right: 29px;
    bottom: -37px;
}
</style>