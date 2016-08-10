<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bitcoin Depot - @yield('title')</title>

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/user/sb-admin.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/user/style.css" rel="stylesheet">
        <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: white;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand" style="color:white"><img src="/images/bd_logo_transparent.png" width="200" alt="Bitcoin-Depot-Logo"></a>
            </div>
            <div class="navbar-header" style="margin-top:-8px; margin-left:10px;">
                <p style="color:#48aa3b">Exchange Rate: 1BTC = ${{number_format(\App\Settings::getParam('ourprice'),2)}}</p>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li style="color:white;">
                    <a href="{{route('dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route('wallet')}}"><i class="fa fa-fw fa-bitcoin"></i> Wallet</a>
                </li>
                <li>
                    <a href="{{route('locations')}}"><i class="fa fa-fw fa-map-marker"></i> Locations</a>
                </li>
                <li class="no-border">
                    <a href="{{route('buy')}}" style="margin:8px 10px 0px 10px; padding:0px;"><button type="submit" class="btn btn-success">Buy Bitcoins!</button></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->firstName}} {{Auth::user()->lastName}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('profile')}}" class="dropdown-font-size"><i class="fa fa-fw fa-list-ul"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{url('logout')}}" class="dropdown-font-size"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        @yield('content')

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- custom JS -->
        <script src="/js/custom.js"></script>
        @yield('scripts')
    </body>
</html>