

<div class='container'> 
	<div class='row'> 
	 <div class='col-md-6 col-lg-6'> 
	 	<div class="list-group">
	 	@foreach($nameArray as $name)
		  <a href="#"  style='color:green'class="list-group-item">{{$name}}</a>
		 @endforeach
		  				 
		 </div>

	
	 @foreach($picturesArray as $pic)

		<img src='{{asset("$pic")}}' class='order-pic solid-two' style='cursor:pointer;margin:5px;width:250px; height:220px;'
		
		
		>
			
		@endforeach
	 </div>
		
	</div>

		
			
	
		

</div>
<script> 
$('[data-toggle="popover"]').popover();
</script>
<style> 
	.order-pic{
		border: solid 3px green; 
		border-radius:10px; 
		padding:5px; 
		background-color:black
		
	
	}.order::hover{
		width: +10px; 
		height: +10px;
		transition: 0.5s;
	
	}
</style>