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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css" rel="stylesheet">
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
     <script src="{{ asset('js/artificial/facebook.js') }}"></script>


</head>
<body>
    

@yield('content')





</body>

    <!-- Scripts -->
    <script src="{{ asset('Trev Hookups/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('Trev Hookups/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Trev Hookups/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('Trev Hookups/js/theme-scripts.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js"></script>
  
    
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