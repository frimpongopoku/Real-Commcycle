@extends('admin-pages.admin-nav') 

@section('content') 

<div style='margin-top:70px;'></div> 
<div class='container' style='min-height:600px; background-color:white; overflow-x:hidden;'>
	<center><h1>Chill, something cool is happening. You will love it</h1></center>	 
</div>


@endsection 

@section('custom-js') 
	<script>
				
		@if(Session::has('article-img-link'))
			var theLink ="{{Session::get('article-img-link')}}";
	
		@endif
		
		
		$('[data-toggle="popover"]').popover();
		$('#pin-generator').on('click',function(e){
			e.preventDefault();
		});
	</script>
	<script src="{{asset('js/artificial/blog.js')}}"></script>
@endsection 
