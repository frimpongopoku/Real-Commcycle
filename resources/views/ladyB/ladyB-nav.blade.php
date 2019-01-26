<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image" href="{{ asset('imgs/Social.png') }}">
        <title>LadyB-Admins</title>
        <link href="{{ asset('Admin Hookups/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/css/sb-admin.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/css/plugins/morris.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin Hookups/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand solid-text">@<span style="color:deeppink;">comm</span><span style="color:orange;">cycle-</span><span style="color:cyan;">ladyB-admins</span></a>
            </div>
            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            @if(Session::has('lb-admin'))
                @foreach($admins as $admin)
                    @if(Session::get('lb-admin') == $admin->Name.":".$admin->Password )
                        <div class="collapse navbar-collapse navbar-ex1-collapse" id="leftBar">
                            <ul class="nav navbar-nav side-nav">
                                <li>
                                    <a href="ladyB-profile"><i class="fa fa-fw fa-certificate " style="color:lime"></i>{{ explode(":",Session::get('lb-admin'))[0] }}</a>
                                                     
                                </li>
                                <li>
                                    <a href="ladyB-office"><i class="fa fa-fw fa-desktop"></i>Lady-B</a>
                                </li> 
                                <li>
                                    <a href="uploadcenter"><i class="fa fa-fw fa-upload"></i>upload</a>
                                </li>                    
                                <li>
                                    <a href="ladyB-order"><i class="fa fa-fw fa-shopping-cart"></i> Orders</a>
                                </li>
                                <li>
                                    <a href="ladyB-stock"><i class="fa fa-fw fa-table"></i> Stock</a>
                                </li>
                                <li>
                                    <a href="ladyB-sign-out"><span class="glyphicon glyphicon-log-out" style="color:red"></span> Logout</a>
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
                        @break;
                    @endif

                @endforeach
            @endif

        
    </div>
    <!-- /#wrapper -->

    <script src="{{ asset('Trev Hookups/js/jquery-3.2.1.min.js') }}"></script>
   <script src="{{ asset('Trev Hookups/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Admin Hookups/js/admin.js') }}"></script>
</body>
@yield('custom-js')


    <style> 
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

</html>
