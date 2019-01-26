<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Security Sign Up</title>
        <link rel="icon" type="image" href="{{ asset('imgs/Social.png') }}">
        <link href="{{ asset('Admin Hookups/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/css/sb-admin.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/css/plugins/morris.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
              
   	 
	</head>
	<body>
			<div class="container col-md-12" style="margin-top:70px;" >
				@if(Session::has('the-error'))
					<div class="container" > 
						<div class="row">
							<div class="alert alert-danger">
								<p>{{  Session::get('the-error')}}</p>
							</div> 
						</div>
					</div>
				@endif
			</div>
			<div class="row" id="signInBar"> 
				<form action="/security-do-signup" class="form-group" name="login" method="post" name='signup-form' >
				{{ csrf_field() }}
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3 col-lg-offset-3"> 
						<div class="panel panel-primary" style="box-shadow:0 4px 10px rgba(0,0,0,1); margin-left:10px; margin-right:10px; "> 
							<div class="panel-heading " style="background:deeppink;">
								<img src="{{ asset('imgs/Social.png') }}" class="img-responsive pull-left" style=" width:35px; height:25px">
								<h1 class="panel-title solid-text-light">  Commcycle Security Signup</h1>
								
							</div>
							<div class="panel-body" style="background: orange;">
								<label class="post-title solid-text-light">Admin Name </label>
								<input type=text" class="form-control" name="adminSecName" required>

								<label class="post-title solid-text-light">Number</label>
								<input type="number" class="form-control" name="adminSecNumber" required>
								
								<label class="post-title solid-text-light">Email</label>
								<input type="email" class="form-control" name="adminSecEmail" required>

								<label class="post-title solid-text-light">Password</label>
								<input type="password" class="form-control" name="adminSecPassword" required>
								
								<label class="post-title solid-text-light">Confirm Password</label>
								<input type="password" class="form-control" name="adminSecConfirmPassword" required>
							</div>
							<div class="panel-footer clearfix" style="background: cyan;"> 
								<input type="submit" value="Sign Up" name='signup' class="btn btn-primary pull-right" style="box-shadow:0 4px 10px rgba(0,0,0,1);"> 
								<span class="fa fa-lock pull-left solid-text" style="font-size:40px; color:black;"></span>
							</div>
						</div>
						
					</div>
				</form>
			</div> 
	</div>
	<div class="container">
		<div class="row" id="comText">
			<div class="col-md-6 col-sm-6 col-xs-6"> 
				<a class="solid-text pull-right" href="commcycle" style="font-size:40px;color: #383838; text-decoration: none;">@<span style="color:deeppink;">com</span><span style="color:orange;">mcy</span><span style="color:cyan;">cle</span></a>
			</div>
		</div>
	</div>
	
    <script src="{{ asset('Trev Hookups/js/bootstrap.min.js') }}"></script>
    <!-- Morris Charts JavaScript -->
     <script src="{{ asset('Trev Hookups/js/jquery-3.2.1.min.js') }}"></script>
     <script src="{{ asset('Admin Hookups/js/admin.js') }}"></script>
     
    
    
	</body>
	<script>
	
		
		
	</script>

	<style> 
	#signInBar,#comText{
		position:relative;
	}
		     .solid{
	        box-shadow:0 6px 8px rgba(0,0,0,0.8);

	    }
	    .solid-two{
	         box-shadow:0 2px 4px rgba(0,0,0,0.4);
	    }
	    .solid-text{
	        text-shadow: 0px 4px 8px rgba(0,0,0,0.8);
	    }
	    .solid-text-light{
	        text-shadow: 0px 3px 6px rgba(0,0,0,0.6);

	    }
	</style>
</html>

