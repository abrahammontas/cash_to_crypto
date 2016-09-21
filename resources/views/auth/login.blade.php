@extends('layouts.main')
@section('title', 'Login')
@section('content')

@section('title', 'Registration')
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
                <a class="navbar-brand" href="index.html">Cash To Crypto</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/" style="color:white !important;">Home</a></li>
                    <li><a href="{{ url('/atm-locations') }}" style="color:white !important;">Bitcoin ATMs</a></li>
                    <li><a href="{{ url('/contact') }}" style="color:white !important;">Contact</a></li>
                    @if (Auth::guest())
                        <li><a class="btn btn-link-2" href="{{ url('/login') }}" style="color:white !important;">Login</a></li>
                        <li><a class="btn btn-link-2" href="{{ url('/register') }}" style="background-color:#707070; color:white !important;">Register</a></li>
                    @else
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Hi, {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
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
<!-- 
    <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
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

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box wow fadeInUp">
                    <div class="form-top" style="padding-top:15px;">
                        <div>
                            <h2 class="text-center" style="font-weight:300;">Login</h2>
                        </div>
                        {{--<div class="form-top-right">--}}
                            {{--<span aria-hidden="true" class="typcn typcn-pencil"></span>--}}
                        {{--</div>--}}
                    </div>
                    <div class="form-bottom">

                    <form role="form" role="form" data-toggle="validator" method="POST" action="{{ url('/login') }}">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="sr-only col-md-4 control-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="sr-only col-md-4 control-label">Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="help-block with-errors"></div>

                        <div class="form-group">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{!! $message !!}</p>
                                </div>
                            @endif

                            @if ($message = Session::get('warning'))
                                <div class="alert alert-warning">
                                    <p>{!! $message !!}</p>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-success form-control">
                                <i class="fa fa-btn fa-sign-in"></i> Login
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
