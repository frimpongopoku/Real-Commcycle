@if(Session::has('admin'))
		@foreach($admins as $admin)
			@if(Session::get('admin') == $admin->name.":".$admin->password )
				@extends('admin-pages.admin-nav')

				@section('content')
					<div style="margin-top:40px;"></div>
					<h3 class="text-center solid-text-light">Transactions</h3>
					<hr>
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-lg-9 col-sm-12 col-xs-12" style='height:600px;'>
								<!--Table-->
							<table class="table">
							
							    <!--Table head-->
							    <thead class="blue-grey lighten-4">
							        <tr>
							            <th>#</th>
							            <th>ADMIN</th>
							            <th>ITEMS</th>
							            <th>SHOP</th>
							            <th>CASH</th>
							        </tr>
							    </thead>
							    <!--Table head-->
							
							    <!--Table body-->
							    <tbody>
							    	@forelse($trans as $t)
								        <tr>
								            <th scope="row">{{$t->id}}</th>
								            <td>{{$t->adminName}}</td>
								            <td>{{$t->item}}</td>
								            <td>{{$t->shop}}</td>
								            <td class='text text-success'>+ {{$t->money}}</td>

								        </tr>
								@empty 
									 <th scope="row">1</th>
								            <td>No Transaction yet</td>
								            <td>No Transaction yet</td>
								            <td>No Transaction yet</td>
								            <td>No Transaction yet</td>

								        
							        @endforelse
							           
							            <tr>
								            <th scope="row">TOTAL</th>
								            <td></td>
								            <td></td>
								            <td></td>
								            <td class='btn btn-success'>
								            	@php 
								            		$number =0;
								            		foreach($trans as $d) {
								            			$number = $number + $d->money;
								            		
								            		}
								            		echo $number;
								            		
								            	@endphp
								            
								            
								            </td>
							            </tr>

							        
							    </tbody>
							    <!--Table body-->
							
							</table>
							<!--Table-->
							
											
							</div> 
						</div> 
					</div> 
				@endsection 
			@endif
		@endforeach 
@endif
					