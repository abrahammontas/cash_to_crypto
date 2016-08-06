@extends('layouts.main')

@section('content')

<div class="wrapper" style="background-color:#f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-border">
                    <h4 class="form-title-font" style="font-size:24px; margin-bottom:15px; line-height:30px;">Login or <a href="{{ url('/register') }}">Register</a> to Buy Bitcoins</h4>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="sr-only col-md-4 control-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="sr-only col-md-4 control-label">Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password">

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

                        <div class="form-group">
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
@endsection
