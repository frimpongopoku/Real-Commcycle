 
 
 <h4>Upload a picture first</h4>
	      
	      <form action='/upload-image' method='post' enctype='multipart/form-data'> 
	      {{csrf_field()}}
	      
	      	@if(Session::has('article-img-status') )
	      
	      	<div id='pic-preview'>
	      	
	      		@if(Session::has('article-img-link'))
	    	      		<img src="{{asset(Session::get('article-img-link'))}}" class='img-thumbnail ' style='height:110px; width:150px;'>
	    	      		<small class='text text-success'><i class='fa fa-check'></i> Picture availabel for post!</small><br>
	    	      		<a  class='btn btn-danger solid-two'  id='del' style='margin-top:15px; width:150px'>Delete Image</a>
	    	      		
	    	      	

	    
	    	      	@else 
	    	      		<img src="" class='img-thumbnail pull-left' style='height:110px; width:150px;' alt="img unavailable">

	    	      	@endif
	    	      		    	      	
	    	  </div>
	    	  <div id='upload-pane' style='display:none'>
	      				<input type='file' name='image' ><input type='submit' value='upload' class='btn btn-default' style='margin:10px;margin-bottom:0px; margin-left:0px;'>
	      	  </div>
	      	
	      	@else 
	      		<div id='upload-pane'>
	      			<input type='file' name='image' ><input type='submit' value='upload' class='btn btn-default' style='margin:10px;margin-bottom:0px; margin-left:0px;'>
	      		</div>

	      @endif
	      </form>
		      	<hr style='width:90%; border-width:2px; margin-left:0'>
		      	<small class='text text-success pull-left' style='font-style:Italic; display:none;' id='temp-save'>saving temporarily!</small><br>
	      	   
	      	   <form action="{{Session::has('edit-basket') ? '/save-edit' : '/save-article'}}" method='get' > 
	      	<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12' style='margin-bottom:10px;'>
	      		<small class='text text-success' id='tgStatus' style='display:none'><span class='glyphicon glyphicon-flash'></span> Done!</small>
	      		<input type='name' id='tagLine' name='tagLine' class='form-control blog-boxes' value="{{Session::has('edit-basket') ? Session::get('edit-basket')['TagLine'] : '' }}" placeholder='TagLine'>
	      	</div><br>
	      		      	
	        <div class='col-lg-10 col-md-10 col-sm-10 col-xs-12' style='margin-bottom:10px;'>
	      		<small class='text text-success' id='mintgStatus' style='display:none'><span class='glyphicon glyphicon-flash' ></span> Done!</small>
	      		<input type='name' id='miniTagLine' name='miniTagLine' class='form-control blog-boxes' value="{{Session::has('edit-basket') ? Session::get('edit-basket')['SemiTagLine'] : '' }}" placeholder='Mini headline'>
	      	</div>
	      	
	      	 <div class='col-lg-10 col-md-10 col-sm-10 col-xs-12' style='margin-bottom:10px;'>
	      		<small class='text text-success' id='artStatus' style='display:none'><span class='glyphicon glyphicon-flash'></span> Done!</small>
	      		<textarea rows='15' id='articleText' name='articleText' class='form-control blog-boxes' value='{{Session::has('edit-basket') ? Session::get('edit-basket')['Text'] : '' }}' placeholder='Article Here'></textarea>
	      	</div>
	      	<input type='hidden' name='image' value="{{Session::has('article-img-link') ? Session::get('article-img-link') : ''}}">
	      		      	
	      	<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12' style='margin-bottom:10px;'>
	      		<div class='thumbnail'>
	      		
		      		@if(Session::has('edit-basket'))
	      				<input type='submit' class='btn btn-primary solid-two' id='save' value='Save Edits'>
	      				<a href='#'  class='btn btn-danger solid-two' id='save'>Cancel</a>

	      			
	      			@else 
	      			
		      			<input type='submit' class='btn btn-default solid-two' id='save' value='Save Progress'>
		      			<small class='text text-succes' id='save-status'>Make sure you save your progress before you go to bed.</small>
		      			
		      		@endif
		      	</div>
	      	</div>
	      		      	

	      	
	      </form>
