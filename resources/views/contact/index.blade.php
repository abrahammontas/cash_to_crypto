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
        <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom:0px">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Cash To Crypto</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a class="scroll-link" href="#features">Home</a></li>
                        <li><a class="scroll-link" href="#how-it-works">How It Works</a></li>
                        <li><a class="scroll-link" href="#about-us">About</a></li>
                        <li><a class="scroll-link" href="#testimonials">Testimonials</a></li> -->
                        <li><a href="{{ url('/') }}" style="color:white !important">Home</a></li>
                        <li><a href="{{ url('/atm-locations') }}" style="color:white !important">Bitcoin ATMs</a></li>
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

<!--         <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="padding-top:14px; padding-bottom:8px;">
                    <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> We are closed for Labor Day Weekend. We will reopen Tuesday at 9:00am EST <span style="color:red">* * *</span></h3>
                </div>
            </div>
        </div>
    </section> -->

    <section id="disclaimer" style="background-color:#ff5e5e; border-top: 1px solid #cc1616; border-bottom: 1px solid #cc1616;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="padding-top:14px; padding-bottom:6px;">
                    <p style="color:whitesmoke; font-size:14px;"><strong>WARNING: We will no longer be able to do business with any person that resides, is located, has a place of business, or is conducting business in New York.</strong></p>
                </div>
            </div>
        </div>
    </section>

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
                            <form id="contact" role="form" data-toggle="validator" method="POST" action="{{ route('contact') }}">

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