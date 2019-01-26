@if(Session::has('lb-admin'))
    @foreach($admins as $admin)
        @if(Session::get('lb-admin') == $admin->Name.":".$admin->Password )
        	@extends('ladyB.ladyB-nav')
        	<div style="margin-top:5px"></div>
        	@section('content')
        		<div class="container" style="margin-top:40px;">
        			<h1 class="section-title solid-text">Upload Center <i class="fa fa-fw fa-upload"></i></h1>
        		</div>
                <div class="container" style="margin-top:40px">
                    <div class="col-md-9">
                    <br>
                        @if(Session::has('lb-finished-upload'))
                            <div class=" col-md-9 col-lg-9 col-sm-9 col-xs-9" > 
                                
                                    <div class="alert alert-{{ Session::get('lb-finished-upload')['alertType'] }}">
                                        <p>{{  Session::get('lb-finished-upload')['ItmName'].Session::get('lb-finished-upload')['msg'] }}</p>
                                    </div> 
                                
                            </div>
                            <br>
                        @endif     
    		<hr>
        				<div class="thumbnail solid" style="padding:15px" id="uploadbox">
        					<p class=" text-center text text-warning" style="color:white;font-size:15px">The size and price must be numbers. Please note, if you encounter any issues with uploads, contact frimpong via frimpong@commcycle.co. Everything you upload here will be moved straight to your section on the main commcycle website, and visible to everyone please do take care. Enjoy your patnership with commcycle<br><span style='color:red'>NB: If there are different sizes of items, indicate like this: XL, L, S, 45, 90</span></p>
        					<br>
        					<form action="ladyB-upload" method="post" enctype="multipart/form-data">
        					{{ csrf_field() }} 
        						<div class="row">       						 
        							<div class="form-group col-md-6 col-lg-6"> 
        								<input class="form-control solid" type = "text" placeholder="name of item" name="itemName" required>
        							</div>
         							<div class="form-group col-md-6 col-lg-6"> 
        								<input class="form-control solid" type = "number" placeholder="price of the item" name="itemPrice" required>
        							</div>       							       						
        						</div>
        						<div class="row">       						 
        							<div class="form-group col-md-6 col-lg-6"> 
        								<input class="form-control solid" type = "text" placeholder="Size of the item" name="itemSize" required>
        							</div>
         							<div class="form-group col-md-6 col-lg-6"> 
        								<input class="form-control solid" type = "text" placeholder="How many of these babies are there" name="itemQuantity">
        							</div>       							       						
        						</div>
        						<div class="row"> 
        							<div class="form-group col-md-12 col-lg-12">
        								<textarea class="form-control solid" placeholder="do you have any additional information about this item?" name="itemInfo" rows="4"></textarea> 
        							</div>
        							<div class="form-group col-md-12 clearfix"> 
        								<button type="submit" class="btn btn-success pull-right solid" name="upload" id="uploadButton"><i class="fa fa-fw fa-upload"></i></button>
        								<input type="file" class=" pull-left solid-text" name="image" style="color:white;" id="image">
        							</div>
        							<div class="form-group col-md-12 clearfix"> 
        								
        							</div>    
        						</div> 
        					</form>
        				</div>
        			</div>
        			<div class="row"> 
        		            <div class="col-lg-9">
        		                <div class="list-group solid-two" style="min-height:200px;max-height:700px; overflow-y:scroll;">
        		                    <a  class="list-group-item solid-text-light active" style="background:deeppink;"><h3>Commcycle subscribers emails</h3></a>
        		                    @forelse($subscribers as $subscriber)
        								<a  class="list-group-item clearfix solid-text-light"><span class="glyphicon glyphicon-user"></span> {{ $subscriber->Email }}<small class="pull-right label label-default solid-text-light">Subscribed {{ $subscriber->created_at->diffForHumans() }}</small></a>
        							@empty 
        								 <a href="#" class="list-group-item clearfix"><span class="glyphicon glyphicon-user"></span> No subscribers yet!</a>
        							@endforelse
        		 

        		                </div>
        		            </div>			
        				</div>
        			</div>

        		<style> 
        			#uploadbox{
        				border:solid 4px deeppink;
        				background: #282828;

        			}
        			#uploadButton{
        				width:100px;
        			}

        		</style>
		    @endsection
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