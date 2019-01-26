@extends('admin-pages.security.sec-nav')

@section('title') 

	Security Admin
@endsection
@section('content') 
	<div class='col-md-6 offset-md-3 col-lg-12 col-sm-12 col-xs-12'> 
			<div class='container' > 
				<div style='margin-top:80px;'></div>
				<div class='row'> 
		
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style='min-height:600px; max-width:1000px;'>
						
						<center><p>Here, you have access to all the items that have been found. If an item is with security and the ownere comes for it, all you just need to do is clear the item and put down a very short detail</p></center>
						@foreach($found as $req)
							<div class='col-md-5 col-lg-5 col-sm-6 col-xs-12'>
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
	
									    <button class="px-2 fa-lg fb-ic btn btn-elegant btn-sm" data-toggle='modal' data-target='#sec-found-clear-{{$req->id}}' onclick=''>sort <i class="fa fa-eraser"></i></button>
									  </div>
		
									</div>
		<!-- Card Wider -->
		
		<!-- Card Narrower -->
				
								</div>
								
								 <!-- ######################## DELETE FREE ITEM NO-PIC MODAL ################### --> 
											<div class='modal fade' id='{{ "sec-found-clear-".$req->id }}'>
												<div class='modal-dialog modal-sm'>
													<div class='modal-content'> 
														<div class='modal-header' style='background:#373737; color:white;'> 
															<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
															<h3 class='modal-title'>Declare </h3>
														</div>
														<div class='modal-body'> 
															<small>{{ session::get('security-admin')->name }}! You are about  to declare '<b>{{ $req->Item }}</b>' safe with it's owner, take sometime to finish with just one little detail.</small>
														</div>
														<div class='modal-footer'> 
														<form action='/declare' method='get'>
														<input type='hidden' name='itemID' value="{{$req->id}}" />
															<input type="submit" class="btn btn-success btn-sm pull-right solid-two" value='Finish' />
															<textarea type='text' class='form-control md-textarea' name="detail" placeholder='Input as much information as you can get from the person yo gave the item to. Example: Name, hall etc'></textarea>
															
														</form>
														</div>
													</div> 
												</div> 
											</div>
					
					@endforeach 
					</div>	
					
				</div>
			</div>
			{{$found->links()}}
	</div>

@endsection 

@section('custom-js')

@endsection