@extends('main.MDmain')

@section('title')
Commcycle-shop
@endsection

{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','shop') }}

@section('content')
	<div class="clearfix" style="margin-top:60px;"></div>
	<section id ="all">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 text-center">
						<div class="section-title">
							<h2 class="section-title solid-text phone-shops-title-old" id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> SHOP A</b></h2>
							<h2 class="section-title solid-text phone-shops-title-new" data-html='true' data-toggle='popover' data-placement='bottom' data-content='Below are items from random people that have been uploaded. The prices allorted to them are their real prices as indicated by the seller + a <span style="color:green">10%</span> increase.' id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> SHOP A</b></h2>
							<p id='phone-text'>Below are items from random people that have been uploaded. The prices allorted to them are their real prices as indicated by the seller + a <span style="color:green">10%</span> increase.</p>
							<a class="btn btn-warning solid-two-light" id="postButton" href="#uploadSection" onclick="appear()">Post</a> 
							<a class="btn btn-info solid-two-light" href="shopB">No photo shop <i class="fa fa-forward"></i></a> 
									
	  					</div>
					</div>
					<div class="col-lg-3 col-md-3" id="newsBar" style="margin-bottom:15px;">
						<div class="card" style=''>
						    <div class="card-header elegant-color lighten-1 white-text" style='padding:15px;'>NEWS</div>
						    <div class="card-body" style='padding:20px;height:300px; min-height:300px; max-height:300px; overflow-y:scroll;'>
						       
						        <p class="card-text">{{ $news->News }}</p>
						       
								<h4>KEY</h4>
									<small class="text text-muted"><strong>Female:</strong> <i class="fa fa-certificate female"> - </i><i class="fa fa-female female"> - </i><i class="fa fa-bookmark female"></i></small><br>
									<small class="text text-muted"><strong>Gents:</strong> <i class="fa fa-certificate male"> - </i><i class="fa fa-male male"> - </i><i class="fa fa-bookmark male"></i></small><br>
									<small class="text text-muted"><strong>Other</strong> <i class="fa fa-certificate other"> - </i><i class="fa fa-certificate other"> - </i><i class="fa fa-bookmark other"></i></small>
								<br>
								<small>If you have any message or anything to repot, visit the <a href="about" class="text text-info">About page</a></small>
						        
						    </div>
						</div>
					</div>

				</div>
			</div>
			
			{{-- <div class='container'> 
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

				<hr>
				<center> 
					<button class="btn btn-default solid-two-light" data-toggle='tooltip' data-placement='top' data-title='Soon be active' style="background-color:deeppink; color:white;"> <i class="fa fa-eye-o"></i> Ladies</button> 
					
					<button class="btn btn-default solid-two-light" data-toggle='tooltip' data-placement='top' data-title='Soon be active' style="background-color:cyan; color:black;"> <i class="fa fa-eye-o"></i> Gents</button> 
					<button class="btn btn-default solid-two-light" data-toggle='tooltip' data-placement='top' data-title='Soon be active' style="background-color:orange; color:white;"> <i class="fa fa-eye-o"></i> Other</button> 
					<br><small>Category view will be up soon...</small>
				</center>
				<hr>
				</div> 
			</div>
			</div> --}}
			{{-- CATEGORIES HAVE BEEN HIDDEN FOR NOW--}}

			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						@forelse($shop_items as $item)
							@if($item->Category=='Gents')
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="card" style='margin-bottom:20px;'>

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
									 	   	<button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/shop-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
										</div>
									    <a href="add-to-cart/shop/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm 
 btn-warning"><span class='fa fa-eye'></span></a>
									
									  </div>
									
									</div>

								</div>
								<!-- ########################## modal for 'Gents items' ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80%; height:80%'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-primary solid-two fontlize solid-text-light">Price: <b><span class='solid-text-light-two fontlize'> ZAR {{ $item->Price }}</span></b></span>
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span>
				                                	<span class="label label-success solid-two">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span><br>
				                                	<small class="text text-muted pull-right"> <b>Posted by: {{ $item->Name }}</b> <small class=' fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></small>
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two solid-text-light' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>

							@elseif($item->Category=="Ladies")
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									
									<div class="card" style='margin-bottom:20px;'>

									  <!-- Card image -->
									  <img class="card-img-top" src="{{$item->Pics}}" alt="Card image cap" style="height : 300px !important; width : 100% !important; object-fit: cover !important;">
									
									  <!-- Card content -->
									  <div class="card-body clearfix" style='padding:10px;'>
									
									    <!-- Title -->
									    <h4 class="card-title"><a><b>{{$item->Item}}</b></a></h4>
									    <!-- Text -->
									    <p class="card-text">{{$item->created_at->diffForHumans()}}</p>
									    <div class='pull-right'>
									 	   <button class='btn btn-elegant btn-sm'>R {{$item->Price}}</button>
									 	   	<button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/shop-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
										</div>
									    <a href="add-to-cart/shop/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm 
 btn-warning"><span class='fa fa-eye'></span></a>

									
									  </div>
									
									</div>
								</div>
								<!-- ########################## modal for 'ladies items' ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80%; height:80%'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-primary solid-two solid-text-light">Price: <b><span class='solid-text-light-two fontlize'> ZAR {{ $item->Price }}</span></b></span> 
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span>
				                                	<span class="label label-success solid-two solid-text-light">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span></span><br>
				                                	<small class="text text-muted pull-right"></span> <b>Posted by: {{ $item->Name }}</b> <span class=' fontlize'><b>{{ $item->created_at->diffForHumans() }}</span></b></small>
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two solid-text-light' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>

							@elseif($item->Category=="Other")
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
									 	   	<button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/shop-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
										</div>
									    <a href="add-to-cart/shop/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm 
 btn-warning"><span class='fa fa-eye'></span></a>
									
									  </div>
									
									</div>	
								</div>
								<!-- ########################## modal for 'other' items ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80% !important; height:80% !important;  object-fit: cover !important;'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-primary solid-two solid-text-light">Price: <b><span class='solid-text-light-two fontlize'> ZAR {{ $item->Price }}</span></b></span>
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span>
				                                	<span class="label label-success solid-two solid-text-light">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span><br>
				                                	<small class="text text-muted pull-right"><b>Posted by: {{ $item->Name }}</b> <small class='fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></small>
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two solid-text-light' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>
							@endif
						@empty 
							<p class="alert alert-info solid-two">There are no items available in the shop for now</p>
						@endforelse

					</div>
				</div>
				{{ $shop_items->links() }}
			</div>
	</section>



	<!-- ############################################# UPLOAD FORM #######################################################-->
<section id="uploadSection">
            <div class="container" id="uploadSheet" style="display:none;border: solid 3px red; padding:10px; background-color: black; opacity:0.9; ">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h1 style="color:white;"><strong>Upload Form</strong></h1>
                            <p class="lead" align="left" style="color:white;">By uploading this image you certify that the item exists and you have no other plans for that item. You are uploading the item to the Shop section; you affirm that a levy of 10% of the cost price will be accrued to the amount payable by the buyer. You shall not come back for your item after it has already been sold.  
                            </p>
 							<div class="threeD">
             					<label for="agreement" class="text text-success" id="agreementLabel"><input type="checkbox" name="agreement" id="agreement" onclick="agreementHideToggle() ">  I agree to the terms stated above.</label>
             				</div>
                        </div>
                       
                    </div>
                </div>
             
             
            
          	<!-- all the text boxes --> 
          		<form action="/shopupload" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="textboxPane" style="display:none;">
                        <div class="row col-md-12 col-md-offset-5 col-lg-12 col-lg-offset-5 col-sm-12 col-sm-offset-4 col-xm-12 col-xs-offset-4">
                            <input type="file" name="image" id="selectedImage" style="color:white;">
                        </div>
                    <br>
                    <br>
              			<div class="row">
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
    		          			<input type="text" class="form-control" value="{{ Session::get('old')['Name'] }}" id="name" name="name" placeholder="please enter your name *"  data-validation-required-message="Please enter your name.">
    		          		</div>
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    		          			<input type="text" class="form-control" id="email" value="{{ Session::get('old')['Email'] }}" name="email" placeholder="please enter your email *" data-validation-required-message="Please enter your email.">
    		          		</div>
    	          		</div> 
    	          	<br>
              			<div class="row">
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
    		          			<input type="text" class="form-control" id="itemName" name="itemName" value="{{ Session::get('old')['ItemName'] }}"  placeholder="please enter the item name *"  data-validation-required-message="Please enter the item name">
    		          		</div>
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    		          			<input type="text" class="form-control" id="itemBrand" value="{{ Session::get('old')['ItemBrand'] }}" name="itemBrand" placeholder="please enter your item's brand *" data-validation-required-message="Please enter your item brand.">
    		          		</div>
    	          		</div> 
    	          	<br> 
	    	          	<div class="row">
	    	          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
	    	          			<input type="number" class="form-control" value="{{ Session::get('old')['Price'] }}"  id="price" name="price" placeholder="Enter price*"  data-validation-required-message="Please enter the price of your item" >  
	                            <input type="hidden" id="categoryBox" name="categoryBox" >
	                            <input type="hidden" id="difference" name="diff" value="shop" >

	                    	</div>
	                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	                        	<input type="number" class="form-control" value="{{ Session::get('old')['Size'] }}" id="size" name="size" placeholder="Size * number only ">
	                        </div>
    	          		</div>

    	         <br> 
    		         <!-- choose category -->
    		           <div class="row">
    	                    <div class="col-md-12 text-center">
    	                    		<span class="" id="otherCategory" onclick="checkMeOtherSpan()"><input type="checkbox" class="threeD" id="other" onclick="otherCheck()"/>  Other</span>
    	                       
    	                        	<span class="" id="gentsCategory" onclick="checkMeGentsSpan()"><input type="checkbox" class="threeD" id="gents" onclick="gentsCheck()"/> Gents</span>
    	             
    	                        	<span class="" id="ladiesCategory" onclick="checkMeLadiesSpan()"><input type="checkbox" class="threeD" id="ladies" onclick="ladiesCheck()"/> Ladies</span>
    	                     </div>
    					</div>
    			<br>
                	</div>

					<div class="row"> 
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center"> 
							<button   class="btn btn-danger goodWidth" id="cancel" name="cancel" value="cancel">Cancel</button>
							<button   class="btn btn-default goodWidth" id="finalise" name="finalise" value="finalise">Upload</button>
							<button  class="btn btn-default goodWidth" id="finalise2" name="alternate" value="alternate">Alternate-upload</button>
						</div>

					</div>
          		</form>
          	<!--/.container -->
            </div>
</section>
	<style> 

		#commcycleTitle{
			font-size:15px;
		}
	</style>
	
		

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