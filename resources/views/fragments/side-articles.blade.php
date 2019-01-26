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