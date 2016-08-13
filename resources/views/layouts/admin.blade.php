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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <!-- Single button -->
                    <li>
                        <a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('admin.dashboard')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-list"></i> Orders <i class="fa fa-fw fa-caret-down"></i></a>
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
                    <li>
                        <a href="#"><i class="fa fa-fw fa-pencil-square-o"></i> Survery Data</a>
                    </li>
                    <li>
                        <a href="{{route('admin.users')}}"><i class="fa fa-fw fa-group"></i> Users</a>
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