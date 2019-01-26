@extends('main.MDmain')


@section('title')
	LadyB shop
@endsection
{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','ladyBshop') }}

@section('content') 
	<div class="clearfix" style="margin-top:60px;"></div>
	<section id="all">
		<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 text-center">
						<div class="section-title">
							<h2 class="section-title solid-text phone-shops-title-old" id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart" style="color:deeppink;"></i><b> LADY-B STOCK</b></h2>
							<h2 class="section-title solid-text phone-shops-title-new" id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart" style="color:deeppink;" data-html="true" data-toggle='popover' data-placement='bottom' data-content='
							All the items below are available. They were made and uploaded by lady burgesson herself at the most affordable prices. You just have to click buy.Be careful you might not be the only one eyeing an item, it might be the last of it. Be fast! All the cool kids wear lady-B, enjoy shopping.
							'></i><b> LADY-B STOCK</b></h2>
							<p id='phone-text'>All the items below are genuine african prints. They were made and have been uploaded by lady burgesson herself at the most affordable prices. You just have to click to add to buy. <span style="color:red">Be careful</span> you might not be the only one eyeing an item, it might be the last of it. Stay woke! All the cool kids wear lady-B, enjoy shopping.</p>
							<p class="label label-default solid phone-mode" id="ladyBBanner" style="background: black;"><i class="fa fa-certificate" style="color:deeppink;"></i> WELCOME TO LADY-B'S CORNER</p> 
	  					</div>
		  						{{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 clearfix" id="lb1"> 
									<img src="{{ asset('imgs/utani.jpg') }}" class="img-responsive ladyB-small solid ladyB-border" alt="ladyB Image">
									 <p class="caption solid-text-light text center" style="margin-top:5px;"><b>Lady-B Big Legs</b></p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="lb2" > 
									<img src="{{ asset('imgs/armpit.jpg') }}" class="img-responsive ladyB-small solid ladyB-border" alt="ladyB Image">
									 <p class="caption solid-text-light text center" style="margin-top:5px;"><b>Lady-B Round chain</b></p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="lb3"> 
									<img src="{{ asset('imgs/gh.jpg') }}" class="img-responsive ladyB-small solid ladyB-border"alt="ladyB Image">
									 <p class="caption solid-text-light text center" style="margin-top:5px;"><b>Lady-B Shirt</b></p>
								</div> --}}
					</div>
					<div class="col-lg-3 col-md-3" id="newsBar">
						
						<div class="card" style=''>
						    <div class="card-header elegant-color lighten-1 white-text" style='padding:15px;'>NEWS</div>
						    <div class="card-body" style='padding:20px;height:300px; min-height:300px; max-height:300px; overflow-y:scroll;'>
						       
						        <p class="card-text">{{ $news->News }}</p>
						        
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
					@forelse($ladybs as $item)
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
								<div class="card" style='margin-bottom:20px'>
									
									  <!-- Card image -->
									  <img class="card-img-top" src="{{$item->Pics}}" alt="Card image cap" style="height : 300px !important; width : 100% !important; object-fit: cover !important;">
									
									  <!-- Card content -->
									  <div class="card-body clearfix" style='padding:10px;'>
									
									    <!-- Title -->
									    <h4 class="card-title"><a><b>{{$item->Item}}</b></a></h4>
									    <!-- Text -->
									    <p class="card-text">{{$item->created_at->diffForHumans()}}</p>
									    <!-- Button -->
									    <div class='pull-right'>
									 	   <button class='btn btn-elegant btn-sm'>R {{$item->Price}}</button>
									 	   	<button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/ladyB-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
										</div>
									    <a href="add-to-cart/ladyB/{{ $item->id }}" class="btn btn-success btn-sm">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm btn-warning"><span class='fa fa-eye'></span></a>									
									  </div>
									
									    									
									 
									
									</div>	
							</div>
							<!-- ########################## modal for 'ladyB' items ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80%; height:90%px'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-primary solid-two solid-text-light fontlize">Price: <b><span class='solid-text-light-two fontlize'> ZAR {{ $item->Price }}</span></b></span>
					                            	<span class="label label-info solid-two solid-text-light fontlize">Size: <b><span class='solid-text-light-two fontlize'>{{ $item->Size }}</span></b></span>
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two fontlize'>{{ $item->Quantity }}</span> left</b></span><br>
				                                	<span class="solid-text-light-two"><b>Additional information:</b></span><br><span class=''>{{ $item->Info }}</span><br>
				                                	<span class="label label-default solid-two solid-text-light pull-right"> <small class=' fontlize'>Posted by: <b><span class='solid-text-light-two'>LadyB</span></b> {{ $item->created_at->diffForHumans() }}</small></span>
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>
					@empty 
						<div class='alert alert-info solid-two solid-text-light-two'>Items are all sold out. You may check every thirty minutes to see the latest releases from lady-B. Stay woke!</div>
					@endforelse 
				</div>
			</div>
			{{ $ladybs->links() }}
	</div>

	<style> 

		#commcycleTitle{
			font-size:15px;
		}
		
        	#lb1,#lb2,#lb3{
        		width:3px;
        	}
	</style>
@endsection

@section('patner')
	<span style="color:deeppink">@</span>ladyB		
@endsection

@section('custom-js') 
	<script> 
		function theShare(url){
			 FB.ui({
			    method: 'share',
			    display: 'popup',
			    href:url,
			  }, function(response){});
			
		};	
	</script>
@endsection