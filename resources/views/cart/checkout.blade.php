@extends('main.main') 

@section('content') 
	<div style="margin-top:90px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-success solid">
					<div class="panel-heading solid">
						<h1 class="panel-title text-center" style="color:black; text-shadow: 0px 4px 8px rgba(0,0,0,0.8); font-size:50px;">Checkout <i class="fa fa-forward" style="color:black;"></i></h1><br>
						
					</div>
					<div class="panel-body" >
						<form action="docheckout" method="get">
							<div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid"><i class="glyphicon glyphicon-user blue"></i></span>
	                                <input type="text" name="name" placeholder="Name" class="form-control solid" required>
	                            </div>
                        	</div>
                        	<div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid"><i class="glyphicon glyphicon-envelope blue"></i></span>
	                                <input type="email" name="email" placeholder="Email" class="form-control solid" required>
	                            </div>
                        	</div>
	                        <div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid"><i class="glyphicon glyphicon-phone blue"></i></span>
	                                <input type="number" name="number" placeholder="Phone" class="form-control solid" required>

	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid"><i class="fa fa-address-card-o blue"></i></span>
	                                <textarea name="address" rows="3" placeholder="address * example Titans room 443" class="form-control solid" type="text" required></textarea>
	                            </div>
	                        </div>
		                        @foreach($products as $product)
		                        	@if($product['shop'] == 'commcycle' && $product['Price'] ==0 || $product['shop'] == 'commcycleB' && $product['Price'] ==0 )
		                        		<small>You can see this because one or more of the items in your shopping cart is from commcycle, and is free. Please tell us in a few sentences why we should give that item to you and not anyone else. <span style='color:red'><br><b>Remember: </b>First come,
 first served.</span></small>
					                    <div class="form-group">
				                            <div class="input-group">
				                                <span class="input-group-addon solid"><i class="fa fa-comment blue"></i></span>
				                                <textarea name="reason" rows="3" placeholder="Why should we give you this?" class="form-control solid" type="text" required></textarea>
				                            </div>
				                        </div>
				                    	@break;
		                        	@endif
		                        @endforeach
	                        
	                        <div class="form-group">

	                        <button type="submit" class="btn btn-success pull-right solid-two" >checkout <i class="glyphicon glyphicon-check"></i> </button><small class="pull-right" style="opacity: 0">s</small>
	                        <a class="btn btn-danger pull-right solid-two" href='{{ route('cart.show') }}'><i class="fa fa-backward"></i></a>

	                       	 <h4 class="text text-success"><span class="label label-success solid-two"><i class="fa fa-money"></i> ZAR {{ Session::get('cart')->price }}</span> </h4>
	                       	 	
	                        	
	                        </div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection 
