
@if(empty ($logo))
 <img  src="{{ asset( 'default/trademarks.png')}} "  class="img_50px" >
@else
 <div> <img src="{{url('public/storage').Storage::url($logo)}}" class="img_50px  "></div>
@endif

 