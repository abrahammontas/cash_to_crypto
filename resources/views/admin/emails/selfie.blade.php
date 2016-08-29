@extends('admin.emails.default')

@section('content')
Hi {{ $admin->firstName }},
<br>
{{ $order->user->firstName }} {{ $order->user->lastName }} has uploaded their selfie (image attached to email).
@endsection