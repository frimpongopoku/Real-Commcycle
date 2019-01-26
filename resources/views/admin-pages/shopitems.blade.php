@if(Session::has('admin'))
        @foreach($admins as $admin)
            @if(Session::get('admin') == $admin->name.":".$admin->password )

				@extends('admin-pages.admin-nav')

				@section('content')
					<div style="margin-top:40px;"></div>
					<h1 class="text-center solid-text-light"><span style="color:deeppink;">ALL</span> <span style="color:orange;">SHOP'S</span> <span style="color:cyan;">ITEMS</span></h1>
					<hr>
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-lg-9 col-sm-12 col-xs-12">
								@forelse($shop as $shop_item)
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<div class="thumbnail  solid-two">
											<small class="text text-success pull-right clearfix label label-default solid-text-light">{{ $shop_item->created_at->diffForHumans() }}</small>
											<h1 class="panel-title solid-text-light">{{ $shop_item->Name }}</h1>
										</div>
										<div class="panel panel-default item solid-two">
											<div class="panel-heading solid-two ">
												<small class="label label-primary solid-two " style="background-color:black;"><i class="fa fa-bookmark" style="color:deeppink;"> </i> {{ $shop_item->Category }}</small>
												<small class="post-title label label-info pull-right solid-two" style="background-color:black;cursor:pointer;"><i class="fa fa-certificate" style="color:deeppink;"></i> {{ $shop_item->Brand }}</small>
											</div>
											<div classs="panel-body">
												<img src="{{ $shop_item->Pics }}" class="img-responsive com-image" style="width:100%; height:200px;">
											</div>
											<div class="panel-footer clearfix">
												<p class="label label-info solid-text-light"> {{ $shop_item->Item }}</p> <i> </i> <p class="label label-success solid-text-light">ZAR {{ $shop_item->Price }}</p>
												<button class="btn btn-danger btn-sm pull-right solid-two" type='button' data-toggle='modal' data-target='#Shop-item-{{ $shop_item->id }}'><i class="glyphicon glyphicon-trash"></i></button>	
											</div>
										</div>	
									</div>
									<!-- ######################## DELETE FREE ITEM MODAL ################### --> 
									<div class='modal fade' id='{{ 'Shop-item-'.$shop_item->id }}'>
										<div class='modal-dialog modal-sm'>
											<div class='modal-content'> 
												<div class='modal-header'> 
													<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
													<h3 class='modal-title'>Delete</h3>
												</div>
												<div class='modal-body'> 
													<small>{{ explode(":",Session::get('admin'))[0] }}! are you sure you want to delete '<b>{{ $shop_item->Item }}</b>'</small>
												</div>
												<div class='modal-footer'> 
													<a type="button" href="admin-deletion/{{ explode(":",Session::get('admin'))[0] }}/shop/{{ $shop_item->id }}" class="btn btn-danger pull-right solid-two">Yes</a>
												</div>
											</div> 
										</div> 
									</div>
								@empty 
									<p class="alert alert-warning">There are no items in commcycle-shop</p>
								@endforelse
								
							</div>
						</div>
						{{ $shop->links()}}
						<div class="row"> 
				            <div class="col-lg-9" >
				                <div class="list-group solid-two" id="nopicbox">
				                    <a class="list-group-item active clearfix"><h4 class="solid-text">No picture items</h4></a>
				                    @forelse($shopNoPic as $item)
				          
										<a class="list-group-item">
							                <h4 class="list-group-item-heading solid-text-light">{{ $item->Name }}'s upload  <button class="btn btn-danger btn-sm pull-right solid-two" type='button' data-toggle='modal' data-target='#No-Pic-Shop-item-{{ $item->id }}'><i class="glyphicon glyphicon-trash"></i> Delete</button></h4>
							                <p class="list-group-item-text"><b>Price:</b> ZAR {{ $item->Price }}<br><b>{{ $item->Name }}'s email:</b> {{ $item->Email }}</p>
							                <small class="list-group-item-text label label-info solid-text-light text text-info">{{ $item->Item }}</small>
							                <small class="list-group-item-text pull-right label label-default solid-text-light clearfix">{{ $item->created_at->diffForHumans() }}</small>
							            </a>
								       
								        <!-- ######################## DELETE FREE ITEM NO-PIC MODAL ################### --> 
											<div class='modal fade' id='{{ 'No-Pic-Shop-item-'.$item->id }}'>
												<div class='modal-dialog modal-sm'>
													<div class='modal-content'> 
														<div class='modal-header'> 
															<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'></span>&times;<span class="sr-only"></span></button>
															<h3 class='modal-title'>Delete</h3>
														</div>
														<div class='modal-body'> 
															<small>{{ explode(":",Session::get('admin'))[0] }}! are you sure you want to delete '<b>{{ $item->Item }}</b>'</small>
														</div>
														<div class='modal-footer'> 
															<a type="button" href="admin-deletion/{{ explode(":",Session::get('admin'))[0] }}/shopB/{{ $item->id }}" class="btn btn-danger pull-right solid-two">Delete</a>
														</div>
													</div> 
												</div> 
											</div>
									@empty 
										 <a class="list-group-item clearfix">There are no items in this section</button></a>
									@endforelse
								</div>
							</div>	
						</div>
						
					</div>
					{{ $shopNoPic->links() }}
					
				@endsection
			@endif 
		@endforeach 
@else 
	<div class="container" style="margin-top:300px">
        <div class="row col-md-6 col-lg-6 col-md-offset-3 col-sm-12 col-xs-12"> 
            <div class="alert alert-warning clearfix solid solid-text-light" style="background: deeppink; color:cyan;">
                <p>You are not signed in as an admin. Please do so :) <a class="btn btn-success pull-right solid-two" href="{{ route('admin.signin') }}" style="background:orange;">Sign in </a></p>
            </div>
        </div>
    </div>
@endif