@extends('main.main')

@section('content')
	<div style="margin-top:70px"></div>
	<div class="container" style="margin-bottom:250px;" id="cartBanner">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default solid">
					<div class="panel-heading clearfix"> 
						<small class="panel-title solid-text-light">@<span style="color:cyan;">com</span><span style="color:deeppink;">mcy</span><span style="color:orange;">cle</small>
						 <a class="btn btn-default pull-right solid-two" href="goback"><span class="fa fa-backward"></span></a>
					</div>
					<div class="panel-body">
						<div class="row" >
		                    <div class="col-lg-12">
		                        <h4 class="text-center solid-text-light"> Items in your cart <i style="color:lime" class="fa fa-shopping-cart"></i></h4>
		                        <div class="table-responsive">
		                            <table class="table table-bordered table-hover">
		                                <thead>
		                                    <tr>
		                                        <th class="solid-text-light-two text text-primary">Item</th>
		                                        <th class="solid-text-light-two text text-primary">Quantity</th>
		                                        <th class="solid-text-light-two text text-success">Price (ZAR)</th>
		                                        <th class="solid-text-light-two text text-danger">Remove <i class="fa fa-trash-o"></i></th>
		                                    </tr>
		                                </thead>
		                            
		                                <tbody>
		                                	@if(Session::has('cart'))
		                                		@foreach($products as $product)
				                                	<tr align="center">
				                                        <td class="text text-primary">{{ $product['Item']['Item'] }}</td>
				                                        <td class="text text-primary"> {{ $product['Quantity'] }} </td>
				                                        <td class="text text-success">{{ $product['Price'] }}</td>
				                                        <td><a class="btn btn-danger fa fa-trash" href="delete-cart-item/{{$product['Quantity'] }}/{{ $product['Price'] }}/{{ $product['Item']['id'].'->'.$product['shop'] }}"></a></td>
				                                    </tr>
				                                @endforeach
		                                	@else

		                                	@endif                             		
				                        </tbody>
		                            </table>
		                        </div>
		                    </div>
                   		 </div>
					</div>
					<div class='panel-footer'> 
			            <button class="btn btn-default solid-two solid-text-light-two" type="button" style="background: black; color:lime"><i class="fa fa-money" style="color:white"></i> Total: ZAR {{ $totalprice }}</button>
			         @if(Session::has('cart'))
			            <a class="btn btn-success pull-right solid-two solid-text-light-two" id="checkout" href="checkout"> Checkout</a>  
			         @endif     
					</div>
				</div>
			</div>
		</div>
	</div>
	<style> 
	#cartBanner{
		position:relative;
	}
	</style>
@endsection