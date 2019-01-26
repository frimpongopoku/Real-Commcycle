<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property ="og:url" content="http://commcycle.co/commy-article/{{$id}}"/> 

    <meta property ="og:type" content="website"> 
    <meta property="og:title" content="{{$art->tagline}}"/>
    <meta property="og:image" content="{{asset($art->Image)}}"/>
    <meta property="og:image:width" content="620" />
	<meta property="og:image:height" content="541" />

    <meta property="og:fb:page_id" content="168780823705676" />
    <meta property="og:description" content="{{$art->semiTag}}" />
        

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{$art->tagline}}</title>
   <link rel="icon" type="image" href="{{ asset('imgs/Social.png') }}">

    <!-- Styles -->
   <!-- <link href="{{ asset('Trev Hookups/css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('Trev Hookups/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('Trev Hookups/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Trev Hookups/css/landing-page.css') }}" rel="stylesheet">
    <link href="{{ asset('Trev Hookups/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/artificial/com-global.css') }}" rel="stylesheet">
    <script src="{{ asset('js/artificial/all.js') }}"></script>
    <script src="{{asset('js/artificial/facebook.js')}}"></script>

</head>
<body>
     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top solid" role="navigation">
        <div class="container">
        	<center><h3 clas='solid-text-two' style='color:orange; margin:20px;'>Comm<span style='color:cyan'>cycle</span> <span style='color:deeppink;'>Blog</span></h3></center>
         </div>
        <!-- /.container -->

    </nav>

<div style='margin-bottom: 70px;'></div> 

<!-- ############################################################### BODY BEGINNING ################################################################## -->
<!-- ############################################################### commcycle ADS ################################################################ -->

<div class='container'> 
		<div class='row'> 
			<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style=''> 
				<div class='thumbnail phone-mode-show' style='height:100px;'> 
					
				@foreach(array_slice($commAddSet,7) as $com) 
					@foreach($com as $row)
					<img src="{{asset($row['Pics'])}}" class='pull-left  img-thumbnail img-responsive' style='height:80px; width:100px;margin-right:3px;'>
					@break
					@endforeach
				@endforeach	
						
	
	
	<button class='btn btn-primary solid-two-light' id='try' onclick='' style='margin:10px;margin-top:25px;width:100%'>See <i class='fa fa-forward'></i></button> <br>
						
				</div>
					<br>
					<div class='thumbnail pc-mode' style='height:100px;'> 
					
							@foreach($commAddSet as $com) 
								@foreach($com as $row)
								<img src="{{asset($row['Pics'])}}" class='pull-left  img-thumbnail img-responsive' style='height:80px; width:100px;margin-right:3px;'>
								
								@endforeach
							@endforeach	
									
				
				
				<button class='btn btn-primary solid-two-light' id='try' onclick='' style='margin:10px;margin-top:25px;border-radius:100%'>See <i class='fa fa-forward'></i></button> 
									
					</div>			
	    			</div>
    			</div>
    		</div>
    	</div>

<!-- ##################################################### commcycle ADS END ############################################################### -->


<!-- ##################################################### ARTICLE BEGINNING ############################################################### -->

	<div class='container'> 
		<div class='row'> 
			<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12' style='margin-bottom:200px;'>
			
				@if($art->extras ==2)
					<div >
							<h1 clas='solid-text-light' style='font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;font-size:4em;'>{{$art->tagline}}</h1>
								<p style=''><b>{{$art->semiTag}}</b></p>
								<small><b>Posted:</b> {{$art->created_at->diffForHumans()}} | <b>Updated:</b> {{$art->updated_at->diffForHumans()}}
								</small>
						</div>
							<center><img src="{{asset($art->Image)}}" class='solid-two-light' style='height:80%px; width:100%;margin:15px;'></center>
														
			<!-- ########################################## SHOW FIRST POST WITH EXTRA PICS##################################### -->
			
			@php
				$txtArray = explode('<-->',$art->Text);
				$imgList = explode(',',$art->extraPics);
				foreach($txtArray as $index => $text){
					echo "<p style='white-space:pre-wrap;'>$text</p>";
					echo "<img style='height:75%; width:100%;margin:10px;'src='http://commcycle.co/$imgList[$index]'>";
				} 
			
			@endphp

			<!-- ################################# END OF SHOW  ######################################### -->
			
												
						<!-- SHARE AND COMMENT PANE --> 
						<div class='thumbnail clearfix ' style='height:50px;padding:5px;'>
							<button class='btn btn-default pull-left' style='background:#3B5998; color:white;' onclick='theBlogShare("commcycle.co/commy-article/{{$art->id}}")'><i class='fa fa-facebook'></i></button>
							<div class='pull-right'>
								<small>{{count($art->comments)}} Comment{{count($art->comments) ==1 ? '' : 's'}} </small>
								<button class='btn btn-default solid-two-light comment-trigger' style='color:white; background-color:#585858' data-toggle='modal' data-id='{{$art->id}}' data-target='#comment-box-{{$art->id}}'><i class='fa fa-comment'></i></button>
							</div>	
						</div>
						<!-- END AD --> 
						<div class='thumbnail solid-two-light' style='border:solid 3px deeppink; height: 230px; max-height:250px; overflow-y:scroll; '>
							<center><small class='text text-danger'>Check out Lady-B Items</small></center>
							@foreach($lbAddSet2 as $lb)
								@foreach($lb as $row) 
									<img src="{{asset($row['Pics'])}}" class=' pull-left solid-two img-responsive' style='height:180px;margin:10px; width:200px;'>
									@break
								@endforeach
							@endforeach
							<a class='btn btn-primary solid-two-light' style='margin:1px;margin-top:45px;border-radius:100%' href='http://commcycle.co/ladyBshop' target='blank'>See <i class='fa fa-forward'></i></a> 
						</div>
						<!-- COMMENT MODAL --> 
						
						<div class='modal fade' id='comment-box-{{$art->id}}'> 
							<div class='modal-dialog modal-md' style='border-radius:0px;'> 
								<div class='modal-content'> 
									<div class='modal-header' style='color:black; background:deeppink'> 
										<h2 class='modal-title'>Comments</h3>
									</div>
									<div class='modal-body ' id='modal-body-{{$art->id}}' style=' max-height:250px; overflow-y:scroll;' >
										
										<div>
										
											@foreach($art->comments as $comment)
											<p style='margin:2px; padding:5px; border:solid 0px orange; border-left-width:2px; margin-top:3px;'>
											
											
												<small><b>{{$comment->name}}</b></small><br>
												<span style='font-style:italic; font-size:0.7em;color:black;'><b>{{$comment->comment}}</b></span>
												
											</p>
											
											@endforeach
										</div>
									
										
		
									</div> 
									<div class='modal-footer clearfix' style=''> 
										<input type='name' id='commenter-name-{{$art->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:100%;' placeholder='your name or email' required> <br>
										<button class='btn btn-default pull-right solid-two-light comment-button' data-id='{{$art->id}}' id='' style='margin-top:5px;' ><span class='glyphicon glyphicon-send'></span></button>
										<input type='name' id='comment-boxy-{{$art->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:80%; margin-top:5px;' placeholder='comment..'>
		
										
									</div> 
								</div> 
							</div> 
						</div>
					</div>
		<!--  COMMENT END -->
				
				
				@else
					<div >
						<h1 clas='solid-text-light' style='font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;font-size:4em;'>{{$art->tagline}}</h1>
							<p style=''><b>{{$art->semiTag}}</b></p>
							<small><b>Posted:</b> {{$art->created_at->diffForHumans()}} | <b>Updated:</b> {{$art->updated_at->diffForHumans()}}
							</small>
					</div>
						<center><img src="{{asset($art->Image)}}" class='solid-two-light' style='height:80%px; width:100%;'>
						<p style='font-size:0.9'>{{substr($art->Text,0,400)}}</p>
						
						
					<!-- MIDDLE TEXT ADVERTISMENT --> 
					<div class='thumbnail solid-two-light phone-mode-show clearfix' style='border:solid 3px deeppink; height: 230px;max-height:250px; overflow-y:scroll; '>
					     <!-- SHOW THIS ON MOBILE DEV --> 
					 <center><small class='text text-danger'>Check out Lady-B Items</small></center>
						@foreach($lbAddSet1 as $lb)
							@foreach($lb as $row) 
								<img src="{{asset($row['Pics'])}}" class=' pull-left solid-two img-responsive' style='height:180px;margin:10px; width:200px;'>
								@break
							@endforeach
							@break
						@endforeach
						<button class='btn btn-primary solid-two-light' style='margin:1px;margin-top:45px;border-radius:100%'>See <i class='fa fa-forward'></i></button> 
					
											
					</div>
					<div class='thumbnail solid-two-light pc-mode' style='border:solid 3px deeppink; height: 230px;max-height:250px; overflow-y:scroll; '>
						<center><small class='text text-danger'>Check out Lady-B Items</small></center>
						@foreach($lbAddSet1 as $lb)
							@foreach($lb as $row) 
								<img src="{{asset($row['Pics'])}}" class=' pull-left solid-two img-responsive' style='height:180px;margin:10px; width:200px;'>
								@break
							@endforeach	
						@endforeach
		<button class='btn btn-primary solid-two-light' style='margin:1px;margin-top:45px;border-radius:100%'>See <i class='fa fa-forward'></i></button> 
					</div>
					
					<!--Now show the rest of the article -->
					<p>{{substr($art->Text,400)}}</p>
					
					<!-- SHARE AND COMMENT PANE --> 
					<div class='thumbnail clearfix ' style='height:50px;padding:5px;'>
						<button class='btn btn-default pull-left' style='background:#3B5998; color:white;' onclick='theShare("/commy-article/{{$art->id}}")'><i class='fa fa-facebook'></i></button>
						<div class='pull-right'>
							<small>{{count($art->comments)}} Comment{{count($art->comments) ==1 ? '' : 's'}} </small>
							<button class='btn btn-default solid-two-light comment-trigger' style='color:white; background-color:#585858' data-toggle='modal' data-id='{{$art->id}}' data-target='#comment-box-{{$art->id}}'><i class='fa fa-comment'></i></button>
						</div>	
					</div>
					<!-- END AD --> 
					<div class='thumbnail solid-two-light' style='border:solid 3px deeppink; height: 230px; max-height:250px; overflow-y:scroll; '>
						<center><small class='text text-danger'>Check out Lady-B Items</small></center>
						@foreach($lbAddSet2 as $lb)
							@foreach($lb as $row) 
								<img src="{{asset($row['Pics'])}}" class=' pull-left solid-two img-responsive' style='height:180px;margin:10px; width:200px;'>
								@break
							@endforeach
						@endforeach
						<button class='btn btn-primary solid-two-light' style='margin:1px;margin-top:45px;border-radius:100%'>See <i class='fa fa-forward'></i></button> 
					</div>
	
				</div><!-- /.End col-8 -->
			@endif
<!-- ##################################################### ARTICLE ENDING ############################################################### -->

<!-- ##################################################### ARTICLE SHOP ADS BEGINING ############################################################## -->
								
			<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'> 
			
				@foreach($shopAddSet as $shop) 
					@foreach($shop as $row) 
					  <div class='thumbnail  clearfix' style='padding:2px; border:solid 0px #585858;border-radius:0px; border-bottom-width:2px;'>
						<img src="{{asset($row['Pics'])}}" class=' img-thumbnail pull-left img-responsive' style='height:80px; width:100px;margin-right:3px;'>
					<article>
						<p style='font-size:0.9em;margin-bottom:0px;'><b>{{$row['Item']}}</b></p>
						<p style='font-size:0.9em;margin-bottom:0px;'>Category: {{$row['Category']}}</p>
						<p style='font-size:0.9em;margin-bottom:0px; color:green; font-family:sans-serif;'><b>ZAR {{$row['Price']}}</b>
						<small>Uploaded: {{$row['created_at']->diffForHumans()}}</small>
						</p>
					</article>
					<button class='btn btn-success pull-right solid-two-light' style='border-radius:100%; border:solid 2px white;'><i class='fa fa-forward'></i></button>
					</div>
					@break
					@endforeach
				@endforeach 
				<!--SUBSCRIBE PART -->
				<div class='thumbnail solid-two-light clearfix'>
					<center><small >Subscribe to get updates on latest posts and important information!</small> </center>
					<div class='form-group clearfix'> 
						<input type='email' class='form-control' style='width:100%'> 	 
					</div>
					<div class='form-group pull-right'> 
						<input type='submit' placeholder='Email' value='Subscribe' class='btn btn-info pull-right solid-two-light'>		 
					</div>
				</div>
				
				<!-- NEXT ARTICLE STUFF --> 
			<div class='thumbnail clearfix'>
				<div class='pull-right'>
					<button class='btn btn-default' id='more-button' data-main-id='{{$art->id}}' data-toggled='true'><span class='glyphicon glyphicon-plus'></span></button>
				</div> 
				<p>See more articles</p> 
			
			</div>
			<div id ='more-pane' class='thumbnail' style='max-height:800px; width:100%;height:600px; overflow-y:scroll'> 
				<div class="list-group">
				
				@foreach($articles as $article)
					  <a href="/commy-article/{{$article->id}}" class="list-group-item list-group-item-action flex-column align-items-start ">
					    <div class="d-flex w-100 justify-content-between">
					      <p class="mb-1 text text-success"><b>{{$article->tagline}}</b></p>
					      <small>{{$article->created_at->diffForHumans()}} </small>
					    </div>
					   <small class="mb-1"><span style='font-size:3em'>"</span> {{$article->semiTag}} <span style='font-size:3em'>"</span> </small><br>
					    <small>{{count($article->comments) ==1 ? count($article->comments). ' comment ' : count($article->comments). ' comments '}}</small>
					  </a>
				@endforeach
				 </div>
			</div>
		
		</div>
	</div><!-- /.row>	
</div>
	<!-- /.container -->




<!-- ##################################################### ARTICLE SHOP ADS END ############################################################### -->

		<!-- COMMENT MODAL --> 
				
				<div class='modal fade' id='comment-box-{{$art->id}}'> 
					<div class='modal-dialog modal-md' style='border-radius:0px;'> 
						<div class='modal-content'> 
							<div class='modal-header' style='color:black; background:deeppink'> 
								<h2 class='modal-title'>Comments</h3>
							</div>
							<div class='modal-body ' id='modal-body-{{$art->id}}' style=' max-height:250px; overflow-y:scroll;' >
								
								<div>
								
									@foreach($art->comments as $comment)
									<p style='margin:2px; padding:5px; border:solid 0px orange; border-left-width:2px; margin-top:3px;'>
									
									
										<small><b>{{$comment->name}}</b></small><br>
										<span style='font-style:italic; font-size:0.7em;color:black;'><b>{{$comment->comment}}</b></span>
										
									</p>
									
									@endforeach
								</div>
							
								

							</div> 
							<div class='modal-footer clearfix' style=''> 
								<input type='name' id='commenter-name-{{$art->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:100%;' placeholder='your name or email' required> <br>
								<button class='btn btn-default pull-right solid-two-light comment-button' data-id='{{$art->id}}' id='' style='margin-top:5px;' ><span class='glyphicon glyphicon-send'></span></button>
								<input type='name' id='comment-boxy-{{$art->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:80%; margin-top:5px;' placeholder='comment..'>

								
							</div> 
						</div> 
					</div> 
				</div>
<!--  COMMENT END -->



	




<!-- ############################################################### STATUS AREA ################################################################## -->
<section class='footer-for-phone' style='background-color:#282828; color:white;height:100px; padding-right:15px; padding-left:15px;'> 
	<p class='text text-muted solid-text-light' ><span style='color:deeppink'>Com</span><span style='color:cyan'>mcy</span><span style='color:orange'>cle</span> <span>&copy</span> 2017 <button id='' style='color:black;margin-left:25px;'  class='btn btn-default solid-two' data-toggle='popover'  data-placement='top' data-title='Commcycle Links' data-html='true' data-content='
	<div class="col-sm-12" style="width:200px;max-height:200px;overflow-y:scroll "> 
		<ul class="list-group">

                    <a href="#" class="list-group-item">COMMCYCLE SHOP</a>
                    <a href="#" class="list-group-item">SHOP</a>
                    <a href="aboutus" class="list-group-item">ABOUT</a>
                    
                    <a  class="list-group-item active">PATNERS</a>
                    <a href="ladyB-main" class="list-group-item">LADY BURGESSON</a>
                    <a href="#" class="list-group-item">LADY-B SHOP</a>
                    
                    <a  class="list-group-item active">SOCIAL</a>
                    <a href="https://www.fb.com/realcommcycle" target="_blank" class="list-group-item"><span class="fa fa-facebook"><span> FACEBOOK</a>
                    <a href="https://www.instagram.com/commcycle" target="_blank" class="list-group-item"><span class="fa fa-instagram"><span> INSTAGRAM</a>
                    <a href="https://www.twitter.com/commcycle" target="_blank" class="list-group-item"><span class="fa fa-twitter"><span> TWITTER</a>
                   	         </ul>
	        			
	</div>
	
	'><span class='fa fa-bars' ></span></button>
</p> 
</div>
</section>

<!-- PC FOOTER -->
  <section class='footer phone-mode-show' style='background-color:#282828; color:white;height:200px'> 
  	
	  	<div class='col-lg-4 col-md-4 col-sm-12 col-xs-4'> 
	  		<h3 href='#' class='text-center solid-text-light' style='margin:0px;'>CommCycle</h3>
	  			  		<a href='#'>COMMCYCLE SHOP</a>
	  		<hr style='margin:2px;'>
	  		<a href='#'>SHOP</a>
	  		<hr style='margin:2px;'>
	  		<a href='aboutus'>ABOUT</a>
	  		<hr style='margin:2px;'><br>
	  		<p class='text text-muted solid-text-light'><span style='color:deeppink'>Com</span><span style='color:cyan'>mcy</span><span style='color:orange'>cle</span> <span>&copy</span> 2017</p>
	  	</div>
	  	<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'> 
	  		<h3 href='ladyB-main' class='text-center solid-text-light' style='margin:0px;'>PARTNERS</h3>
	  			  		<a href='#'>LADY BURGESSON</a>
	  		<hr style='margin:2px;'>
	  		<a href='#'>LADY-B SHOP</a>
	  		<hr style='margin:2px;'>
	  		<a href='ladyB-main'>MESSAGE LADY-B</a>
	  		<hr style='margin:2px;'>
	  	</div>
	  	<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'> 
	  		<h3  class='text-center solid-text-light' style='margin:0px;'>SOCIAL</h3>
	  			  		<a href='https://www.fb.com/realcommcycle' target='_blank'><span class='fa fa-facebook' style='color:cyan; font-size:25px; margin-right:3px;'></span> ACEBOOK</a>
	  		<hr style='margin:2px;'>
	  		<a href='https://www.instagram.com/commcycle' target='_blank' ><span class='fa fa-instagram' style='color:cyan; font-size:25px; margin-right:3px;'></span> INSTAGRAM</a>
	  		<hr style='margin:2px;'>	
	  		<a href='https://www.twitter.com/commcycle' target='_blank'><span class='fa fa-twitter' style='color:cyan; font-size:25px; margin-right:3px;'></span> TWITTER</a>
	  		<hr style='margin:2px;'>
	  	</div>

	  

  <section>	
		

</body>

    <!-- Scripts -->
    <script src="{{ asset('Trev Hookups/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('Trev Hookups/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Trev Hookups/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('Trev Hookups/js/theme-scripts.js') }}"></script>
    <script src="{{ asset('js/artificial/pub-blog.js') }}"></script>

    
 <style> 

.pink-border{
	border: solid 2px #282828;
}
.Orange{
	background-color:orange;
}
.dropdown-menu >li:hover{
	background-color:cyan;


}
    .solid-type-two{
        box-shadow:6px 9px 0px rgba(0,0,0,0.9);
    }
    .solid{
        box-shadow:0 6px 8px rgba(0,0,0,0.8);

    }
    .solid-two{
        box-shadow:0 3px 4px rgba(0,0,0,0.5);

    }
    .solid-two-light{
        box-shadow:0 2px 2px rgba(0,0,0,0.3);

    }

    .solid-text{
        text-shadow: 0px 4px 8px rgba(0,0,0,0.8);
    }

    .solid-text-light{
        text-shadow: 0px 3px 6px rgba(0,0,0,0.6);

    }
    .solid-text-light-two{
        text-shadow: 0px 2px 4px rgba(0,0,0,0.4);

    }
    .ladyB{
        height:400px;
        width:100%;
    }
    .ladyB-small{
        height:250px;
        width:100%;
    }
    .ladyB-border{
        border:solid 10px black;
        border-left-width:2px;

        border-right-width:2px;
        border-top-left-radius:10px;
        border-top-right-radius:10px;
        border-bottom-width:5;
    

    }
    #phone-lb-image{
    border:solid 1px deeppink;
    border-top-width:5px; 
    border-bottom-width:5px;
    height:400px; 
    width:95%;
    margin:0px;
    }
    .fontlize{
        font-family: Arial, 'Helvetica', sans-serif;
    }

    a{
        text-decoration: none;
    }
     .solid-two{
        box-shadow:0px 3px 4px rgba(0,0,0,0.5);

    }
    
    @media screen and (max-width:500px){
    .hide-cart-in-phone{
    	opacity:0;
    }
    .phone-cart{
    	display:block;
    }
    .footer-for-phone{
    	display:block;
    }

    .phone-shops-title-new{
    	display:block;
    }
    .phone-shops-title-old{
    	display:none;
    }

    	#phone-text{
    	display:none;
    	}
    	#phone-lady-B-container{
    		display:block; 
    	}
    	    	
    	#phone-lb-text{
    	font-size:25px;
    	}
    	.phone-mode-show{
    		display:block;
    	}
    	.pc-mode{
    		display:none;
    	}
    }
    
    @media screen and (min-width:500px){
	    .hide-cart-in-phone{
	    	opacity:1;
	    }
	
	        .phone-cart{
	    	display:none;
	    }
	
	    .footer-for-phone{
	    	display:none;
	    }
	
	    	#phone-lady-B-container{
	    		display:none; 
	   	}
	   	.phone-shops-title-new{
	    	display:none;
	    }
	    .phone-shops-title-old{
	    	display:block;
	    }
	    .pc-mode{
    		display:block;
    	}
    	.phone-mode-show{
    		display:none;
    	}


    	    
    }


</style>

 </html>