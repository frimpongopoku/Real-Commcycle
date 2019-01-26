@extends('main.main')

@section('title')
	LadyB African Fashion
@endsection

{{-- Save this page's link to session --}}
	{{ Session::put('lastpage','ladyBshop') }}
@section('content')
	<div class="clearfix" style="margin:35px;"></div>
	<div class="container">
		<div class="row">
			<div class='col-sm-12' style='' id='phone-lady-B-container' style='padding:0px;'> 
				<img src="{{ asset('imgs/LLB.jpg') }}" class='img-responsive solid-two' id='phone-lb-image' style=''>
			</div>
			<div class="col-md-9 col-xs-12 phone-mode" id="ladyB-Top">
				<div id='ladyB-models' class='carousel slide' data-ride='carousel'>
					<!-- indicators --> 
					<ol class='carousel-indicators'> 
						<li data-target='#ladyB-models' data-slid-to='0' class='active'></li>
						<li data-target='#ladyB-models' data-slid-to='1'></li>
						<li data-target='#ladyB-models' data-slid-to='2'></li>
						<li data-target='#ladyB-models' data-slid-to='3'></li>
						<li data-target='#ladyB-models' data-slid-to='4'></li>
						<li data-target='#ladyB-models' data-slid-to='5'></li>
						
					</ol>
					<!-- pages in carousel --> 
					<div class='carousel-inner lbModel solid' role='listbox' >
						<div class='item active'>
							<center>
								<img src="{{ asset('imgs/LLB.jpg') }}"  class="img-responsive lbPic">
							</center>
						</div>
						<div class='item'>
							<center>
								<img src="{{ asset('imgs/CCB.jpg') }}"  class="img-responsive lbPic">		
							</center>					
						</div>
						<div class='item'>
							<center>
								<img src="{{ asset('imgs/LLB2.jpg') }}"  class="img-responsive lbPic">
							</center>							
						</div>
						<div class='item'>
							<center>
								<img src="{{ asset('imgs/utani.jpg') }}"  class="img-responsive lbPic">
							</center>
						</div>
						<div class='item'>
							<center>
								<img src="{{ asset('imgs/armpit.jpg') }}"  class="img-responsive lbPic">		
							</center>					
						</div>
						<div class='item'>
							<center>
								<img src="{{ asset('imgs/gh.jpg') }}"  class="img-responsive lbPic">
							</center>							
						</div>
						<a class='left carousel-control' href='#ladyB-models' role='button' data-slide='prev'> 
							<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
						</a> 
						<a class='right carousel-control' href='#ladyB-models' role='button' data-slide='next'> 
							<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
						</a> 
					</div>
				</div>
					{{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-bottom:15px;" id="firstLadyB">
						<img src="{{ asset('imgs/LLB.jpg') }}" class="img-responsive ladyB solid">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-bottom:15px;" id="secondLadyB">
						<img src="{{ asset('imgs/CCB.jpg') }}" class="img-responsive ladyB solid">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-bottom:15px;" id="thirdLadyB">
						<img src="{{ asset('imgs/LLB2.jpg') }}" class="img-responsive ladyB solid">
					</div> --}}
			</div>
		</div>
	</div>
	<hr class='phone-mode'>
	    <div class="container" >
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            	             <a href="ladyBshop" class="btn btn-default solid-two-light pull-right">View Lady-B's stock   <span class="fa fa-forward" style="color:deeppink;"></span></a>
	                    
	                <div class="post-preview">
	                     <img src="{{ asset('imgs/bbs.jpg') }}" class="img-circle pull-left solid" alt = "Lady Burgesson's pic" style = "border:solid 4px deeppink;"width="140" height="140"/>
	                        <h1 class="post-title solid-text text-center" id='phone-lb-text'>
	                            LADY BURGESSON AFRICAN FASHION
	                        </h1>
	                
	                       
	                        <p>
								Lady Burgesson was conceptualized as an African Fashion brand by a 16-year old Ghanaian teenager in April 2016.  Lady Burgesson uses only eco-friendly materials and fabrics from the African Continent. All LB designs are created using African Print Fabric produced by Ghana Textiles Printing (GTP) which produces fabric using one hundred percent cotton that is legally grown and harvested in Ghana.
	                        </p>
	                        <h2 class="post-subtitle solid-text-light">
	                            MISSION
	                        </h2>
	                        <p>
	                        	Lady Burgesson makes garments that tell positive African stories by researching the history and culture of diverse parts of Africa, and retelling the stories through the clothes that are created for the rest of world.  Each piece of LB’s design process is deeply rooted in the African soil, but not limited to the African continent. Crafted with a blend of ancient and modern fashion styles, Lady Burgession uses the design and creation process to promote African pride and enlighten the non-African wearer about Africa.
	                        </p>
	                        <h2 class="post-subtitle solid-text-light">
	                        	VISION
	                        </h2>
	                        <p>
	                       		 Lady Burgesson seeks to tap into the youth potential in Africa, while offering opportunities for employment and fostering the entrepreneurial spirit to grow the African Fashion Industry. Our bold vision is that by the year 2030, Lady Burgesson will employ sixty thousand people internationally through the adaptation and development of design concepts and collection of materials/fabrics from across the African continent. The garments Lady Burgesson produces will speak volumes about African cultures, while setting the trends for other emerging fashion enterprises. Functioning at full capacity, Lady Burgesson will help to  increase revenue earned by African fabric producers such as GTP and Texmate Textile (TT) in South Africa, Nida Textile Mills in Tanzania and Vimal Textile Ltd in Zambia.
	                       	</p>
	                 </div>

	                    <hr>
	                <!-- Pager -->
	                <ul class="pager">
	                    <li class="next pull-right" >
	                        <a href="ladyBshop" class="solid-two-light">View Lady-B's stock   <span class="fa fa-forward" style="color:deeppink;"></span></a>
	                    </li>
	                    <li class="next pull-left" >
	                        <a type='button' id='leave-a-message-button' data-toggled='false' class="solid-two-light" style='cursor:pointer'>Leave a message  <span class="fa fa-envelope" style="color:black;"></span></a>
	                    </li>
	                </ul>
	            </div>
	        </div>
        </div>
        	<hr> 
        <div class="container" id='leave-a-message-container' style='display:none'>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default solid-two">
					<div class="panel-heading solid" style="background-color:deeppink;">
						<h2 class="panel-title text-center" style="text-shadow: 0px 4px 8px rgba(0,0,0,0.8); font-size:50px;"><i class="fa fa-envelope" style="color:white;"></i> Leave a message with Lady-B</h2><br>
						
					</div>
					<div class="panel-body" style="background-color:orange;">
						<form action="ladyB-message" method="get">
						{{ csrf_field() }}
							<div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid-two"><i class="glyphicon glyphicon-user blue"></i></span>
	                                <input type="text" name="Personname" placeholder="Name" class="form-control solid-two" required>
	                            </div>
                        	</div>
                        	<div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid-two"><i class="glyphicon glyphicon-envelope blue"></i></span>
	                                <input type="email" name="Personemail" placeholder="Email" class="form-control solid-two" required>
	                            </div>
                        	</div>
	                        <div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid-two"><i class="glyphicon glyphicon-phone blue"></i></span>
	                                <input type="number" name="Personnumber" placeholder="Phone" class="form-control solid-two" required>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="input-group">
	                                <span class="input-group-addon solid-two"><i class="glyphicon glyphicon-comment blue"></i></span>
	                                <textarea name="Personmessage" rows="6" class="form-control solid-two" type="text" required></textarea>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                       	 <small class="text text-muted">@commcycle-colors</small>
	                        	<button type="submit" class="btn btn-info pull-right solid-two-light" >Send <i class="glyphicon glyphicon-send"></i> </button>
	                        </div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>

        <style> 
        	.lbModel{
        		border:solid 10px deeppink;
        		border-left-width:1px;
        		border-right-width:1px; 
        		border-top-right-radius: 10px; 
        		border-right-color:black ;   
         		border-left-color:black ;       		
        		border-top-left-radius: 10px; 
        		border-bottom-right-radius: 10px;   
        		border-bottom-left-radius: 10px;		

        	}
        	.lbPic{
        		height:520px;
        		width:65%;
        		object-fit: cover !important;

        	}
        	#ladyB-Top{
        		position:relative;
        	}
        </style>
@endsection

@section('patner')
	<span style="color:deeppink">@</span>ladyB	
@endsection