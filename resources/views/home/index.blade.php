@extends('layouts.main')

@section('title', 'Buy Bitcoins!')

@section('content')

    <!-- Loader -->
    <div class="loader">
        <div class="loader-img"></div>
    </div>

    <!-- Top content -->
    <div class="top-content">
        <!-- Top menu -->

        @include('partials.navigation')

        <!-- <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12" style="padding-top:14px; padding-bottom:8px;">
                        <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> We are closed this weekend for maintenance. We will reopen Monday (10/17) at 9am EST. <span style="color:red">* * *</span></h3>
                    </div>
                </div>
            </div>
        </section> -->

        <div class="inner-bg" style="padding-bottom:100px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 text fadeInLeftBig" style="padding:20px 20px;">
                        <div class="row" style="margin-bottom:5%;">
                            <h1 class="wow">Buy Bitcoin With Cash!</h1>
                            <div class="description wow">
                                <p style="padding-right:40px; padding-left:40px;">
                                    We have made purchasing bitcoin even easier! Register for a free account and follow our three simple steps to start buying Bitcoin!
                                </p>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10%;">
                            <div class="col-md-12">
                                <div class="col-md-4 text-center">
                                    <img src="images/bank-icon.png" class="img-responsive" style="margin:auto;" alt="bitcoin-icon"><br>
                                    <h4 style="font-weight:400">Step 1: Choose Location</h4>
                                    <p class="steps-padding">Choose the most convenient deposit location from thousands of locations around the U.S.</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="images/wallet-icon.png" class="img-responsive" style="margin:auto;" alt="bitcoin-icon"><br>
                                    <h4 style="font-weight:400">Step 2: Deposit Cash</h4>
                                    <p class="steps-padding">After placing an order, make a cash deposit to our account</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="images/bitcoin-icon.png" class="img-responsive" style="margin:auto;" alt="bitcoin-icon"><br>
                                    <h4 style="font-weight:400">Step 3: Get Bitcoin!</h4>
                                    <p class="steps-padding">Your bitcoin purchase will be processed and delivered within 2 hours</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="top-big-link wow fadeInUp">
                                <a class="btn btn-link-2" style="background-color:#707070;" href="{{ url('/register') }}">Register For A Free Account!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 form-box wow fadeInUp">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Sign up now</h3>
                                <p>Fill in the form below to get instant access:</p>
                            </div>
                            <div class="form-top-right">
                                <span aria-hidden="true" class="typcn typcn-pencil"></span>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" role="form" data-toggle="validator" method="POST" action="{{ url('/register') }}">

                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                    <label for="firstName" class="sr-only">First Name</label>
                                    <input id="name" type="text" class="form-control" placeholder="First Name" name="firstName" value="{{ old('firstName') }}" required>

                                    @if ($errors->has('firstName'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                    <label for="lastName" class="sr-only">Last Name</label>
                                    <input id="name" type="text" class="form-control"  placeholder="Last Name" name="lastName" value="{{ old('lastName') }}" required>

                                    @if ($errors->has('lastName'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="sr-only">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" data-error="Invalid email address" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="sr-only">Phone</label>
                                    <input type="text" data-minlength="10" name="phone" id="input-phone" class="form-control input-medium bfh-phone" data-format="+1 (ddd) ddd-dddd" value="0000000000" data-country="US" value="{{ old('phone') }}"  required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="sr-only">Password</label>
                                    <input id="password" type="password" class="form-control" placeholder="Password (minimum of 6 characters)" name="password" data-minlength="6" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="sr-only">Confirm Password</label>
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" data-match="#password" data-match-error="Passwords do not match" required>
                                    <div class="help-block with-errors"></div>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label for="subscribed">
                                            <input type="checkbox" name="subscribed" value="1" style="margin-top:7px;" checked>  I agree to receive important text and email notifications.
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="register" id="btn-register" class="btn form-control" style="text-transform:uppercase;">Create Free Account</button>
                                </div>

                                <!-- <div class="form-links">
                                    <a href="#" class="launch-modal" data-modal-id="modal-privacy">Privacy Policy</a> -
                                    <a href="#" class="launch-modal" data-modal-id="modal-faq">FAQ</a>
                                </div> -->

                            </form>
                            <hr />
                            <p style="font-size:16px; font-weight:300; color:#888;">Already have an account? - <a href="{{ url('/login') }}"><button class="btn btn-primary">Login</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection