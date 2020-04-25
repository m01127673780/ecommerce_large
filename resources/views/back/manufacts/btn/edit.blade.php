 <a href="{{ aurl('manufacts/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a> 


 <!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_manufacts{{ $id }}"><i class="fa fa-edit"></i></button>
 --><!-- Modal -->
<div id="edit_manufacts{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><apan class="btn btn-danger">&times;</apan></button>
                {{--                <h4 class="modal-title">{{ trans('admin.close') }}</h4>--}}
            </div>
            <div class="modal-body">
                <!-- /.----------------------------------------------------------------- -->
                 {!! Form::open(['route'=>['manufacts.update',$id],'method'=>'put','class'=>'form_save_in_modal','files'=>true]) !!}
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
                                            {!! Form::label('mob',trans('admin.mob')) !!}
                                            {!! Form::email('mob',$mob,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group mob -->
                                        <div class="form-group">
                                            {!! Form::label('facebook',trans('admin.facebook')) !!}
                                            {!! Form::email('facebook',$facebook,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group facebook -->
                                         
                                        <div class="form-group">
                                            {!! Form::label('insta',trans('admin.insta')) !!}
                                            {!! Form::email('insta',$insta,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group insta -->
                                            <!----------------start  logo-->
                                                <div class="input-group ">
                                                    <div class="custom-file">
                                                        {!! Form::label('logo',trans('admin.logo'),['class'=>'custom-file-label']) !!}
                                                        {!! Form::file('logo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                                    </div>
                                                </div>
                                                @if(!empty($logo))
                                                    <div> <img src="{{url('public/storage').Storage::url($logo)}}" class="img_100px "></div>
                                                 @else
                                                   <img src="{{url('')}}/default/manufacts.png" class="img_120px">
                                                 @endif
                                             <!----------------End logo-->
                                    </div><!--col-md-6 content_form_ar-->
                                    <div class="col-md-6 content_form_en" >
                                        <div class="form-group">
                                            {!! Form::label('name_en',trans('admin.name_en')) !!}
                                            {!! Form::text('name_en',$name_en,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group name_en -->
                                        <div class="form-group">
                                            {!! Form::label('code',trans('admin.code')) !!}
                                            {!! Form::number('code',$code,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group code -->

                                        <div class="form-group">
                                            {!! Form::label('twitter',trans('admin.twitter')) !!}
                                            {!! Form::text('twitter',$twitter,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group twitter -->
                                
                                        <div class="form-group">
                                            {!! Form::label('email',trans('admin.email')) !!}
                                            {!! Form::text('email',$email,['class'=>'form-control']) !!}
                                        </div><!-- /.form-group email -->
                                        <div class="form-group">
                                        {!! Form::text('contact_name',$contact_name,['class'=>'form-control','disabled','placeholder'=>trans('admin.contact_name')]) !!}  
                                         </div><!-- /.form-group contact_name -->
                                    </div><!--col-md-6 content_form_en-->
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             {!! Form::label('address',trans('admin.address')) !!}
                                             {!! Form::text('address',$address,['class'=>'form-control','class'=>'form-control','placeholder'=>trans('admin.you_did_not_locate')]) !!}
                                         </div><!-- /.form-group contact_name -->
                                     </div>
                                         {{----------------------------------------------------------------}}
                 <div class="form-horizontal width_map" >
                     <div class="clearfix"></div><br>
                     <div id="us3" ></div>
                     <div class="clearfix">&nbsp;</div>
                    <input type="hidden" class="form-control" value="{{$lat}}" id="lat" name="lat" />
                    <input type="hidden" class="form-control" value="{{$lng}}" id="lng"  name="lng" />
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

 
                    <!-- ............... -->
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
                $lat = $lat;
                $lng = $lng;

                $d_lat = '30.034024628931657';
                $dl_ng = '31.24238681793213';

                $lat = !empty($lat)?$lat:$d_lat;
                $lng = !empty($lng)?$lng:$d_lng;

                ?>
                 <script>
                  $('#us3').locationpicker({
                      location: {
                          latitude: {{ $lat }},
                          longitude:{{ $lng }}
                      },
                      radius: 0,
                      markerIcon: '{{url('')}}/default/marker.png',
                      // markerIcon: 'https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2_hdpi.png',
                      // markerIcon: 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/256/Map-Marker-Marker-Inside-Chartreuse-icon.png',
                      // markerIcon: 'https://image.winudf.com/v2/image1/Y29tLmV4bHlvLm1hcG1hcmtlcl9pY29uXzE1ODI0ODAyODZfMDE2/icon.png?w=170&fakeurl=1',
                      inputBinding: {
                        latitudeInput: $('#lat'),
                        longitudeInput: $('#lng'),
                       // radiusInput: $('#us2-radius'),
                        locationNameInput: $('#address')
                      },
                       enableAutocomplete : true

                  });
                 </script>
                 @endpush
                 </div>
                 {{----------------------------------------------------------------}}
                                </div><!--row-->
                            </div><!-- box-body-->
                            <!-- /.----------------------------------------------------------------- -->
                                            <!--End   inputs  ---------------------------------------------- -->
                                              
                                         </section>
                        <!----------------End logo-->
                        <!-- /.---------- -->
                   {{ Form::button('<i class="fa fa-location-arrow ">'
                    . trans('admin.save').'
                     </i> <i class="fa fa-flag-usa"> </i> ' ,
                    ['type' => 'submit', 'class' => '  btn btn-info form-control m_b_10     '] )
                    }}
                   {!! Form::close() !!}
                <!-- /.---------- -->
             		  <a href="{{ aurl('manufacts/'.$id.'/edit') }}" class="btn btn-success  "><i class="fa fa-edit"></i> {{trans('admin.edit_page')}}</a>
                       <span>
                         {!! Form::open(['route'=>['manufacts.destroy',$id],'method'=>'delete' ,'class'=>'d-inline-block']) !!}
                         {{  Form::button(' <i class="fa fa-trash">  </i>'.trans('admin.delete_fast').'<img src="'.asset('/default/alert.gif').'" class="w_h_20px">', ['type' => 'submit', 'class' => 'btn btn-danger   btn_alert_delete_htis  '] )  }}
                         {!! Form::close() !!}
                       </span>
					<button type="button" class="btn btn-warning" data-dismiss="modal">{{ trans('admin.close') }}  <i class="fas fa-times"> </i></button>
               <!-- /.----------------------------------------------------------------- -->
            </div>
        </div>
    </div>
</div>
