@extends('main.MDmain') 
@section('title')
	{{$found->Item}}
@endsection

@section('graphs') 
    <meta property ="og:url" content="http://commcycle.co/item-view/{{$found->id}}"/> 
    <meta property ="og:type" content="website"> 
    <meta property="og:title" content="{{$found->Item}}"/>
    <meta property="og:image" content="http://commcycle.co/{{$found->Pics}}"/>
    <meta property="og:image:width" content="620" />
    <meta property="og:image:height" content="541" />
    <meta property="og:fb:app_id" content="168780823705676" />
    <meta property="og:description" content="{{$found->info}}" />
@endsection


@section('content') 
	<div class='container' style='height:100%;'> 
		<div class='row'> 
			<div class='col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-xs-12' style='margin-top:70px;'> 
				<div class=''>
					<img  class='img-fluid z-depth-2'src='{{asset("$found->Pics")}}' style='height:70%; width:90%'>
				</div>
				<div> 
					<h3>{{$found->Item}}</h3>
					<h4 class=''>{{$found->Brand}}</h4>
					<p>{{$found->Info}}</p>
						 		
					
					<hr style=''>
									
					<p>{{$found->info}}</p>
					

				</div>
			</div>
						
		
		</div>
	</div>
	<div style='margin-bottom:300px;'> 
	</div>



@endsection