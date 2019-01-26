@extends('main.MDmain')

@section('title')
	Commcycle-Free stuff for the community
@endsection

	{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','commcycleshop') }}
@section('content') 
	<div class="clearfix" style="margin-top:60px;"></div>
	<section id="all">
		<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 text-center">
						<div class="section-title">
						<h2 class="section-title solid-text phone-shops-title-old" id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> COMMCYCLE SHOP A</b></h2>
						<h2 class="section-title solid-text phone-shops-title-new" data-toggle='popover' data-placement='bottom' data-content='Below are items from random people that have been uploaded. Everything is totaly free, you just need to apply for what you want, and if you deserve it, it shall surely be yours. If you are felling a bit kind, just click on the upload button to upload a picture of an item you possess and want to donate.' id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> COMMCYCLE SHOP A</b></h2>
							
							<p id='phone-text'>Below are items from random people that have been uploaded. Everything is totaly free, you just need to apply for what you want, and if you deserve it, it shall surely be yours. If you are felling a bit kind, just click on the upload button to upload a picture of an item you possess and want to donate.</p>
							<a class="btn btn-warning solid-two-light" id="postButton" href="#uploadSection"  onclick="appear()">Post</a> 
							<a class="btn btn-info solid-two-light" href="commcycleshopB">Commcycle no photo <i class="fa fa-forward"></i></a> 
							


	  					</div>
					</div>
					<div class="col-lg-3 col-md-3" id="newsBar">
					
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
		
		@if (Session::has("category-chosen"))
			@if(Session::get("category-chosen")=='Ladies') 
				<div class='container'> 
					<div class='row'> 
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							
								<h3 style='color:deeppink' class='solid-text-light-two'> <center>LADIES</center></h3>
								<hr>
								
								@foreach($ladies as $item)
								
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
									    	<button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/commy-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
									    <a href="add-to-cart/commcycle/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm btn-warning"><span class='fa fa-eye'></span></a>
									    	

									
									  </div>
									
									</div>
								</div>
								<!-- ########################## modal for 'Ladies' items ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body' style='overflow-x: wrap;'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width75%; height:350px'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-success solid-two fontlize">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span>
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span><br>
				                                	<span class="solid-text-light-two"><b>Additional information:</b></span><br><span class=''>{{ $item->Info }}</span><br>
				                                	<span class="label label-default solid-two solid-text-light pull-right"> <b><span class='solid-text-light-two'>Posted by: {{ $item->Name }}</span></b> <small class='fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></span>
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>
																	
							
								@endforeach
						
							<div> 
								{{$ladies->links()}}
							</div>
						</div>					
					</div>
				</div>	
										{{-- //END OF LADIES--}}
			@elseif(Session::get("category-chosen")=='Gents')
				<div class='container'> 
					<div class='row'>
						<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12'> 
						
							@foreach($gents as $item)
							
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
									    <button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/commy-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
									    <a href="add-to-cart/commcycle/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm btn-warning"><span class='fa fa-eye'></span></a>
									
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
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80%; height:350px'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-success solid-two fontlize solid-text-light">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span> 
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span><br>
				                                	<span class="solid-text-light-two"><b>Additional information:</b></span><br><span class=''>{{ $item->Info }}</span><br>
				                                	<span class="label label-default solid-two solid-text-light pull-right"><b><span class='solid-text-light-two'>Posted by: {{ $item->Name }}</span></b> <small class='fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></span> 
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>

							
							@endforeach
							<div >
							{{$gents->links()}} 
							</div>
						</div>
					</div>
					
					{{-- //END OF GENTS --}}
			@elseif(Session::get("category-chosen")=='Other')
							<div class='container'> 
					<div class='row'>
						<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12'> 
							@foreach($others as $item)
							
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
									    <button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/commy-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
									    <a href="add-to-cart/commcycle/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm btn-warning"><span class='fa fa-eye'></span></a>
									
									  </div>
									
									</div>

								</div>
								<!-- ########################## modal for 'Others' items ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80%; height:350px'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-success solid-two fontlize solid-text-light">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span> 
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span><br>
				                                	<span class="solid-text-light-two"><b>Additional information:</b></span><br><span class=''>{{ $item->Info }}</span><br>
				                                	<span class="label label-default solid-two solid-text-light pull-right"><b><span class='solid-text-light-two'>Posted by: {{ $item->Name }}</span></b> <small class=' fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></span> 
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>
							
							@endforeach
							<div> 
								{{$others->links()}}
							</div>
						</div> 
					</div> 
				</div>
			@endif
		
		
		{{-- WELCOME TO THE NO CATEGORY AREA--}}
		
		@else 
		<div class="container">
				<div class="row">
				
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						@forelse($free_items as $item)
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
									    <button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/commy-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
									    <a href="add-to-cart/commcycle/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm btn-warning"><span class='fa fa-eye'></span></a>
									
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
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80%; height:85%'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-success solid-two fontlize solid-text-light">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span> 
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span><br>
				                                	<span class="solid-text-light-two"><b>Additional information:</b></span><br><span class=''>{{ $item->Info }}</span><br>
				                                	<span class="label label-default solid-two solid-text-light pull-right"><b><span class='solid-text-light-two'>Posted by: {{ $item->Name }}</span></b> <small class='fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></span> 
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two' type='button' data-dismiss='modal'>Close</button>
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
									    <!-- Button -->
									    <button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/commy-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>

									    <a href="add-to-cart/commcycle/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm btn-warning"><span class='fa fa-eye'></span></a>

									
									  </div>
									
									</div>
																	
								</div>
								<!-- ########################## modal for 'Ladies' items ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body' style='overflow-x: wrap;'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:70%; height:85%'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-success solid-two fontlize">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span>
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span><br>
				                                	<span class="solid-text-light-two"><b>Additional information:</b></span><br><span class=''>{{ $item->Info }}</span><br>
				                                	<span class="label label-default solid-two solid-text-light pull-right"> <b><span class='solid-text-light-two'>Posted by: {{ $item->Name }}</span></b> <small class='fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></span>
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two' type='button' data-dismiss='modal'>Close</button>
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
									    <button class='btn btn-primary btn-sm pull-right' onclick="theShare('commcycle.co/commy-product-view/{{$item->id}}')"><i class='fa fa-facebook'></i></button>
									    <a href="add-to-cart/commcycle/{{ $item->id }}" class="btn btn-sm btn-success">Buy</a>
									    <a data-toggle='modal' data-target='#modal{{$item->id}}' class="btn btn-sm btn-warning"><span class='fa fa-eye'></span></a>
									
									  </div>
									
									</div>
								</div>
								<!-- ########################## modal for 'Others' items ########################### -->
								<div class="modal fade" id='{{ 'modal'.$item->id }}'> 
					                <div class="modal-dialog modal-md"> 
					                    <div class="modal-content"> 
					                        <div class="modal-header"> 
					                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
					                            <h4 class='modal-title solid-text-light' style='color:black;'><b>{{ $item->Item }} </b></h4>
					                        </div>
					                        <div class='modal-body'>
					                            <center> 
					                                <img class='img-thumbnail solid-two' src='{{ $item->Pics }}' style='width:80%; height:85%'>
					                            </center>
					                            <p style="color:black;">
					                            	<span class="label label-success solid-two fontlize solid-text-light">Brand: <b><span class='solid-text-light-two fontlize'>{{ $item->Brand }}</span></b></span> 
				                                	<span class="label label-warning solid-two solid-text-light">Category: <b><span class='solid-text-light-two'>{{ $item->Category }}</span></b></span><br>
				                                	<span class="solid-text-light-two"><b>Additional information:</b></span><br><span class=''>{{ $item->Info }}</span><br>
				                                	<span class="label label-default solid-two solid-text-light pull-right"><b><span class='solid-text-light-two'>Posted by: {{ $item->Name }}</span></b> <small class=' fontlize'><b>{{ $item->created_at->diffForHumans() }}</b></small></span> 
					                            </p>
					                        </div>
					                        <div class='modal-footer'> 
					                            <button class='btn btn-danger solid-two' type='button' data-dismiss='modal'>Close</button>
					                        </div>
					                    </div>
					                </div>
					            </div>
							@endif
						@empty 
							<p class="alert alert-info solid-two">There are no items available in the Commcycle shop for now</p>
						@endforelse

					</div>
				</div>
				{{ $free_items->links() }}
			</div>


@endif







	</section>






<!-- ################################################# UPLOAD FORM #######################################################-->
	<section id="uploadSection">
	            <div class="container" id="uploadSheet" style=" display:none; border: solid 3px red; padding:10px; background-color: black; opacity:0.9; ">
	                <div class="row">
	                    <div class="col-lg-12 text-center">
	                        <div class="section-title">
	                            <h1 style="color:white;"><strong>Upload Form</strong></h1>
	                            <p class="lead" align="left" style="color:white;">By uploading this image you certify that the item exists and you have no other plans for that item. You are uploading the item unto the Comm-Sector which indicates that your item is totally free and there are no strings attached. You shall not come back for your item after it has already been given out and been used. 
	                            </p>
	 							<div class="threeD">
	             					<label for="agreement" class="text text-success" id="agreementLabel"><input type="checkbox" name="agreement" id="agreement" onclick="agreementHideToggle() ">  I agree to the terms stated above.</label>
	             				</div>
	                        </div>
	                       
	                    </div>
	                </div>
	             
	             
	            
	          	<!-- all the text boxes --> 
	          		<form action="freeupload" method="post" enctype="multipart/form-data">
	                    {{ csrf_field() }}
	                    <div id="textboxPane" style="display:none;">
	                        <div class="row col-md-12 col-md-offset-5 col-lg-12 col-lg-offset-5 col-sm-12 col-sm-offset-4 col-xm-12 col-xs-offset-4">
	                            <input type="file" name="image" id="selectedImage" style="color:white;">
	                        </div>
	                    <br>
	                    <br>
	              			<div class="row">
	    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
	    		          			<input type="text" class="form-control" id="name" name="name" placeholder="please enter your name *"  value="{{ Session::get('old')['Name'] }}" data-validation-required-message="Please enter your name.">
	    		          		</div>
	    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	    		          			<input type="text" class="form-control" id="email" name="email" value="{{ Session::get('old')['Email'] }}" placeholder="please enter your email *" data-validation-required-message="Please enter your email.">
	    		          		</div>
	    	          		</div> 
	    	          	<br>
	              			<div class="row">
	    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
	    		          			<input type="text" class="form-control" id="itemName" name="itemName" placeholder="please enter the item name *" value="{{ Session::get('old')['ItemName'] }}" data-validation-required-message="Please enter the item name">
	    		          		</div>
	    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	    		          			
	    		          				<input type="text" class="form-control" id="itemBrand" name="itemBrand" placeholder="please enter your item's brand *" value="{{ Session::get('old')['ItemBrand'] }}" data-validation-required-message="Please enter your item brand.">
	    		          				<button class='btn btn-default' id='book-button' data-toggle="tooltip" data-placement='top' title="If the item you are uploading is a textbook/jotter/notebook just click this button to automatically brand it. Else, feel free to type in your own brand.">Book</button>
	    		          			
	    		          		</div>
	    	          		</div> 
	    	          	<br> 
	    	          	<div class="row">
	    	          		<div class="col-lg-12">
	    	          			<textarea type="text" class="form-control" id="info" name="info" placeholder="please describe what kind of person you would like to have this and any additional information about this item Eg.Size of a shirt*"   data-validation-required-message="Please enter additional information" >{{ Session::get('old')['Info'] }}</textarea>
	                            <input type="hidden" id="categoryBox" name="categoryBox" >
                            	<input type="hidden" id="difference" name="diff" value="free" >	                            
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
	
		$(function () {
 			 $('[data-toggle="tooltip"]').tooltip()
		})
		
		
		$("#book-button").on('click',function(e){
			e.preventDefault();
			$('#itemBrand').val('Book');
		
		});
		
		
		
		function theShare(url){
			 FB.ui({
			    method: 'share',
			    display: 'popup',
			    href:url,
			  }, function(response){});
			
		};
	</script>
@endsection