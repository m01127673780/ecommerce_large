{{--<a href="{{ aurl('mall/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>--}}
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#show_mall{{ $id }}"><i class="fa fa-eye"></i></button>
<!-- Modal -->
<div id="show_mall{{ $id }}" class="modal  modal fade bd-example-modal-lg    fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content--> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><apan class="btn btn-danger">&times;</apan></button>
                {{--                <h4 class="modal-title">{{ trans('admin.close') }}</h4>--}}
            </div>
            {!! Form::open(['route'=>['mall.destroy',$id],'method'=>'delete']) !!}
            <div class="modal-body">
                <!-- /.----------------------------------------------------------------- -->
                {{-- {!! Form::open(['route'=>['mall.update',$mall->id],'method'=>'put']) !!}--}}
                {!! Form::open(['url'=>aurl('mall/'.$id),'method'=>'get']) !!}
                                         <section class="all_fildes_modal_show">
                                            <!--start inputs  ---------------------------------------------- -->
                                             <!-- /.----------------------------------------------------------------- -->
                                <div class="box-body">
                                     <div class="row">
                                        <div class="col-md-6 content_form_ar" >
                                        <div class="form-group">
                                            {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                                            {!! Form::text('name_ar',$name_ar,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group name_ar -->
                                        <div class="form-group">
                                            {!! Form::label('mob',trans('admin.mob')) !!}
                                            {!! Form::email('mob',$mob,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group mob -->
                                        <div class="form-group">
                                            {!! Form::label('facebook',trans('admin.facebook')) !!}
                                            {!! Form::email('facebook',$facebook,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group facebook -->
                                         
                                        <div class="form-group">
                                            {!! Form::label('insta',trans('admin.insta')) !!}
                                            {!! Form::email('insta',$insta,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group insta -->
                                            <!----------------start  logo-->
                                                <div class="input-group ">
                                                    <div class="custom-file">
                                                        {!! Form::label('logo',trans('admin.logo'),['class'=>'custom-file-label']) !!}
                                                        {!! Form::file('logo',['class'=>'custom-file-input','id'=>'inputGroupFile02','disabled'] ) !!}
                                                    </div>
                                                </div>
                                                @if(!empty($logo))
                                                    <div> <img src="{{url('public/storage').Storage::url($logo)}}" class="img_100px "></div>
                                                 @else
                                                   <img src="{{url('')}}/default/mall.png" class="img_120px">
                                                 @endif
                                             <!----------------End logo-->
                                    </div><!--col-md-6 content_form_ar-->
                                    <div class="col-md-6 content_form_en" >
                                        <div class="form-group">
                                            {!! Form::label('name_en',trans('admin.name_en')) !!}
                                            {!! Form::text('name_en',$name_en,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group name_en -->
                                        <div class="form-group">
                                            {!! Form::label('code',trans('admin.code')) !!}
                                            {!! Form::number('code',$code,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group code -->

                                        <div class="form-group">
                                            {!! Form::label('twitter',trans('admin.twitter')) !!}
                                            {!! Form::text('twitter',$twitter,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group twitter -->
                                
                                        <div class="form-group">
                                            {!! Form::label('email',trans('admin.email')) !!}
                                            {!! Form::text('email',$email,['class'=>'form-control','disabled' ]) !!}
                                        </div><!-- /.form-group email -->
                                        <div class="form-group">
                                        {!! Form::text('contact_name',$contact_name,['class'=>'form-control','disabled','placeholder'=>trans('admin.contact_name')]) !!}  
                                         </div><!-- /.form-group contact_name -->
                                    </div><!--col-md-6 content_form_en-->
                                      <div class="col-md-12">
                                                    <div class="form-group">
                                                        {!! Form::label('address',trans('admin.address')) !!}
                                                        {!! Form::text('address',$address,['class'=>'form-control' ,'disabled' ,'placeholder'=>trans('admin.you_did_not_locate')]) !!}
                                                    </div><!-- /.form-group contact_name -->
                                                </div><!--col-md-12-->
                                </div><!--row-->
                            </div><!-- box-body-->
                            <!-- /.----------------------------------------------------------------- -->
                                            <!--End   inputs  ---------------------------------------------- -->
                                              
                                         </section>

                <!----------------buttons -->
                <aside class="row model_actions">
    
                    <div class="col-md-12 content_btn-actions_model">
                        <!-- /.---------- -->
                        <a href="{{ aurl('mall/'.$id.'/edit') }}" class="btn btn-success "><i class="fa fa-edit"></i> {{trans('admin.edit_page')}}</a>
                        <span>
                         {!! Form::open(['route'=>['mall.destroy',$id],'method'=>'delete' ,'class'=>'d-inline-block']) !!}
                            {{  Form::button(' <i class="fa fa-trash">  </i>'.trans('admin.delete_fast').'<img src="'.asset('/default/alert.gif').'" class="w_h_20px">', ['type' => 'submit', 'class' => 'btn btn-danger   btn_alert_delete_htis  '] )  }}
                            {!! Form::close() !!}
                       </span>
                    
                        <button type="button" class="btn btn-warning" data-dismiss="modal">{{ trans('admin.close') }}  <i class="fas fa-times"> </i></button>
                        <!-- /.----------------------------------------------------------------- -->
                    </div><!--col-md-12-->
                    
                </aside><!--model_actions row-->
            <!-- /.---------- -->
            {!! Form::close() !!}
            <!-- /.----------------------------------------------------------------- -->
            </div>
        </div>
    </div>
</div>
 