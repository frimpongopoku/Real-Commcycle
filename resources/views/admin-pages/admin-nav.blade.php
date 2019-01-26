<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image" href="{{ asset('imgs/Social.png') }}">
        <title>Commcycle-Admins</title>
        <link href="{{ asset('Admin Hookups/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/css/sb-admin.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/css/plugins/morris.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css" rel="stylesheet">
   
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top solid" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <div class="navbar-header">
                <a class="navbar-brand" href="/" id ="lb"><img src="{{ asset('imgs/Social.png') }}" style="width:35px; height:25px;"></a>            
                <a class="navbar-brand solid-text">@<span style="color:deeppink;">comm</span><span style="color:orange;">cycle-</span><span style="color:cyan;">admins</span></a>
            </div>
            <!-- Top Menu Items -->

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            @if(Session::has('admin'))
                @foreach($admins as $admin)
                    @if(Session::get('admin') == $admin->name.":".$admin->password )
                        <div class="collapse navbar-collapse navbar-ex1-collapse" id="leftBar">
                            <ul class="nav navbar-nav side-nav">
                                <li>
                                    <a href="admin-profile"><i class="fa fa-fw fa-certificate " style="color:lime"></i>{{ explode(":",Session::get('admin'))[0] }}</a>
                                                     
                                </li>
                                 <li>
                                    <a href="/create-article"><i class="fa fa-fw fa-pencil"></i> Blog </a>
                                </li>
                                <li>
                                    <a href="/admin"><i class="fa fa-fw fa-envelope"></i> Messages</a>
                                </li> 
                                <li>
                                    <a href="/transactions"><i class="fa fa-fw fa-money"></i> Transaction</a>
                                </li>                     
                                <li>
                                    <a href="/orders"><i class="fa fa-fw fa-shopping-cart"></i> Orders</a>
                                </li>
                                <li>
                                    <a href="/upload-our-products"><i class="fa fa-upload"></i> Our Products</a>
                                </li>

                                <li>
                                    <a href="/admincommcycleitems"><i class="fa fa-fw fa-table"></i> Commcycle Items</a>
                                </li>
                                <li>
                                    <a href="/adminshopitems"><i class="fa fa-fw fa-table"></i> Shop Items</a>
                                </li>
                                <li>
                                    <a href="/subscribers"><i class="fa fa-fw fa-desktop"></i> Subscribers</a>
                                </li>
                                <li>
                                    <a href="/admin-log-out"><span class="glyphicon glyphicon-log-out" style="color:red"></span> Logout</a>
                                </li>                    

                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                        <div class="container" style="background: white;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

        
    </div>
    <!-- /#wrapper -->

    <script src="{{ asset('Trev Hookups/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('Trev Hookups/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Admin Hookups/js/admin.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js"></script>
    
       
</body>

    <style> 
    	.blog-boxes{
    	
    		border:solid 2px orange; 
    		border-radius:0px; 
    		border-width:0px; 
    		border-bottom-width:2px;
    		
    	
    	
    	}
        .border{
            border:solid 2px black;
            padding:5px;
            background: black;

        }
        .long-box{
            height:700px;
        }
            .solid{
        box-shadow:0 6px 8px rgba(0,0,0,0.8);

    }
    .solid-two{
         box-shadow:0 2px 4px rgba(0,0,0,0.4);
    }
    .solid-text{
        text-shadow: 0px 4px 8px rgba(0,0,0,0.8);
    }
    .solid-text-light{
        text-shadow: 0px 3px 6px rgba(0,0,0,0.6);

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

    a{
        text-decoration: none;
    }
    </style>
    @yield('custom-js')
    <script> 
    	$('#on').on('click',function(){
    		$.ajax({
    			method:'get', 
    			url:'/comment-notfication/'+$(this).attr('data-admin')
    		
    		
    		}).done(function(){
    		
    			alert('notification setting ON!')
    		
    		});
    		    	
    	});
	$('[data-toggle="popover"]').popover();
	
	
		$('#post').on('click',function(){
			if($('#message-box').val().length !=0){

				$(this).text('...');
				$.ajax({method:'get', 
				url:'/admin-post-news', 
				data:{message:$('#message-box').val()}
				}).done(function(){
				$('#current-post').attr('data-content',$('#message-box').val());
				$('#post').text('Post');
				$('#message-box').val('');
					$('#posted-alert').fadeIn(400,function(){
						setTimeout(function(){
							$('#posted-alert').fadeOut(400);
						},2000);
		
					});	
						
				});
			}else{
	
	alert("You haven't typed anything");
	}

		});
		
	
	
			</script>

</html>
