@extends('main.main')

@section('title')
	Commcycle-ShopB
@endsection
{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','shopB') }}
@section('content')
	<div class="clearfix" style="margin-top:60px;"></div>
	<section id ="all">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 text-center">
						<div class="section-title">
							<h2 class="section-title solid-text phone-shops-title-old" id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> SHOP A</b></h2>
							<h2 class="section-title solid-text phone-shops-title-new" data-toggle='popover' data-placement='bottom' data-content='Below are items from random people that have been uploaded. The prices allorted to them are their real prices and nothing is going to change sooner or later' id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> SHOP A</b></h2>
							<p id='phone-text'>Below are items from random people that have been uploaded. The prices allorted to them are their real prices and nothing is going to change sooner or later.</p>
							<a class="btn btn-info solid-two-light" href="shop"><i class="fa fa-backward"></i> Shop A </a> 
	  					</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						@forelse($no_pic_items as $item)
							@if($item->Category=="Gents")
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="panel panel-default solid">
										<div class="panel-heading text text-muted">
											<small class="label label-danger pull-right solid-two" style="background-color:black;"><i class="fa fa-bookmark" style="color:cyan;"></i> {{ $item->Category }}</small>
											<h1 class="panel-title"><i class="fa fa-male" style="color:cyan;"></i> {{ $item->Item }}</h1>
										</div>
										<div class="panel-body">
											<small class="text text-muted label label-default">Posted by</small><br><small class="text text-muted"> {{ $item->Name }}</small><br>
											<small class="text text-muted label label-default">Brand</small><br><small class="text text-muted"> {{ $item->Brand }}</small><br>
											<small class="text text-success pull-right">{{ $item->created_at->diffForHumans() }}</small><br>								
										</div>
										<div class="panel-footer clearfix">
											<p class="label label-primary solid-two fontlize"><i class="fa fa-money"></i> ZAR {{ $item->Price }}</p>
											<a type="button" href="add-to-cart/shopB/{{ $item->id }}" class="btn btn-success pull-right solid-two">Buy</a>
										</div>
									</div>
								</div>
							@elseif($item->Category=="Ladies")
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="panel panel-default solid">
										<div class="panel-heading text text-muted">
											<small class="label label-danger pull-right solid-two" style="background-color:black;"><i class="fa fa-bookmark" style="color:deeppink;"></i> {{ $item->Category }}</small>
											<h1 class="panel-title"><i class="fa fa-female" style="color:deeppink;"></i> {{ $item->Item }}</h1>
										</div>
										<div class="panel-body">
											<small class="text text-muted label label-default">Posted by</small><br><small class="text text-muted"> {{ $item->Name }}</small><br>
											<small class="text text-muted label label-default">Brand</small><br><small class="text text-muted"> {{ $item->Brand }}</small><br>
											<small class="text text-success pull-right">{{ $item->created_at->diffForHumans() }}</small><br>								
										</div>
										<div class="panel-footer clearfix">
											<p class="label label-primary solid-two fontlize"><i class="fa fa-money"></i> ZAR {{ $item->Price }}</p>
											<a type="button" href="add-to-cart/shopB/{{ $item->id }}" class="btn btn-success pull-right solid-two">Buy</a>
										</div>
									</div>
								</div>
							@elseif($item->Category=="Other")
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="panel panel-default solid">
										<div class="panel-heading text text-muted">
											<small class="label label-danger pull-right solid-two" style="background-color:black;"><i class="fa fa-bookmark" style="color:brown;"></i> {{ $item->Category }}</small>
											<h1 class="panel-title"><i class="fa fa-certificate" style="color:brown;"></i> {{ $item->Item }}</h1>
										</div>
										<div class="panel-body">
											<small class="text text-muted label label-default">Posted by</small><br><small class="text text-muted"> {{ $item->Name }}</small><br>
											<small class="text text-muted label label-default">Brand</small><br><small class="text text-muted"> {{ $item->Brand }}</small><br>
											<small class="text text-success pull-right">{{ $item->created_at->diffForHumans() }}</small><br>								
										</div>
										<div class="panel-footer clearfix">
											<p class="label label-primary solid-two fontlize"><i class="fa fa-money"></i> ZAR {{ $item->Price }}</p>
											<a type="button" href="add-to-cart/shopB/{{ $item->id }}" class="btn btn-success pull-right solid-two">Buy</a>
										</div>
									</div>
								</div>
							@endif
						@empty 
							<p class="alert alert-info solid-two" style='margin-bottom:110px'>There are no items in shop B for now. All items have been sold out</p>

						@endforelse
					</div>
				</div>
				<div class="links">
					{{ $no_pic_items->links() }}
				</div>
			</div>
	</section>
	<style> 

		#commcycleTitle{
			font-size:15px;
		}
	</style>

@endsection
