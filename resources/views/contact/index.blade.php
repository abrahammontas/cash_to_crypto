@extends('layouts.main')

@section('title', 'Contact')

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
                            <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
                            {{--<li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>--}}
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
                            <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
                            {{--<li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>--}}
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
                                        <li><a href="{{ url('/atm-locations') }}" style="color:#5b5b5b;">Bitcoin ATMs</a></li>
                                        {{--<li><a href="{{ url('/contact') }}" style="color:#5b5b5b;">Contact</a></li>--}}
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

<!--         <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="padding-top:14px; padding-bottom:8px;">
                    <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> We are closed for Labor Day Weekend. We will reopen Tuesday at 9:00am EST <span style="color:red">* * *</span></h3>
                </div>
            </div>
        </div>
    </section> -->

        @if ($message = session('success'))
            <div class="row">
                <div class="container">
                    <div class="alert alert-success" style="margin-top:6%; margin-bottom:0px; text-align:left;">
                        <p>{!! $message !!}</p>
                    </div>
                </div>
            </div>
        @endif


        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 form-box wow fadeInUp">
                        <div class="form-top" style="padding-top:15px;">
                            <div>
                                <h2 class="text-center">Contact Us</h2>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form id="contact" role="form" data-toggle="validator" method="POST" data-disable="false" action="{{ route('contact') }}">

                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="sr-only col-md-4 control-label">Name</label>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="sr-only col-md-4 control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <label for="subject" class="sr-only col-md-4 control-label">Subject</label>
                                    <input id="subject" type="text" class="form-control" placeholder="Subject" name="subject" required>
                                    @if ($errors->has('subject'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                    <label for="message" class="sr-only col-md-4 control-label">Message</label>
                                    <textarea id="message" type="text" class="form-control" placeholder="Message" name="text" required></textarea>
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control">
                                        <i class="fa fa-btn"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2" >
                        <h2 style="padding-top:15px; text-align:left; color:gold;">Contact Info</h2>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Email:</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">support@cashtocrypto.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Phone:</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">(678) 435-9604</span>
                                </div>
                            </div>
                        </div>
                        <br />
                        <h2 style="padding-top:15px; text-align:left; color:gold;">Business Hours</h2>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Monday-Friday:</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">9:00am - 8:00pm EST</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Saturday</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">9:00am - 3:00pm EST</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="text-align:left;">
                                <span style="color:white;">Sunday</span>
                            </div>
                            <div class="col-xs-6" style="text-align:left;">
                                <div class="row">
                                    <span style="color:white;">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection