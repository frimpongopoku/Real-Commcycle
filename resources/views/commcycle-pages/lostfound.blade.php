@extends('main.MDmain') 

@section('title') 

	Lost & Found

@endsection


{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','lostfound') }}
	
@section('content') 

	<div style='margin-top:70px;'> 
	</div>
	<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 text-center">
						<div class="section-title">
							<h2 class="section-title solid-text phone-shops-title-old" id="commcycleTitle"><i class="fa fa-hand-stop-o text text-primary"></i><b> LOST & FOUND</b></h2>
						<h2 class="section-title solid-text phone-shops-title-new" data-toggle='popover' data-placement='bottom' data-content='Did you find anything anywhere? Are you in possession of anything that does not belong to you? Just Take a picture of it and drop it here! ' id="commcycleTitle"><i class="fa fa-hand-stop-o text text-primary"></i><b> LOST & FOUND</b></h2>
							
							<p id='phone-text'>Did you find anything anywhere? Are you in possession of anything that does not belong to you? Just Take a picture of it and drop it here! </p>
							
		<button class="btn btn-info solid-two-light solid-text-light-two" data-toggle='modal' data-target='#post-found'> Post </button> 

							
	  					</div>
					</div>
				</div>
			</div>
			
	<div class='container'> 
		<div class='row'> 
			{{--tabs --}}
			<div class='col-lg-10 col-md-10 col-md-offset-1 col-sm-12 col-xs-12'>
				<ul class="nav nav-tabs">
					  <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Requests</a></li>
					  <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Found</a></li>
				</ul>
				   <div id="myTabContent" class="tab-content">
					  <div class="tab-pane fade active in" id="home">
					  <br> 
					  	
					  	@forelse($requestPics as $req)
						  	<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
						  		<div class="card card-cascade wider" style='margin-bottom:20px'>
	
								  <!-- Card image -->
								  <div class="view overlay">
								    <img class="img-fluid z-depth-5 img-responsive" src="{{$req->Pics}}" alt=" image for {{$req->item}}" style="height : 300px !important; width : 100% !important; object-fit: cover !important;">
								    <a href="#!">
								      <div class="mask rgba-white-slight"></div>
								    </a>
								  </div>
	
								  <!-- Card content -->
								  <div class="card-body text-center" style='padding:15px;height:190px; overflow-y:scroll; max-height:190px;min-height:190px;'>
								
								    <!-- Title -->
								    <h4 class="">{{$req->Item}}</h4>
								    <!-- Subtitle -->
								    <h5 class="blue-text pb-2"><strong>By: {{$req->name}}</strong></h5>
								    <!-- Text -->
								    <p class="card-text">{{$req->info}}</p>
								    								 								    
								
			 					 </div>
			 					 <div class='panel-footer clearfix'>
								    <!-- Social -->
								       <small class='pull-right'>{{$req->created_at->diffForHumans()}}</small>

								    <button class="px-2 fa-lg fb-ic btn btn-primary btn-sm" onclick='theShare("commcycle.co/item-view/{{$req->id}}")'><i class="fa fa-facebook"></i></button>
								  </div>
	
								</div>
	<!-- Card Wider -->
	
	<!-- Card Narrower -->
	
							</div>
						@empty
						
							
						@endforelse 
										 
					</div>
					
			                
			                
					  <div class="tab-pane fade" id="profile">
					  <br>
					  <!-- SHOW FOUND ITEMS -->
					    @forelse($found as $f)
						  	<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
						  		<div class="card card-cascade wider" style='margin-bottom:10px;'>
	
								  <!-- Card image -->
								  <div class="view overlay">
								    <img class="img-fluid z-depth-5 img-responsive" src="{{$f->Pics}}" alt="Card image cap" style="height : 300px !important; width : 100% !important; object-fit: cover !important;">
								    <a href="#!">
								      <div class="mask rgba-white-slight"></div>
								    </a>
								  </div>
								
								  <!-- Card content -->
								  <div class="card-body text-center" style='padding:15px;height:250px; overflow-y:scroll; max-height:250px;min-height:250px;'>
								
								    <!-- Title -->
								    <h4 class="">{{$f->Item}}</h4>
								    <!-- Subtitle -->
								    <h5 class="blue-text pb-2"><strong>By: {{$f->name}}</strong></h5>
								    <!-- Text -->
								    <p class="card-text">{{$f->info}}</p>
								    								 								    
								
			 					 </div>
			 					 <div class='panel-footer clearfix'>
								    <!-- Social -->
								       <small class='pull-right'>{{$f->created_at->diffForHumans()}}</small>
								    <button class="px-2 fa-lg fb-ic btn btn-primary btn-sm " onclick='theShare("commcycle.co/item-view/{{$f->id}}")'><i class="fa fa-facebook"></i></button>
								    
								    
								    </div>
	
								</div>
	<!-- Card Wider -->
	
	<!-- Card Narrower -->
	
							</div>
						@empty
						
							
						@endforelse 	
							
				  	 </div>  
				  	 
				  	 
				 </div>
				 				
				{{$found->links()}}	


				
			</div>
						
		</div>
		
		{{--UPLOAD MODAL--}}
		<div class='modal fade' id='post-found'> 
			<div class=' modal-dialog modal-md' style='border:solid 3px orange'>
				<div class='modal-content'> 
					<div class='modal-header' style='background-color:cyan; border-radius:0px;'> 
						<h3 class='modal-title solid-text-light-two'>Post Found Item</h3>
					</div>
					<div class='modal-body'>
					
						<div>	
						
							<!-- MODAL TABS --> 
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#req-upload-pane" data-toggle="tab" aria-expanded="true">Requests</a></li>
							  <li class=""><a href="#found-upload-pane" data-toggle="tab" aria-expanded="false">Found</a></li>
							</ul>
						  	 <div id="" class="tab-content">
						  	 	 <div class="tab-pane fade active in" id="req-upload-pane">
						  	 	 <!-- UPLOAD FOR REQUESTS -->
						  	 	 <br>
						  	 	 	<form id='request-form' name='request-form' method='post' action='/req-upload'
						  	 	 	 enctype='multipart/form-data'>	
						  	 	 	 	{{csrf_field()}}									 
 										<input type='hidden' id='picture' name='picture' value='yes'>
						  	 	 		<div class='row'>
							  	 	 		<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="text" name='name' id="name-box" class="form-control">
												    <label for="form1" >Your Name</label>
											   </div>
											</div>
											<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="text" name='item' id="item-box" class="form-control">
												    <label for="form1" >What did you lose?</label>
											   </div>
											</div>
											<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="text" name='email' id="email-box" class="form-control">
												    <label for="form1" >Email</label>
											   </div>
											</div>
											<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="file" name='image' id="image" >												    
											   </div>
											</div>
											<div class='col-md-12 col-lg-12 col-sm-12 col-xs-12'>
											    <div class="md-form">
																								    		 
  												   <textarea type="text" name='info' id="info-box"class="form-control md-textarea" rows="3"></textarea>
												    <label for="textareaBasic" >Other details.</label>												 
 											    </div>
											</div>

											
										</div>

										
									</form>
									
								<button class='btn btn-default indigo ' id='req-post' >Post</button>
								<button class='btn btn-default  btn-outline-secondary' id='req-post-no-pic'>No Pic</button>
						


						  	 	 </div>
						  	 	 <div class="tab-pane fade" id="found-upload-pane">
						  	 	 		 <!-- UPLOAD FOR FOUND -->
						  	 	 <br>
						  	 	 	<form id='found-form' name='found-form' method='post' action='/found-upload'
						  	 	 	 enctype='multipart/form-data'>	
						  	 	 	 	{{csrf_field()}}									 
 										<input type='hidden' id='fpicture' name='fpicture' value='yes'>
						  	 	 		<div class='row'>
							  	 	 		<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="text" name='fname' id="fname-box" class="form-control">
												    <label for="form1" >Your Name</label>
											   </div>
											</div>
											<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="text" name='fitem' id="fitem-box" class="form-control">
												    <label for="form1" >What did you find?</label>
											   </div>
											</div>
											<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="text" name='femail' id="femail-box" class="form-control">
												    <label for="form1" >Email</label>
											   </div>
											</div>
											<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'>
											    <div class="md-form">
												    <input type="file" name='fimage' id="fimage" >												    
											   </div>
											</div>
											<div class='col-md-12 col-lg-12 col-sm-12 col-xs-12'>
											    <div class="md-form">
																								    		 
  												   <textarea type="text" placeholder="Example: You can find me(Pongo) you will get your 'stuff'. Or I left it with security! " name='finfo' id="finfo-box"class="form-control md-textarea" rows="3"></textarea>
												    <label for="textareaBasic" >Other details.</label>												 
 											    </div>
											</div>

											
										</div>
									</form> 
									<button class='btn btn-secondary ' id='found-post-button' >Post</button>
									<button class='btn btn-default btn-outline-warning' id='found-post-no-pic'>No Pic</button>

						  	 	 </div>
						  	 </div>
																					
        			
						</div>
					</div>
					
					<div class='modal-footer' style='background-color:#585858'> 
					
						<button class='btn btn-danger btn-block'>NOTICE: SHARE YOUR UPLOAD</block>

					</div>
				</div> 
			</div>
		</div>
		
	</div>
	<div style='margin-bottom:400px;'> 
	</div>


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
		
		$('#req-post').on('click',function(){
			if(document.getElementById('image').value=='' || document.getElementById('item-box').value==''|| document.getElementById('info-box').value=='' || document.getElementById('email-box').value==''){
				alert('please make sure you have filled all parameters and selected an image!');
			
			}else{
			
				$('#request-form').submit();
			
			}
		});
		$('#req-post-no-pic').on('click',function(){
			if(document.getElementById('item-box').value==''|| document.getElementById('info-box').value=='' || document.getElementById('email-box').value==''){
				alert('please make sure you have filled all parameters.');
			
			}else{
				
				document.getElementById('picture').value='no';
				$('#request-form').submit();
			
			}
		});
		
		$('#found-post-no-pic').on('click',function(){
			if(document.getElementById('fitem-box').value==''|| document.getElementById('finfo-box').value=='' || document.getElementById('femail-box').value==''){
				alert('please make sure you have filled all parameters!');
			
			}else{
			
				document.getElementById('fpicture').value='no';

				$('#found-form').submit();
			
			}
			
			
		});
		
		$('#found-post-button').on('click',function(){
			if(document.getElementById('fimage').value=='' || document.getElementById('fitem-box').value==''|| document.getElementById('finfo-box').value=='' || document.getElementById('femail-box').value==''){
				alert('please make sure you have filled all parameters and selected an image!');
			
			}else{
			
				$('#found-form').submit();
			
			}
		});

	</script>

@endsection
