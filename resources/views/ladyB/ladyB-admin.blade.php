@if(Session::has('lb-admin'))
    @foreach($admins as $admin)
        @if(Session::get('lb-admin') == $admin->Name.":".$admin->Password )
        	@extends('ladyB.ladyB-nav')
        	@section('content')
        	<div style="margin-top:50px;"></div>
	        	<div class="row">
					<div class="col-md-9 col-lg-9 col-xs-12  col-sm-12">
				        <div class="list-group" style="min-height:300px; max-height:700px;overflow-y:scroll">
				            <a class="list-group-item active solid" style="background:deeppink;">
				                <h4 class="list-group-item-heading solid-text-light"><span class="fa fa-envelope"></span> Messages from people</h4>
				                <p class="list-group-item-text"></p>
				            </a>
				            @forelse($msgs as $msg)
					            <a class="list-group-item">
					                <h4 class="list-group-item-heading label label-success"><i class="fa fa-envelope"></i> {{ $msg->Name }} <small class="text text-success pull-right">{{ $msg->created_at->diffForHumans() }}</small></h4>
					                <p class="list-group-item-text" style="max-width:99%; overflow-x:scroll;">{{ $msg->Message }}</p>
					            </a>
					        @empty
					        	<a class="list-group-item">
				                <h4 class="list-group-item-heading label label-warning"><i class="fa fa-envelope-o"></i> No msgs</h4>
				                <p class="list-group-item-text text text-warning">You dont have any messages yet!</p>
				            </a>
					        @endforelse
				        </div>
				    </div>
				    <div class="col-md-9 col-lg-9 col-xs-12  col-sm-12" style="margin-bottom:270px">
				        <div class="list-group " style="min-height:200px; max-height:700px;overflow-y:scroll">
				            <a  class="list-group-item active solid" style="background-color: deeppink;">
				                <h4 class="list-group-item-heading solid-text-light"><span class="fa fa-edit"></span> Logs</h4>
				                <p class="list-group-item-text"></p>
				            </a>
				             @forelse($logs as $log)
					            <a  class="list-group-item">
					                <h4 class="list-group-item-heading label label-warning"><i class="fa fa-edit"></i> {{ $log->created_at->diffForHumans() }} </h4>
					                <p class="list-group-item-text">{{ $log->happening }}</p>
					            </a>
					        @empty
					        	<a class="list-group-item">
				                <h4 class="list-group-item-heading label label-info"><i class="fa fa-edit"></i> No Logs</h4>
				                <p class="list-group-item-text text text-info">No logs yet!</p>
				            </a>
					        @endforelse
				        </div>
				    </div>
				</div>
		    @endsection
		    @break;
        @endif 
    @endforeach 
@else
	<div class="container" style="margin-top:300px">
		<div class="row col-md-6 col-lg-6 col-md-offset-3 col-sm-6 col-xs-6"> 
			<div class="alert alert-warning clearfix solid solid-text-light" style="background: deeppink; color:cyan;">
				<p>You are not signed in as an admin. Please do so :) <a class="btn btn-success pull-right solid-two" href="ladyB-sign-in" style="background:orange;">Sign in </a></p>
			</div>
		</div>
	</div>
@endif