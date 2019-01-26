@extends('main.MDmain') 

@section('title') 
	About Us
@endsection
@section('content') 
	<div class="clear-fix" style="margin:100px;"></div>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<h1 class="section-title text-center solid-text">About Us<hr></h1>
				<p class="post-title">CommCycle is an online shopping/recycling platform designed for the community members of the African Leadership Academy. Users of the website are able to either sell/buy second hand items through using shop option or share items they don’t use anymore for the benefit of the community by using the CommCycle option.<hr></p>
			</div>
			<div class='row'> 
				<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
				</div>

			</div>
			<div class="row" style=''>
				<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
					<img class="img-responsive z-depth-2 about-admin-image" id="leroy" autofocus="autofocus" src ="imgs/Lee.jpg" style="" alt="leroy's image" data-toggle='popover' data-title='LEROY' data-placement='bottom' data-html = 'true' data-content="
					<p class=' ' style='padding:15px; font-size:.75rem; max-height: 250px; overflow-y:scroll;'>Leroy is a Kenyan social entreprenuer, Forbes 30 under 30 honoree who derives pleasure from solving pressing community needs. His works have been featured by CNN, The Huffington Post, The African Union, Grist, CCTV America and local media houses in Kenya. He has won a modest number of entrepreneurship awards, fellowships and has travelled to different parts of the world to share and connect with like-minded entrepreneurs. His strength lies in buying stakeholders into the vision of CommCyle. When he is not pursuing his entreprenual interests, he can be found writing, reading novels, rooting for Manchester United, his favorite football team or playing rugby. He also blogs for both the Huffington Post US and SA.</p>
					
					
					">
					<div class='mask rgba-white-slight'></div>
					<div class="text-center card about-badge" style=''> 
						<h4 class="solid-text-light"><i class='fa fa-user' style='color:orange'></i> LEROY MWASARU</h3> 
						<h5 class="solid-text-light">CHAIR OF THE BOARD</h4>
						
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
					<img class="img-responsive z-depth-2 about-admin-image" id="soumaya" src ="{{ asset('imgs/Soumaya.jpg') }}" style="" alt="leroy's image" data-toggle='popover' data-title='SOUMAYA' data-placement='bottom' data-html = 'true' data-content="
					<p class=' ' style='padding:15px; font-size:.75rem; max-height: 250px; overflow-y:scroll;'>Soumaya is a starting Tunisian social entrepreneur who aims to see the huge disparity between the rich and the poor come to an end. She has been a Scout since a very tender age and ended up becoming the troop’s leader. She was also a young ambassador of her country Tunisia when she was an exchange student in the US. Since then, she has developed a passion for religions and traveling. Soumaya loves learning and teaching people about religions and she also never missed a chance to travel and discover a new place and culture. You can find her stargazing from time to time or always craving days off to hike and camp and sleep on the lights of bonfires.</p>
					
					
					">
					<div class="text-center about-badge"> 
						<h4 class="solid-text-light"><i class='fa fa-user' style='color:deeppink'></i>  SOUMAYA DAMMAK</h3> 
						<h5 class="solid-text-light">BOARD MEMBER</h4>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
					<center><img class="img-responsive z-depth-2 about-admin-image" id="frimpong" src ="{{ asset('imgs/pong.jpg') }}" style="" alt="leroy's image" data-toggle='popover' data-title='FRIMPONG' data-placement='bottom' data-html = 'true' data-content="
					<p class=' ' style='padding:15px; font-size:.75rem; max-height: 250px; overflow-y:scroll;'>Frimpong is a young Ghanaian who is very passionate about technology.<br>He is very quick to divert every solution to a problem through technology.<br>Frimpong aims to solve every problem he identifies through out his life with code--because he believes it is a more secure and faster way.<br>He has total grasp over languages like C#, python, Javascript, Ruby, PHP, visual basic and many others.</p>
					
					
					"></center>
					<div class="text-center about-badge"> 
						<h4 class="solid-text-light"><i class='fa fa-user' style='color:cyan'></i> FRIMPONG O.AGYEMANG</h3> 
						<h5 class="solid-text-light">BOARD MEMBER</h4>
						
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
					<center><img class="img-responsive z-depth-2 about-admin-image" id="frimpong" src ="{{ asset('imgs/chris.jpg') }}" style="" alt="leroy's image" data-toggle='popover' data-title='CHRIS' data-placement='bottom' data-html = 'true' data-content="
					<p class=' ' style='padding:15px; font-size:.75rem; max-height: 250px; overflow-y:scroll;'> Chris is an aspiring social entrepreneur who wants to close down on the information gap in Africa regarding emerging technologies like block chain. He believes in utilizing the power of these new technologies to solve major continental problems like the poor waste management through increased awareness. He is specialized in social media and content marketing with experience in managing Facebook, twitter, Linked-In and Instagram. Christopher enjoys reading books and playing video games during his leisure time. </p>
					
					
					"></center>
					<div class="text-center about-badge"> 
						<h4 class="solid-text-light"><i class='fa fa-globe' style='color:lime'></i> CHRISTOPHER AKULEMI</h3> 
						<h5 class="solid-text-light">Chief Operations Officer</h4>
						
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
					<center><img class="img-responsive z-depth-2 about-admin-image" id="frimpong" src ="{{ asset('imgs/Dennis2.jpg') }}" style="" alt="leroy's image" data-toggle='popover' data-title='DENNIS' data-placement='bottom' data-html = 'true' data-content="
					<p class=' ' style='padding:15px; font-size:.75rem; max-height: 250px; overflow-y:scroll;'>  Dennis Mwangi Kinyua is a Kenyan-trepeneur who is passionate about developing the African continent through biotechnology. When He is not busy modelling the genetic structure of cells, one can easily find him enjoying the spirit of rugby 7s, reading science-fiction novels, engaging in community service schemes or playing draft.</p>
					
					
					"></center>
					<div class="text-center about-badge"> 
						<h4 class="solid-text-light"><i class='fa fa-bookmark' style='color:lime'></i> DENNIS MWANGI</h3> 
						<h5 class="solid-text-light"> Chief Executive </h4>
						
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
					<center><img class="img-responsive z-depth-2 about-admin-image" id="frimpong" src ="{{ asset('imgs/gibson.jpg') }}" style="" alt="leroy's image" data-toggle='popover' data-title='GIBSON' data-placement='bottom' data-html = 'true' data-content="
					<p class=' ' style='padding:15px; font-size:.75rem; max-height: 250px; overflow-y:scroll;'> Gibson is a Kenyan whose passion for technology surpasses all his other interests. He is particularly interested in web and application programming which he has immense knowledge and experience in. His languages of interest are PHP,Angular javascript, Android, and Meteor.</p>
					
					
					"></center>
					<div class="text-center about-badge"> 
						<h4 class="solid-text-light"><i class='fa fa-desktop' style='color:lime'></i> GIBSON MUNENE</h3> 
						<h5 class="solid-text-light">Chief Tech Officer</h4>
						
					</div>
				</div>
			</div>
<hr>
		</div>
	</div>
	<div class='container'> 
		<div class='col-md-6 col-md-offset-3 '> 
			<button class='btn btn-default' id='leave-a-message-button' data-toggled='false' style='width:100%; margin-bottom:10px;' >Leave a message <span class='fa fa-envelope'></span></button>

		</div>
	</div>
	<hr>
		<div class="container" id='leave-a-message-container' style='display:none'>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default solid">
					<div class="panel-heading solid" style="background-color:deeppink;">
						<h1 class="panel-title text-center" style="text-shadow: 0px 4px 8px rgba(0,0,0,0.8); font-size:50px;"><i class="fa fa-envelope" style="color:white;"></i> Leave a message</h1><br>
						
					</div>
					<div class="panel-body" style="background-color:white;">
						<form action="sendmessage" method="get">
						{{ csrf_field() }}
							<div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon "><i class="glyphicon glyphicon-user blue"></i></span>
	                                <input type="text" name="Personname" placeholder="Name" class="form-control " required>
	                            </div>
                        	</div>
                        	<div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon "><i class="glyphicon glyphicon-envelope blue"></i></span>
	                                <input type="email" name="Personemail" placeholder="Email" class="form-control " required>
	                            </div>
                        	</div>
	                        <div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon "><i class="glyphicon glyphicon-phone blue"></i></span>
	                                <input type="number" name="Personnumber" placeholder="Phone" class="form-control" required>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon "><i class="glyphicon glyphicon-comment blue"></i></span>
	                                <textarea name="Personmessage" rows="6" class="form-control " type="text" required></textarea>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                       	 <small class="text text-muted">@commcycle-colors</small>
	                        	<button type="submit" class="btn btn-info pull-right " >Send <i class="glyphicon glyphicon-send"></i> </button>
	                        </div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<style> 
.about-admin-image{
width:400px; 
	height:300px;
 	 object-fit:cover !important;
 	  cursor:pointer; 
 	  border-top-right-radius:20px;
 	  border-top-left-radius:20px;




}
.about-badge{
	padding:5px;
	background-color:#303030; 
	color:white;
	margin-bottom:50px;
	box-shadow:0 2px 4px rgba(0,0,0,0.3);

}
.admin{
	font-size:15px; 
	border:solid 2px gray; 
	padding:5px; 
	min-height:100px;
	max-height:300px; 
	border-top-color:black;
	overflow-y:scroll;
	
	border-left-width:1px; 
	border-right-width:1px;
	border-top-width:10px;
	/*border-top-right-radius:10px;
	border-top-left-radius:10px; */
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
	margin-bottom:20px;
	box-shadow:0px 2px 4px rgba(0,0,0,0.4);
}



</style>
@endsection

@section('custom-js')

<script> 
	$('[tooltip="popover"]').popover();
	</script>

@endsection