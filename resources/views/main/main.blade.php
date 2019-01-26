<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('graphs')
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
    <script>
	(function(){
	
	    var scripts = ["/static/general/bf-core.min.js", "/static/containers/PQF525.js", "/static/general/push-init-code.js"]	    
	    for(var i = 0; i < scripts.length; i++) {
	        var script   = document.createElement("script");
	        script.src   = "//brandflow.net" + scripts[i] + "?ts=" + Date.now() + "#";
	        script.async = false;
	        document.head.appendChild(script);
	    }
	})();
   </script>

    <!-- Hotjar Tracking Code for commcycle.co -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:863274,hjsv:6};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	   
    <script src="{{ asset('js/artificial/all.js') }}"></script>

</head>
<body>
     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top solid" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="/" id ="lb"><img src="{{ asset('imgs/Social.png') }}" style="width:35px; height:25px;"></a>
 			
                        <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Commcycle</strong></a>
                        
                        
                        <ul class="dropdown-menu" style='background-color:#585858;font-size:1.0em;margin-left:10%;'>
                         <li><a href="/commcycle-books" class='carte solid-text-light-two' style='color:deeppink;'>Books</a></li>
           		 <li><a href="/ladies" class='carte solid-text-light-two' style='color:deeppink;'>Ladies</a></li>
          		 <li><a href="/gents" class='carte solid-text-light-two' style='color:cyan;'>Men</a></li>
           		 <li><a href="/others" class='carte solid-text-light-two' style='color:orange;'>Other</a></li>
           		  <li><a href="/commcycleshop" class='carte solid-text-light-two' style='color:black;'>All</a></li>
          		 
          		</ul>
          		
          		
          		
                                 
                
                @if(Session::has('cart')) 
                	<a href="showcart" class='navbar-brand phone-cart'><i class=" glyphicon glyphicon-shopping-cart" style="font-size:20px; color:lime;cursor:pointer"></i><i class="badge">{{ Session::get('cart')->quantity }}</i></a>
                @endif
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                       {{--  <li id='commcycle-on-nav'>
                            <a href="commcycleshop" ><strong>CommCycle</strong></a>
                        </li> --}}
                    

                    <li>
                        <a href="/shop" ><strong>Shop</strong></a>
                    </li>
                    <li>
                        <a href="/commy-products" ><strong>Our Products</strong></a>
                    </li>

                     <li>
                        <a href="/ladyB-main" ><strong>Lady-B</strong></a>
                    </li>
                    <li>
                        <a href="/lost-and-found" ><strong>Lost & Found</strong></a>
                    </li>
                    <li>
                        <a href="/commy-blog" ><strong>Blog</strong></a>
                    </li>


                    <li>
                        <a href="/aboutus" ><strong>About</strong></a>
                    </li> 
                    
                    @if(Session::has('cart'))   
                        <li id="carIcon"><a href="/showcart" ><i class=" glyphicon glyphicon-shopping-cart hide-cart-in-phone" style="font-size:20px; color:lime;cursor:pointer"></i><i class="badge hide-cart-in-phone">{{ Session::get('cart')->quantity }}</i></a></li>  
                    @endif                                 
                </ul>

                <ul class=" navbar-right" style="margin-top:2px; margin-bottom:2px;">
                    <li>
                        <ul class="social-nav navbar-right">

                            <li class='theC'><a href="https://www.fb.com/realcommcycle" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class='theC'><a href="https://www.instagram.com/commcycle" target="_blank" title="Instagram" rel="nofollow" class="instagram"><i class="fa fa-instagram"></i></a></li>
                             <li class='theC'><a href="https://www.twitter.com/commcycle" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </li>                
                </ul>      
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->

    </nav>

@yield('content')





<section class='footer-for-phone' style='background-color:#282828; color:white;height:100px; padding-right:15px; padding-left:15px;'> 
	<p class='text text-muted solid-text-light' ><span style='color:deeppink'>Com</span><span style='color:cyan'>mcy</span><span style='color:orange'>cle</span> <span>&copy</span> 2017 <button id='' style='color:black;margin-left:25px;'  class='btn btn-default solid-two' data-toggle='popover'  data-placement='top' data-title='Commcycle Links' data-html='true' data-content='
	<div class="col-sm-12" style="width:200px;max-height:200px;overflow-y:scroll "> 
		<ul class="list-group">

                    <a href="#" class="list-group-item">COMMCYCLE SHOP</a>
                    <a href="#" class="list-group-item">SHOP</a>
                    <a href="aboutus" class="list-group-item">ABOUT</a>
                    
                  
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
	  	
	  	<div class='col-lg-4 col-md-4 col-sm-12 col-xs-4'> 
	  		<h3 href='#' class='text-center solid-text-light' style='margin:0px;'>VISIT</h3>
	  			  		<a href='/commmy-blog'>BLOG</a>
	  		
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
    
    @yield('custom-js')
<style> 
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
     .solid-rank{
        box-shadow:0 2px 2px rgba(0,0,0,0.2);

    }
    
    .thick{
    
    font-weight:500;
    
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
    	.phone-mode{
    		display:none;
    	}
    	
    	#phone-lb-text{
    	font-size:25px;
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

    	    
    }


</style>

</html>