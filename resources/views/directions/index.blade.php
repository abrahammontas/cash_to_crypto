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
                            {{--<li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>--}}
                            <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
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
                            {{--<li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>--}}
                            <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
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
                                        {{--<li><a href="{{ url('/directions') }}" style="color:#5b5b5b;">Directions</a></li>--}}
                                        <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
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

    <div class="wrapper" style="background-color:#f7fff7;">
        <div class="container" style="padding-bottom:80px; padding-top:40px;">
            <div class="row" style="margin-top:20px; margin-bottom:30px; margin-right:15px; margin-left:15px;">
                <h4 style="border:1px solid black; padding:10px 20px; font-weight: 300; line-height: 1.4em;">To buy bitcoin from Cash To Crypto all you will need is cash. You are not required to have a bank account at any of the banks we have accounts at. To buy bitcoin just deposit cash into one of our bank accounts, upload the photos of your receipt, and you are done!</h4>
            </div>
            <div class="row">
                <div class="col-md-12 text-left">
                    <h4 style="font-weight: 300;"><b>Step 1:</b> After creating an account, upload a photo of your ID on your profile. We will accept a driver`s license, passport, or state ID card.</h4>
                    <h4 style="font-weight: 300;"><b>Step 2:</b> Save your bitcoin wallet address </h4>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <img src="images/howto_profile.jpg" alt="how-to-profile">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-md-12 text-left">
                    <h4 style="font-weight: 300;"><b>Step 3:</b> Choose a bank, type in your purchase amount and select your bitcoin wallet address.</h4>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <img src="images/howto_buy.jpg" alt="how-to-buy">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-md-12 text-left">
                    <h4 style="font-weight: 300;"><b>Step 4:</b> On the current order page you will see the complete directions along with the bank account information.</h4>
                    <h4 style="font-weight: 300;"><b>Step 5:</b> After you make the cash deposit, upload a photo of your receipt and a selfie of yourself holding the receipt.</h4>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <img src="images/howto_directions.jpg" alt="how-to-directions">
                </div>
            </div>
        </div>
    </div>

@endsection