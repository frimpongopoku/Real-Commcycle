@extends('admin-pages.security.sec-nav')

@section('content')

	<div style=' margin-top:60px;'></div>
	<center><h3 style='margin-bottom:5px; background:white;'>Hello <span class='text text-success'>{{session::get('security-admin')->name}}</span>, greetings from Commcycle.</h></center>
	
	<div style='height:500px;background:white;'>
		<div class='col-md-6 offset-md-3 col-lg-12 col-sm-12 col-xs-12'> 
			<div class='container' > 
				<div class='row'> 
					<div class="col-md-6 col-lg-6 col-md-offset-2 col-sm-12 col-xs-12">
						<div class='thumbnail text-center z-depth-2' style='padding:15px;margin-top:5px;'> 
							<img class="img-responsive solid" src="{{ asset('imgs/Security-Guard-icon.png') }}" style='border:solid 4px grey; border-radius:100%; height:250px; width:250px;'><br>
							<small>Email: {{session::get('security-admin')->email}}</small>
						</div>
						
						
					
					
					</div>
					
					<div class="col-md-10 col-lg-10  col-sm-12 col-xs-12">
					
						<div id='log-div' style='max-height:600px; overflow-y:scroll; min-height:200px;'> 
							@foreach($logs as $log)
								<div class='thumbnail text-center z-depth-1 zero-radius' style='padding:10px;margin-top:5px;margin-bottom:2px;'> 
									<p> {{$log->happening}}. <small class="text text-info">{{$log->created_at->diffForHumans()}}</small></p>
								</div>
							@endforeach
						</div>
					</div>
				</div> 
			</div>
					
	</div>


@endsection

@section('custom-js')

@endsection
