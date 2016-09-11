<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cash To Crypto - @yield('title')</title>

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/user/sb-admin.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="/assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="/assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />

        <link rel="stylesheet" href="/assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />


    </head>
    <body style="margin-top:0px;">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse" style="padding-left:20px; padding-right:20px;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Panel</a>
            </div>

            <!-- Top Menu Items -->
            <div class='hidden-sm hidden-md hidden-lg'>
                <ul class='nav navbar-collapse collapse'>
                    <li>
                        <a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders', 'all')}}">All Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders', 'pending')}}">Pending Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders', 'completed')}}">Completed Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders', 'issue')}}">Issue Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin.users')}}"><i class="fa fa-fw fa-group"></i> Users</a>
                    </li>
                    <li>
                        <a href="{{route('admin.banks')}}"><i class="fa fa-fw fa-bank"></i> Banks</a>
                    </li>
                    <li>
                        <a href="{{route('profile')}}"><i class="fa fa-fw fa-list-ul"></i> Profile</a>
                    </li>
                    <li>
                        <a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-right top-nav hidden-xs navbar-collapse">
            <!-- Single button -->
                    <li>
                        <a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('admin.dashboard')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-list"></i> Orders <i class="fa fa-fw fa-caret-down"></i> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('admin.orders', 'all')}}" class="dropdown-font-size">All Orders</a>
                            </li>
                            <li>
                                <a href="{{route('admin.orders', 'pending')}}" class="dropdown-font-size">Pending Orders</a>
                            </li>
                            <li>
                                <a href="{{route('admin.orders', 'completed')}}" class="dropdown-font-size">Completed Orders</a>
                            </li>
                            <li>
                                <a href="{{route('admin.orders', 'issue')}}" class="dropdown-font-size">Issue Orders</a>
                            </li>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="#"><i class="fa fa-fw fa-pencil-square-o"></i> Survery Data</a>
                    </li>-->
                    <li>
                        <a href="{{route('admin.users')}}"><i class="fa fa-fw fa-group"></i> Users</a>
                    </li>
                    <li>
                        <a href="{{route('admin.banks')}}"><i class="fa fa-fw fa-bank"></i> Banks</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->firstName}} {{Auth::user()->lastName}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('admin.settings')}}" class="dropdown-font-size"><i class="fa fa-fw fa-cogs"></i> Settings</a>
                            </li>
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

        <div class="wrapper admin">
        @yield('content')
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- custom JS -->
        <script src="/js/custom.js"></script>
        @yield('scripts')
    </body>
</html>