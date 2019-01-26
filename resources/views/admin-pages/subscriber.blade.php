@if(Session::has('admin'))
        @foreach($admins as $admin)
            @if(Session::get('admin') == $admin->name.":".$admin->password )

				@extends('admin-pages.admin-nav') 

				@section('content') 
					<div style="margin-top:50px"></div>
					<div class="row"> 
				            <div class="col-lg-9 col-md-9 col-sm-9">
				                <div class="list-group solid-two" style="min-height:200px;max-height:700px; overflow-y:scroll;">
				                    <a  class="list-group-item solid-text-light active"><h3>Subscribers email</h3></a>
				                    @forelse($subscribers as $subscriber)
										<a  class="list-group-item clearfix solid-text-light"><span class="glyphicon glyphicon-user"></span> {{ $subscriber->Email }}<small class="pull-right label label-default solid-text-light">Subscribed {{ $subscriber->created_at->diffForHumans() }}</small></a>
									@empty 
										 <a href="#" class="list-group-item clearfix"><span class="glyphicon glyphicon-user"></span> No subscribers yet!</a>
									@endforelse
				 

				                </div>
				            </div>			
						</div>
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-1">
								<div class="panel panel-default solid">
									<div class="panel-heading solid" style="background-color:deeppink;">
										<h1 class="panel-title text-center" style="text-shadow: 0px 4px 8px rgba(0,0,0,0.8); font-size:3em;"><i class="fa fa-send" style="color:white;"></i> Communicate</h1><br>
										
									</div>
									<div class="panel-body" style="background-color:orange;">
										<form action="admin-communication/{{explode(':',Session::get('admin'))[0]}}" method="get">
				                        	<div class="form-group">
					                            <div class="input-group">
					                                <span class="input-group-addon solid"><i class="glyphicon glyphicon-envelope blue"></i></span>
					                                <input type="email" id='person-email' data-toggled='true'  name="personemail" placeholder="Email" class="form-control solid">
					                            </div>
				                        	</div>
				                        	<div class="form-group">
					                            <div class="input-group">
					                                <span class="input-group-addon solid"><i class="glyphicon glyphicon-envelope blue"></i></span>
					                                <input type="name" name="title" placeholder="Title of message" class="form-control solid" required>
					                            </div>
				                        	</div>                        	
					                        <div class="form-group">
					                            <div class="input-group">
					                                <span class="input-group-addon solid"><i class="glyphicon glyphicon-comment blue"></i></span>
					                                <textarea name="personmessage" rows="6" class="form-control solid" type="text" required></textarea>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                        	<label id='every-sub' style='cursor:pointer'><input type="checkbox" id='every-sub-checkbox'> Send message to all subscribers</label><br>
					                        	<label id='no-sub' style='display:none;cursor:pointer' class='text text-danger'>Dont send to all</label><br>
									<input style='display:none'  value='' id ='sub-indicator' name='allSubscribers'
					                       		 <small class="text text-muted">@commcycle-colors</small>
					                        	<button type="submit" class="btn btn-info pull-right solid" >Send <i class="glyphicon glyphicon-send"></i> </button>
					                        </div>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				@endsection
			@endif 
		@endforeach 
@else 
	<div class="container" style="margin-top:300px">
        <div class="row col-md-6 col-lg-6 col-md-offset-3 col-sm-6 col-xs-6"> 
            <div class="alert alert-warning clearfix solid solid-text-light" style="background: deeppink; color:cyan;">
                <p>You are not signed in as an admin. Please do so :) <a class="btn btn-success pull-right solid-two" href="{{ route('admin.signin') }}" style="background:orange;">Sign in </a></p>
            </div>
        </div>
    </div>
@endif

<script> 

</script> 
