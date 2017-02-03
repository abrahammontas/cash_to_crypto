@extends('layouts.main')
@section('title', 'Registration')
@section('content')

<!-- Loader -->
<div class="loader">
    <div class="loader-img"></div>
</div>

<!-- Top content -->
<div class="top-content">

    @include('partials.navigation')

    @include ('partials.banner')

    @if($failed = session('failed'))
        <div class="alert alert-danger">
            <p>{{ $failed }}</p>
        </div>
    @endif

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box wow fadeInUp">
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
                        <form role="form" role="form" data-toggle="validator" data-disable="false" method="POST" action="{{ url('/register') }}">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                <label for="firstName" class="sr-only">First Name</label>
                                <input id="name" type="text" class="form-control" placeholder="First Name" name="firstName" value="{{ old('firstName') }}" required>

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
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
                        <p style="font-size:16px; font-weight:300; color:#888;">Already have an account? - <a href="{{ url('/login') }}"><button class="btn btn-primary">
                                Login</button></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="wrapper" style="background-color:#f2f2f2;">--}}
    {{--<div class="container">--}}
        {{--<div class="row" style="margin-bottom:40px;">--}}
            {{--<div class="col-md-4 col-md-offset-4">--}}
                {{--<div class="form-border">--}}
                    {{--<h1 class="form-title-font">Register</h1>--}}
                    {{--<form class="form-horizontal" role="form" data-toggle="validator" method="POST" action="{{ url('/register') }}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">--}}
                            {{--<label for="firstName" class="sr-only">First Name</label>--}}
                            {{--<input id="name" type="text" class="form-control" placeholder="First Name" name="firstName" value="{{ old('firstName') }}" required>--}}

                            {{--@if ($errors->has('firstName'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('firstName') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">--}}
                            {{--<label for="lastName" class="sr-only">Last Name</label>--}}
                            {{--<input id="name" type="text" class="form-control"  placeholder="Last Name" name="lastName" value="{{ old('lastName') }}" required>--}}

                            {{--@if ($errors->has('lastName'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('firstName') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="sr-only">E-Mail Address</label>--}}
                            {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" data-error="Invalid email address" required>--}}

                            {{--@if ($errors->has('email'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">--}}
                            {{--<label for="phone" class="sr-only">Phone</label>--}}
                            {{--<input type="text" data-minlength="10" name="phone" id="input-phone" class="form-control input-medium bfh-phone" data-country="US" value="{{ old('phone') }}"  required>--}}

                            {{--@if ($errors->has('phone'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('phone') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="sr-only">Password</label>--}}
                            {{--<input id="password" type="password" class="form-control" placeholder="Password (minimum of 6 characters)" name="password" data-minlength="6" required>--}}

                            {{--@if ($errors->has('password'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                            {{--<label for="password-confirm" class="sr-only">Confirm Password</label>--}}
                            {{--<input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" data-match="#password" data-match-error="Passwords do not match" required>--}}
                            {{--<div class="help-block with-errors"></div>--}}

                            {{--@if ($errors->has('password_confirmation'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<button type="submit" name="register" id="btn-register" class="btn btn-primary btn-block">Register</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
