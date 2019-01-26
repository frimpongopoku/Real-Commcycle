

<div class="card-group">
					    		@forelse($rev as $post)
							  <div class="card" style='margin-bottom:5px;'>
							        <div class="card-body" style='padding:15px;'>
							            <h5 class="card-title"><b>{{$post->name}}</b></h5>
							            <p class="card-text">{{$post->text}}</p>
							        </div>
							        <div class="card-footer" style='padding:15px;border: solid 2px black;'>
							            <small class="">{{$post->created_at->diffForHumans()}}</small>
							        </div>
							    </div>
							 @empty 
							 	<center><p> No reviews have been made at the moment! Be the first </p> </center> 
							 
							 @endforelse
						</div>
