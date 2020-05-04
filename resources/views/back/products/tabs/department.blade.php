<div id="department" class="container tab-pane  "><br>
   <h3>{{ trans('admin.department') }}</h3>
   <aside class="content_tab_info  tab_department">
       <!-- --------------------------------------------------------------------------------------------------- -->
       @push('js')
           <script>
               $(document).ready(function () {
                   $('#jstree').jstree({
                       'core' : {
                           'data' : {!! load_dep($products->department_id) !!},
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
                   var  i , j , r =[];//===  var  i[]; var  j[];var  r[];
                   var name =[];
                   var icon =[];
                   for(i=0,j = data.selected.length;i < j;i++ )
                   {
                       r.push(data.instance.get_node(data.selected[i]).id);
                       icon.push(data.instance.get_node(data.selected[i]).icon);
                   }//for
                   //$('#dep_icon').attr('src','{{url('storage')}}/'+icon.join(', '));//get src   dpe
                   //
                   var department = r.join(', ')
                   $('.department_id').val(department);
                   $.ajax({
                       url:"{{ aurl('load/wight/size') }}",
                       dataType:'html',
                       type:'post',
                       data:{_token:'{{ csrf_token() }}',dep_id:department,product_id:'{{$products->id}}'},
                       success: function(data)
                       {
                           $('.size_weight').html(data);
                           $('.color_flavor_data').removeClass('hidden');
                           $('.message_colors_flavors').addClass('hidden');
                       }

                   });

               });/*changed*/
           </script>
   @endpush
   <!-- --------------------------------------------------------------------------------------------------- -->
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
           <input type="text" name="بلح" class="department_id form-control  btn-dark" value="{{old('department_id')}}"  disabled  >
           <div class="clearfix"></div>
           <br>

           <!--  start js tree ----------------------------------- -->
       </div><!--content_departments-->
       <!-- /.--------------------------------------------- ُEnd HTML JS Tree-------------------- -->
   </aside><!--content_tab_info department-->
</div>