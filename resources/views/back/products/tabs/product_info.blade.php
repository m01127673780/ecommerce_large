 
                                                  <div id="product_info" class="container tab-pane fade"><br>
                                                       <center>{{ trans('admin.product_info') }}</center>
                                                       <aside class="content_tab_info  tab_product_info">
                                                       <div class="row">
                                                           <div class="col-md-6 content_form_ar" >
                                                               <div class="form-group">
                                                                   {!! Form::label('product_name_ar',trans('admin.product_name_ar')) !!}
                                                                   {!! Form::text('product_name_ar',$products->product_name_ar,['class'=>'form-control','class'=>'form-control' ]) !!}
                                                               </div><!-- /.form-group product_name_en -->
                                                               <div class="form-group">
                                                                   {!! Form::label('description_ar',trans('admin.description_ar')) !!}
                                                                   {!! Form::textarea('description_ar',$products->description_ar,['class'=>'form-control','class'=>'form-control' ]) !!}
                                                               </div><!-- /.form-group description_ar -->

                                                           </div><!--col-md-6 content_form_ar-->
                                                           <div class="col-md-6 content_form_en" >
                                                               <div class="form-group">
                                                                   {!! Form::label('product_name_en',trans('admin.product_name_en')) !!}
                                                                   {!! Form::text('product_name_en',$products->product_name_en,['class'=>'form-control','class'=>'form-control' ]) !!}
                                                               </div><!-- /.form-group product_name_en -->
                                                               <div class="form-group">
                                                                   {!! Form::label('description_en',trans('admin.description_en')) !!}
                                                                   {!! Form::textarea('description_en',$products->description_en,['class'=>'form-control','class'=>'form-control' ]) !!}
                                                               </div><!-- /.form-group description_en -->

                                                           </div><!--col-md-6 content_form_en-->
                                                       </div><!--row-->
                                                       </aside><!--content_tab_info product_info-->                                                  </div>