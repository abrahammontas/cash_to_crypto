@extends('admin.emails.default')

@section('content')
Hi {{ $admin->firstName }},
<br>
{{ $order->user->firstName }} {{ $order->user->lastName }} has uploaded their receipt (image attached to email).
@endsection