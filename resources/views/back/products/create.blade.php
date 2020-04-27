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
                                     {!! Form::open(['url'=>aurl('products'),'files'=>true]) !!}
                                   <div class="row">
                                       <!--container-->
                                       <div class="col-md-12" >
                                                                                       <h4>{{$title }}</h4> <br>
                                           <a class="btn btn-primary save" href="">{{ trans('admin.save') }} <i class="fa fa-save "></i></a>
                                           <a class="btn btn-info save_continue" href="">{{ trans('admin.save_continue') }} <i class="fa fa-save "></i></a>
                                           <a class="btn btn-success copy_products" href="">   {{ trans('admin.copy_products') }} <i class="fa fa-window-restore"></i></a>
                                           <a class="btn btn-danger delete" href="">        {{ trans('admin.delete') }}      <i class="fa fa-trash"></i></a>

                                           <br> <br>
                                            <div class="container_contect_tabs">
                                               <!-- Nav tabs -->
                                       <ul class="nav nav-tabs" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link active" data-toggle="tab" href="#department">{{ trans('admin.department') }}
                                       <i class="fa fa-align-right"></i>  </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_setting">{{ trans('admin.product_setting') }}
                                     <i class="fas fa-cogs  "></i> </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_media">{{ trans('admin.product_media') }}
                                   <i class="fas fa-photo-video"></i>    </a>
                                 </li>

                                     <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_info">{{ trans('admin.product_info') }}
                                    <i class="fas fa-info-circle"></i>  </a>
                                 </li>

                                     <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_size_weight">{{ trans('admin.product_size_weight') }}
                                    <i class="fas fa-shipping-fast"></i>  </a>
                                 </li>

                                     <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#product_other_data">{{ trans('admin.product_other_data') }}
                                    <i class="fas fa-folder-plus"></i>  </a>
                                 </li> 
                                       </ul>
                                               <!-- Tab content start  -->
                                               <div class="tab-content">
                                                   <div id="department" class="container tab-pane active"><br>
                                                       <h3>{{ trans('admin.department') }}</h3>
                                                       <aside class="content_tab_info  tab_department">
                                                        ...............
                                                       </aside><!--content_tab_info department-->
                                                   </div>
                                                   <div id="product_setting" class="container tab-pane fade"><br>
                                                       <h3>{{ trans('admin.product_setting') }}</h3>
                                                       <aside class="content_tab_info  tab_product_setting">
                                                        ...............
                                                       </aside><!--content_tab_info product_setting-->                                                   </div>
                                                   <div id="product_media" class="container tab-pane fade"><br>
                                                       <h3>{{ trans('admin.product_media') }}</h3>
                                                       <aside class="content_tab_info  tab_product_media">
                                                        ...............
                                                       </aside><!--content_tab_info product_media-->                                                   </div>
                                                  <div id="product_info" class="container tab-pane fade"><br>
                                                       <h3>{{ trans('admin.product_info') }}</h3>
                                                       <aside class="content_tab_info  tab_product_info">
                                                        ...............
                                                       </aside><!--content_tab_info product_info-->                                                  </div>    
                                                        <div id="product_size_weight" class="container tab-pane fade"><br>
                                                       <h3>{{ trans('admin.product_size_weight') }}</h3>
                                                       <aside class="content_tab_info  tab_product_size_weight">
                                                        ...............
                                                       </aside><!--content_tab_info product_size_weight-->                                                  </div>
                                                            <div id="product_other_data" class="container tab-pane fade"><br>
                                                       <h3>{{ trans('admin.product_other_data') }}</h3>
                                                       <aside class="content_tab_info  tab_product_other_data">
                                                        ...............
                                                       </aside><!--content_tab_info product_other_data-->                                                  </div>
                                               </div> <!-- Tab content start  -->
                                           </div>
                                        </div><!--col-md-12-->
                                   <div class="col-md-6 content_form_ar" >
                                    <div class="form-group">
                                        {!! Form::label('product_name_ar',trans('admin.product_name_ar')) !!}
                                        {!! Form::text('product_name_ar',old('product_name_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group product_name_en -->
                                    <div class="form-group">
                                        {!! Form::label('price',trans('admin.price')) !!}
                                        {!! Form::text('price',old('price'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group price -->
                                     <div class="form-group">
                                        {!! Form::label('description_ar',trans('admin.description_ar')) !!}
                                        {!! Form::textarea('description_ar',old('description_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group description_ar -->
                                     <!----------------start  photo-->
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            {!! Form::label('photo',trans('admin.photo_products'),['class'=>'custom-file-label']) !!}
                                            {!! Form::file('photo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                        </div>
                                    </div>
                                    <div class="text-center"> <img   src="{{url('default')}}/product.png" class="img_100px"></div>
                                   <!----------------End photo-->
                                   <div class="form-group">
                                        {!! Form::label('price_offer',trans('admin.price_offer')) !!}
                                        {!! Form::text('price_offer',old('price_offer'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group price_offer --> 
                                    <div class="form-group">
                                        {!! Form::label('add_by_ar',trans('admin.add_by_ar')) !!}
                                        {!! Form::text('add_by_ar',old('add_by_ar'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group add_by_ar -->
                                  
                                   </div><!--col-md-6 content_form_ar-->
                                   <div class="col-md-6 content_form_en" >
                                   <div class="form-group">
                                        {!! Form::label('product_name_en',trans('admin.product_name_en')) !!}
                                        {!! Form::text('product_name_en',old('product_name_en'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group product_name_en --> 
                                   <div class="form-group">
                                        {!! Form::label('price_old',trans('admin.price_old')) !!}
                                        {!! Form::text('price_old',old('price_old'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group price_old -->
                                    
                                      <div class="form-group">
                                        {!! Form::label('description_en',trans('admin.description_en')) !!}
                                        {!! Form::textarea('description_en',old('description_en'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group description_en -->
                                   <!----------------start  add_by_photo-->
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            {!! Form::label('add_by_photo',trans('admin.add_by_photo_products'),['class'=>'custom-file-label']) !!}
                                            {!! Form::file('add_by_photo',['class'=>'custom-file-input','id'=>'inputGroupFile02'] ) !!}
                                        </div>
                                    </div>
                                    <div class="text-center">  <img   src="{{url('default')}}/product.png" class="img_100px"></div>
                                  <!----------------End add_by_photo-->
                                   <div class="form-group">
                                        {!! Form::label('discount',trans('admin.discount')) !!}
                                        {!! Form::text('discount',old('discount'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group discount -->
                                    <div class="form-group">
                                        {!! Form::label('add_by_en',trans('admin.add_by_en')) !!}
                                        {!! Form::text('add_by_en',old('add_by_en'),['class'=>'form-control','class'=>'form-control' ]) !!}
                                    </div><!-- /.form-group add_by_en -->
                                   </div><!--col-md-6 content_form_en-->
                                </div><!--row-->
                                 


          <!-- /.-------------------------------------------- start  HTML JS Tree--------------------- -->
                <div class="content_departments card_dark">
                    <!--  start js tree ----------------------------------- -->
                    <br>
                    <a class="btn btn-danger    hidden showbtn_control delete_dpe"  data-toggle="modal" data-target="#delete_bootstrap_modal"> <i class="fas fa-trash"></i> {{trans('admin.delete')}}</a>
                    <a class="btn btn-success   hidden showbtn_control edit_dpe"> <i class="fas fa-edit"></i>{{trans('admin.edit')}}</a>
                    <a class="btn btn-primary   hidden showbtn_control add_new_product_in_dpe"> <i class="fas fa-plus"></i>{{trans('admin.add_product_in_th_dep')}}</a>
                    <div class="clearfix"></div>
                    <div id="jstree"></div>
                    <input type="hidden" name="department_id" class="department_id" value="{{old('department_id')}}"   >
                    <div class="clearfix"></div>
                     <br>
               
 
                    <!--  start js tree ----------------------------------- -->
                </div><!--content_departments-->
                <!-- /.--------------------------------------------- ُEnd HTML JS Tree-------------------- -->
   {{ Form::button('<i class="fa fa-location-arrow "> '
                                        . trans('admin.create_new_product').'
                                        </i> <i class="fas fa-cube"> </i> ' ,
                                        ['type' => 'submit', 'class' => 'form-control btn btn-info btn-lg'] )
                                    }}





                                    {!! Form::close() !!}















<!-- --------------------------------------------------------------------------------------------------- -->
 
@push('js')

{{------------------------------------------------------------}}
<!-- Modal -->
<div class="modal fade" id="delete_bootstrap_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url'=>'','method'=>'delete','id'=>'form_Delete_department']) !!}
            <div class="modal-body">
                <h4>
                    {{trans('admin.ask_delete_dep')}}  <span id="dep_name"> </span>
                      <img src="" id="dep_icon" class="img_120px">
                </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('admin.close')}}</button>
                {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
{{------------------------------------------------------------}}


    <script>
        $(document).ready(function () {
            $('#jstree').jstree({
                'core' : {
                    'data' : {!! load_dep() !!},
                    "themes": {
                        "name": "default-dark",
                        "dots": true,
                        "variant": "large",
                        "icons": true,
                        "multiple" : true,
                        "animation" : 1000,

                    }
                },
                "checkbox" : {
                    "keep_selected_style" : true
                },
                "plugins" : [  "wholerow","radio","/*checkbox*/" ]
            });//.jstree
        });//document

        //-----------------------get id
        $('#jstree').on('changed.jstree',function(e,data){
            var  i , j , r =[];//=  var  i[]; var  j[];var  r[];
            var name =[];
            var icon =[];
            for(i=0,j = data.selected.length;i < j;i++ )
            {
                r.push(data.instance.get_node(data.selected[i]).id);
                 icon.push(data.instance.get_node(data.selected[i]).icon);
            }//for
             $('.department_id').val(r.join(',')); //get name dpe
             $('#dep_icon').attr('src','{{url('storage')}}/'+icon.join(', '));//get src   dpe


            //start code show btn controll in the dep
            
         });/*changed*/

    </script>
    @endpush

<!-- --------------------------------------------------------------------------------------------------- -->






























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