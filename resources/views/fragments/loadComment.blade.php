<div>
								
	@foreach($article->comments as $comment)
	<p style='margin:2px;padding:5px; border:solid 0px orange; border-left-width:2px; margin-top:3px;'>
									
									
				<small class='text text-info'><b>{{$comment->name}}</b></small><br>
						<span style='font-style:italic; font-size:0.7em;color:black;'><b>{{$comment->comment}}</b></span>
										
									</p>
	
	@endforeach
</div>
