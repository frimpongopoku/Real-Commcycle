@if(Session::has('admin'))
        @foreach($admins as $admin)
            @if(Session::get('admin') == $admin->name.":".$admin->password )
                @extends('admin-pages.admin-nav')
                @section('content')
                <div style='margin-top:70px;'></div>
                	<div class='contaner'>
                		<div class='row'> 
					<div class='col-md-5  col-sm-12 col-xs-12'> 
						
						<div class='thumbnail text-center solid-two' style='padding:15px;'> 
						
							@if( explode(':',Session::get('admin'))[0] == 'Leroy')
															<img class="img-responsive solid" src="{{ asset('imgs/Lee.jpg') }}" style='border:solid 5px grey; border-radius:100%; height:250px; width:250px;'>
		        					<br>

							@elseif( explode(':',Session::get('admin'))[0] == 'Soumaya')
								<img class="img-responsive solid" src="{{ asset('imgs/Soumaya.jpg') }}" style='border:solid 4px grey; border-radius:100%; height:250px; width:250px;'>
								<br>
							@elseif( explode(':',Session::get('admin'))[0] == 'Pongo')
								<img class="img-responsive solid" src="{{ asset('imgs/Frimpi.jpg') }}" style='border:solid 4px grey; border-radius:100%; height:250px; width:250px;'>
								<br>

							@endif
							
							<p class='text text-success'><b>{{ explode(':',Session::get('admin'))[0] }}</b> - Commcycle		
							 Admin
							
							 </p>
							 <br>
								
							
														</div>
					</div>
					<div class='col-md-5  col-sm-12 col-xs-12'> 
						<div class='thumbnail text-center solid-two clearfix' style='padding:15px;'> 
						<center>
							<h4 class='solid-text-light'> News board </h4>
							<p class='text text-warning solid-text-light'>Post something on commcycle news board</p><br>
							<textarea class='form-control' placeholder='Hi commcycle users..' style='border:solid 2px grey;' rows='8' columns='8' id='message-box' required></textarea>
							
							<div class='pull-left' style='margin-top:25px;display:none' id='posted-alert'> 
							   <div class='alert alert-success' style='padding:5px;' id='posted-alert'><p>Your information has been posted!</p> </div>
							</div>
							<div class='pull-right' style=''> <br>
							<button class='btn btn-success solid-two solid-text-light' data-toggle='popover' data-title='Current News' data-content='{{$news->News}}' data-placement='top' id='current-post'>Current post</button>

							<button class='btn btn-warning solid-two solid-text-light' id='post'>Post <span class='fa fa-send'></span></button>
							</div>
							
						</center> 
						</div>

					</div>
					
				</div>
				<div class='col-md-10  col-sm-12 col-xs-12'> 
				<div class='thumbnail solid-two clearfix' style='padding:15px; '> 
				<center>
					<p class='text text-success'>Change password - <b>{{explode(':',Session::get('admin'))[0]}}</b></p> 
					
					@if(Session::has('the-password-error'))
						<small class='text text-danger'>{{Session::get('the-password-error')}}</small><br>
					@elseif(Session::has('changed'))
						<small class='text text-success'>{{Session::get('changed')}}</small><br>
					@endif
					
					
				</center>
				<form action='/admin-password-change' method='post'>
				{{csrf_field()}}
					<label for=''>Old Password</label>
					<input type='password' class='form-control' name='oldPassword'> 
					<label for=''>New Password</label>
					<input type='password' class='form-control' name='newPassword'> 
					<label for=''>Confirm Password</label>
					<input type='password' class='form-control' name='confirmPassword'> 
					<div class='pull-right' style='margin-top:10px;'>
						<input type ='submit' class='btn btn-success solid-two solid-text-light' value='Change Password'></input>
					</div>
				</form>
					
				</div>
			</div>
			
			
			
			<div style='margin-bottom:200px;'></div>
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
 
