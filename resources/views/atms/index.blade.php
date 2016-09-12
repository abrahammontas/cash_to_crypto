@extends('layouts.main')

@section('title', 'FAQ')

@section('content')

    <!-- Loader -->
    <div class="loader">
        <div class="loader-img"></div>
    </div>

    <!-- Top content -->
    <div class="top-content">
        <!-- Top menu -->
        <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom:0px;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Cash To Crypto - Buy Bitcoins!</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/" style="color:white !important;">Home</a></li>
                        <li><a href="/contact" style="color:white !important;">Contact</a></li>
                        @if (Auth::guest())
                            <li><a class="btn btn-link-2" href="{{ url('/login') }}" style="color:white !important">Login</a></li>
                            <li><a class="btn btn-link-2" style="background-color:#707070; color:white !important" href="{{ url('/register') }}" style="color:white">Register</a></li>
                        @else
                            <li>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Hi, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                                        <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li class="scroll-link exchange-rate"><span style="font-weight:400;">Exchange Rate: 1BTC</span> = <span style="font-weight:400; color:gold">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section id="disclaimer" style="background-color:#ff5e5e; border-top: 1px solid #cc1616; border-bottom: 1px solid #cc1616;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12" style="padding-top:14px; padding-bottom:6px;">
                        <p style="color:whitesmoke; font-size:14px;"><strong>WARNING: We will no longer be able to do business with any person that resides, is located, has a place of business, or is conducting business in New York.</strong></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="wrapper" style="background-color:#f2f2f2;">
        <div class="container">
            <div class="row" style="margin-top:15px; margin-bottom:30px;">
                <h1>Bitcoin ATM Locations</h1>
            </div>
            <div class="row" style="margin-bottom:30px;">
                <h2>Georgia Locations</h2>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Chevron Gas Station (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 345 Pharr Rd NE Atlanta, GA, 30305</li>
                            <li><strong>Hours:</strong> Open 24/7</li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Vape 911 Atlanta (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 539 10th St NW, Atlanta, GA 30318</li>
                            <li><strong>Phone:</strong> 404-975-1877</li>
                            <li><strong>Hours (Monday-Saturday):</strong> 10am-8pm</li>
                            <li><strong>Hours (Sunday):</strong> 10am-6pm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Exxon Gas Station (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 405 Cobb Pkwy S Marietta, GA, 30060</li>
                            <li><strong>Phone:</strong> 770-421-9261</li>
                            <li><strong>Hours:</strong> 9am-9pm every day</li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Terrific Package (Buy and Sell BTC)</li>
                            <li><strong>Address:</strong> 1899 Cheshire Bridge Rd NE, Atlanta, GA 30324</li>
                            <li><strong>Phone:</strong> 404-872-4294</li>
                            <li><strong>Hours (Monday-Thursday):</strong> 10am-11pm</li>
                            <li><strong>Hours (Friday-Saturday):</strong> 10am-11:45pm</li>
                            <li><strong>Hours (Sunday):</strong> 1pm-7pm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Moreland Food Mart (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 381 Moreland Ave SE Suite A Atlanta, GA, 30316</li>
                            <li><strong>Phone:</strong> 404-521-0238</li>
                            <li><strong>Hours:</strong> 8am-11pm every day</li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 16765 Tara Blvd Jonesboro, GA, 30236</li>
                            <li><strong>Hours:</strong> 6:30am-1:30am every day</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Cleveland Corner Store (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 381 Cleveland Ave SW Atlanta, GA, 30315</li>
                            <li><strong>Hours:</strong> 9am-11pm every day</li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Former Shell Gas Station (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 6400 Peachtree Industrial Blvd, Doraville, GA,30360 (Next to Doraville Package store)</li>
                            <li><strong>Hours:</strong> 7am-12am every day</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>
                            <li><strong>Hours:</strong> Open 24/7</li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Pipes and Lights- Inside Four Corners Market (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 1087 Euclid Ave NE Unit B Atlanta, GA, 30307</li>
                            <li><strong>Hours:</strong> 1:30pm-8:30pm every day</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12">
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>
                            <li><strong>Hours:</strong> Open 24/7</li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Valero Gas Station (Buy BTC Only)</li>
                            <li><strong>Address:</strong> 1597 Holcomb Bridge Rd, Roswell, GA, 30076</li>
                            <li><strong>Hours:</strong> 8am-11pm every day</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:50px;">
                <h2>Boston Locations</h2>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12 col-md-offset-4">
                    {{--<div class="col-md-5 col-md-offset-1">--}}
                        <ul class="list-unstyled text-left">
                            <li><strong>Store Name:</strong> Boston Food Shops & Deli</li>
                            <li><strong>Address:</strong> 1610 Commonwealth Ave Brighton, MA, 02135</li>
                            <li><strong>Hours:</strong> 5:30am-12am every day</li>
                        </ul>
                    {{--</div>--}}
                    {{--<div class="col-md-5 col-md-offset-1">--}}
                        {{--<ul class="list-unstyled text-left">--}}
                            {{--<li><strong>Store Name:</strong> Valero Gas Station (Buy BTC Only)</li>--}}
                            {{--<li><strong>Address:</strong> 1597 Holcomb Bridge Rd, Roswell, GA, 30076</li>--}}
                            {{--<li><strong>Hours:</strong> 5:30am-12am every day</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection