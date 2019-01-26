@extends('main.blognav') 


@section('title') 
Commy-Blog
@endsection

@section('content') 
<div style='margin-top:80px;'></div>
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
	<a class='btn btn-sm btn-primary solid-two-light' id='try' onclick='' href='http://commcycle.co/commcycleshop' target='_blank' style='margin:10px;margin-top:25px;width:100%'>See <i class='fa fa-forward'></i></a> <br>
						
				</div>
					<br>
					<div class='thumbnail pc-mode' style='height:100px;'> 
					
							@foreach($commAddSet as $com) 
								@foreach($com as $row)
								<img src="{{asset($row['Pics'])}}" class='pull-left  img-thumbnail img-responsive' style='height:80px; width:100px;margin-right:3px;'>
								
								@endforeach
							@endforeach	
				<a class='btn btn-sm btn-primary solid-two-light' id='try' onclick='' href='http://commcycle.co/commcycleshop' target='blank' style='margin:10px;margin-top:25px;border-radius:100%'><i class='fa fa-forward'></i></a> 
									
					</div>			
	    			</div>
    			</div>
    		</div>
    	</div>

<!-- ##################################################### commcycle ADS END ############################################################### -->
	<div class='container'> 
		<div class='row'> 
<!-- ##################################################### ARTICLE BEGINNING ############################################################### -->
			<div class='col-lg-8 col-md-8 col-sm-8 col-xs-12' style='margin-bottom:200px;'>
				
				@forelse($articles as $article)
				
					@if($article->extras == 2)
						<div >
							<h1 clas='solid-text-light' style='font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;font-size:4em;'>{{$article->tagline}}</h1>
								<p style=''><b>{{$article->semiTag}}</b></p>
								<small><b>Posted:</b> {{$article->created_at->diffForHumans()}} | <b>Updated:</b> {{$article->updated_at->diffForHumans()}}
								</small>
						</div>
							<center><img src="{{asset($article->Image)}}" class='solid-two-light' style='height:90%px; width:100%;margin:15px 0px;'></center>
														
			<!-- ########################################## SHOW FIRST POST WITH EXTRA PICS##################################### -->
			
			@php
				$txtArray = explode('<-->',$article->Text);
				$imgList = explode(',',$article->extraPics);
				foreach($txtArray as $index => $text){
					echo "<p style=' white-space:pre-wrap;'>$text</p>";
					//echo "<pre style=' background:white; border: solid 0px black; padding:15px; overflow-x:scroll;max-width:100%'>$text</pre>";
					echo "<img style='height:75%; width:100%;margin-top:10px; margin-bottom: 10px;'src='$imgList[$index]'>";
				} 
			
			@endphp

			<!-- ################################# END OF SHOW  ######################################### -->
			
												
						<!-- SHARE AND COMMENT PANE --> 
						<div class='thumbnail clearfix ' style='height:50px;padding:5px;'>
							<button class='btn-sm btn btn-default pull-left' style='background:#3B5998; color:white;' onclick='theBlogShare("commcycle.co/commy-article/{{$article->id}}")'><i class='fa fa-facebook'></i></button>
							<div class='pull-right'>
								<small>{{count($article->comments)}} Comment{{count($article->comments) ==1 ? '' : 's'}} </small>
								<button class='btn btn-sm btn-default solid-two-light comment-trigger' style='color:white; background-color:#585858' data-toggle='modal' data-id='{{$article->id}}' data-target='#comment-box-{{$article->id}}'><i class='fa fa-comment'></i></button>
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
							<a class='btn btn-sm btn-primary solid-two-light' style='margin:1px;margin-top:45px;border-radius:100%' href='http://commcycle.co/ladyBshop' target='blank'>See <i class='fa fa-forward'></i></a> 
						</div>
						<!-- COMMENT MODAL --> 
						
						<div class='modal fade' id='comment-box-{{$article->id}}'> 
							<div class='modal-dialog modal-md' style='border-radius:0px;'> 
								<div class='modal-content'> 
									<div class='modal-header' style='color:black; background:deeppink'> 
										<h2 class='modal-title'>Comments</h3>
									</div>
									<div class='modal-body ' id='modal-body-{{$article->id}}' style=' max-height:250px; overflow-y:scroll;' >
										
										<div>
										
											@foreach($article->comments as $comment)
											<p style='margin:2px; padding:5px; border:solid 0px orange; border-left-width:2px; margin-top:3px;'>
											
											
												<small><b>{{$comment->name}}</b></small><br>
												<span style='font-style:italic; font-size:0.7em;color:black;'><b>{{$comment->comment}}</b></span>
												
											</p>
											
											@endforeach
										</div>
									
										
		
									</div> 
									<div class='modal-footer clearfix' style=''> 
										<input type='name' id='commenter-name-{{$article->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:100%;' placeholder='your name or email' required> <br>
										<button class='btn btn-default pull-right solid-two-light comment-button' data-id='{{$article->id}}' id='' style='margin-top:5px;' ><span class='glyphicon glyphicon-send'></span></button>
										<input type='name' id='comment-boxy-{{$article->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:80%; margin-top:5px;' placeholder='comment..'>
		
										
									</div> 
								</div> 
							</div> 
						</div>
		<!--  COMMENT END -->
					
					@else
						<div >
							<h1 clas='solid-text-light' style='font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;font-size:4em;'>{{$article->tagline}}</h1>
								<p style=''><b>{{$article->semiTag}}</b></p>
								<small><b>Posted:</b> {{$art->created_at->diffForHumans()}} | <b>Updated:</b> {{$article->updated_at->diffForHumans()}}
								</small>
						</div>
							<center><img src="{{asset($article->Image)}}" class='solid-two-light' style='height:80%px; width:100%;'></center>
							<p style='font-size:0.9'>{{substr($article->Text,0,400)}}</p>
							
							
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
							<a class='btn btn-primary solid-two-light' style='margin:1px;margin-top:45px;border-radius:100%' href='http://commcycle.co/ladyBshop' target='blank'>See <i class='fa fa-forward'></i></a> 
						
												
						</div>
						<div class='thumbnail solid-two-light pc-mode' style='border:solid 3px deeppink; height: 230px;max-height:250px; overflow-y:scroll; '>
							<center><small class='text text-danger'>Check out Lady-B Items</small></center>
							@foreach($lbAddSet1 as $lb)
								@foreach($lb as $row) 
									<img src="{{asset($row['Pics'])}}" class=' pull-left solid-two img-responsive' style='height:180px;margin:10px; width:200px;'>
									@break
								@endforeach	
							@endforeach
			<a class='btn btn-primary solid-two-light' style='margin:1px;margin-top:45px;border-radius:100%'  href='http://commcycle.co/ladyBshop' target='blank'>See <i class='fa fa-forward'></i></a> 
						</div>
						
						<!--Now show the rest of the article -->
						<p>{{substr($article->Text,400)}}</p>
						
						<!-- SHARE AND COMMENT PANE --> 
						<div class='thumbnail clearfix ' style='height:50px;padding:5px;'>
							<button class='btn btn-default pull-left' style='background:#3B5998; color:white;' onclick='share("{{$article->id}}")'><i class='fa fa-facebook'></i></button>
							<div class='pull-right'>
								<small>{{count($article->comments)}} Comment{{count($article->comments) ==1 ? '' : 's'}} </small>
								<button class='btn btn-default solid-two-light comment-trigger' style='color:white; background-color:#585858' data-toggle='modal' data-id='{{$article->id}}' data-target='#comment-box-{{$article->id}}'><i class='fa fa-comment'></i></button>
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
						
						<div class='modal fade' id='comment-box-{{$article->id}}'> 
							<div class='modal-dialog modal-md' style='border-radius:0px;'> 
								<div class='modal-content'> 
									<div class='modal-header' style='color:black; background:deeppink'> 
										<h2 class='modal-title'>Comments</h3>
									</div>
									<div class='modal-body ' id='modal-body-{{$article->id}}' style=' max-height:250px; overflow-y:scroll;' >
										
										<div>
										
											@foreach($article->comments as $comment)
											<p style='margin:2px; padding:5px; border:solid 0px orange; border-left-width:2px; margin-top:3px;'>
											
											
												<small><b>{{$comment->name}}</b></small><br>
												<span style='font-style:italic; font-size:0.7em;color:black;'><b>{{$comment->comment}}</b></span>
												
											</p>
											
											@endforeach
										</div>
									
										
		
									</div> 
									<div class='modal-footer clearfix' style=''> 
										<input type='name' id='commenter-name-{{$article->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:100%;' placeholder='your name or email' required> <br>
										<button class='btn btn-default pull-right solid-two-light comment-button' data-id='{{$article->id}}' id='' style='margin-top:5px;' ><span class='glyphicon glyphicon-send'></span></button>
										<input type='name' id='comment-boxy-{{$article->id}}' class='form-control' style='border: solid 0px #282828; border-bottom-width:2px; border-radius:0px; width:80%; margin-top:5px;' placeholder='comment..'>
		
										
									</div> 
								</div> 
							</div> 
						</div>
		<!--  COMMENT END -->
		
					@endif
				@empty
				
				@endforelse
				
			</div><!-- /.End col-8 -->
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
					<a class='btn btn-success pull-right solid-two-light' onclick='adverts({{$row["id"]}},5)' style='border-radius:100%; border:solid 2px white;'><i class='fa fa-forward'></i></a>
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
						<input type='submit' placeholder='Email' value='Subscribe' class='btn btn-sm btn-info pull-right solid-two-light'>		 
					</div>
				</div>
				
				<!-- NEXT ARTICLE STUFF --> 
			<div class='thumbnail clearfix'>
				<div class='pull-right'>
					<button class='btn btn-default' id='more-button' data-main-id='' data-toggled='true'><span class='glyphicon glyphicon-plus'></span></button>
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

<!-- ##################################################### ARTICLE SHOP ADS END ############################################################### -->

		</div><!-- END ROW --> 
	</div><!-- END SECOND CONTAINER --> 

@endsection

@section('scripts') 
	<script src="{{ asset('js/artificial/pub-blog.js') }}"></script>
	
	<script> 
		function adverts(id,paginationNumber){
			$.ajax({
				method:'get', 
				url:'/page-number/'+paginationNumber + '/'+id
			}).done(function(response){
				var pageNumber = response; 
				 window.open('http://commcycle.co/shop?page='+pageNumber,'_blank');
				
			}); 					
		};
	</script>
@endsection