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
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="/css/user/style.css" rel="stylesheet"> 

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-84319301-1', 'auto');
            ga('send', 'pageview');
        </script>
    </head>
    <body class="user-layout">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse" style="background-color: white; margin-bottom:0px; padding-left:20px; padding-right:20px;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand" style="padding-top:12px; color:white"><img src="/images/c2clogo.png" width="200" alt="Cash To Crypto"></a>
            </div>
            <div class="navbar-header" style="margin-top:-8px; margin-left:10px;">
                <p style="color:#48aa3b"><span style="font-weight:400;">Exchange Rate: 1BTC </span> = <span style="font-weight:600;">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span></p>
            </div>

            <div class='hidden-sm hidden-md hidden-lg'>
                <ul class='nav navbar-collapse collapse'>
                    <li>
                        <a href="{{route('dashboard')}}" style="{{ Request::is('dashboard') ? 'color:#CCA75C; font-weight:500;' : '' }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                    	<a href="{{ url('/contact') }}" style="{{ Request::is('contact') ? 'color:#CCA75C; font-weight:500;' : '' }}"><i class="fa fa-fw fa-envelope-o"></i> Contact</a>
                	</li>
                    @if (auth()->user()->hasPending())
                    <li>
                        <a href="{{route('current-order')}}" style="{{ Request::is('current-order') ? 'color:#CCA75C; font-weight:500;' : '' }}"> Current Order</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('buy')}}" style="{{ Request::is('buy-bitcoins') ? 'color:#CCA75C; font-weight:500;' : '' }}"><i class="fa fa-fw fa-btc"></i>Buy Bitcoins!</a>
                    </li>
                    <li>
                        <a href="{{route('profile')}}" style="{{ Request::is('profile') ? 'color:#CCA75C; font-weight:500;' : '' }}" class="dropdown-font-size"><i class="fa fa-fw fa-list-ul"></i> Profile</a>
                    </li>
                    <li>
                        <a href="{{url('logout')}}" class="dropdown-font-size"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                    </li>
                </ul>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav hidden-xs navbar-collapse">
                <li>
                    <a href="{{route('dashboard')}}" style="{{ Request::is('dashboard') ? 'color:#CCA75C; font-weight:500;' : '' }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                @if (auth()->user()->hasPending())
                <li>
                    <a href="{{route('current-order')}}" style="{{ Request::is('current-order') ? 'color:#CCA75C; font-weight:500;' : '' }}"> Current Order</a>
                </li>
                @endif
                <li class="no-border">
                    <a href="{{route('buy')}}" style="margin:8px 10px 0px 10px; padding:0px; {{ Request::is('current-order') ? 'color:#CCA75C; font-weight:500;' : '' }}"><button type="submit" class="btn btn-success">Buy Bitcoins!</button></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->firstName}} {{Auth::user()->lastName}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/" style="{{ Request::is('/') ? 'color:#CCA75C; font-weight:500;' : '' }}">Home</a></li>
                        <li><a href="{{ route('profile') }}" style="{{ Request::is('profile') ? 'color:#CCA75C; font-weight:500;' : '' }}"> Profile</a></li>
                        <li><a href="{{ url('/directions') }}" style="color:#5b5b5b; {{ Request::is('directions') ? 'color:#CCA75C; font-weight:500;' : '' }}">Directions</a></li>

                        <li><a href="{{ route('atms.georgia') }}" style="{{ Request::is('atms-georgia') ? 'color:#CCA75C; font-weight:500;' : '' }}">Georgia ATMs</a></li>
                        <li><a href="{{ route('atms.alabama') }}" style="{{ Request::is('atms-alabama') ? 'color:#CCA75C; font-weight:500;' : '' }}">Alabama ATMs</a></li>
                        <li><a href="{{ route('atms.massachusetts') }}" style="{{ Request::is('atms-massachusetts') ? 'color:#CCA75C; font-weight:500;' : '' }}">Massachusetts ATMs</a></li>
                        <li><a href="{{ route('atms.newjersey') }}" style="{{ Request::is('atms-newjersey') ? 'color:#CCA75C; font-weight:500;' : '' }}">New Jersey ATMs</a></li>
                        <li><a href="{{ route('atms.texas') }}" style="{{ Request::is('atms-texas') ? 'color:#CCA75C; font-weight:500;' : '' }}">Texas ATMs</a></li>
                        <li><a href="{{ route('atms.florida') }}" style="{{ Request::is('atms-florida') ? 'color:#CCA75C; font-weight:500;' : '' }}">Florida ATMs</a></li>

                        <li><a href="{{ url('/contact') }}" style="color:#5b5b5b; {{ Request::is('contact') ? 'color:#CCA75C; font-weight:500;' : '' }}">Contact</a></li>
                        <li><a href="{{ url('/logout') }}"> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="wrapper user">

            @if(App\Settings::getParam('banner_on') == '1')

                <section id="closed" style="background-color:#9cb8e2; border-bottom: 1px solid #147ae0;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12" style="padding-top:10px; padding-bottom:10px;">
                                <h3 style="color:white; margin-top:5px; font-weight: 400; text-align:center;"><span style="color:red">* * *</span> {{ App\Settings::getParam('banner_text') }} <span style="color:red">* * *</span></h3>
                            </div>
                        </div>
                    </div>
                </section>

            @endif
        
        	@yield('content')
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/js/jquery.js"></script>
        <script src="/js/underscore-min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- custom JS -->
        <script src="/js/custom.js"></script>
        @yield('scripts')
    </body>
</html>