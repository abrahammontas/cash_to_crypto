@extends('admin.emails.default')

@section('content')

<h1 style='text-align:center'>Reset Password</h1>

Click here to reset your password: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>

@endsection