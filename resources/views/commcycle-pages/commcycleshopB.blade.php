@extends('main.main')

@section('title') 

	Commcycle-Free-B

@endsection

{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','commcycleshopB') }}

@section('content')
	<div class="clearfix" style="margin-top:60px;"></div>
	<section id ="all">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 text-center">
						<div class="section-title">
							<h2 class="section-title solid-text phone-shops-title-old" id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> COMMCYCLE SHOP A</b></h2>
						<h2 class="section-title solid-text phone-shops-title-new" data-toggle='popover' data-placement='bottom' data-content='Below are items from random people that have been uploaded. Everything is totaly free, you just need to apply for what you want, and if you deserve it, it shall surely be yours. If you are felling a bit kind, just click on the upload button to upload a picture of an item you possess and want to donate.' id="commcycleTitle"><i class="glyphicon glyphicon-shopping-cart text text-success"></i><b> COMMCYCLE SHOP A</b></h2>
							
							<p id='phone-text'>Below are items from random people that have been uploaded. Everything is totaly free, you just need to apply for what you want, and if you deserve it, it shall surely be yours. If you are felling a bit kind, just click on the upload button to upload a picture of an item you possess and want to donate.</p>
							<a class="btn btn-info solid-two-light" href="commcycleshop"><i class="fa fa-backward"></i> Commcycle Shop A </a> 
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
										<div class="panel-body" style="max-height:150px; min-height:150px; overflow-y:scroll;">
											<small class="text text-muted label label-default">Posted by</small><small class="text text-muted"> {{ $item->Name }}</small><br>
											<small class="text text-muted label label-default">Brand</small><small class="text text-muted"> {{ $item->Brand }}</small><br>
											<small class="text text-muted label label-default" >Information</small><br><small class="text text-muted"> {{ $item->Info }}</small><br>
											<small class="text text-success pull-right">{{ $item->created_at->diffForHumans() }}</small><br>								
										</div>
										<div class="panel-footer clearfix">
											<p class="label label-primary solid-two"><i class="fa fa-money"></i> FREE </p>
											<a type="button" href="add-to-cart/commcycleB/{{ $item->id }}" class="btn btn-success pull-right solid-two">Buy</a>
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
										<div class="panel-body" style="max-height:150px; min-height:150px; overflow-y:scroll;">
											<small class="text text-muted label label-default">Posted by</small><small class="text text-muted"> {{ $item->Name }}</small><br>
											<small class="text text-muted label label-default">Brand</small><small class="text text-muted"> {{ $item->Brand }}</small><br>
											<small class="text text-muted label label-default">Information</small><br><small class="text text-muted"> {{ $item->Info }}</small><br>
											<small class="text text-success pull-right">{{ $item->created_at->diffForHumans() }}</small><br>								
										</div>
										<div class="panel-footer clearfix">
											<p class="label label-primary solid-two"><i class="fa fa-money"></i> FREE </p>
											<a type="button" href="add-to-cart/commcycleB/{{ $item->id }}" class="btn btn-success pull-right solid-two">Buy</a>
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
										<div class="panel-body" style="max-height:150px; min-height:150px; overflow-y:scroll;">
											<small class="text text-muted label label-default">Posted by</small><small class="text text-muted"> {{ $item->Name }}</small><br>
											<small class="text text-muted label label-default">Brand</small><small class="text text-muted"> {{ $item->Brand }}</small><br>
											<small class="text text-muted label label-default">Information</small><br><small class="text text-muted"> {{ $item->Info }}</small><br>										
											<small class="text text-success pull-right">{{ $item->created_at->diffForHumans() }}</small><br>								
										</div>
										<div class="panel-footer clearfix">
											<p class="label label-primary solid-two"><i class="fa fa-money"></i> FREE </p>
											<a type="button" href="add-to-cart/commcycleB/{{ $item->id }}" class="btn btn-success pull-right solid-two">Buy</a>
										</div>
									</div>
								</div>
							@endif
						@empty 
							<p class="alert alert-info solid-two" style="margin-bottom:80px;">There are no items in Commcycle shop B for now. All items have been sold out</p>

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
