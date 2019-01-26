@extends('main.MDmain')

@section('title') 
	Our Products
@endsection
@section('content')
	<div class='container'> 
		<div class='row'> 
		//STAFFULTY CHECK 
		
		@if(Session::has('staffulty'))
		
		
		@else
			<div class='modal fade' id='staff'> 
				<div class='modal-dialog modal-md'> 
					<div class='modal-content'>
						<div class='modal-body'> 
							<h3 class=''>Are you a staff member?</3>
						</div>
					
						<div class='modal-footer'> 
							<a href='/staffulty-check' class='btn btn-success solid-two-light'>YES</a>
							<a href='/not-staffulty' class='btn btn-danger solid-two-light'>NO</a>
						</div>
					</div>
				</div>
				
			</div>
		@endif
			<div class='col-lg-8 col-md-8  col-sm-8 col-xs-12 col-md-offset-1' style='margin-top:80px;margin-bottom:400px;'> 
			
			    <ul class="nav nav-tabs">
				    <li class='active'><a href="#one" data-toggle='tab'>Laptop Bags</a></li>
				    <li><a href="#two" data-toggle='tab'>Career Bags</a></li>
				    <li><a href="#three" data-toggle='tab'>Reviews</a></li>

				   
			    </ul>
			   <br>
			   <div class='tab-content'>
				   <div id='one' div role="tabpanel" class="tab-pane active in fade" > 
				   	
				   	@forelse($Lappy as $product)
				   		@if($product->Brand =='Laptop')
						   	<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'> 
						   		<div class='thumbnail solid-two' style='padding:5px;border: solid 3px #585858;margin-bottom:2px; height:320px; width:100%;'> 
							   		<img src='{{$product->Pics}}' style="height : 305px !important; width : 100% !important; object-fit: cover !important;">							   	</div>
							   	<div class='thumbnail clearfix solid-two-light' style='padding:6px;margin-top:3px;'>
							   		<div class='pull-right'>
							   			<a class='solid-two btn btn-warning' href='/product-view/{{$product->id}}'> <span class='fa fa-eye'></span></a>
							   			<button class='btn btn-primary' onclick="theShare('commcycle.co/product-view/{{$product->id}}')"><i class='fa fa-facebook'></i></button>

							   		
							   		</div>
							   		<h4>{{$product->Item}}</h4>

							   			 	
							   	</div>

						   	
						   	</div>
						   	
						   @endif
					   @empty
					   <h3>ALL ITEMS ARE SOLD OUT</h3>
					   @endforelse
					  <hr>
						{{$Lappy->links()}}
 	
				   	
				   </div>
				   <!--############################ CARRIER BAGS ######################-->
				   <div id='two' div role="tabpanel" class="tab-pane fade" >
				   	<center> 
				   		<p><b>We are career about our carrier bags :-)</b></p>
				   		<hr>
				   	</center> 
				   	@forelse($Car as $product)
				   		@if($product->Brand =='Carrier')
						   	<div class='col-md-6 col-lg-6 col-sm-6 col-xs-12'> 
							   	<div class='thumbnail solid-two' style='padding:5px;border: solid 3px #585858;margin-bottom:2px; height:320px; width:100%;'> 
							   		<img src='{{$product->Pics}}' style="height : 305px !important; width : 100% !important; object-fit: cover !important;">
							   	</div>
							   	<div class='thumbnail clearfix solid-two-light' style='padding:6px;margin-top:3px;'>
							   		<div class='pull-right'>
							   			<a class='solid-two btn btn-warning' href='/product-view/{{$product->id}}'> <span class='fa fa-eye'></span></a>
							   			<button class='btn btn-primary' onclick="theShare('commcycle.co/product-view/{{$product->id}}')"><i class='fa fa-facebook'></i></button>

							   		
							   		</div>


							   		<h4>{{$product->Item}}</h4>
							   			 	
							   	</div>
							   	
						   	</div>
						   							   	
						   	
						   @endif
					   @empty
					   <h3>ALL ITEMS ARE SOLD OUT</h3>
					   @endforelse
					   <hr>
						   	{{$Car->links()}}

	
				   </div> 
				    <div id='three' div role="tabpanel" class="tab-pane fade" >
				    	<div class='comment-area clearfix'> 
				    		<button class='btn btn-default btn-floating btn-lg pull-right' id='comment-button' ><span class='fa fa-comment'></span></button>
				    		
				    		<form action='/create-rev' method='get' id='comment-form'>
					    		<div class="md-form">
							    <textarea type="text" id="comment-box" name='text' class="form-control md-textarea" rows="3"></textarea>
							    <label for="textareaPrefix">Comment</label>
							    
							</div>
							<div class="md-form " style='width:50%'>
								<div class=''>
								    <input type="text" id="name-box" name='name' class="form-control">
								    <label for="form1" >Name</label>
								</div>
							</div>
							<div class="md-form " style='width:50%'>
								<div class=''>
								    <input type="number" id="rating-box" max='10' min='0' name='rating' class="form-control">
								    <label for="form1" >Rate product from 1 - 10</label>
								</div>
							</div>

						</form>
				    		

				    		
				    		
				    	</div>
				    	<div id='post-box'>
					    	<div class="card-group">
					    		@forelse($rev as $post)
							  <div class="card" style='margin-bottom:5px;'>
							        <div class="card-body" style='padding:15px;'>
							            <h5 class="card-title"><b>{{$post->name}}</b></h5>
							            <p class="card-text">{{$post->text}}</p>
							        </div>
							        <div class="card-footer" style='padding:15px;border: solid 2px black;'>
							            <small class="">{{$post->created_at->diffForHumans()}}</small>
							        </div>
							    </div>
							 @empty 
							 	<center><p> No reviews have been made at the moment! Be the first </p> </center> 
							 
							 @endforelse
						</div>
					</div>
				    
				    </div>
			  </div>
			  <center> 
			  	
			  </center>
			  
			  
				   
		</div>
			<div class='col-md-3 col-lg-3 col-sm-3 col-xs-12' style='margin-top:145px;'> 
				@forelse($rev as $comments)
				 <div class="card   text-center success-color " style='height:200px; min-height:200px; max-height:200px; overflow-y:scroll; margin-bottom:5px;padding:10px;'>
			            <div class="card-body">
			                <p class="white-text mb-0">{{$comments->text}}</p>
			            </div>
			        </div>
			        <div class='panel-footer clearfix' style='margin-bottom:10px;'> 
			        		
			        		<small class='pull-right' style='margin-top:7px; color:black; font-size:1.5;'>
			        		<span class='{{$comments->rating > 0 ? "fa fa-star" : ""}} '></span> 		 
  							{{
  								$comments->rating > 0 ? strval($comments->rating *10)."%" :''
  											        		 		
			        		 	}}</small>
			        		 	
			        	
			        		<p style='font-size:1em'>By: {{$comments->name}}</p>
			        </div>
			        @empty
			        @endforelse
			
			
			</div>

			

			
			</div>
		</div>
	</div>
	
@endsection
@section('custom-js')
	<script type="text/javascript">
	
	
		function theShare(url){
			 FB.ui({
			    method: 'share',
			    display: 'popup',
			    href:url,
			  }, function(response){});
			
		};
		$('#comment-button').on('click',function(){
			if( $('#comment-box').val() =='' || $('#name-box').val()=='' || $('#rating-box').val() ==''){
				alert('Please make sure you have filled all parameters');
			
			}else{
			
				$('#comment-form').submit();
			
			//DO some ajax
			/* $.ajax({
				url:'/create-rev', 
				method:'get', 
				data:{name:$('#name-box').val(),text:$('#comment-box').val()}
				
			}).done(function(){
					$('#comment-box').val() =''; 
					$('#name-box').val() =''; 
					$('#post-box').fadeOut(200,function(){
						$('#post-box').load('/refresh-revs',function(){
							$('#post-box').fadeIn(200);
						
						});
					
					});		
			
			}); */
			
			}
			
		
		});

		@if(Session::has('staffulty'))
			
		@else 
				
			$(window).on('load',function(){
				$('#staff').modal('show');
			});
					
			
		@endif
	</script>

@endsection
