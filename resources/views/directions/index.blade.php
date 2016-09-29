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
                        <li><a href="/atm-locations" style="color:white !important;">Bitcoin ATMs</a></li>
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
                                        @if (auth()->user()->hasPending())
                                            <li>
                                                <a href="{{route('current-order')}}"> Current Order</a>
                                            </li>
                                        @endif
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