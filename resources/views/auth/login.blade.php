@extends('layouts.main')
@section('title', 'Login')
@section('content')

    @if($new_user = Session::get('new_user'))
        <!-- Google Code for Accounts Created Conversion Page -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 976131144;
            var google_conversion_language = "en";
            var google_conversion_format = "3";
            var google_conversion_color = "ffffff";
            var google_conversion_label = "T0XzCLuOgmsQyKi60QM";
            var google_remarketing_only = false;
            /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
            <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/976131144/?label=T0XzCLuOgmsQyKi60QM&amp;guid=ON&amp;script=0"/>
            </div>
        </noscript>
    @endif

<!-- Loader -->
<div class="loader">
    <div class="loader-img"></div>
</div>

<!-- Top content -->
<div class="top-content">

    @include('partials.navigation')

    @include ('partials.banner')

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

                    <form role="form" role="form" data-toggle="validator" data-disable="false" method="POST" action="{{ url('/login') }}">

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
                                    <input type="checkbox" name="remember" style="margin-top:7px;"> Remember Me
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

                            <a class="btn btn-link" href="{{ url('/password/reset') }}" style="padding-left:0px;padding-top:8px;">Forgot Your Password?</a>
                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
