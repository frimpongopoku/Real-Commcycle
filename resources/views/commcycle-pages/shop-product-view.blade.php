@extends('main.MDmain') 
@section('title')
	{{$found->Item}}
@endsection
<!-- SHOP PRODUCT VIEW -->
@section('graphs') 
    <meta property ="og:url" content="http://commcycle.co/shop-product-view/{{$found->id}}"/> 
    <meta property ="og:type" content="website"> 
    <meta property="og:title" content="{{$found->Item}}"/>
    <meta property="og:image" content="http://commcycle.co/{{$found->Pics}}"/>
    <meta property="og:image:width" content="620" />
    <meta property="og:image:height" content="541" />
    <meta property="og:fb:page_id" content="168780823705676" />
    <meta property="og:description" content="Check this out! It's R {{$found->Price}}. Posted by {{$found->Name}}" />
@endsection


@section('content') 
	<div class='container' style='height:100%;'> 
		<div class='row'> 
			<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12' style='margin-top:70px;'> 
				<div class='thumbnail solid-two'>
					<img src='{{asset("$found->Pics")}}' style='height:100%; width:100%;'>
				</div>
			</div>
			<div class='col-lg-5 col-md-5 col-sm-6 col-xs-12' style='margin-top:70px;'> 
				<h3>{{$found->Item}}</h3>
				<h4 class=''>{{$found->Brand}} bag</h4>
				<p>{{$found->Info}}</p>
					<h2 class='text text-danger'>R {{$found->Price }}</h2> 		
				
				<hr style=''>
				<p class='label label-default solid-two-light'>IN STOCK</p>
				
				<p>{{$found->info}}</p>
			</div>
			<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12' style='margin-top:70px;'> 
				<div class='thumbnail ' style='padding:25px;'>
					<center>
					
						<h2 class='text text-danger'>R {{$found->Price }}</h2> 		
						
						<a href='/add-to-cart/shop/{{ $found->id }}' class='btn btn-success solid-two-light' style='width:90%;'><span class='fa fa-plus'></span> <span class='fa fa-shopping-cart'></span> Add to Cart</a>
					
					</center>

					
				</div>
			</div>
		
		</div>
	</div>
	<div style='margin-bottom:300px;'> 
	</div>



@endsection