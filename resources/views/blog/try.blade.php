<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property ="og:url" content="http://commcycle.co/The-bread-Winner/7"/> 

    <meta property ="og:type" content="website"> 
    <meta property="og:title" content="Title for trying"/>
    <meta property="og:image" content="{{asset('imgs/helping.jpg')}}"/>
    <meta property="fb:page_id" content="168780823705676" />
    <meta property="og:description" content="This will be the next text...." />
        

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title')</title>
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

@yield('content')

<div style='margin-top:300px;margin-bottom:400px;'></div>

<center><img src="{{asset('imgs/Pongo.jpg')}}" class='solid-two-light' style='height:600px; width:100%;'></center>
				<div class='post-preview'><p style='font-size:0.9'>Beerima somola kasisu m3gy3 to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

	





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
  <section class='footer phone-mode' style='background-color:#282828; color:white;height:200px'> 
  	
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
 </html>