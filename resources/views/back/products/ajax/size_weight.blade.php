<section class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label form="sizes" class="col-md-3">{{trans('admin.size_id')}}</label>
			<div class="" >
				{!! Form::select('size_id',$sizes,$products->size_id,['class'=>'form-control','placeholder'=>trans('admin.size_id')])!!}
			</div>
		</div><!--form-group-->
		<div class="form-group">
			<label form="sizes" class="col-md-3">{{trans('admin.size')}}</label>
			<div class="" >
				{!! Form::text('size',$products->size,['class'=>'form-control','placeholder'=>trans('admin.size')])!!}
			</div>
		</div><!--form-group-->
	</div><!--col-md-6-->
	<!----------------------------------------------------------------->
	<div class="col-md-6">

		<div class="form-group">
			<label form="sizes" class="col-md-3">{{trans('admin.weight_id')}}</label>
			<div class="" >
				{!! Form::select('weight_id',$weights,$products->weight_id,['class'=>'form-control','placeholder'=>trans('admin.weight_id')])!!}
			</div>
		</div><!--form-group-->

		<div class="form-group">
			<label form="sizes" class="col-md-3">{{trans('admin.weight')}}</label>
			<div class="" >
				{!! Form::text('weight',$products->weight,['class'=>'form-control','placeholder'=>trans('admin.weight')])!!}
			</div>
		</div><!--form-group-->

	</div><!--col-md-6-->
	<div class="clearfix"></div>

</section>