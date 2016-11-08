@extends('layouts.main')

@section('title', 'ATM Locations')

@section('content')

    <!-- Loader -->
    <div class="loader">
        <div class="loader-img"></div>
    </div>

    <!-- Top content -->
    <div class="top-content">
        <!-- Top menu -->
        <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom:0px; background-color:white;">
            <div class="container">
                <div class="navbar-header">
                    @if(Auth::guest())
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    @endif
                    <a href="/"><img src="images/c2clogo.png" style="max-width:230px; margin-top:10px;" class="hidden-xs hidden-sm" alt="Cash-To-Crypto-logo"></a>
                </div>

                @if(Auth::guest())
                    <div class="scroll-link exchange-rate hidden-md hidden-lg pull-left" style="color:white; padding-left:0px; margin-top:-50px;">
                        <img src="images/c2clogo.png" class="pull-left" style="max-width:200px" alt="c2c-logo"><br />
                        <span style="font-weight:400; color:#5FB06F;" class="text-left">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span>
                    </div>
                @else
                    <div class="scroll-link exchange-rate hidden-md hidden-lg" style="color:white; padding-left:0px;">
                        <img src="images/c2clogo.png" style="max-width:200px" alt="c2c-logo"><br />
                        <span style="font-weight:400; color:#5FB06F;">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span>
                    </div>
                @endif


                @if(!Auth::guest())
                    <div class="dropdown hidden-md hidden-lg">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Hi, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu text-center" style="left:30.5%;" role="menu">
                            @if (auth()->user()->hasPending() == 0)
                                <li><a href="/buy-bitcoins"><button class="btn-menu-buy">Buy Bitcoins!</button></a></li>
                            @endif
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                            @if (auth()->user()->hasPending())
                                <li>
                                    <a href="{{route('current-order')}}"> Current Order</a>
                                </li>
                            @endif
                            <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                            <li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>
                            {{--<li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>--}}
                            <li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
            @endif 

            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>
                            {{--<li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>--}}
                            <li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>
                            <li><a class="btn btn-link-2 btn-login" href="{{ url('/login') }}">Login</a></li>
                            <li><a class="btn btn-link-2 btn-register" href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li>
                                <div class="dropdown hidden-xs hidden-sm">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Hi, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @if (auth()->user()->hasPending() == 0)
                                            <li><a href="/buy-bitcoins"><button class="btn-menu-buy">Buy Bitcoins!</button></a></li>
                                        @endif
                                        <li><a href="/">Home</a></li>
                                        <li><a href="{{ Auth::user()->admin ? route('admin.dashboard') : route('dashboard') }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                                        @if (auth()->user()->hasPending())
                                            <li>
                                                <a href="{{route('current-order')}}"> Current Order</a>
                                            </li>
                                        @endif
                                        <li><a href="{{ route('profile') }}"><i class="fa fa-fw fa-list-ul"></i> Profile</a></li>
                                        <li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>
                                        {{--<li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>--}}
                                        <li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li class="scroll-link exchange-rate hidden-xs hidden-sm"><span style="font-weight:400; color:#5FB06F;">Exchange Rate: 1BTC</span> <span style="color:#9F9F9F">=</span> <span style="font-weight:400; color:#CCA75C">${{number_format(\App\Settings::getParam('ourprice'),2)}}</span></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="wrapper" style="background-color:#f2f2f2;">
        <div class="container">
            <div class="row" style="margin-top:15px; margin-bottom:30px;">
                <h1>Bitcoin ATM Locations</h1>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <h2 class="text-left">Georgia Locations</h2>
                        <h3 class="text-left">Buckhead (North Atlanta)</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Chevron Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 345 Pharr Rd NE Atlanta, GA, 30305</li>
                                <li><strong>Hours:</strong> Open 24/7</li>
                            </ul>
                            <br />
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Terrific Package (Buy and Sell BTC)</li>
                                <li><strong>Address:</strong> 1899 Cheshire Bridge Rd NE, Atlanta, GA 30324</li>
                                <li><strong>Phone:</strong> 404-872-4294</li>
                                <li><strong>Hours (Monday-Thursday):</strong> 10am-11pm</li>
                                <li><strong>Hours (Friday-Saturday):</strong> 10am-11:45pm</li>
                                <li><strong>Hours (Sunday):</strong> 1pm-7pm</li>
                            </ul>
                            <br />
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Sunoco Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 2060 Peachtree Rd NW Atlanta, GA, 30309</li>
                                <li><strong>Hours:</strong> Open 24/7</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Downtown Atlanta</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Happy Hookah (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 66 Peachtree St Nw Atlanta, GA, 30303</li>
                                <li><strong>Hours (Monday-Friday):</strong> 11am-10pm</li>
                                <li><strong>Hours (Saturday):</strong> 1pm-10pm</li>
                                <li><strong>Hours (Sunday):</strong> Closed</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Midtown Atlanta</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Vape 911 Atlanta (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 539 10th St NW, Atlanta, GA 30318</li>
                                <li><strong>Phone:</strong> 404-975-1877</li>
                                <li><strong>Hours (Monday-Saturday):</strong> 10am-8pm</li>
                                <li><strong>Hours (Sunday):</strong> 10am-6pm</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Marietta</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Vape 911 Marietta (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 3020 Canton Rd #226, Marietta, GA 30066</li>
                                <li><strong>Phone:</strong> 404-994-7770</li>
                                <li><strong>Hours (Monday-Saturday):</strong> 10am-10pm</li>
                                <li><strong>Hours (Sunday):</strong> 12pm-6pm</li>
                            </ul>
                            <br />
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Exxon Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 405 Cobb Pkwy S Marietta, GA, 30060</li>
                                <li><strong>Phone:</strong> 770-421-9261</li>
                                <li><strong>Hours:</strong> 9am-9pm daily</li>
                            </ul>
                            <br />
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Texaco Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 2697 Windy Hill Rd SE, Marietta, GA 30067</li>
                                <li><strong>Hours:</strong> Open 24/7</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">East Atlanta</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Moreland Food Mart (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 381 Moreland Ave SE Suite A Atlanta, GA, 30316</li>
                                <li><strong>Phone:</strong> 404-521-0238</li>
                                <li><strong>Hours (Sunday-Wednesday):</strong> 9am-9pm</li>
                                <li><strong>Hours (Thursday-Saturday):</strong> 9am-11pm</li>
                            </ul>
                            <br />
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 1988 Flat Shoals Rd Atlanta, GA</li>
                                <li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>
                                <li><strong>Hours (Sunday):</strong> 9am-9pm</li>
                            </ul>
                            <br />
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 3550 E Ponce DE Leon Blvd Scottdale, GA, 30079</li>
                                <li><strong>Hours:</strong> Open 24/7</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">West Atlanta</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> MLK Groceries Plus (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 3665 MLK JR Dr Atlanta, GA</li>
                                <li><strong>Hours:</strong> 7am-12am daily</li>
                            </ul>
                            <br />
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Best 4 Less Quick Mart (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 2200 Campbellton Rd Atlanta, GA</li>
                                <li><strong>Hours (Sunday - Thursday):</strong> 9:30am-9:30pm</li>
                                <li><strong>Hours (Friday-Saturday):</strong> 9:30am-10pm</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">South Atlanta</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Cleveland Corner Store (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 387 Cleveland Ave SW Atlanta, GA, 30315</li>
                                <li><strong>Hours:</strong> 9am-10pm daily</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Jonesboro</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Citgo Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 6765 Tara Blvd Jonesboro, GA, 30236</li>
                                <li><strong>Hours:</strong> 6:30am-1:30am daily</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Doraville</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 6400 Peachtree Industrial Blvd, Doraville, GA,30360 (Next to Doraville Package store)</li>
                                <li><strong>Hours:</strong> 7am-12am daily</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Sandy Springs</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Shell Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 5700 Roswell Rd Atlanta, GA</li>
                                <li><strong>Hours:</strong> Open 24/7</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Union City</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Island Takeaway (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 5540 Old National Hwy Atlanta, GA</li>
                                <li><strong>Hours (Monday-Saturday):</strong> 11am-10pm</li>
                                <li><strong>Hours (Sunday):</strong> Closed</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">Roswell</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Valero Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 1597 Holcomb Bridge Rd Roswell, GA, 30076</li>
                                <li><strong>Hours (Monday-Saturday):</strong> 7am-11pm</li>
                                <li><strong>Hours (Sunday):</strong> 9am-9pm</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 class="text-left">Alabama Locations</h2>
                        <h3 class="text-left">East Birmingham</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Woodland Petro Gas station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 6400 1st Ave N Birmingham, AL</li>
                                <li><strong>Hours:</strong> 6am-12am daily</li>
                            </ul>
                        </div>
                        <br />
                        <h3 class="text-left">West Birmingham</h3>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Jetpep Gas Station (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 1608 Bessemer Rd Birmingham, AL</li>
                                <li><strong>Hours (Monday-Saturday):</strong> 5am-1am</li>
                                <li><strong>Hours (Sunday):</strong> 6am-12am</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 class="text-left">Boston Locations</h2>
                        <div>
                            <ul class="list-unstyled text-left">
                                <li><strong>Store Name:</strong> Boston Food Shops & Deli (Buy BTC Only)</li>
                                <li><strong>Address:</strong> 1610 Commonwealth Ave Brighton, MA, 02135</li>
                                <li><strong>Hours:</strong> 5:30am-12am daily</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection