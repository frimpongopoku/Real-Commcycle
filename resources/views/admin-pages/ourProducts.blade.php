@if(Session::has('admin'))
        @foreach($admins as $admin)
            @if(Session::get('admin') == $admin->name.":".$admin->password )
                @extends('admin-pages.admin-nav')
                @section('content') 
                	<div class='container' style='height:600px;'> 
                		 <div class='row'> 
                		 	<div class='col-lg-8 col-md-8 col-md-offset-1 col-sm-12 col-xs-12'>
	                		 	<div class='thumbnail' style='margin-top:60px;padding:20px;'> 
	                		 	@if(Session::has('Note'))
	                		 		<small class='text text-warning'>{{Session::get('Note')}}</small>
	                		 	@endif
	                		 		<center><p> Fill in all fields, all other information will be generated automatically</p></center>
	                		 		<form action='product-upload' method="post" enctype="multipart/form-data">
	                		 			{{csrf_field()}}
		                		 		<label>Item name</label>
		                		 		<input type='text' placeholder='item name *' class='form-control' name='item'> 
		                		 		<label>Price</label>
		                		 		<input type='text' placeholder='price *' class='form-control' name='price'> 
		                		 		<label>Type</label><br>
		                		 		<input type='hidden' name='options' id='options'>
		                		 		<select id='opt' name=''> 
		                		 			<option value='Laptop'>Laptop</option>
		                		 			<option value='Carrier'>Carrier</option>
		                		 		</select><br>
		                		 		<label>Picture</label>
		                		 		<input type='file' name='image'> <br>
		                		 		<input type='submit' class='btn btn-primary solid-rank' value='upload'>
		                		 	</form>
		                		 	
		                		 		
	                		 	</div>
	                		 </div>
	                	</div>
                	</div>
                @endsection
                @section('custom-js')
                <script>
                	setInterval(function(){
                		$('#options').val($('#opt').find(':selected').text());
                		
                	
                	},1000);
                </script>
                @endsection
                
            @endif
         @endforeach
@endif