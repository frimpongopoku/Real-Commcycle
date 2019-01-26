@extends('main.main')

@section('title')
Commcycle-Rethinking communities
@endsection

{{-- Save this page's link to session --}}
    {{ Session::put('lastpage','commcycle') }}

@section('content') 

<div class="clearfix" style="margin-top:40px;"></div>
 <div class="intro-header col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1 class=''><span class='theC'>C</span>ommCycle</h1>
                        <h3>Rethinking Community's strengths!</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons" >                  	
                            <a href="commcycleshop" id="hpostButton" class="btn btn-warning solid" onclick="appear()" style="width:70px;">Post</a>
                        </ul>
                	</div>
            	</div>
        	</div>
        </div>
        <!-- /.container -->
 </div>
 
 <!-- This second upload button helps the mobile view -->
<a href="commcycleshop" id="postButton" class="btn btn-warning solid" onclick="appear()" style="width:2px;height:2px;opacity:0.0"></a>

 <a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
             <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">

                    <div class="clearfix"></div>
                    <h2 class="section-heading solid-text-light">How to use CommCycle</h2>
                    <p class="lead" style='font-size:16px;Helvetica Neue', 'Segoe UI', Segoe, Helvetica, Arial, 'Lucida Grande', sans-serif;'>Here you will be able to view all free items that people have uploaded. <br> You will be able to see the brand of the item if availabe and when the item was uploaded. If you want an item, you would have to choose it and add it to your cart.<br>After you have chosen all the things you want,<br>Just click on the cart button at the top to view your cart.<br>Satisfied with the things in your cart? Just fill the request form and click send request. Thats all, the <a href="commcycleshop" class="label label-default">CommCycle</a> admins will review your request and get back to you in not more than 72 hours. <br> <strong>Note: All personal information provided must be correct otherwise we cant communicate with you. </strong></p>




                </div>
                 <hr class="section-heading-spacer">
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive solid" src="imgs/helping.jpg" id="helping" alt="Homepage Image" style="width:40; height:30;">
                    <h2 class="section-heading solid-text-light">How to use CommCycle Upload</h2>
                   <p class="lead" style='font-size:16px;Helvetica Neue', 'Segoe UI', Segoe, Helvetica, Arial, 'Lucida Grande', sans-serif'> Do you have anything you dont use anymore? Any comb, jumper, sweater, calculator, mobile phone, bags etc? Its time to help someone with that. Upload a valid image of the item you have and go to the <a href='aboutus' class="label label-default">admins</a> page to leave a note. Indicate where you would like to meet for the item you have to be collected . <b>NB: Make sure all fields are filled in the upload form. </b></p>
             

                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
<div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading solid-text-light">How to use shop</h2>
                    <p class="lead" style='font-size:16px; Helvetica Neue', 'Segoe UI', Segoe, Helvetica, Arial, 'Lucida Grande', sans-serif'>Visit the <a href="shop" class="label label-default">shop</a>, choose any product that looks enticing to add to your cart. When you are done, click on the cart button to see items. Fill the form to complete your order. You will be emailed in not more than 24 hours to set up a meet for items to be delivered. </p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive solid" src="imgs/sell.jpg" alt="shop" id="seller" style="height:50px; width:40px;">
                    <div class="clearfix"></div>
                    <h2 class="section-heading solid-text-light">How to sell an item</h2>
                    <p class="lead" style= 'font-size: 16px; Neue', 'Segoe UI', Segoe, Helvetica, Arial, 'Lucida Grande', sans-serif'>Go to <a href="shop" class="label label-default">shop</a> upload a valid image of the item you want to sell. Drop a note with the <a href= 'aboutus' class="label label-default">admins</a>, indicate where our assosciates can meet you to collect the item. You will be contacted as soon as an item is sold.<br><b>NB: the prices of all items indicated by sellers will be increased by 10%.</b></p>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

   

<a  name="contact"></a>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 style='color:black;'>Join the weekly Newsletter and never miss out on whats cooking </h2>
	            </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                             <div class="col-md-6">
	                             <form action='/subscribe' method='get'>
                                        {{ csrf_field() }}
	                                    <div class="form-group">
	                                        <input type="email" style="opacity:1; width:220px;" class="form-control" name="subscribe" placeholder="Your Email *" id="subscribe" required="" data-validation-required-message="Please enter a valid email address.">
	                                        <p class="help-block text-danger"></p><button class="btn btn-info pull-right" n value="subscribe">Subscribe</button>
	                                    </div>
	                              </form>
                              </div>
                            </div>
                        </li>
                    	<li></li>
                    </ul>
                </div>
            </div>
		<!-- SAVE SUBSCRIBER EMAIL -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.banner -->

<hr>

<!-- ################################################# UPLOAD FORM #######################################################-->
<section id="uploadSection">
            <div class="container" id="uploadSheet" style=" display:none; border: solid 3px red; padding:10px; background-color: black; opacity:0.9; ">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h1 style="color:white;"><strong>Upload Form</strong></h1>
                            <p class="lead" align="left" style="color:white;">By uploading this image you certify that the item exists and you have no other plans for that item. You are uploading the item unto the Comm-Sector which indicates that your item is totally free and there are no strings attached. You shall not come back for your item after it has already been given out and been used. 
                            </p>
 							<div class="threeD">
 							
             					<label for="agreement" class="text text-success" id="agreementLabel"><input type="checkbox" name="agreement" id="agreement" onclick="agreementHideToggle() ">  I agree to the terms stated above.</label>
             					
             					
                        </div>
                       
                    </div>
                </div>
             
             
            
          	<!-- all the text boxes --> 
          		<form action="/freeupload" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="textboxPane" style="display:none;">
                        <div class="row col-md-12 col-md-offset-5 col-lg-12 col-lg-offset-5 col-sm-12 col-sm-offset-4 col-xm-12 col-xs-offset-4">
                            <input type="file" name="image" id="selectedImage" style="color:white;">
                        </div>
                    <br>
                    <br>
              			<div class="row">
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
    		          			<input type="text" class="form-control" id="name" name="name" placeholder="please enter your name *"  value="{{ Session::get('old')['Name'] }}" data-validation-required-message="Please enter your name.">
    		          		</div>
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    		          			<input type="text" class="form-control" id="email" name="email" placeholder="please enter your email *" value="{{ Session::get('old')['Email'] }}" data-validation-required-message="Please enter your email.">
    		          		</div>
    	          		</div> 
    	          	<br>
              			<div class="row">
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
    		          			<input type="text" class="form-control" id="itemName" name="itemName" placeholder="please enter the item name *"  value="{{ Session::get('old')['ItemName'] }}" data-validation-required-message="Please enter the item name">
    		          		</div>
    		          		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    		          			<input type="text" class="form-control" id="itemBrand" value="{{ Session::get('old')['ItemBrand'] }}" name="itemBrand" placeholder="please enter your item's brand *" data-validation-required-message="Please enter your item brand.">
    		          		</div>
    	          		</div> 
    	          	<br> 
    	          	<div class="row">
    	          		<div class="col-lg-12">
    	          			<textarea type="text" class="form-control" id="info" name="info" placeholder="please describe what kind of person you would like to have this and any additional information about this item Eg.Size of a shirt*"  data-validation-required-message="Please enter additional information" >{{  Session::get('old')['Info'] }}</textarea>   	          		
                            <input type="hidden" id="categoryBox" name="categoryBox" >
                            <input type="hidden" id="difference" name="diff" value="free" >
                        </div>
    	          	</div>

    	         <br> 
    		         <!-- choose category -->
    		           <div class="row">
    	                    <div class="col-md-12 text-center">
    	                    		<span class="" id="otherCategory" onclick="checkMeOtherSpan()"><input type="checkbox" class="threeD" id="other" onclick="otherCheck()"/>  Other</span>
    	                       
    	                        	<span class="" id="gentsCategory" onclick="checkMeGentsSpan()"><input type="checkbox" class="threeD" id="gents" onclick="gentsCheck()"/> Gents</span>
    	             
    	                        	<span class="" id="ladiesCategory" onclick="checkMeLadiesSpan()"><input type="checkbox" class="threeD" id="ladies" onclick="ladiesCheck()"/> Ladies</span>
    	                     </div>
    					</div>
    			<br>
                </div>

					<div class="row"> 
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center"> 
							<button   class="btn btn-danger goodWidth" id="cancel" name="cancel" value="cancel">Cancel</button>
							<button   class="btn btn-default goodWidth" id="finalise" name="finalise" value="finalise">Upload</button>
							<button  class="btn btn-default goodWidth" id="finalise2" name="alternate" value="alternate">Alternate-upload</button>
						</div>

					</div>
          		</form>
          	<!--/.container -->
            </div>
</section>


@endsection 