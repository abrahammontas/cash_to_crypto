@extends('layouts.main')

@section('content')
<div class="wrapper" style="background-color:#f2f2f2;">
    <div class="container">
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-border">
                    <h1 class="form-title-font">Reset Password</h1>
                    <form class="form-horizontal" role="form" data-toggle="validator" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="sr-only">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email" placeholder="Email"  value="{{ $email or old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" data-minlength="6" type="password" class="form-control" name="password" placeholder="New password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="sr-only">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" data-match="#password" data-match-error="Passwords do not match" required>
                            <div class="help-block with-errors"></div>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-btn fa-refresh"></i> Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
