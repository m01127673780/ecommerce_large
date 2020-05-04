@push('js')
    <script>
        var  max_input = 100;
        var  x = 1;
        $(document).on('click','.add_input',function () {

            if(x < max_input)
            {
                x++;
                $('.div_content_inputs').append(
                    '<div class="content_row_add_remove_input row">'+
                    '<div class="col-md-6 " >'+
	                     '<div class="form-group">'+
				                '{!! Form::label('input_key[]',trans('admin.input_key')) !!}'+
				                '{!! Form::text('input_key[]','',['class'=>'form-control','class'=>'form-control' ]) !!}'+
	          			  '</div>'+
      				 '</div>'+
      				 '<div class="col-md-6  " >'+
          			    '<div class="form-group">'+
                			'{!! Form::label('input_value[]',trans('admin.input_value')) !!}'+
              			    '{!! Form::text('input_value[]','',['class'=>'form-control','class'=>'form-control' ]) !!}'+
            			'</div>'+
            			'</div>'+
                    '<a class="col-md-12 " >'+
                    '<a class="btn btn-danger remove_content_div_input" >'+
            			 '<i class="fas fa-trash-alt">'+
            			 '</i>'+
            			'</a>'+
                     '</a>'+
                '</div>'

            );
            }
        return false;
        });
            $(document).on('click','.remove_content_div_input',function () {
                $(this).parent('.content_row_add_remove_input').remove();
                return false;

            });

    </script>
@endpush
<div id="product_other_data" class="container tab-pane fade "><br>
<h4 class="text-center">{{ trans('admin.product_other_data') }}</h4><div class='clearfix'>....</div>
<aside class="content_tab_info  tab_product_other_data">
{{-------------------------------------------------------------------------}}
    <div class='div_content_inputs '>
            @foreach($products->other_data()->get() as  $other)
                <div class="content_row_add_remove_input row">
                <div class="col-md-6 " >
                <div class="form-group">
                    {!! Form::label('input_key[]',trans('admin.input_key')) !!}
                    {!! Form::text('input_key[]',$other->data_key,['class'=>'form-control','class'=>'form-control' ]) !!}
                    </div>
                </div>
            <div class="col-md-6  " >
                <div class="form-group">
                    {!! Form::label('input_value[]',trans('admin.input_value')) !!}
                    {!! Form::text('input_value[]',$other->data_value,['class'=>'form-control','class'=>'form-control' ]) !!}
                    </div>
                </div>
            <a class="col-md-12 " >
                <a class="btn btn-danger remove_content_div_input" >
                    <i class="fas fa-trash-alt">
                        </i>
                    </a>
                </a>
            </div>
        @endforeach
   </div><!--div_content_inputs-->
    <div class='clearfix'>....</div>
    <a class="add_input btn btn-info"> <i class="fa fa-plus"></i></a>
    <div class='clearfix'>....</div>

    {{-------------------------------------------------------------------------}}
</aside><!--content_tab_info product_other_data-->
</div>
