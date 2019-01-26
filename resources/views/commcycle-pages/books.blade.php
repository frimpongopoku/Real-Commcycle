@extends('main.MDmain')

@section('title')
	Commcycle-Free stuff for the community
@endsection

	{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','commcycle-books') }}
@section('content') 
	<div class="clearfix" style="margin-top:60px;"></div>
	<section id="all">
		<div class="container" style='margin-bottom:400px;'>
				<div class="row">
					<div class="col-lg-12 col-md-12 text-center">
						
						
						<div class='container'> 
					<div class='row'> 
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
								<h3 style='' class='solid-text-light-two'> <center>FREE BOOKS</center></h3>
								<center><h4>Books available for grabs </h4></center>
								<hr>
								
								@forelse($books as $item)
								
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
					            		@empty 
					            		<center>
						            		<div class="card success-color text-center z-depth-2" style="padding:15px; ">
								            <div class="card-body">
								                <h1 class="white-text mb-0">There are no books yet!</h1>
								            </div>
								        </div>
								 </center>
																	
							
								@endforelse
								
								
								
						
							<div> 
								{{$books->links()}}
							</div>
						</div>					
					</div>
				</div>	
					</div>
				</div>
		</div>
	<section> 
@endsection

@section('custom-js') 
	<script> 
	
		
	</script>
@endsection