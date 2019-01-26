@extends('admin-pages.security.sec-nav')


@section('title')

@ensection 

@section('content') 
	<div style='margin-top: 70px;'></div>
	<center><p></p>
	<div class="container">
						<div class="row">
							<div class='col-md-6 offset-md-3 col-lg-12 col-sm-12 col-xs-12'> 
								<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style='min-height:600px; max-width:1000px;'>
								<div class="panel panel-default z-depth-2">
									<div class="panel-heading z-depth-1" style="background-color:deeppink;">
										<h1 class="panel-title text-center" style="text-shadow: 0px 4px 8px rgba(0,0,0,0.8); font-size:3em;"><i class="fa fa-send" style="color:white;"></i> Communicate</h1><br>
										
									</div>
									<div class="panel-body" style="">
										<form action="/do-messaging" method="get">
				                        	
				                        	<div class="form-group">
					                            <div class="">
					                             
					                                <input type="text" name="title" placeholder="Title of message" class="form-control" required>
					                            </div>
				                        	</div>                        	
					                        <div class="form-group">
					                            <div class="">
					                                
					                                <textarea name="personmessage" rows="6" class="form-control md-textarea" type="text" placeholder="Message body here "required></textarea>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                        	
									
					                       		 <small class="text text-muted">@commcycle-colors</small>
					                        	<button type="submit" class="btn btn-info pull-right" >Send <i class="glyphicon glyphicon-send"></i> </button>
					                        </div>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


@endsection