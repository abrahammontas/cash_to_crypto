@extends('admin.emails.default')

@section('content')

<h1 style='text-align:center'>Verify Email</h1>

<p>Thanks for registering with Bitcoin Depot! Please click the link below to verify your email and to access your user dashboard.</p>
<a href="{{ route('activation', $link)}}">Verification Link</a>

@endsection